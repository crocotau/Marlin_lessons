<?php
//session_start();
//
//$email = $_POST["email"];
//$password = $_POST["password"];
//
//function connect_to_db(){
//    return $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
//}
//
//function check_login_pass($email, $password){
//    $sth = connect_to_db()->prepare("SELECT * FROM users");
//    $sth->execute();
//    $arr = $sth->fetch(PDO::FETCH_ASSOC);
//
//    if ($arr["email"] != $email || $arr["password"] != $password) {
//        header("Location: login.php");
//        send_message_bad();
//    } else {
//        header("Location: users.php");
//    }
//}
//
//function send_message_bad(){
//    $_SESSION["danger"]="Не правильные email или пароль";
//    return $_SESSION['danger'];
//}
//
//check_login_pass($email, $password);