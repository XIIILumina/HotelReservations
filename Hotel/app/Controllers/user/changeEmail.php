<?php
require "../app/Models/user.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userModel = new userModel;
    $errors = [];

    if(!isset($_SESSION["user"])) {
        header("Location: /user/login");
    }

    if(!isset($_POST["userID"]) || !isset($_POST["newEmail"])) {
        $errors[] = 'Not all the info was provided';
    }else{

        $email = trim($_POST["newEmail"]);

        if(!Validator::Email($email)) {
            $errors[] = 'Not Valid Email';
        }else{
            $errors["newEmail"] = "Invalid Email";
            require "../app/Views/user/userSettings.view.php";
        }

        if(!Validator::Number($_POST["userID"])) {
            $errors[] = 'Not Valid userID';
        }
    
        if(empty($error)) {
            $userModel->userChangeEmail($_POST["userID"], $email);
            header("Location: /user/logout");
            die();
        }

    }

}


