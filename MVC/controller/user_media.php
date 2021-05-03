<?php
session_start();
require_once "../model/functions.php";
$img = $_FILES['img'];
$path_img = "../img/demo/avatars/";
$edit_id = $_GET['id'];
$del_file = $path_img.get_user_by_id($edit_id)['img'];

if(upload_avatar($path_img, $img, $edit_id)) {
    message('success_edit', 'Статус обновлён');
    redirect_to('../view/users.php');
}
