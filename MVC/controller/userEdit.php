<?php
session_start();

require_once "../model/functions.php";

$username = $_POST['username'];
$job = $_POST['job'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$logged_id = $_SESSION['id'];
$edit_id = $_GET['id'];

check_access_to_edit_user($logged_id, $edit_id);

edit_user($username, $job, $phone, $address, $edit_id);

message('success_edit', 'Профиль обновлён');

redirect_to('../view/users.php');
