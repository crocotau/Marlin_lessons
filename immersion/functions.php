<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

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

function check_email_add($email){
    $pdo = connect_to_db();
    $sql = "SELECT * FROM users WHERE :email=email";
    $state = $pdo->prepare($sql);
    $state->execute(["email"=>$email]);
    $email_check=$state->fetch(PDO::FETCH_ASSOC);
    if (empty($email_check)){
        return true;
    }else {
        message('danger', "Почта ".$email." занята");
        redirect_to("create_user.php");
    }
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

function upload_avatar($image, $user_id){
    //TODO
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

















