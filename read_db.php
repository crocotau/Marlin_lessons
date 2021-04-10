<?php
$pdo = new PDO('mysql:host=localhost;dbname=lessom_marlin', "im", "123123");

$sql_read = "SELECT * FROM `users`";

$state=$pdo->query($sql_read);
$arr=$state->fetchAll();
$pdo=null;
$state=null;




