<?php
session_start();
require_once "functions.php";
$img = $_FILES['img'];
$path_img = "img/demo/avatars/";
$edit_id = $_GET['id'];
$del_file = $path_img.get_user_by_id($edit_id)['img'];

//var_dump($del_file);die();
if(upload_avatar($path_img, $img, $edit_id)) {

    message('success_edit', 'Статус обновлён');
    redirect_to('users.php');
    unlink($del_file);
}
