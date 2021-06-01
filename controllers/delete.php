<?php
require '../vendor/autoload.php';
use Aura\SqlQuery\QueryFactory;
use Database\Connection;
use App\QueryBuilder;
$id = $_GET['id'];
$db = new QueryBuilder();
$db->delete('posts', $id);
header('Location: ../public/index.php');