<?php
namespace App\Database;

use PDO;
use PDOException;

class Connection{
    public $params;
    public function __construct(){
        $this->params=require_once(__DIR__."/database.php");
    }

public function getConnection(){
    try {
        // $conn = mysqli_connect($this->params["host"],$this->params["username"],$this->params["password"],$this->params["database"]);
        $conn = mysqli_connect("localhost","root","","data2");  
        // $conn = new PDO("mysql:host=$this->db_params['host'];dbname=$this->db_params['database'])", $this->db_params['username'], $this->db_params['password']);
        // // set the PDO error mode to exception
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(Exception $e) {
        die("Connection failed: " . $e->getMessage());
      }
    return $conn;
}
}

?>