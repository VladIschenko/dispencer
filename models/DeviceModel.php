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
    private $deviceId;
    private $customerId;
    private $organisation;
    private $installationDate;
    private $installationAddres;
    private $gps;
    private $inventoryNumber;
    private $installerName;
    private $firmwareStatus;


    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function getOrganisation()
    {
        return $this->organisation;
    }

    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    }

    public function getInstallationDate()
    {
        return $this->installationDate;
    }

    public function setInstallationDate($installationDate)
    {
        $this->installationDate = $installationDate;
    }

    public function getInstallationAddres()
    {
        return $this->installationAddres;
    }

    public function setInstallationAddres($installationAddres)
    {
        $this->installationAddres = $installationAddres;
    }

    public function getGps()
    {
        return $this->gps;
    }

    public function setGps($gps)
    {
        $this->gps = $gps;
    }

    public function getInventoryNumber()
    {
        return $this->inventoryNumber;
    }

    public function setInventoryNumber($inventoryNumber)
    {
        $this->inventoryNumber = $inventoryNumber;
    }

    public function getInstallerName()
    {
        return $this->installerName;
    }

    public function setInstallerName($installerName)
    {
        $this->installerName = $installerName;
    }

    public function getFirmwareStatus()
    {
        return $this->firmwareStatus;
    }

    public function setFirmwareStatus($firmwareStatus)
    {
        $this->firmwareStatus = $firmwareStatus;
    }

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

    public function processStats2($startDate, $endDate, $deviceId)
    {
        $stmt = $this->db->prepare("SELECT DATE(time) as 'Дата', SUM(volume) as 'Объем' FROM logs WHERE device_id = :deviceId 
        AND  (DATE(time) BETWEEN :startDate AND :endDate) GROUP BY DATE(time)");
        $stmt->bindParam(':deviceId', $deviceId, PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->execute();
        $stats = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        var_dump(json_encode($stats));
        return $stats;
    }


    //FOR DEVICE CONTROL PANEL

    public function findCustomerByDeviceId($deviceId)
    {
        $stmt= $this->db->query("SELECT login FROM users WHERE users.id = (SELECT customer_id FROM devices WHERE device_id = '$deviceId');");
        $login= $stmt->fetchAll();
        return $login;
    }

    public function findFreeDevices()
    {
        $stmt= $this->db->query("SELECT id, device_id FROM devices WHERE customer_id IS NULL");
        $freeDevices = $stmt->fetchAll();
        return $freeDevices;
    }

    public function findSoldDevices()
    {
        $stmt= $this->db->query("SELECT id, device_id, customer_id FROM devices WHERE customer_id IS NOT NULL");
        $soldDevices = $stmt->fetchAll();
        for ($i=0;$i<sizeof($soldDevices); $i++)
        {
            $soldDevices[$i]['login'] = $this->findCustomerByDeviceId($soldDevices[$i]['device_id']);
        }
        return $soldDevices;
    }

    public function findInstalledDevices()
    {
        $stmt= $this->db->query("SELECT * FROM devices WHERE installation_date IS NOT NULL");
        $installedDevices = $stmt->fetchAll();
        for ($i=0;$i<sizeof($installedDevices); $i++)
        {
            $installedDevices[$i]['login'] = $this->findCustomerByDeviceId($installedDevices[$i]['device_id']);
        }
        return $installedDevices;
    }

    public function findBySearchPhrase($search)
    {
        $stmt = $this->db->query("SELECT * FROM devices WHERE concat(device_id,customer_id,organisation,installation_date,
installation_address, gps, inventory number, installer_name) LIKE '%$search%'");
        $stmt->execute();
        $userList = $stmt->fetchAll();
        return $userList;
    }

    public function findDevicesByOrganisation($organisation)
    {
        $stmt= $this->db->query("SELECT * FROM devices WHERE organisation = '$organisation'");
        $organisationDevices = $stmt->fetchAll();
        for ($i=0;$i<sizeof($organisationDevices); $i++)
        {
            $organisationDevices[$i]['login'] = $this->findCustomerByDeviceId($organisationDevices[$i]['device_id']);
        }
        return $organisationDevices;
    }

    public function findDeviceById($id)
    {
        $stmt = $this->db->query("SELECT * FROM devices WHERE id = $id;");
        $device = $stmt->fetch();
        return $device;
    }

    public function checkFirmwareStatus($id)
    {
        $stmt = $this->db->prepare("SELECT firmware_status FROM devices WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $status = $stmt->fetchColumn();
        return $status;
    }

    public function changeFirmwareStatusToStanby($id)
    {
        $stmt = $this->db->prepare("UPDATE devices SET firmware_status = '1' WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function changeFirmwareStatusToNotRequired($id)
    {
        $stmt = $this->db->query("SET SQL_SAFE_UPDATES = 0;");
        $stmt = $this->db->prepare("UPDATE devices SET firmware_status = '0' WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM devices WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function save()
    {
        $now = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO devices(device_id,
 organisation, installation_date, installation_address, gps, inventory_number, 
 installer_name, firmware_status, created_at) 
 values (?,?,?,?,?,?,?,?,?)");
        var_dump($stmt);
        $result = $stmt->execute(array($this->getDeviceId(), $this->getOrganisation(), $this->getInstallationDate(),
            $this->getInstallationAddres(), $this->getGps(), $this->getInventoryNumber(), $this->getInstallerName(), '0', $now));
        echo $this->getDeviceId();
        var_dump($result);
        return $this->db->lastInsertId();
    }

    public function update($id)
    {
        $stmt = $this->db->prepare('UPDATE devices SET device_id = ?, customer_id = ?, organisation = ?,
  installation_date = ?, installation_address = ?, gps = ?, inventory_number = ?, installer_name = ?,
  firmware_status = ?
  WHERE id = ?');
        $stmt->execute(array($this->getDeviceId(),$this->getCustomerId(),$this->getOrganisation(),
            $this->getInstallationDate(),$this->getInstallationAddres(),$this->getGps(),
            $this->getInventoryNumber(),$this->getInstallerName(),$this->getFirmwareStatus(),));
//        var_dump($stmt);
        return $this->db->lastInsertId();
    }

    public function deviceExists($deviceId) {
        $stmt = $this->db->prepare("SELECT count(device_id) FROM users where device_id=?");
        $stmt->execute(array($deviceId));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
    }

}