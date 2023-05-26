<?php
declare (strict_types=1);
namespace App\Models;

use App\Database\Connection;

require_once __DIR__."/../../config/connection.php";

abstract class Model{

    protected  $id ;
    protected $conn;
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function __construct()
    {
        $con = new Connection();
        $this->conn = $con->getConnection();
    }
}