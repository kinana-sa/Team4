<?php

require_once "config/database.php";
require_once "app/controllers/UserController.php";
require_once "app/controllers/FamilyController.php";

use App\Controllers\UserController;
use App\Controllers\FamilyController;
use App\Models\User;

$userController = new UserController();
$familyController = new FamilyController();

define('BASE_PATH',"/task2/");
$URL = $_GET['url'] ??"index";

session_start();

if(!isset($_SESSION['email']) && !isset($_SESSION['name'])){
        
    $userController->login();
}  
else{ 
switch($URL)
{
    case "index":
        $userController->index();
        break;
    case "create":
        $userController->create();
        break;
    case "edit":
        $userController->edit();
        break;
    case "update":
        $userController->update();
        break;
    case "delete":
        $userController->delete();
        break;
    case "login":
        $userController->login();
        break;
    case "logout":
        $userController->logout();
        break;
    case "register":
        $userController->register();
        break;
    case "family_index":
            $familyController->index();
            break;
    case "family_create":
            $familyController->create();
            break;
    case "family_edit":
            $familyController->edit();
            break;
    case "family_update":
            $familyController->update();
            break;
    case "family_delete":
            $familyController->delete();
            break;
    case "search":
            $familyController->search();
            break;

    default :
        $userController->index();
        break;
}
}
    
  