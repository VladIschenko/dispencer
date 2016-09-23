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


    public function __construct() {
        $this->db = Db::connect();
    }

    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM options ORDER BY created_at DESC LIMIT 10");
        $optionsList = $stmt->fetchAll();
        return $optionsList;
    }
}