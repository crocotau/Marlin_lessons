<?php
require "model/Posts.php";
$post = new Posts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>

<form action="controller/setPosts.php" method="post">
    <div>
        <label>Имя</label>
        <input type="text" name="username">

        <label>Пост</label>
        <input type="text" name="post">

        <button type="submit">Добавить</button>
    </div>
</form>
<?php foreach ($post->getPost() as $item):?>
<p><?= $item['username'];?> написал(а) <?= $item['post'];?> в <?= $item['date'];?> <a href="controller/delPost.php?id=<?= $item['id'];?>">Удалить</a></p>
<?php endforeach;?>
</body>
</html>