<?php


namespace Handler;


class Dispenser { 
  /**
   * @var int
   */
  private $id;  
  
  /**
   * @var int
   */
  private $partsCount;

  /**
   * @var int
   */
  private $finishFactor;
  
  /**
   * @var int
   */
  private $purgeTime;
  
  /**
   * @var double
   */
  private $towerPressure;
  
  /**
   * @var string String with user defined ID, not unique
   */
  private $dispenserId;
  
  /**
   * @var string Hex string with unique ID
   */
  private $uniqueId;

  /**
   * @var bool
   */
  private $fobActive;
  
  /**
   * @var bool
   */
  private $beerPressureEnabled;
  
  /**
   * @var int
   */
  private $unitId;
  
  private $gpsData;
  
  public function getFinishFactor() {
    return $this->finishFactor;
  }

  public function getPurgeTime() {
    return $this->purgeTime;
  }

  public function getTowerPressure() {
    return $this->towerPressure;
  }

  public function getDispenserId() {
    return $this->dispenserId;
  }

  public function getUniqueId() {
    return $this->uniqueId;
  }
  
  public function getGpsData() {
    return $this->gpsData;
  }

  public function setFinishFactor($finishFactor) {
    $this->finishFactor = $finishFactor;
  }

  public function setPurgeTime($purgeTime) {
    $this->purgeTime = $purgeTime;
  }

  public function setTowerPressure($towerPressure) {
    $this->towerPressure = $towerPressure;
  }

  public function setDispenserId($dispenserId) {
    $this->dispenserId = $dispenserId;
  }

  public function setUniqueId($uniqueId) {
    $this->uniqueId = $uniqueId;
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }
  
  public function getPartsCount() {
    return $this->partsCount;
  }

  public function getFobActive() {
    return $this->fobActive;
  }

  public function getBeerPressureEnabled() {
    return $this->beerPressureEnabled;
  }

  public function getUnitId() {
    return $this->unitId;
  }

  public function setPartsCount($partsCount) {
    $this->partsCount = $partsCount;
  }

  public function setFobActive($fobActive) {
    $this->fobActive = $fobActive;
  }

  public function setBeerPressureEnabled($beerPressureEnabled) {
    $this->beerPressureEnabled = $beerPressureEnabled;
  }

  public function setUnitId($unitId) {
    $this->unitId = $unitId;
  }
  
  public function setGpsData($gpsData) {
    $this->gpsData = $gpsData;
  }
}
