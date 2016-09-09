<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:28
 */

namespace Models;

use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;


class DeviceModel {

    protected $db;

    public function __construct() {
        $this->db = Db::connect();
    }

    public function processStats($startDate, $endDate, $deviceId)
    {
        $stmt = $this->db->prepare("SELECT time_sanitization, concentrate_volume FROM device WHERE device_id = :deviceId 
        AND  (time_sanitization BETWEEN :startDate AND :endDate)");
        $stmt->bindParam(':deviceId', $deviceId, PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->execute();
        $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stats;
//        $json = "<pre>" . json_encode($stats, JSON_PRETTY_PRINT) . "</pre>";
//        echo $json;
    }
}