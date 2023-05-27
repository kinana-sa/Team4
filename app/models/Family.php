<?php
//declare(strict_types=1);
namespace App\Models;

require_once "Model.php";

class Family extends Model{

    protected string $first_name;
    protected string $middle_name;
    protected string $last_name;
    protected int $members;
    protected string $phone;
    protected string $job_status;
    protected string $address;

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getMiddleName() {
        return $this->middle_name;
    }

    public function setMiddleName($middle_name) {
        $this->middle_name = $middle_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getMembers() {
        return $this->members;
    }

    public function setMembers($members) {
        $this->members = $members;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getJobStatus() {
        return $this->job_status;
    }

    public function setJobStatus($job_status) {
        $this->job_status = $job_status;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAllFamilies()
    {
        $sql = "SELECT * FROM families";
        $result = mysqli_query($this->conn, $sql);

        $families = array();
        while($row = mysqli_fetch_assoc($result))
        {$family = new Family();
            $family->setId($row["id"]);
            $family->setFirstName($row["first_name"]);
            $family->setMiddleName($row["middle_name"]);
            $family->setLastName($row["last_name"]);
            $family->setMembers($row["members"]);
            $family->setPhone($row["phone"]);
            $family->setJobStatus($row["job_status"]);
            $family->setAddress($row["address_id"]);

            $families[] = $family;
            }
        return $families;
    }

    public function getFamiliesByAddress($address)
    {
        $sql = "SELECT * FROM families join address on families.address_id= address.id WHERE name = '$address'";
        
        $result = mysqli_query($this->conn, $sql);

        $families = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $family = new Family();

            $family->setId($row["id"]);
            $family->setFirstName($row["first_name"]);
            $family->setMiddleName($row["middle_name"]);
            $family->setLastName($row["last_name"]);
            $family->setMembers($row["members"]);
            $family->setPhone($row["phone"]);
            $family->setJobStatus($row["job_status"]);
            $family->setAddress($row["address_id"]);

            $families[] = $family;
        }
        return $families;
    }

    public function getFamilyById($id)
    {
        $sql = "SELECT * FROM families WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);

        $row = mysqli_fetch_assoc($result);
    
        $family = new Family();
        $family->setId($row["id"]);
        $family->setFirstName($row["first_name"]);
        $family->setMiddleName($row["middle_name"]);
        $family->setLastName($row["last_name"]);
        $family->setMembers($row["members"]);
        $family->setPhone($row["phone"]);
        $family->setJobStatus($row["job_status"]);
        $family->setAddress($row["address_id"]);
        return $family;
    }

    public function save() {
        if ($this->id) {
            $query = "UPDATE families SET 
            first_name = '$this->first_name',
            middle_name = '$this->middle_name',
            last_name = '$this->last_name',
            members = '$this->members' ,
            phone = '$this->phone' ,
            job_status = '$this->job_status' ,
            address_id = '$this->address' 
            WHERE id = ' $this->id'";
            $stmt = mysqli_query($this->conn, $query);

        } else {
            $query = "INSERT INTO families (first_name, middle_name, last_name, members, phone, job_status, address_id) VALUES 
            ('$this->first_name','$this->middle_name','$this->last_name', '$this->members', '$this->phone',
            '$this->job_status', '$this->address')";
            $stmt = mysqli_query($this->conn, $query);
            
            //$this->id = mysqli_insert_id($this>conn);
        }
    }

    public function delete() {
        $query = "DELETE FROM families WHERE id = '$this->id' ";
        $stmt = mysqli_query($this->conn, $query);
       
    }
}