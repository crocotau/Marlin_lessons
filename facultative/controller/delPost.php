<?php
require_once "../model/Posts.php";
$delId=$_GET['id'];
$post = new Posts();
$post->delPost($delId);
header('Location: ../posts_form.php');