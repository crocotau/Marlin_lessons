<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

function check_login_pass($email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    $sql = "SELECT * FROM users";
    $sth = $pdo->prepare($sql);
    $sth->execute(['email'=>$email, 'password'=>$password]);
    $arr = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($arr as $item) {
        if ($item['email']==$email && $item['password']==$password){return true;}
    }
}

$chk = check_login_pass($email, $password);

if ($chk){
    header("Location: users.php");
} else{
    $_SESSION['danger'] = "Не правильные email или пароль";
    header("Location: login.php");
}