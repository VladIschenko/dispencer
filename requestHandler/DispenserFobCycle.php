<?php


namespace Handler;


class DispenserFobCycle {
  const LITRES = 0x01;
  const PINTS = 0x02;
  const OZS = 0x04;

  const LITRES_COEF = 0.1;
  const PINTS_COEF = 0.0473176473;
  const OZ_COEF = 0.00295735296;

  /**
   * @var int
   */
  private $fill1;

  /**
   * @var int
   */
  private $fill2;

  /**
   * @var int
   */
  private $fill3;

  /**
   * @var int
   */
  private $prime;

  /**
   * @var int
   */
  private $primeVolume;

  /**
   * @var int
   */
  private $beerVolume;

  /**
   * @var int
   */
  private $fobCycleCount;

  /**
   * @var int
   */
  private $top;

  /**
   * @var int
   */
  private $foam;

  /**
   * @var int
   */
  private $stop;

  /**
   * @var int
   */
  private $flowFactor;

  /**
   * @var DateTime
   */
  private $startDateTime;

  /**
   * @var DateTime
   */
  private $endDateTime;

  /**
   * @var int
   */
  private $dispenserPartId;

  /**
   * @var int
   */
  private $unitId;

  /**
   * @var string
   */
  private $kegId;

  public function getFill1() {
    return $this->fill1;
  }

  public function getFill2() {
    return $this->fill2;
  }

  public function getFill3() {
    return $this->fill3;
  }

  public function getPrime() {
    return $this->prime;
  }

  public function getPrimeVolume() {
    return $this->primeVolume;
  }

  public function getBeerVolume() {
    return $this->beerVolume;
  }

  public function getFobCycleCount() {
    return $this->fobCycleCount;
  }

  public function getTop() {
    return $this->top;
  }

  public function getFoam() {
    return $this->foam;
  }

  public function getStop() {
    return $this->stop;
  }

  public function getFlowFactor() {
    return $this->flowFactor;
  }

  /**
   *
   * @return DateTime
   */
  public function getStartDateTime() {
    return $this->startDateTime;
  }

  /**
   *
   * @return DateTime
   */
  public function getEndDateTime() {
    return $this->endDateTime;
  }

  public function getDispenserPartId() {
    return $this->dispenserPartId;
  }

  public function getKegId() {
    return $this->kegId;
  }

  public function setFill1($fill1) {
    $this->fill1 = $fill1;
  }

  public function setFill2($fill2) {
    $this->fill2 = $fill2;
  }

  public function setFill3($fill3) {
    $this->fill3 = $fill3;
  }

  public function setPrime($prime) {
    $this->prime = $prime;
  }

  public function setPrimeVolume($primeVolume) {
    $this->primeVolume = $primeVolume;
  }

  public function setBeerVolume($beerVolume) {
    $this->beerVolume = $beerVolume;
  }

  public function setFobCycleCount($fobCycleCount) {
    $this->fobCycleCount = $fobCycleCount;
  }

  public function setTop($top) {
    $this->top = $top;
  }

  public function setFoam($foam) {
    $this->foam = $foam;
  }

  public function setStop($stop) {
    $this->stop = $stop;
  }

  public function setFlowFactor($flowFactor) {
    $this->flowFactor = $flowFactor;
  }

  /**
   *
   * @param DateTime $startDateTime
   */
  public function setStartDateTime($startDateTime) {
    $this->startDateTime = $startDateTime;
  }

  /**
   *
   * @param DateTime $endDateTime
   */
  public function setEndDateTime($endDateTime) {
    $this->endDateTime = $endDateTime;
  }

  public function setDispenserPartId($dispenserPartId) {
    $this->dispenserPartId = $dispenserPartId;
  }

  public function setKegId($kegId) {
    $this->kegId = $kegId;
  }

  public function getUnitId() {
    return $this->unitId;
  }

  public function setUnitId($unitId) {
    $this->unitId = $unitId;
  }
}
