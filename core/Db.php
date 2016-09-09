<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:28
 */

namespace Core;

use PDO;
use PDOException;

class Db extends PDO {
    private static $dbConn;
    private static $host = 'localhost';
    private static $db = 'beerbook';
    private static $user = 'root';
    private static $pass = '1234';

    public static function connect(){
        try {
            self::$dbConn = new PDO('mysql:host=localhost:3306;dbname=beerbook', self::$user, self::$pass);
            return self::$dbConn;
        } catch (PDOException $e) {
            echo 'Could not connect to the database '.$e->getMessage();
        }
    }

}