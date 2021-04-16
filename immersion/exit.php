<?php
function to_exit(){
    unset($_SESSION['admin']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['danger']);
    header("Location: login.php");
}

to_exit();