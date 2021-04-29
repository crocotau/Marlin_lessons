<?php
session_start();
require_once "functions.php";
$logged_id = $_SESSION['id'];
$status = $_POST['status'];
$edit_id = $_GET['id'];
is_logged($logged_id);
check_access_to_edit_user($logged_id, $edit_id);

$arr_status = get_user_by_id($edit_id);

set_status($status, $edit_id);

message('success_edit', 'Статус обновлён');

redirect_to('users.php');