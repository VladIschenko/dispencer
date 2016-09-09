<?php

namespace Handler;

use Handler\Crc32;
use DateTime;
use Handler\Dispenser;
use Handler\DispenserFobCycle;
use Handler\DispenserPart;
use Models\UserModel;
use Exception;

class DispenserProcessor {
  const CONFIG_MAX_SIZE = 16;
  const HEADER_MAX_SIZE = 114;
  const FOB_MAX_SIZE = 64;
  const CONTENT_START = 4;
  const CRC_SIZE = 4;
  const FOB_CYCLES_COUNT = 4;

  /**
   * @var Dispenser
   */
  private $dispenser;

  /**
   * @var array
   */
  private $dispenserParts;

  /**
   * @var array
   */
  private $fobCycles;

  public function __construct() {
  }

  private function getInput() {
    // TODO: remove after test
    //return file_get_contents('input.bin');

    $handle = fopen('php://input', 'r');

    if (!$handle) {
      return null;
    }

    $content = stream_get_contents($handle);
    fclose($handle);

    // TODO: remove after test
    //file_put_contents('input.bin', $content);

    return $content;
  }

  public function processData() {
      $input = $this->getInput();
      echo $input;

//      echo "STRLEN INPUT: " . strlen($input);
      echo "</br>";
      echo "</br>";
      echo "</br>";
      echo "</br>";
      echo "</br>";

      $filename = "input.bin";
      $handle = fopen($filename, "rb");
      $contents = fread($handle, filesize($filename));
      fclose($handle);
      echo "\n" ."CONTENT: " . $contents . "\n";
      echo "</br>";
      $data = unpack("C*", $contents);


      echo "\n" ."DATA: ";
      foreach($data as $value){
          echo dechex($value) . " ";
      }
      echo "</br>";
      echo "\n" ."STRLEN CONTENT: " . strlen($contents);
      echo "</br>";
      $cont = substr($contents, 10, 4);
      echo "\n" ."PARSED CONTENT: ";
      print_r(unpack("C*", $cont));

      if (!$input) {
          header("HTTP/1.1 400 1");
          return;
      }

      $size = strlen($input);
      if ($size < self::HEADER_MAX_SIZE + self::CONFIG_MAX_SIZE + self::FOB_MAX_SIZE * 4 +
          self::CONTENT_START + self::CRC_SIZE) {

          header("HTTP/1.1 400 2");
          return;
      }

      $checksum = Crc32::getCrc32($cont);
      echo "\n" ."CHECKSUM CONTENT: " . $checksum;

      $checksumReceived = unpack('Ncheck', substr($input, -4));
      if ($checksum != $checksumReceived['check']) {
          header("HTTP/1.1 400 3");
          return;
      }

      $config = substr($input, self::CONTENT_START, self::CONFIG_MAX_SIZE);
      $header = substr($input, self::CONTENT_START + self::CONFIG_MAX_SIZE, self::HEADER_MAX_SIZE);
      $data = substr($input, self::CONTENT_START + self::CONFIG_MAX_SIZE + self::HEADER_MAX_SIZE);

      $this->dispenser = new Dispenser();

      $this->processConfig($config);
      $this->processHeader($header);
      $this->processFobCycle($data);
      $this->save();
  }


    public function processData() {
        $input = $this->getInput();

        if (!$input) {
            header("HTTP/1.1 400 1");
            return;
        }

        $size = strlen($input);
        if ($size < self::HEADER_MAX_SIZE + self::CONFIG_MAX_SIZE + self::FOB_MAX_SIZE * 4 +
            self::CONTENT_START + self::CRC_SIZE) {
            header("HTTP/1.1 400 2");
            return;
        }

        $checksum = Crc32::getCrc32(substr($input, 0, 10));

        $checksumReceived = unpack('Ncheck', substr($input, 10, 4));
        if ($checksum != $checksumReceived['check']) {
            header("HTTP/1.1 400 3");
            return;
        }

        $config = substr($input, self::CONTENT_START, self::CONFIG_MAX_SIZE);
        $header = substr($input, self::CONTENT_START + self::CONFIG_MAX_SIZE, self::HEADER_MAX_SIZE);
        $data = substr($input, self::CONTENT_START + self::CONFIG_MAX_SIZE + self::HEADER_MAX_SIZE);

        $this->dispenser = new Dispenser();

        $this->processConfig($config);
        $this->processHeader($header);
        $this->processFobCycle($data);
        $this->save();
    }


  /**
   *
   * @param string $config Binary string
   */
  private function processConfig($config) {
    $keys = array('partsCount' => 'C');

    $unpackString = self::constructUnpackString($keys);
    $configData = unpack($unpackString, $config);

    if ($configData['partsCount']) {
      $this->dispenser->setPartsCount(2);
      $this->dispenserParts = array(new DispenserPart(), new DispenserPart());

      $this->dispenserParts[1]->setIndex(2);
    } else {
      $this->dispenser->setPartsCount(1);
      $this->dispenserParts = array(new DispenserPart());
    }

    $this->dispenserParts[0]->setIndex(1);
  }

  private static function constructUnpackString($formatKeys) {
    $unpackString = array();

    foreach ($formatKeys as $key => $value) {
      if (is_int($key)) {
        $unpackString[] = $value;
      } else {
        $unpackString[] = $value . $key;
      }
    }
    $result = implode('/', $unpackString);
    echo $result;
      return $result;
  }

  /**
   *
   * @param string $header Binary string
   */
  private function processHeader($header) {
    if ($this->dispenser->getPartsCount() == 1) {
      $keys = array('fill' => 'N3',
        -1 => 'N5',
        'fobCycles' => 'N', 'beerPoured' => 'N',
        'lastFlashPage' => 'N',
        -2 => 'N2',
        'id' => 'a16',
        -3 => 'n',
        'lifetime' => 'N', -4 => 'N',
        'uid' => 'H32',
        'previousLifetime' => 'N');
    } else {
      $keys = array('fill' => 'N3',
        'fill_right' => 'N3',
        -1 => 'N2',
        'fobCycles' => 'N', 'beerPoured' => 'N',
        'lastFlashPage' => 'N',
        'fobCycles_right' => 'N', 'beerPoured_right' => 'N',
        'id' => 'a16',
        -2 => 'n',
        'lifetime' => 'N', 'lifetime_right' => 'N',
        'uid' => 'H32',
        'previousLifetime' => 'N', 'previousLifetime_right' => 'N');
    }

    $unpackString = self::constructUnpackString($keys);
    $headerData = unpack($unpackString, $header);

    $part = $this->dispenserParts[0];

    $part->setFill1(self::getUnsignedString($headerData['fill1']));
    $part->setFill2(self::getUnsignedString($headerData['fill2']));
    $part->setFill3(self::getUnsignedString($headerData['fill3']));

    $part->setFobCycles(self::getUnsignedString($headerData['fobCycles']));
    $part->setBeerPoured(self::getUnsignedString($headerData['beerPoured']));

    $part->setLifetime(self::getUnsignedString($headerData['lifetime']));
    $part->setPreviousLifeTime(self::getUnsignedString($headerData['previousLifetime']));

    $this->dispenser->setDispenserId($headerData['id']);
    $this->dispenser->setUniqueId($headerData['uid']);

    if ($this->dispenser->getPartsCount() == 2) {
      $part = $this->dispenserParts[1];

      $part->setFill1(self::getUnsignedString($headerData['fill_right1']));
      $part->setFill2(self::getUnsignedString($headerData['fill_right2']));
      $part->setFill3(self::getUnsignedString($headerData['fill_right3']));

      $part->setFobCycles(self::getUnsignedString($headerData['fobCycles_right']));
      $part->setBeerPoured(self::getUnsignedString($headerData['beerPoured_right']));

      $part->setLifetime(self::getUnsignedString($headerData['lifetime_right']));
      $part->setPreviousLifeTime(self::getUnsignedString($headerData['previousLifetime_right']));
    }
  }

  /**
   *
   * @param string $data Binary string
   */
  private function processFobCycle($data) {
    $keys = array('fill' => 'C3',
        'prime' => 'n', 'top' => 'n', 'foam' => 'n', 'stop' => 'n',
        'primeVolume' => 'n', 'beerVolume' => 'n',
        'fobCycleCount' => 'N',
        'hours' => 'C', 'minutes' => 'C', 'seconds' => 'C',
        'day' => 'C', 'month' => 'C', 'year' => 'C',
        'side_units' => 'C',
        'flowFactor' => 'n',
        'start_hours' => 'C', 'start_minutes' => 'C', 'start_seconds' => 'C',
        'start_day' => 'C', 'start_month' => 'C', 'start_year' => 'C',
        'keg_id' => 'H32', 'gps' => 'H20');

    $unpackString = self::constructUnpackString($keys);

    $this->fobCycles = array();

    for ($i = 0; $i < self::FOB_CYCLES_COUNT; ++$i) {
      $dataPart = substr($data, $i * self::FOB_MAX_SIZE, self::FOB_MAX_SIZE);
      $fobCycleData = unpack($unpackString, $dataPart);

      if ($fobCycleData['side_units'] == 0
        || $fobCycleData['side_units'] == 0xFF) {
        continue;
      }

      $fobCycle = new DispenserFobCycle();

      $fobCycle->setFill1($fobCycleData['fill1']);
      $fobCycle->setFill2($fobCycleData['fill2']);
      $fobCycle->setFill3($fobCycleData['fill3']);

      $fobCycle->setPrime($fobCycleData['prime']);
      $fobCycle->setTop($fobCycleData['top']);
      $fobCycle->setFoam($fobCycleData['foam']);
      $fobCycle->setStop($fobCycleData['stop']);

      $fobCycle->setPrimeVolume($fobCycleData['primeVolume']);
      $fobCycle->setBeerVolume($fobCycleData['beerVolume']);

      $fobCycle->setFobCycleCount(self::getUnsignedString($fobCycleData['fobCycleCount']));

      try {
        $dateTime = new DateTime(sprintf('%u-%u-%u %u:%u:%u', $fobCycleData['start_year'] + 2000, $fobCycleData['start_month'], $fobCycleData['start_day'],
          $fobCycleData['start_hours'], $fobCycleData['start_minutes'], $fobCycleData['start_seconds']));
        $fobCycle->setStartDateTime($dateTime);
      } catch (Exception $ex) {
        $fobCycle->setStartDateTime(new DateTime('1970-01-01 00:00:00'));
      }

      try {
        $dateTime = new DateTime(sprintf('%u-%u-%u %u:%u:%u', $fobCycleData['year'] + 2000, $fobCycleData['month'], $fobCycleData['day'],
          $fobCycleData['hours'], $fobCycleData['minutes'], $fobCycleData['seconds']));
        $fobCycle->setEndDateTime($dateTime);
      } catch (Exception $ex) {
        $fobCycle->setEndDateTime(new DateTime('1970-01-01 00:00:00'));
      }

      $fobCycle->setUnitId($fobCycleData['side_units'] & 0x0F);
      // Not real id, just temporary index
      $fobCycle->setDispenserPartId((($fobCycleData['side_units'] & 0xF0) >> 4));

      $fobCycle->setFlowFactor($fobCycleData['flowFactor']);

      $fobCycle->setKegId($fobCycleData['keg_id']);
      $this->dispenser->setGpsData($fobCycleData['gps']);

      $this->fobCycles[] = $fobCycle;
    }

    if (count($this->fobCycles)) {
      $this->dispenser->setUnitId($this->fobCycles[0]->getUnitId());
    }
  }

  private function save() {
    $idResult = $this->api->getColumnsData('d.id AS dispenser_id, dp.id AS part_id',
      'beer_dispenser d LEFT JOIN beer_dispenser_part dp ON d.id = dp.dispenser_id',
      'd.unique_id = ' . '0x' . $this->dispenser->getUniqueId() . ' ORDER BY dp.index');

    //var_dump($this->dispenser, $this->dispenserParts, $fobCycle);

    $n = count($idResult);
    if ($n) {
      $this->dispenser->setId($idResult[0]['dispenser_id']);

      $n = min(count($this->dispenserParts), $n);
      for ($i = 0; $i < $n; ++$i) {
        $this->dispenserParts[$i]->setId($idResult[$i]['part_id']);
        $this->dispenserParts[$i]->setDispenserId($this->dispenser->getId());
      }

      //TODO: add transaction when on InnoDB
      foreach ($this->fobCycles as $fobCycle) {
        if (!isset($this->dispenserParts[$fobCycle->getDispenserPartId()])) {
          continue;
        }

        $fobCycle->setDispenserPartId($this->dispenserParts[$fobCycle->getDispenserPartId()]->getId());

        $values = array('fill1' => $fobCycle->getFill1(),
          'fill2' => $fobCycle->getFill2(),
          'fill3' => $fobCycle->getFill3(),
          'prime' => $fobCycle->getPrime(), 'top' => $fobCycle->getTop(),
          'foam' => $fobCycle->getFoam(), 'stop' => $fobCycle->getStop(),
          'prime_volume' => $fobCycle->getPrimeVolume(),
          'beer_volume' => $fobCycle->getBeerVolume(),
          'fob_cycle_count' => $fobCycle->getFobCycleCount(),
          'start' => $fobCycle->getStartDateTime()->format('Y-m-d H:i:s'),
          'end' => $fobCycle->getEndDateTime()->format('Y-m-d H:i:s'),
          'dispenser_part_id' => $fobCycle->getDispenserPartId(),
          'unit_id' => $fobCycle->getUnitId(),
          'flow_factor' => $fobCycle->getFlowFactor(),
          'keg_id' => '0x' . $fobCycle->getKegId());

        $fields = implode(',', array_keys($values));
        $values['start'] = "'" . $values['start'] . "'";
        $values['end'] = "'" . $values['end'] . "'";
        $fieldValues = implode(',', $values);

        $this->db->query("INSERT INTO beer_fob_cycle($fields) VALUES($fieldValues)");
      }

      if ($this->dispenser->getUnitId() !== null) {
        $values = array('parts_count' => $this->dispenser->getPartsCount(),
          'unit_id' => $this->dispenser->getUnitId(),
          'user_dispenser_id' => $this->dispenser->getDispenserId());

        $this->api->update($values, 'beer_dispenser', 'id = ' . $this->dispenser->getId());
      }

      for ($i = 0; $i < $n; ++$i) {
        $values = array('fill1' => $this->dispenserParts[$i]->getFill1(),
          'fill2' => $this->dispenserParts[$i]->getFill2(),
          'fill3' => $this->dispenserParts[$i]->getFill3(),
          'fob_cycles' => $this->dispenserParts[$i]->getFobCycles(),
          'beer_poured' => $this->dispenserParts[$i]->getBeerPoured(),
          'lifetime' => $this->dispenserParts[$i]->getLifeTime(),
          'previous_lifetime' => $this->dispenserParts[$i]->getPreviousLifeTime());

        $this->api->update($values, 'beer_dispenser_part', 'id = ' . $this->dispenserParts[$i]->getId());
      }

      // TODO: check query results
      header("HTTP/1.1 201");
    } else {
      header("HTTP/1.1 400 4");
    }
  }

  private static function getUnsignedString($number) {
    return sprintf('%u', $number);
  }
}
