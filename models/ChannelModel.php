<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 07.10.16
 * Time: 9:34
 */

namespace Models;

use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;


class ChannelModel
{
    private $db;

    public $deviceId;
    public $sort1Id;
    public $sort2Id;
    public $sort3Id;

    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getSort1Id()
    {
        return $this->sort1Id;
    }

    public function setSort1Id($sort1Id)
    {
        $this->sort1Id = $sort1Id;
    }

    public function getSort2Id()
    {
        return $this->sort2Id;
    }

    public function setSort2Id($sort2Id)
    {
        $this->sort2Id = $sort2Id;
    }

    public function getSort3Id()
    {
        return $this->sort3Id;
    }

    public function setSort3Id($sort3Id)
    {
        $this->sort3Id = $sort3Id;
    }

    public function setConfigurationonChannels()
    {
        $stmt = $this->db->prepare("INSERT INTO beer_channels(device_id, sort_1_id, sort_2_id, sort_3_id) 
 values (?,?,?,?)");
        $result = $stmt->execute(array($this->getDeviceId(), $this->getSort1Id(),
            $this->getSort2Id(), $this->getSort3Id()));
        var_dump($result);
        return $this->db->lastInsertId();
    }
}
