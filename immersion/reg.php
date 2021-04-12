<?php
session_start();

$email=$_POST["email"];
$password=$_POST["password"];
function check_email($email){
    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    $sql = "SELECT * FROM users WHERE :email=email";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email]);
    $email_check=$state->fetch(PDO::FETCH_ASSOC);
    if (!empty($email_check)){
        $_SESSION["danger"]="Почта ".$email." занята";
        header("Location: page_register.php");
        exit();
    }

}


function reg_user($email, $password){

    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email, "password"=>password_hash($password, PASSWORD_DEFAULT)]);
    $_SESSION["success"]="Всё супер!";
    header("Location: page_login.php");
}

check_email($email);
reg_user($email, $password);