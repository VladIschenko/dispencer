<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 20.09.16
 * Time: 10:48
 */

namespace Models;

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

    public function checkLastTimeUpdate($deviceUid)
    {
        $stmt = $this->db->query("SELECT last_time_update FROM options WHERE device_id = '$deviceUid';");
        $time = $stmt->fetchColumn();
        return $time;
    }

    public function lastDispatchUpdate($deviceUid)
    {
        $now = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("UPDATE devices SET last_dispatch = '$now' WHERE device_id = '$deviceUid';");
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
            if($this->checkTime($deviceUid) == $this->getTime())
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

        var_dump($stmt);

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

    public function processHwConfig($congifNumber)
    {
        $hwConfigs = array(
            'HW_BASE' => '1',
            'HW_PLUMBING' => '2',
            'HW_MIXER_!FM' => '3',
            'HW_MIXER_4FM' => '4',
        );
        $number = array_search($congifNumber, $hwConfigs);
        return $number;
    }

}









