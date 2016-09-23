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

class LogsModel
{
    protected $db;

    private $type;
    private $channel;
    private $volume;
    private $time;
    private $deviceId;
    private $eventUid;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getEventUid()
    {
        return $this->eventUid;
    }

    public function setEventUid($eventUid)
    {
        $this->eventUid = $eventUid;
    }



    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM logs ORDER BY created_at DESC LIMIT 10");
        $logsList = $stmt->fetchAll();
        return $logsList;
    }
}