<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 20.09.16
 * Time: 10:48
 */

namespace Models;

use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;

class MainModel
{
    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function findAllOrganisations()
    {
        $stmt= $this->db->query("SELECT organisation FROM devices WHERE organisation IS NOT NULL GROUP BY(organisation);");
        $organisations = $stmt->fetchAll();
        return $organisations;
    }

    public function findAllCustomerLogins()
    {
        $stmt= $this->db->query("SELECT login FROM users WHERE group_name = 'admin'");
        $organisations = $stmt->fetchAll();
        return $organisations;
    }


}
