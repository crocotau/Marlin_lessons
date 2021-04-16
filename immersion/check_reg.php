<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

//function get_all_users(): array
//{
//    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
//    $sql = "SELECT * FROM users";
//    $sth = $pdo->prepare($sql);
//    $sth->execute();
//    $arr = $sth->fetchAll(PDO::FETCH_ASSOC);
//    return $arr;
//}

function check_login_pass($email, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    $sql = "SELECT * FROM users";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $arr = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach($arr as $item) {
        if ($item['email']==$email && $item['password']==$password){
            $_SESSION['id'] = $item['id'];
            $_SESSION['email'] = $item['email'];
            return true;
        }
    }
}

function check_role($email){
    $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    $sql = "SELECT * FROM users";
    $sth=$pdo->prepare($sql);
    $sth->execute();
    $arr=$sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arr as $item){
        if ($item['email']==$email && $item['role']=="admin") return true;
    }
}

$chk = check_login_pass($email, $password);

if ($chk){
    header("Location: users.php");
} else{
    $_SESSION['danger'] = "Не правильные email или пароль";
    header("Location: login.php");
}

if (isset($_SESSION['danger'])) {
    header("Location: login.php");
} else check_role($email);

if (check_role($email)){
    $_SESSION['admin'] ="admin";
}