<?php
session_start();
require_once "../model/functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

$chk = check_login_pass($email, $password);

if ($chk){
    redirect_to("../view/users.php");
} else{
    message('danger', "Не правильные email или пароль");
    redirect_to("../view/login.php");
}

if (isset($_SESSION['danger'])) {
    redirect_to("../view/login.php");
} else check_role($email);

if (check_role($email)){
    $_SESSION['admin'] ="admin";
}

