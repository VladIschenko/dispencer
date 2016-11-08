<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 30.09.16
 * Time: 9:01
 */

namespace Notifications;

use Handler\Crc32;
use Exception;
use Core\Db;
use Models\DeviceModel;
use PDO;


class SmsNotifications
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::connect();
    }
}