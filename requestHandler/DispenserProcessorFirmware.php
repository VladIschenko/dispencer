<?php

namespace Handler;

use Handler\Crc32;
use Exception;
use Core\Db;
use PDO;

class DispenserProcessorFirmware
{
//  const CONFIG_MAX_SIZE = 16;
//  const HEADER_MAX_SIZE = 114;
//  const FOB_MAX_SIZE = 64;
//  const CONTENT_START = 4;
//  const CRC_SIZE = 4;
//  const FOB_CYCLES_COUNT = 4;

    protected $db;
    //header of data
    const HEADER_SIZE = 8;

    const DEVICE_UID = 6;
    const PACKET_TYPE = 2;
    //crc32 for header data
    const CRC32 = 4;


    const PACKET = 16;
    //Structure of one package
    const EVENT_TYPE = 1;
    const CHANNEL = 1;
    const VOLUME = 4;
    const TIME = 4;
    const EVENT_UID = 4;
    const LEASTCRC = 2;



    private $dispenser;

    public function __construct()
    {
        $this->db = Db::connect();
    }

    private function getInput()
    {
        $handle = fopen('php://input', 'rb');
        if (!$handle) {
            return null;
        }
        $content = stream_get_contents($handle);
        fclose($handle);
        return $content;
    }


    public function processData()
    {
        $contents = $this->getInput();
//        echo $contents;
		/*$filename = "input (7).bin";
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        fclose($handle);*/
//        echo "\n" . "CONTENT: " . $contents . "\n";
//        echo "</br>";
        $data = unpack("C*", $contents);
//        var_dump($data);
//
//
//        echo "\n" . "DATA: ";
//        foreach ($this->addZero($data) as $value) {
//            echo $value . " ";
//        }

//        if(isset($_SESSION['count'])){
//            $this->updateFirmware($_SESSION['header']);
//        }


        $cont = substr($contents, 0, self::HEADER_SIZE);
        $checksum = Crc32::getCrc32($cont);

        if (!$contents) {
            header("HTTP/1.1 400 The request is empty");
            return;
        }

//        $size = strlen($contents);
//        if ($size < strrev(substr($contents, self::DEVICE_UID + self::PACKET_TYPE, self::DATA_SIZE))) {
//            header("HTTP/1.1 400 Incorrect data size");
//            return;
//        }

        $checksumReceived = unpack('Ncheck', strrev(substr($contents, self::HEADER_SIZE, self::CRC32)));

//        if ($checksum != $checksumReceived['check']) {
//            header("HTTP/1.1 400 Checksum does not match");
//            return;
//        }

        $header = substr($contents, 0, self::HEADER_SIZE);
        $data = substr($contents, self::HEADER_SIZE + self::CRC32);
        $this->processPackage($header,$data);
    }








    //fix bug with encode maybe useless at hosting
    public function addZero($data)
    {
        $size = count($data) + 1;
        for($i = 1; $i < $size; $i++)
        {
            $search = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
            $replace = array('00','01','02','03','04','05','06','07','08','09','0a','0b','0c','0d','0e','0f');
            $data[$i] = dechex($data[$i]);
            if(strlen($data[$i]) < 2){
                $data[$i] = str_replace($search, $replace, $data[$i]);
            }
        }
        return $data;
    }
    //end fix


    //FOR PROCESSING DATA
    public function processSetting($data)
    {
        $setting = substr($data,0,49);
        $setting = $this->addZero(unpack("C*", $setting));
//        var_dump($setting);

        $hwConfig = $this->processHwConfig(implode("", array_slice($setting, 0, 1)));
        $sensor1_threshold = hexdec(implode("", array_slice($setting, 1, 1)));
        $sensor2_threshold = hexdec(implode("", array_slice($setting, 2, 1)));
        $startVolume1 = hexdec(implode("", array_reverse(array_slice($setting, 3, 2))));
        $startVolume2 = hexdec(implode("", array_reverse(array_slice($setting, 5, 2))));
        $startVolume3 = hexdec(implode("", array_reverse(array_slice($setting, 7, 2))));
        $endVolume1 = hexdec(implode("", array_reverse(array_slice($setting, 9, 2))));
        $endVolume2 = hexdec(implode("", array_reverse(array_slice($setting, 11, 2))));
        $endVolume3 = hexdec(implode("", array_reverse(array_slice($setting, 13, 2))));
        $cleanserVolume1 = hexdec(implode("", array_reverse(array_slice($setting, 15, 2))));
        $cleanserVolume2 = hexdec(implode("", array_reverse(array_slice($setting, 17, 2))));
        $cleanserVolume3 = hexdec(implode("", array_reverse(array_slice($setting, 19, 2))));
        $cleanserDelay1 = hexdec(implode("", array_reverse(array_slice($setting, 21, 2))));
        $cleanserDelay2 = hexdec(implode("", array_reverse(array_slice($setting, 23, 2))));
        $cleanserDelay3 = hexdec(implode("", array_reverse(array_slice($setting, 25, 2))));
        $concentrateVolume = hexdec(implode("", array_reverse(array_slice($setting, 27, 2))));
        $waterMixVol = hexdec(implode("", array_reverse(array_slice($setting, 29, 2))));
        $flowSpeedMin = hexdec(implode("", array_reverse(array_slice($setting, 31, 2))));
        $flowFactor1 = hexdec(implode("", array_reverse(array_slice($setting, 33, 2))));
        $flowFactor2 = hexdec(implode("", array_reverse(array_slice($setting, 35, 2))));
        $flowFactor3 = hexdec(implode("", array_reverse(array_slice($setting, 37, 2))));
        $flowFactor4 = hexdec(implode("", array_reverse(array_slice($setting, 39, 2))));
        $minInerval = hexdec(implode("", array_reverse(array_slice($setting, 41, 2))));
        $maxInterval = hexdec(implode("", array_reverse(array_slice($setting, 43, 2))));
        $time = hexdec(implode("", array_reverse(array_slice($setting, 45, 4))));
        $time = date('Y-m-d h:i:s', $time);

        $setting=array(
            'hw_config' => $hwConfig,
            'sensor_1' => $sensor1_threshold,
            'sensor_2' => $sensor2_threshold,
            'start_volume_1' => $startVolume1,
            'start_volume_2' => $startVolume2,
            'start_volume_3' => $startVolume3,
            'end_volume_1' => $endVolume1,
            'end_volume_2' => $endVolume2,
            'end_volume_3' => $endVolume3,
            'cleanser_volume_1' => $cleanserVolume1,
            'cleanser_volume_2' => $cleanserVolume2,
            'cleanser_volume_3' => $cleanserVolume3,
            'cleanser_delay_1' => $cleanserDelay1,
            'cleanser_delay_2' => $cleanserDelay2,
            'cleanser_delay_3' => $cleanserDelay3,
            'concentrate_volume' => $concentrateVolume,
            'water_mix_volume' => $waterMixVol,
            'flow_speed_min' => $flowSpeedMin,
            'flowmeter_performance_1' => $flowFactor1,
            'flowmeter_performance_2' => $flowFactor2,
            'flowmeter_performance_3' => $flowFactor3,
            'flowmeter_performance_4' => $flowFactor4,
            'sanitization_min_interval' => $minInerval,
            'sanitization_max_interval' => $maxInterval,
            'time' => $time,
        );

		//var_dump($setting);

        return $setting;
    }

    public function updateFirmware($header)
    {
        header("Expires:");
        header("Cache-Control:");

        $filename = "firmware4.bin";
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        if(!isset($_SESSION['header']))
        {
            $_SESSION['header'] = $header;
        }

        if(!isset($_SESSION['count']) or $_POST['ETH_PACKET_FW_UPDATE_ANSWER'] == "FW full AES")
        {
            $_SESSION['count'] = 0;
            $firmwarePart = substr($contents, $_SESSION['count'], 256);
            echo $_SESSION['header'] . $firmwarePart;
            $_SESSION['count'] += 256;

			/*$data = $_SESSION['header'] . $firmwarePart;
            $data = unpack("C*", $data);
            echo "\n" . "DATA: ";
            foreach ($this->addZero($data) as $value) {
                echo $value . " ";
            }*/

        }elseif($_POST['ETH_PACKET_FW_UPDATE_ANSWER'] == "FW page OK"){
                $firmwarePart = substr($contents, $_SESSION['count'], 256);
                echo $_SESSION['header'] . $firmwarePart;
                $_SESSION['count'] += 256;

			/*$data = $_SESSION['header'] . $firmwarePart;
                $data = unpack("C*", $data);
                echo "\n" . "DATA: ";
                foreach ($this->addZero($data) as $value) {
                    echo $value . " ";
                }*/
            }elseif($_POST['ETH_PACKET_FW_UPDATE_ANSWER'] == "FW page AES") {
                $_SESSION['count'] = $_SESSION['count'] - 256;
                If($_SESSION['count'] < 0)
                {
                    $_SESSION['count'] = 0;
                }
                $firmwarePart = substr($contents, $_SESSION['count'], 256);
                echo $_SESSION['header'] . $firmwarePart;
                $_SESSION['count'] += 256;
            }elseif($_POST['ETH_PACKET_FW_UPDATE_ANSWER'] == "FW full OK")
            {
                unset($_SESSION['count']);
                unset($_SESSION['header']);
                session_unset();
                session_destroy();
            }elseif(substr($_POST['ETH_PACKET_FW_UPDATE_ANSWER'],0,13) == "FW page retry"){
            $_SESSION['count'] = (substr($_POST['ETH_PACKET_FW_UPDATE_ANSWER'],14) * 256) - 256;
            $firmwarePart = substr($contents, $_SESSION['count'], 256);
            echo $_SESSION['header'] . $firmwarePart;
            $_SESSION['count'] += 256;
        }else{
            session_unset();
            session_destroy();
        }

		$post = $_POST['ETH_PACKET_FW_UPDATE_ANSWER'];
		$log = $_SESSION['count']/256 . " " . $post;
		$f = fopen("firmware.log", "w");
		fwrite($f, $log);
		fclose($f);
//        echo "</br>";
//        echo "COUNT: " . $_SESSION['count'];
//        echo "</br>";
//        echo "SESSION: " . $_SESSION{'header'};
//        echo "</br>";
    }

    public function processPackage($header, $data)
    {
        if(true){
            $deviceUid = substr($header, 0, 6);
            $packetType = pack("C*", 4, 0);

            $checksum  = $deviceUid . $packetType;
            $checksum = Crc32::getCrc32($checksum );
            $checksum = dechex($checksum);
            if(strlen($checksum) < 8)
            {
                $checksum = "0" . $checksum;
            }
            $checksumParts = str_split($checksum, 2);

            for($i=0;$i<count($checksumParts); $i++)
            {
                $checksumParts[$i] = pack("C*",hexdec($checksumParts[$i]));
            }
            $checksum = strrev(implode("", $checksumParts));
            $header = $deviceUid . $packetType . $checksum;

            $this->updateFirmware($header);
        }else{

            $deviceUid = $this->addZero(unpack("C*", substr($header, 0, self::DEVICE_UID)));
            $packetType = $this->addZero(unpack("C*", strrev(substr($header, self::DEVICE_UID, self::PACKET_TYPE))));
//        $data_size = array_reverse($this->addZero(unpack("C*", (substr($header, self::DEVICE_UID + self::PACKET_TYPE, self::DATA_SIZE)))));

            $deviceUid = implode("-", $deviceUid);
            $packetType = dechex(implode("", $packetType));
//        $data_size = hexdec(implode("", $data_size));

            $header=array(
                'device_uid' => $deviceUid,
                'packet_type' => $packetType,
//            'data_size' => $data_size
            );

            if($header['packet_type'] == 1)
            {
                $data = $this->processLogs($data);
                $this->saveLogs($header, $data);
            }elseif ($header['packet_type'] == 2)
            {
                $data = $this->processSetting($data);
                $this->saveSetting($header, $data);
            }

//            var_dump($header);
            return $header;
        }
    }

    public function processLogs($data)
    {
        $packets = str_split($data, self::PACKET);
        $crcForPacket = array();
        $config = array();

        for($i=0; $i < count($packets); $i++)
        {
            $crc[$i] = substr($packets[$i], 0, 14);
            $crcForPacket[$i] = dechex(Crc32::getCrc32($crc[$i]));
        }

        $logs = $this->addZero(unpack("C*", $data));
        $logs = array_chunk($logs, self::PACKET);

        for($i=0;$i<count($logs);$i++)
        {
            if($crcForPacket[$i] == '245a4225') //245a4225 is crc32 for empty packet like ff ff ff
            {
//				header("HTTP/1.1 400 The empty packet");
            }elseif(count($logs[$i]) < self::PACKET){
				//header("HTTP/1.1 400 Wrong size of packet");
        }else {
                $leastCrc = implode("", array_reverse(array_slice($logs[$i], 14, self::LEASTCRC)));

//                if($leastCrc == substr($crcForPacket[$i], -4))
//                {
                    $event_type = $this->processEventType(implode("", array_slice($logs[$i], 0, self::EVENT_TYPE)));
                    $channel = $this->processChannel(implode("", array_slice($logs[$i], 1, self::CHANNEL)));
                    $volume = hexdec(implode("", array_reverse(array_slice($logs[$i], 2, self::VOLUME))));
                    $time = hexdec(implode("", array_reverse(array_slice($logs[$i], 6, self::TIME))));
                    $time = date('Y-m-d h:i:s', $time);
                    $event_uid = hexdec(implode("", array_reverse(array_slice($logs[$i], 10, self::EVENT_UID))));
                    echo $event_uid;

                    $config[$i]=array(
                        'event_type' => $event_type,
                        'channel' => $channel,
                        'volume' => $volume,
                        'time' => $time,
                        'event_uid' => $event_uid,
                    );
//                }else{
////                    header("HTTP/1.1 400 Wrong crc for packet");
//                }
            }
        }
		//var_dump($config);
        return $config;
    }
    //END FOR PROCESSING DATA


    //FOR SAVING DATA
    public function saveLogs($header, $logs)
    {
        $now = date("Y-m-d H:i:s");
//        var_dump($logs);
        for($i=0;$i<count($logs);$i++)
        {
            $stmt = $this->db->prepare("INSERT INTO logs(type, channel,
 volume, time, device_id, event_uid, created_at)
 values (?,?,?,?,?,?,?)");
            $result = $stmt->execute(
                array(
                    $logs[$i]['event_type'],
                    $logs[$i]['channel'],
                    $logs[$i]['volume'],
                    $logs[$i]['time'],
                    $header['device_uid'],
                    $logs[$i]['event_uid'],
                    $now)
            );
        }
    }

    public function saveSetting($header, $setting)
    {
        $now = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("INSERT INTO options(device_id, hw_config,
 sensor_1, sensor_2, start_volume_1, start_volume_2, start_volume_3, end_volume_1,
 end_volume_2, end_volume_3, cleanser_volume_1, cleanser_volume_2, cleanser_volume_3,
 cleanser_delay_1, cleanser_delay_2, cleanser_delay_3, concentrate_volume, water_mix_volume,
 flow_speed_min, 	flowmeter_performance_1, 	flowmeter_performance_2, 	flowmeter_performance_3,
 flowmeter_performance_4, sanitization_min_interval, sanitization_max_interval, time, created_at)
 values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $result = $stmt->execute(
            array(
                $header['device_uid'],
                $setting['hw_config'],
                $setting['sensor_1'],
                $setting['sensor_2'],
                $setting['start_volume_1'],
                $setting['start_volume_2'],
                $setting['start_volume_3'],
                $setting['end_volume_1'],
                $setting['end_volume_2'],
                $setting['end_volume_3'],
                $setting['cleanser_volume_1'],
                $setting['cleanser_volume_2'],
                $setting['cleanser_volume_3'],
                $setting['cleanser_delay_1'],
                $setting['cleanser_delay_2'],
                $setting['cleanser_delay_3'],
                $setting['concentrate_volume'],
                $setting['water_mix_volume'],
                $setting['flow_speed_min'],
                $setting['flowmeter_performance_1'],
                $setting['flowmeter_performance_2'],
                $setting['flowmeter_performance_3'],
                $setting['flowmeter_performance_4'],
                $setting['sanitization_min_interval'],
                $setting['sanitization_max_interval'],
                $setting['time'],
                $now)
        );
//        var_dump($result);
    }
    //END FOR SAVING DATA

    //FOR ENUM DATA
    public function processEventType($typeCode)
    {
        $types = array(
            'EV_FLUSHING_BEGIN' => '01',
            'EV_FLUSHING_COMPLETE' => '02',
            'EV_SANIT_BEGIN' => '03',
            'EV_SANIT_STAGE1_COMPLETE' => '04',
            'EV_SANIT_STAGE2_COMPLETE' => '05',
            'EV_SANIT_STAGE3_COMPLETE' => '06',

            'EV_ERR_WATER_LEVEL_LO' => '07',
            'EV_ERR_WATER_NO_DATA' => '08',
            'EV_ERR_WATER_LEVEL_OK' => '09',

            'EV_ERR_CLEANSER_LEVEL_LO' => '0a',
            'EV_ERR_CLEANSER_NO_DATA' => '0b',
            'EV_ERR_CLEANSER_LEVEL_OK' => '0c',
            'EV_ERR_CLEANSER_LEVEL_HI' => '0d',

            'EV_ERR_CONCENTR_LEVEL_LO' => '0e',
            'EV_ERR_CONCENTR_NO_DATA' => '0f',
            'EV_ERR_CONCENTR_LEVEL_OK' => '10',

            'EV_ERR_FLOW_LOW' => '11',

            'EV_ERRORS_CLEARED' => '12',
            'EV_STOP_PRESSED' => '13',

            'EV_BEER_FLOWMETER' => '14',
            );
        $type = array_search($typeCode, $types);
        return $type;
    }

    public function processHwConfig($congifNumber)
    {
        $hwConfigs = array(
            'HW_BASE' => '00',
            'HW_PLUMBING' => '01',
            'HW_MIXER_!FM' => '02',
            'HW_MIXER_4FM' => '03',
        );
        $number = array_search($congifNumber, $hwConfigs);
        return $number;
    }
    public function processChannel($chanelNumber)
    {
        $numbers = array(
            '1' => '00',
            '2' => '01',
            '3' => '02',
        );
        $number = array_search($chanelNumber, $numbers);
        return $number;
    }
    //END FOR ENUM DATA
}