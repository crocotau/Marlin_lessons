<?php
session_start();
$res = $_POST["res"];
$pdo = new PDO('mysql:host=localhost;dbname=lessom_marlin', "im", "123123");

$sql = "SELECT * FROM posts WHERE post=:res";

$sth=$pdo->prepare($sql);
$sth->execute(["res"=>$res]);
$value=$sth->fetch(PDO::FETCH_ASSOC);
if (!empty($value)){
    $message = "Запись \"".$res."\" уже есть!";
    $_SESSION["danger"]=$message;
    header("Location: /task_10.php");
    exit();
}

$sql = "INSERT INTO posts (post) VALUES (:res)";
$pdo->prepare($sql)->execute(["res" => $res]);

$message = "Запись \"".$res."\" добавлена!";
$_SESSION["success"]=$message;

header("Location: /task_10.php");
