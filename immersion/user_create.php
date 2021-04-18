<?php
session_start();
require_once "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$job = $_POST['job'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$status = $_POST['status'];
$telegram_link = $_POST['telegram_link'];
$vk_link = $_POST['vk_link'];
$inst_link = $_POST['inst_link'];

check_email_add($email);

if (!check_email_add($email)) {exit;}

$user_id = add_user($email, $password);

edit_user($username, $job, $phone, $address, $user_id);

set_status($status, $user_id);

add_social_links($telegram_link, $vk_link, $inst_link, $user_id);

redirect_to("users.php");

message("add_user_success", "Пользователь добавлен");
