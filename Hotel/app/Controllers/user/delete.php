<?php
require "../app/Models/user.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $userModel = new userModel;
    $errors = [];

    if(!isset($_SESSION["user"])) {
        header("Location: /user/login");
    }

    if(!isset($_POST["userID"]) || !isset($_POST["username"]) || !isset($_POST["userPassword"])) {
        $errors[] = 'Not all the info was provided';
    }else{

        if(!Validator::Number($_POST["userID"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::String($_POST["username"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::String($_POST["userPassword"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(empty($error)) {
            $response = $userModel->deleteUser($_POST["userID"], $_POST["username"], $_POST["userPassword"]);

            if($response){
                header("Location: /user/logout");
                die();
            }else{
                $errors["delPassword"] = "the password is not correct";
                require "../app/Views/user/userSettings.view.php";
            }
        }

    }

}


