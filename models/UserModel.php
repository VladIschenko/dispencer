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


class UserModel {

    protected $db;
    private $username;
    private $pass;
    private $email;
    private $firstName;
    private $lastname;
    private $description;
    private $phone;
    private $measurement;
    private $language;


    public function __construct() {
        $username = $this->username;
        $pass = $this->pass;
        $this->db = Db::connect();
    }

    //Getters and setters

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
        echo $this->username;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
        echo $this->pass;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getMeasurement()
    {
        return $this->measurement;
    }

    public function setMeasurement($measurement)
    {
        $this->measurement = $measurement;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }





    //Find functions

    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY created_at DESC");
        $userList = $stmt->fetchAll();
        return $userList;
    }

    public function findUserbyId($id)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE id = $id;");
        $user = $stmt->fetch();
        return $user;
    }


    //For CRUD functions

    public function checkUserType($id)
    {
        $stmt = $this->db->prepare("SELECT role FROM users WHERE id = $id;");
        $stmt->execute();
        $status = $stmt->fetchColumn();
        return $status;
    }

    public static function getIdByLogin($login)
    {
        $db = Db::connect();
        $stmt = $db->prepare("SELECT id FROM users WHERE login = ?");
        $stmt->execute(array($login));
        $id = $stmt->fetchColumn();
        return $id;
    }

    public function save($role)
    {
        $now = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare("INSERT INTO users(login, password,
 email, first_name, last_name, description, phone, measurement, lang, role, created_at) 
 values (?,?,?,?,?,?,?,?,?,?,?)");
        $result = $stmt->execute(array($this->getUsername(), $this->getPass(), $this->getEmail(), $this->getFirstName(),
            $this->getLastname(), $this->getDescription(), $this->getPhone(), $this->getMeasurement(),
            $this->getLanguage(), $role, $now));
        echo $result;
        return $this->db->lastInsertId();
    }

    public function update($id)
    {
        $stmt = $this->db->prepare('UPDATE users SET login = ?, email = ?, first_name = ?,
  last_name = ?, description = ?, phone = ?, measurement = ?, lang = ? 
  WHERE id = ?');
        $username = $this->getUsername();
        $email = $this->getEmail();
        $firstName = $this->getFirstName();
        $lastName = $this->getLastname();
        $description = $this->getDescription();
        $phone = $this->getPhone();
        $measurement = $this->getMeasurement();
        $language = $this->getLanguage();
        $stmt->execute(array($username, $email, $firstName, $lastName, $description, $phone, $measurement, $language, $id));
//        var_dump($stmt);
        return $this->db->lastInsertId();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->db->lastInsertId();
    }



    //For login functions

    public function usernameExists($username) {
        $stmt = $this->db->prepare("SELECT count(login) FROM users where login=?");
        $stmt->execute(array($username));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
    }

    public function isValidUser($username, $pass) {
        $stmt = $this->db->prepare("SELECT password FROM users where login = :login");
        $stmt->bindParam(':login', $username);
        $stmt->execute();
        $hash = $stmt->fetchColumn();
        if (password_verify($pass, $hash)) {
            return true;
        }
        return false;
    }


    //Session functions

    public static function sessionStart()
    {
        if(session_id() == "") {
            session_start();
            $_SESSION['login'] = $_POST['login'];
        }
    }

    public static function sessionStop()
    {
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            session_destroy();
            return true;
        }
        return false;
    }
}