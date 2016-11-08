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
    private $installationCity;
    private $installationStreet;
    private $installationHouseNumber;
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

    public function getInstallationCity()
    {
        return $this->installationCity;
    }

    public function setInstallationCity($installationCity)
    {
        $this->installationCity = $installationCity;
    }

    public function getInstallationStreet()
    {
        return $this->installationStreet;
    }

    public function setInstallationStreet($installationStreet)
    {
        $this->installationStreet = $installationStreet;
    }

    public function getInstallationHouseNumber()
    {
        return $this->installationHouseNumber;
    }

    public function setInstallationHouseNumber($installationHouseNumber)
    {
        $this->installationHouseNumber = $installationHouseNumber;
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
        $login= $stmt->fetchColumn();
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
        $installedDevices[0]['title'] = "Установленные";

        for ($i=0;$i<sizeof($installedDevices); $i++)
        {
            $installedDevices[$i]['login'] = $this->findCustomerByDeviceId($installedDevices[$i]['device_id']);
        }
        return $installedDevices;
    }

    public function findAllDevices()
    {
        $stmt= $this->db->query("SELECT * FROM devices");
        $allDevices = $stmt->fetchAll();
        $allDevices[0]['title'] = "Полный список";
        for ($i=0;$i<sizeof($allDevices); $i++)
        {
            $customer = $this->findCustomerByDeviceId($allDevices[$i]['device_id']);

            if($customer)
            {
                $allDevices[$i]['login'] = $customer;
            }else{
                $allDevices[$i]['login'] = "";
            }
        }
        return $allDevices;
    }

    public function findBySearchPhrase($search)
    {
        $stmt = $this->db->query("SELECT * FROM devices WHERE concat(device_id,customer_id,organisation,installation_date,
installation_address, inventory_number, installer_name) LIKE '%$search%'");
        $stmt->execute();
        $deviceList = $stmt->fetchAll();
        return $deviceList;
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
        $device = $stmt->fetch(PDO::FETCH_ASSOC);
        return $device;
    }

    public function findIdByDeviceId($deviceId)
    {
        $stmt = $this->db->query("SELECT id FROM devices WHERE device_id = '$deviceId';");
        $device = $stmt->fetchColumn();
        return $device;
    }

    //Sms notifications
    public function checkSmsNotifications($id)
    {
        $stmt = $this->db->prepare("SELECT sms_notifications FROM devices WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $status = $stmt->fetchColumn();
        return $status;
    }

    public function checkSmsNotificationsByUid($id)
    {
        $stmt = $this->db->prepare("SELECT sms_notifications FROM devices WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $status = $stmt->fetchColumn();
        return $status;
    }

    public function changeSmsNotificationsToNeeded($id)
    {
        $stmt = $this->db->prepare("UPDATE devices SET sms_notifications = '1' WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function changeSmsNotificationsToNotNeeded($id)
    {
        $stmt = $this->db->prepare("UPDATE devices SET sms_notifications = '0' WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    public function getAddressById($id)
    {
        $stmt = $this->db->prepare("SELECT installation_city, installation_street, 
installation_house_number FROM devices WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $address = $stmt->fetch(PDO::FETCH_ASSOC);
        $address = $address['installation_city'] . " " . $address['installation_street'] . " " . $address['installation_house_number'];
        return $address;
    }

    public function getOrganisationById($id)
    {
        $stmt = $this->db->prepare("SELECT organisation FROM devices WHERE device_id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $organisation= $stmt->fetchColumn();
        return $organisation;
    }

    public function checkLastSanitizationTime($id)
    {
        $stmt = $this->db->prepare("SELECT created_at FROM logs WHERE device_id = :id 
            AND type = :type;");
        $stmt->bindParam(':id', $id);
        $type = "EV_SANIT_STAGE3_COMPLETE";
        $stmt->bindParam(':type', $type);
        $stmt->execute();
        $time = $stmt->fetchColumn();
        return $time;
    }

    //Firmware update
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
        $stmt = $this->db->prepare("INSERT INTO devices(device_id,
 organisation, installation_date, installation_city, installation_street, installation_house_number, inventory_number, 
 installer_name, firmware_status) 
 values (?,?,?,?,?,?,?,?,?)");
        $result = $stmt->execute(array($this->getDeviceId(), $this->getOrganisation(), $this->getInstallationDate(),
            $this->getInstallationCity(), $this->getInstallationStreet(), $this->getInstallationHouseNumber(), $this->getInventoryNumber(), $this->getInstallerName(), '0'));
        return $this->db->lastInsertId();
    }

    public function update($id)
    {
        $stmt = $this->db->prepare('UPDATE devices SET device_id = ?, customer_id = ?, organisation = ?,
  installation_date = ?, installation_city = ?, installation_street = ?, installation_house_number = ?, inventory_number = ?, installer_name = ?
  WHERE id = ?');
        $result = $stmt->execute(array($this->getDeviceId(),$this->getCustomerId(),$this->getOrganisation(),
            $this->getInstallationDate(),$this->getInstallationCity(), $this->getInstallationStreet(), $this->getInstallationHouseNumber(),
            $this->getInventoryNumber(),$this->getInstallerName(), $id));
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

    public function getSortByIdAndChannel($deviceId, $channel)
    {
        $beerId = 'default';
        $stmt = $this->db->prepare("SELECT id FROM devices WHERE device_id = '$deviceId'");
        $stmt->execute();
        $id = $stmt->fetchColumn();
        if($channel == 1){
            $stmt = $this->db->prepare("SELECT sort_1_id FROM beer_channels 
  WHERE device_id = '$id'ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $beerId = $stmt->fetchColumn();
        }elseif($channel == 2){
            $stmt = $this->db->prepare("SELECT sort_2_id FROM beer_channels 
  WHERE device_id = '$id'ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $beerId = $stmt->fetchColumn();
        }elseif($channel == 3){
            $stmt = $this->db->prepare("SELECT sort_3_id FROM beer_channels 
  WHERE device_id = '$id'ORDER BY id DESC LIMIT 1");
            $stmt->execute();
            $beerId = $stmt->fetchColumn();
        }
        $stmt = $this->db->prepare("SELECT name FROM beers WHERE id = '$beerId'");
        $stmt->execute();
        $beerName = $stmt->fetchColumn();
        return $beerName;
    }
}