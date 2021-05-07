<?php
class Posts
{
    public $username, $post, $datePost, $id;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
    }

    public function setPost($username, $post)
    {
        $this->datePost=date('H:i, d-m-Y');
        $sql = "INSERT INTO `posts` (`username`, `post`, `date`) VALUES (:username, :post, '')";
        $sth=$this->pdo->prepare($sql);
        $sth->execute(['username'=>$username, 'post'=>$post]);
        $this->id=$this->pdo->lastInsertId();
        $sql = "UPDATE `posts` SET `date` = '$this->datePost' WHERE `posts`.`id` = '$this->id'";
        $sth=$this->pdo->prepare($sql);
        $sth->execute(['date'=>$this->datePost]);
    }

    public function getPost(): array
    {
        $sql = "SELECT * FROM posts";
        $sth=$this->pdo->prepare($sql);
        $sth->execute();
        return $arr=$sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delPost($id){
        $this->pdo->prepare("DELETE FROM `posts` WHERE `posts`.`id` = '$id'")->execute();
    }
}