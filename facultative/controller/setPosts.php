<?php
require_once "../model/Posts.php";
$username = $_POST['username'];
$post = $_POST['post'];
$posts = new Posts();
$posts->setPost($username, $post);
header('Location: ../posts_form.php');