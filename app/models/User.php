<?php
declare (strict_types=1);

namespace App\Models;

require_once "Model.php";

class User extends Model {

    private string $name;
    private string $email;
    private string $password;
    private string $type;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public  function getAllUsers(){

        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $sql);

        $users = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $user = new User();
            $user->setId($row["id"]);
            $user->setName($row["name"]);
            $user->setEmail($row["email"]);
            $user->setPassword($row["password"]);
            //$user->setType($row["type"]);
            $users[] = $user;
        }
        return $users;
    } 

    public function getUserById($id){

        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        
        $user->setId((int) $row["id"]);
        $user->setName($row["name"]);
        $user->setEmail($row["email"]);
        $user->setPassword($row["password"]);
        //$user->setType($row["type"]);

        return $user;
    }

    public function login($name, $password){

        $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
        $result = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($result) >0){
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        
        $user->setId($row["id"]);
        $user->setName($row["name"]);
        $user->setEmail($row["email"]);
        $user->setPassword($row["password"]);
        //$user->setType($row["type"]);

        return $user;
        }
    } 
    

    public function save () {

        if($this->id) {
            $sql = "UPDATE users SET name = '$this->name', email = '$this->email',password = '$this->password' WHERE id = '$this->id'";
            $result = mysqli_query($this->conn, $sql);
        }
        else {
            $sql = "INSERT INTO users  (name, email, password) VALUES ('$this->name', '$this->email','$this->password')";
            $result = mysqli_query($this->conn, $sql);
            $this->id = mysqli_insert_id($this->conn);
        }
    }

    public function delete ($id) {

        $sql = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);

    }

}