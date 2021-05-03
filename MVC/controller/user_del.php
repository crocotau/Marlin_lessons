<?php
session_start();
require_once "../model/functions.php";
$path_img = "../img/demo/avatars/";
$logged_id = $_SESSION['id'];
$edit_id = $_GET['id'];
$del_file = $path_img.get_user_by_id($edit_id)['img'];
$del_id = get_user_by_id($edit_id)['id'];

is_logged($logged_id);
check_access_to_edit_user($logged_id, $edit_id);

if($del_id==$logged_id) {
    unlink($del_file);
    user_del($edit_id);
    message('danger', 'Зарегистрируйтесь');
    redirect_to('../view/page_register.php');
}else{
    unlink($del_file);
    user_del($edit_id);
    message('success_edit', 'Пользователь удалён');
    redirect_to('../view/users.php');
}