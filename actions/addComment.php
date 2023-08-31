<?php

include_once __DIR__ . '/../db/pdo.php';

$name = $_POST['name'];
$body = $_POST['body'];
$postId = $_POST['postId'];

$insert = $pdo->prepare("INSERT INTO `comments` (`name`, `body`, `post_id`) VALUES (:name, :body, :postId)");
$insert->execute([
    ':name' => $name,
    ':body' => $body,
    ':postId' => $postId,
]);

header('Location: /post.php?id='.$postId);