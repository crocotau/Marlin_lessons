<?php
namespace Database;
use PDO;

class Connection{
    public static function make($config){
        return new PDO("{$config['connection']};dbname={$config['db']};charset={$config['charset']}",
            "{$config['user']}",
            "{$config['password']}");
    }
}