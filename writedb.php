<?php
$res = $_POST["res"];
$pdo = new PDO('mysql:host=localhost;dbname=lessom_marlin', "im", "123123");
$sql = "INSERT INTO posts (post) VALUES (:res)";
$pdo->prepare($sql)->execute(["res"=>$res]);
?>