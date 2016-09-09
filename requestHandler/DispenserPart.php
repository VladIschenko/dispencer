<?php

namespace Handler;


class DispenserPart {
  /**
   * @var int
   */
  private $id;  
  
  /**
   * @var int
   */
  private $dispenserId;
  
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
  private $fobCycles;
  
  /**
   * @var int
   */
  private $beerPoured;
  
  /**
   * @var int
   */
  private $lifeTime;
  
  /**
   * @var int
   */
  private $previousLifeTime;  
  
  /**
   * @var int
   */
  private $flowFactor;
  
  /**
   * @var double
   */
  private $beerPressure;
  
  /**
   * Index of this dispenser part
   * when counting from the left side of the dispenser
   * 
   * @var int
   */
  private $index;
  
  public function getId() {
    return $this->id;
  }

  public function getDispenserId() {
    return $this->dispenserId;
  }

  public function getFill1() {
    return $this->fill1;
  }

  public function getFill2() {
    return $this->fill2;
  }

  public function getFill3() {
    return $this->fill3;
  }

  public function getFobCycles() {
    return $this->fobCycles;
  }

  public function getBeerPoured() {
    return $this->beerPoured;
  }

  public function getLifeTime() {
    return $this->lifeTime;
  }

  public function getPreviousLifeTime() {
    return $this->previousLifeTime;
  }

  public function getFlowFactor() {
    return $this->flowFactor;
  }

  public function getBeerPressure() {
    return $this->beerPressure;
  }

  public function getIndex() {
    return $this->index;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setDispenserId($dispenserId) {
    $this->dispenserId = $dispenserId;
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

  public function setFobCycles($fobCycles) {
    $this->fobCycles = $fobCycles;
  }

  public function setBeerPoured($beerPoured) {
    $this->beerPoured = $beerPoured;
  }

  public function setLifeTime($lifeTime) {
    $this->lifeTime = $lifeTime;
  }

  public function setPreviousLifeTime($previousLifeTime) {
    $this->previousLifeTime = $previousLifeTime;
  }

  public function setFlowFactor($flowFactor) {
    $this->flowFactor = $flowFactor;
  }

  public function setBeerPressure($beerPressure) {
    $this->beerPressure = $beerPressure;
  }

  public function setIndex($index) {
    $this->index = $index;
  }
}
