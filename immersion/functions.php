<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$img = $_FILES['img'];
$path_img = "img/demo/avatars/";
$logged_id = $_SESSION['id'];
$edit_id = $_GET['id'];

function connect_to_db(){
    return $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
}

function get_all_users(): array
{
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    return $arr=$sth->fetchAll(PDO::FETCH_ASSOC);
}

function check_email($email){
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users WHERE :email=email";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email]);
    $email_check=$state->fetch(PDO::FETCH_ASSOC);
    if (!empty($email_check)){
        $_SESSION["danger"]="Почта ".$email." занята";
        redirect_to("page_register.php");
        exit;
    }else {
        return true;
    }
}
function check_email_secur($email, $id){
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users WHERE :email=email";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email]);
    $email_check=$state->fetch(PDO::FETCH_ASSOC);
    if (!empty($email_check)){
        message('danger_email_add_secur',"Почта ".$email." занята");
        redirect_to("security.php?id=".$id);
        exit;
    }
    return true;
}

function edit_user_secur($email, $password, $user_id){
    $pdo = connect_to_db();
    $sql = "UPDATE `users` SET `email`=:email, `password`=:password WHERE `users`.`id` = $user_id";
    $state = $pdo->prepare($sql);
    $state->execute(['email'=>$email, 'password'=>password_hash($password, PASSWORD_DEFAULT)]);
    return true;
}

function check_login_pass($email, $password)
{
    $arr = get_all_users();
    foreach($arr as $item) {
        if ($item['email']==$email && (password_verify($password, $item['password']) || $item['password']==$password)){
            $_SESSION['id'] = $item['id'];
            $_SESSION['email'] = $item['email'];
            check_role($email);
            return true;
        }
    }
}

function check_role($email)
{
    $arr = get_all_users();
    foreach ($arr as $item){
        if ($item['email']==$email && $item['role']=="admin") return true;
    }
}

function reg_user($email, $password)
{
    $pdo = connect_to_db();
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $state = $pdo->prepare($sql);
    $state->execute(['email'=>$email, 'password'=>password_hash($password, PASSWORD_DEFAULT)]);
    $_SESSION["success"]="Вы успешно зарегистрировались!";
    redirect_to("login.php");
    return $user_id = $pdo->lastInsertId();
}

function redirect_to($page){
    header("Location: $page");
}

function check_access_to_add_users(){
    if (!isset($_SESSION['email']) && !isset($_SESSION['admin'])){
        redirect_to("login.php");
        message('access_to_add', "Войдите под админом");
    }
}

function is_logged($logged_id){
    if (!isset($logged_id)) {
        redirect_to("login.php");
        message('access_to_add', "Войдите в аккаунт");
    }
    return true;
}
//
//function is_admin($logged_id, $edit_id){
//    if (!isset($_SESSION['admin'])) {
//        if ($logged_id!=$edit_id){
//            redirect_to('users.php');
//            message('not_admin', "Недостаточно прав. Войдите под админом");
//        }
//    }
//    return true;
//}

function check_access_to_edit_user($logged_id, $edit_id){
    if (!isset($logged_id)) {
        redirect_to("login.php");
        message('access_to_add', "Войдите в аккаунт");
    }
    elseif (!isset($_SESSION['admin'])) {
        if ($logged_id!=$edit_id){
            redirect_to('users.php?id='.$edit_id);
            message('not_admin', "Недостаточно прав. Войдите под админом");
        }
    }
    return true;
}

function get_user_by_id($user_id){
    $pdo=connect_to_db();
    $sql = "SELECT * FROM `users` WHERE `users`.`id` = $user_id";
    $sth=$pdo->prepare($sql);
    $sth->execute();
    return $arr = $sth->fetch(PDO::FETCH_ASSOC);
}

function check_email_password_add($email, $password){
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users WHERE :email=email";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email]);
    $email_check=$state->fetch(PDO::FETCH_ASSOC);
    if (empty($email)){
        message('danger', "Введите почту");
        redirect_to("create_user.php");
    }
    elseif (empty($password)){
        message('danger', "Введите пароль");
        redirect_to("create_user.php");
    }
    elseif ($email_check['email']==$email){
        message('danger', "Почта ".$email." занята");
        redirect_to("create_user.php");
    }else return true;
}

function add_user($email, $password){
    $pdo = connect_to_db();
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $state = $pdo->prepare($sql);
    $state->execute(['email'=>$email, 'password'=>password_hash($password, PASSWORD_DEFAULT)]);
    redirect_to("create_user.php");
    return (int)$user_id = $pdo->lastInsertId();
}

function edit_user($username, $job, $phone, $address, $user_id)
{
    $pdo = connect_to_db();
    $sql = "UPDATE `users` SET `username`=:username, `job`=:job, `phone`=:phone, `address`=:address WHERE `users`.`id` = $user_id";
    $state = $pdo->prepare($sql);
    $state->execute(
        [
            'username'=>$username,
            'job'=>$job,
            'phone'=>$phone,
            'address'=>$address
        ]);
}

function set_status($status, $user_id){
    $pdo = connect_to_db();
    $sql = "UPDATE `users` SET `status`=:status WHERE `users`.`id` = $user_id";
    $state = $pdo->prepare($sql);
    $state->execute(['status'=>$status]);
}

function upload_avatar($path_img, $img, $user_id){
    $img_name = $img['name'];
    $temp_img = $img['tmp_name'];
    $types = ['jpg', 'png', 'jpeg'];


    if(empty($img_name)) {
        redirect_to('create_user.php');
        return message('danger', 'Выберите изображение');
    }
    if($img['size'] == 0) {
        redirect_to('create_user.php');
        return message('danger', 'Файл слишком большой');
    }
    $ext = pathinfo($img_name, PATHINFO_EXTENSION);

    if(!in_array($ext, $types)) {
        message('danger', 'Неправильный тип файла');
        redirect_to('create_user.php');
        exit();
    }
    $img_name="-".uniqid().'.'.$ext;

    $path_img = $path_img.$img_name;

    $pdo = connect_to_db();
    $sql = "UPDATE `users` SET `img`=:img WHERE `users`.`id` = $user_id";
    $state = $pdo->prepare($sql);
    $state->execute(['img'=>$img_name]);

    move_uploaded_file($temp_img, $path_img);
    return true;
}

function add_social_links($telegram_link, $vk_link, $inst_link, $user_id){
    $pdo = connect_to_db();
    $sql = "UPDATE `users` SET `telegram_link`=:telegram_link, `vk_link`=:vk_link, `inst_link`=:inst_link WHERE `users`.`id` = $user_id";
    $state = $pdo->prepare($sql);
    $state->execute(
        [
            'telegram_link'=>$telegram_link,
            'vk_link'=>$vk_link,
            'inst_link'=>$inst_link
        ]);
}

function message($sess_key, $message){
    return $_SESSION[$sess_key]=$message;
}

function user_del($edit_id){
    connect_to_db()->prepare("DELETE FROM `users` WHERE `users`.`id` = $edit_id")->execute();
    return true;
}




















