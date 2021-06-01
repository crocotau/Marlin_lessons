<?php


class QueryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getALL($table){
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($table, $key, $value){
        $sql = "INSERT INTO {$table} ({$key}) VALUES ('{$value}')";

        $this->pdo->query($sql);
    }

    public function getOne($table, $id){
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':id',  $id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);

    }
}