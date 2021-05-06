<?php
class Posts
{
    public $username, $post, $datePost, $id;

    public function setPost($username, $post)
    {
        $this->datePost=date('H:i, d-m-Y');
        $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
        $sql = "INSERT INTO `posts` (`id`, `username`, `post`, `date`) VALUES (NULL, :username, :post, '')";
        $sth=$pdo->prepare($sql);
        $sth->execute(['username'=>$username, 'post'=>$post]);
        $this->id=$pdo->lastInsertId();
        $sql = "UPDATE `posts` SET `date` = '$this->datePost' WHERE `posts`.`id` = '$this->id'";
        $sth=$pdo->prepare($sql);
        $sth->execute(['date'=>$this->datePost]);
    }

    public function getPost(): array
    {
        $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
        $sql = "SELECT * FROM posts";
        $sth=$pdo->prepare($sql);
        $sth->execute();
        return $arr=$sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delPost($id){
        $pdo = new PDO("mysql:host=localhost;dbname=immersion", "im", "123123");
        $pdo->prepare("DELETE FROM `posts` WHERE `posts`.`id` = $id")->execute();
    }
}