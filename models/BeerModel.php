<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 04.10.16
 * Time: 10:59
 */

namespace Models;

use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;


class BeerModel
{

    protected $db;
    private $id;
    private $name;
    private $description;
    private $organisation;
    private $degree;
    private $density;
    private $type;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getOrganisation()
    {
        return $this->organisation;
    }

    public function setOrganisation($organisation)
    {
        $this->organisation = $organisation;
    }

    public function getDegree()
    {
        return $this->degree;
    }

    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    public function getDensity()
    {
        return $this->density;
    }

    public function setDensity($density)
    {
        $this->density = $density;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM beers ORDER BY id DESC");
        $beerList = $stmt->fetchAll();
        return $beerList;
    }

    public function findAllSorts()
    {
        $stmt = $this->db->query("SELECT name FROM beers ORDER BY id");
        $beerList = $stmt->fetchAll(PDO::FETCH_NUM);
        return $beerList;

    }

    public function findById($id)
    {
        $stmt = $this->db->query("SELECT * FROM beers WHERE id = '$id'");
        $beer = $stmt->fetch(PDO::FETCH_ASSOC);
        return $beer;
    }

    public function addSort()
    {
        $stmt = $this->db->prepare("INSERT INTO beers(name, description, organisation, degrees, density, type) 
 values (?,?,?,?,?,?)");
        $stmt->execute(array($this->getName(), $this->getDescription(),
            $this->getOrganisation(), $this->getDegree(), $this->getDensity(), $this->getType()));
        return $this->db->lastInsertId();
    }

    public function deleteSort($id)
    {
        $stmt = $this->db->prepare('DELETE FROM beers WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function updateSort($id)
    {
        $stmt = $this->db->prepare('UPDATE beers SET name = ?, description = ?, organisation = ?,
        degrees = ?, density = ?, type = ?
  WHERE id = ?');
        $stmt->execute(array($this->getName(), $this->getDescription(),
            $this->getOrganisation(), $this->getDegree(), $this->getDensity(), $this->getType(), $id));
        return $this->db->lastInsertId();
    }

    public function findSortsOnDeviceChannels($id)
    {
        $stmt = $this->db->query("SELECT name FROM beers WHERE id IN 
              (SELECT * FROM 
                  (SELECT sort_1_id FROM beer_channels WHERE device_id='$id' 
                  ORDER BY id DESC LIMIT 1) as `sort1`);");
        $sorts1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $this->db->query("SELECT name FROM beers WHERE id IN 
              (SELECT * FROM 
                  (SELECT sort_2_id FROM beer_channels WHERE device_id='$id' 
                  ORDER BY id DESC LIMIT 1) as `sort2`);");
        $sorts2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $this->db->query("SELECT name FROM beers WHERE id IN 
              (SELECT * FROM 
                  (SELECT sort_3_id FROM beer_channels WHERE device_id='$id' 
                  ORDER BY id DESC LIMIT 1) as `sort3`);");
        $sorts3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sorts = array_merge($sorts1, $sorts2);
        $sorts = array_merge($sorts,$sorts3);
        return $sorts;
    }

    public function getIdByName($name)
    {
        $stmt = $this->db->query("SELECT id FROM beers WHERE name = '$name'");
        $id = $stmt->fetchColumn();
        return $id;
    }

    public function findBySearchPhrase($search)
    {
        $stmt = $this->db->query("SELECT * FROM beers WHERE concat(name,description) LIKE '%$search%'");
        $stmt->execute();
        $beerList = $stmt->fetchAll();
        return $beerList;
    }
}



































