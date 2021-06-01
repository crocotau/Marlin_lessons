<?php
require '../vendor/autoload.php';
use Aura\SqlQuery\QueryFactory;
use Database\Connection;
use App\QueryBuilder;

$db = new QueryBuilder();

//$posts = $db->getOne('posts', 3);
//$db->delete('posts', 28);
$posts = $db->getAll('posts');
//$db->config = include 'config.php';

//$db->insert('posts', ['title'=>'dddddddddd']);
//$db->update('posts', ['title'=>'Other text19999'], 2);










////include 'functions.php';
//include 'Router.php';
////$db = include 'database/start.php';
////xdebug_var_dump($_SERVER);die();
////$post = $db->getOne('posts', 1);
//
//Router::route('about','/about.php');
////$routes = [
////    ""=>"home.php",
////    "about"=>"about.php",
////];
//// $route = ltrim($_SERVER['REQUEST_URI'], '/');
//// if (array_key_exists($route, $routes)){
////     include $routes[$route];exit;
//// }else{
////     var_dump(404);
//// }
//
////$posts = $db->getALL('posts');
////
////
include '../index.view.php';
?>