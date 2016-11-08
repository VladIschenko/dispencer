<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 20.09.16
 * Time: 10:48
 */

namespace Models;

use Handler\Crc32;
use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;

class OptionsModel
{
    protected $db;

    private $deviceId;
    private $hwConfig;
    private $sensor1;
    private $sensor2;
    private $startVolume1;
    private $startVolume2;
    private $startVolume3;
    private $endVolume1;
    private $endVolume2;
    private $endVolume3;
    private $cleanserVolume1;
    private $cleanserVolume2;
    private $cleanserVolume3;
    private $cleanserDelay1;
    private $cleanserDelay2;
    private $cleanserDelay3;
    private $concentrateVolume;
    private $waterMixVolume;
    private $flowSpeedMin;
    private $flowmeterPerformance1;
    private $flowmeterPerformance2;
    private $flowmeterPerformance3;
    private $flowmeterPerformance4;
    private $sanitizationMinInterval;
    private $sanitizationMaxInterval;
    private $time;
    private $lastDispatch;
    private $lastTimeUpdate;


    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getHwConfig()
    {
        return $this->hwConfig;
    }

    public function setHwConfig($hwConfig)
    {
        $this->hwConfig = $hwConfig;
    }

    public function getSensor1()
    {
        return $this->sensor1;
    }

    public function setSensor1($sensor1)
    {
        $this->sensor1 = $sensor1;
    }

    public function getSensor2()
    {
        return $this->sensor2;
    }

    public function setSensor2($sensor2)
    {
        $this->sensor2 = $sensor2;
    }

    public function getStartVolume1()
    {
        return $this->startVolume1;
    }

    public function setStartVolume1($startVolume1)
    {
        $this->startVolume1 = $startVolume1;
    }

    public function getStartVolume2()
    {
        return $this->startVolume2;
    }

    public function setStartVolume2($startVolume2)
    {
        $this->startVolume2 = $startVolume2;
    }

    public function getStartVolume3()
    {
        return $this->startVolume3;
    }

    public function setStartVolume3($startVolume3)
    {
        $this->startVolume3 = $startVolume3;
    }

    public function getEndVolume1()
    {
        return $this->endVolume1;
    }

    public function setEndVolume1($endVolume1)
    {
        $this->endVolume1 = $endVolume1;
    }

    public function getEndVolume2()
    {
        return $this->endVolume2;
    }

    public function setEndVolume2($endVolume2)
    {
        $this->endVolume2 = $endVolume2;
    }

    public function getEndVolume3()
    {
        return $this->endVolume3;
    }

    public function setEndVolume3($endVolume3)
    {
        $this->endVolume3 = $endVolume3;
    }

    public function getCleanserVolume1()
    {
        return $this->cleanserVolume1;
    }

    public function setCleanserVolume1($cleanserVolume1)
    {
        $this->cleanserVolume1 = $cleanserVolume1;
    }

    public function getCleanserVolume2()
    {
        return $this->cleanserVolume2;
    }

    public function setCleanserVolume2($cleanserVolume2)
    {
        $this->cleanserVolume2 = $cleanserVolume2;
    }

    public function getCleanserVolume3()
    {
        return $this->cleanserVolume3;
    }

    public function setCleanserVolume3($cleanserVolume3)
    {
        $this->cleanserVolume3 = $cleanserVolume3;
    }

    public function getCleanserDelay1()
    {
        return $this->cleanserDelay1;
    }

    public function setCleanserDelay1($cleanserDelay1)
    {
        $this->cleanserDelay1 = $cleanserDelay1;
    }

    public function getCleanserDelay2()
    {
        return $this->cleanserDelay2;
    }

    public function setCleanserDelay2($cleanserDelay2)
    {
        $this->cleanserDelay2 = $cleanserDelay2;
    }

    public function getCleanserDelay3()
    {
        return $this->cleanserDelay3;
    }

    public function setCleanserDelay3($cleanserDelay3)
    {
        $this->cleanserDelay3 = $cleanserDelay3;
    }

    public function getConcentrateVolume()
    {
        return $this->concentrateVolume;
    }

    public function setConcentrateVolume($concentrateVolume)
    {
        $this->concentrateVolume = $concentrateVolume;
    }

    public function getWaterMixVolume()
    {
        return $this->waterMixVolume;
    }

    public function setWaterMixVolume($waterMixVolume)
    {
        $this->waterMixVolume = $waterMixVolume;
    }

    public function getFlowSpeedMin()
    {
        return $this->flowSpeedMin;
    }

    public function setFlowSpeedMin($flowSpeedMin)
    {
        $this->flowSpeedMin = $flowSpeedMin;
    }

    public function getFlowmeterPerformance1()
    {
        return $this->flowmeterPerformance1;
    }

    public function setFlowmeterPerformance1($flowmeterPerformance1)
    {
        $this->flowmeterPerformance1 = $flowmeterPerformance1;
    }

    public function getFlowmeterPerformance2()
    {
        return $this->flowmeterPerformance2;
    }

    public function setFlowmeterPerformance2($flowmeterPerformance2)
    {
        $this->flowmeterPerformance2 = $flowmeterPerformance2;
    }

    public function getFlowmeterPerformance3()
    {
        return $this->flowmeterPerformance3;
    }

    public function setFlowmeterPerformance3($flowmeterPerformance3)
    {
        $this->flowmeterPerformance3 = $flowmeterPerformance3;
    }

    public function getFlowmeterPerformance4()
    {
        return $this->flowmeterPerformance4;
    }

    public function setFlowmeterPerformance4($flowmeterPerformance4)
    {
        $this->flowmeterPerformance4 = $flowmeterPerformance4;
    }

    public function getSanitizationMinInterval()
    {
        return $this->sanitizationMinInterval;
    }

    public function setSanitizationMinInterval($sanitizationMinInterval)
    {
        $this->sanitizationMinInterval = $sanitizationMinInterval;
    }

    public function getSanitizationMaxInterval()
    {
        return $this->sanitizationMaxInterval;
    }

    public function setSanitizationMaxInterval($sanitizationMaxInterval)
    {
        $this->sanitizationMaxInterval = $sanitizationMaxInterval;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getLastDispatch()
    {
        return $this->lastDispatch;
    }

    public function setLastDispatch($lastDispatch)
    {
        $this->lastDispatch = $lastDispatch;
    }

    public function getLastTimeUpdate()
    {
        return $this->lastTimeUpdate;
    }

    public function setLastTimeUpdate($lastTimeUpdate)
    {
        $this->lastTimeUpdate = $lastTimeUpdate;
    }


    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM options ORDER BY created_at DESC LIMIT 10");
        $optionsList = $stmt->fetchAll();
        return $optionsList;
    }

    public function findById($deviceUid)
    {
        $stmt = $this->db->query("SELECT * FROM options WHERE device_id = '$deviceUid'");
        $option = $stmt->fetch(PDO::FETCH_ASSOC);
        return $option;
    }

    public function checkExistence($deviceid)
    {
        $stmt = $this->db->query("SELECT * FROM options WHERE device_id = '$deviceid'");
        $exist = $stmt->fetchAll();
        if ($exist == true) {
            return true;
        } else {
            return false;
        }
    }

    public function checkLastDispatch($deviceUid)
    {
        $stmt = $this->db->query("SELECT last_dispatch FROM options WHERE device_id = '$deviceUid';");
        $lastDispatch = $stmt->fetchColumn();
        return $lastDispatch;
    }

    public function checkUpdatedAt($deviceUid)
    {
        $stmt = $this->db->query("SELECT updated_at FROM options WHERE device_id = '$deviceUid';");
        $lastDispatch = $stmt->fetchColumn();
        return $lastDispatch;
    }

    public function checkTime($deviceUid)
    {
        $stmt = $this->db->query("SELECT time FROM options WHERE device_id = '$deviceUid';");
        $time = $stmt->fetchColumn();
        return $time;
    }

    public function checkHwConfig($deviceUid)
    {
        $stmt = $this->db->query("SELECT hw_config FROM options WHERE device_id = '$deviceUid';");
        $time = $stmt->fetchColumn();
        return $time;
    }

    public function checkLastTimeUpdate($deviceUid)
    {
        $stmt = $this->db->query("SELECT last_time_update FROM options WHERE device_id = '$deviceUid';");
        $time = $stmt->fetchColumn();
        return $time;
    }

    public function lastDispatchUpdate($deviceUid)
    {
        $now = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("UPDATE options SET last_dispatch = '$now' WHERE device_id = '$deviceUid';");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function save($deviceUid)
    {
        $options = new OptionsModel();
        if($options->checkExistence($deviceUid))
        {
            $stmt = $this->db->prepare("UPDATE options SET hw_config = ?,
 sensor_1 = ?, sensor_2 = ?, start_volume_1 = ?, start_volume_2 = ?, start_volume_3 = ?, end_volume_1 = ?,
 end_volume_2 = ?, end_volume_3 = ?, cleanser_volume_1 = ?, cleanser_volume_2 = ?, cleanser_volume_3 = ?,
 cleanser_delay_1 = ?, cleanser_delay_2 = ?, cleanser_delay_3 = ?, concentrate_volume = ?, water_mix_volume = ?,
 flow_speed_min = ?, 	flowmeter_performance_1 = ?, 	flowmeter_performance_2 = ?, 	flowmeter_performance_3 = ?,
 flowmeter_performance_4 = ?, sanitization_min_interval = ?, sanitization_max_interval = ?, time = ?,
 last_time_update = ?
 WHERE device_id = ?");
            if($options->checkTime($deviceUid) == $options->getTime())
            {
                $lastTimeUpdate = $this->checkLastTimeUpdate($deviceUid);
            }else{
                $lastTimeUpdate = date("Y-m-d H:i:s");
            }
        } else {
            $stmt = $this->db->prepare("INSERT INTO options(hw_config,
 sensor_1, sensor_2, start_volume_1, start_volume_2, start_volume_3, end_volume_1,
 end_volume_2, end_volume_3, cleanser_volume_1, cleanser_volume_2, cleanser_volume_3,
 cleanser_delay_1, cleanser_delay_2, cleanser_delay_3, concentrate_volume, water_mix_volume,
 flow_speed_min, flowmeter_performance_1, flowmeter_performance_2, flowmeter_performance_3,
 flowmeter_performance_4, sanitization_min_interval, sanitization_max_interval, time,
  last_time_update, device_id)
 values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            $lastTimeUpdate = date("Y-m-d H:i:s");
        }

        $result = $stmt->execute(
            array(
                $this->getHwConfig(),
                $this->getSensor1(),
                $this->getSensor2(),
                $this->getStartVolume1(),
                $this->getStartVolume2(),
                $this->getStartVolume3(),
                $this->getEndVolume1(),
                $this->getEndVolume2(),
                $this->getEndVolume3(),
                $this->getCleanserVolume1(),
                $this->getCleanserVolume2(),
                $this->getCleanserVolume3(),
                $this->getCleanserDelay1(),
                $this->getCleanserDelay2(),
                $this->getCleanserDelay3(),
                $this->getConcentrateVolume(),
                $this->getWaterMixVolume(),
                $this->getFlowSpeedMin(),
                $this->getFlowmeterPerformance1(),
                $this->getFlowmeterPerformance2(),
                $this->getFlowmeterPerformance3(),
                $this->getFlowmeterPerformance4(),
                $this->getSanitizationMinInterval(),
                $this->getSanitizationMaxInterval(),
                $this->getTime(),
                $lastTimeUpdate,
                $deviceUid
            )
            );
        var_dump($result);
    }

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

    public function pack($deviceUid)
    {
        $packedData = ''; //the string with packed data that will be sent
        $data = $this->findById($deviceUid);
        //pack device_uid
        $deviceUid = explode("-", $data['device_id']);
        for($i=0;$i<count($deviceUid);$i++)
        {
            $deviceUid[$i] = hexdec($deviceUid[$i]);
            $packedDeviceUid = pack("C*",$deviceUid[$i]);
            $packedData .= $packedDeviceUid;
        }
        //pack packet type
        $packetType = pack("C*", 2, 0);
        $packedData .= $packetType;
        //pack crc32
        $crc32 = dechex(Crc32::getCrc32($packedData));
        if(strlen($crc32) < 8)
        {
            $crc32 = '0' . $crc32;
        }
        $crc32 = array_reverse(str_split($crc32,2));
        for($i=0;$i<count($crc32);$i++)
        {
            $crc32[$i] = hexdec($crc32[$i]);
            $packedCrc32 = pack("C*",$crc32[$i]);
            $packedData .= $packedCrc32;
        }
        //pack hw config, sensor1 and sensor2
        $hwConfig = pack("C*", $this->processHwConfig($data['hw_config']));
        $sensor1 = pack("C*", $data['sensor_1']);
        $sensor2 = pack("C*", $data['sensor_2']);
        $packedData .= $hwConfig . $sensor1 . $sensor2;
        //pack the rest of the packet except unixtime
        $dataMainPart =array_slice($data, 5, 21);
        foreach($dataMainPart as $part)
        {
            $packed = $this->packPacketPart($part);
            $packedData .= $packed;
        }
        //pack unixtime
        $unixTime = $this->packRealTimeOnDevice($data['time'], $data['last_time_update']);
        $packedData .= $unixTime;
        $emptySpace = $this->packEmptySpace();
        $packedData .= $emptySpace;

        $crc32Full = dechex(Crc32::getCrc32(substr($packedData, 12)));
        if(strlen($crc32Full) < 8)
        {
            $crc32Full = '0' . $crc32Full;
        }
        $crc32Full = array_reverse(str_split($crc32Full,2));
        for($i=0;$i<count($crc32Full);$i++)
        {
            $crc32Full[$i] = hexdec($crc32Full[$i]);
            $packedCrc32Full = pack("C*",$crc32Full[$i]);
            $packedData .= $packedCrc32Full;
        }

                $f = fopen("packet.bin", "w");
        fwrite($f, $packedData);
        fclose($f);

        return $packedData;
    }

    public function packEmptySpace() //for net options that should not be sent
    {
        $packedData = '';
        for($i=0;$i<138;$i++)
        {
            $packedEmptyChar = pack("C*",0xff);
            $packedData .= $packedEmptyChar;
        }
        return $packedData;
    }

    public function packRealTimeOnDevice($date, $lastTimeUpdate)
    {
        //date_default_timezone_set('Europe/Kiev');
        $packedTime = '';
        $date = \DateTime::createFromFormat("Y-m-d H:i:s O", $date . " +0000");
        $date = $date->getTimestamp();
        $lastTimeUpdate = \DateTime::createFromFormat("Y-m-d H:i:s O", $lastTimeUpdate . " +0000");
        $lastTimeUpdate = $lastTimeUpdate->getTimestamp();
        $now = \DateTime::createFromFormat("Y-m-d H:i:s O", date("Y-m-d H:i:s") . " +0000");
        $now = $now->getTimestamp();
        $date = $date + $now - $lastTimeUpdate;
        $date = dechex($date);
        while(strlen($date) < 8)
        {
            $date = '0' . $date;
        }
        $date = array_reverse(str_split($date,2));
        for($i=0;$i<4;$i++)
        {
            $date[$i] = hexdec($date[$i]);
            $packedPacketParts = pack("C*",$date[$i]);
            $packedTime .= $packedPacketParts;
        }
        return $packedTime;
    }

    public function packPacketPart($packetPart)
    {
        $packedData = '';
        $packetPart = dechex($packetPart);
        if(strlen($packetPart) < 3)
        {
            $packetPart = '00' . $packetPart;
        }elseif(strlen($packetPart) < 4){
            $packetPart = '0' . $packetPart;
        }
        $packetParts = array_reverse(str_split($packetPart,2));
        for($i=0;$i<2;$i++)
        {
            $packetParts[$i] = hexdec($packetParts[$i]);
            $packedPacketParts = pack("C*",$packetParts[$i]);
            $packedData .= $packedPacketParts;
        }
        return $packedData;
    }


    public function processHwConfig($configName)
    {
        $hwConfigs = array(
            '01' => 'HW_BASE',
            '02' => 'HW_PLUMBING_1FM',
            '03' => 'HW_PLUMBING_4FM',
            '04' => 'HW_MIXER_1FM',
            '05' => 'HW_MIXER_4FM',
        );
        $name = array_search($configName, $hwConfigs);
        return $name;
    }

}









