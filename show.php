<?php
include 'functions.php';
$db = include 'database/start.php';

echo $db->getOne('posts', $_GET['id'])['title'];