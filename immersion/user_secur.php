<?php
session_start();
require_once "functions.php";
//$user_id = $_POST['id'];
$logged_id = $_SESSION['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$edit_id = $_GET['id'];
is_logged($logged_id);
check_access_to_edit_user($logged_id, $edit_id);

$arr_secur = get_user_by_id($edit_id);

if (empty($password) || empty($confirm_password)){
    message('warning', 'Введите пароль!');
    redirect_to('security.php?id='.$edit_id);
    exit;
}

if ($arr_secur['id']==$edit_id && $arr_secur['email']==$email && password_verify($password, $arr_secur['password'])){
    message('warning', 'Без изменений');
    redirect_to('security.php?id='.$edit_id);
    exit;
}

if ($password!=$confirm_password){
    message('warning', 'Пароль не совпадает!');
    redirect_to('security.php?id='.$edit_id);
    exit;
}

elseif ($arr_secur['email']==$email && !password_verify($password, $arr_secur['password'])){
    edit_user_secur($email, $password, $edit_id);
    message('success_edit', 'Email и пароль обновлены');
    redirect_to('users.php');
}else check_email_secur($email, $edit_id);
