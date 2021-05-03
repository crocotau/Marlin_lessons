<?php
session_start();
require_once "../model/functions.php";

$email=$_POST["email"];
$password=$_POST["password"];

if(check_email($email))
reg_user($email, $password);
