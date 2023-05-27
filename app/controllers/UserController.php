<?php

namespace App\Controllers;

require_once "BaseController.php";
require_once __DIR__ . "/../models/User.php";

use App\Models\User;

class UserController extends BaseController {

    Private $user1;

    public function __construct()
    {
        $this->user1= new User();
    
    }

    public function index() {

        $users = $this->user1->getAllUsers();
        $this->render("user/index",compact("users"));

    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $name = $_POST['name'];
            $password = $_POST['password'];
              
            $user = $this->user1->login($name, $password);
            if($user){
                
            
                session_start();
                $_SESSION['id'] = $user->getId();
                $_SESSION['name'] = $user->getName();
                $_SESSION['email'] = $user->getEmail();

                header('Location: index');
                
            }
            else{
                echo "<br>Error In Name or Email.<br>";
                exit;
            }
        }
        else{
            require 'views/user/login.php';
        }
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            $user = new User();
            $user->setName($_POST["name"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->save();
            header("Location: /task2/index");
        }else {
            $this->render("user/create");
        }
        
    }
    public function register()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $user  = new User();
            $user->setName($_POST["name"]); 
            $user->setEmail($_POST["email"]); 
            $user->setPassword($_POST["password"]); 
            $user->save();
            header("Location: /task2/login");
            exit;
        }
        else
       { $this->render("user/register");}
    }

    public function edit() {
        $id = $_GET["id"];
        $user = $this->user1->getUserById($id);
        $this->render("user/edit",compact("user"));
    }

    public function update() {
        
        $user = new User();
        $user->setId((int) $_POST["id"]);
        $user->setName($this->validate($_POST["name"]));
        $user->setEmail($this->validate($_POST["email"]));
        $user ->setPassword($this->validate($_POST["password"]));
        $user->save();
        header("Location: /task2/index");
        
    }

    public function logout() {
        session_destroy();
        $this->render("user/login");
        
    }

    public function delete() {

        $id = $_POST["id"];
        
        $this->user1->delete($id);

        header("Location: index") ;
    }
}