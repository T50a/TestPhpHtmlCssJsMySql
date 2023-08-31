<div class="container mt-5">
    <h3>Comments</h3>
<?php
include_once __DIR__ . '/../db/pdo.php';
    $postId = $_GET['id'];
    $commentsSelect = $pdo->prepare("SELECT * FROM `comments` WHERE `post_id` = :postId");
    $commentsSelect->execute([
        ':postId' => $postId
    ]);
    $comments = $commentsSelect->fetchAll(PDO::FETCH_ASSOC);
    foreach ($comments as $comment) {
?>

    <div class="media mt-4">
        <img src="images/top-icon.png" class="mr-3" alt="User Avatar" style="width:25px;">
        <div class="media-body">
            <h5 class="mt-0"><?= $comment['name'];?></h5>
            <p><?= $comment['body'];?></p>
        </div>
    </div>
    <hr>
<?php } ?>

    <h3>Leave your comment</h3>
    <form action="../actions/addComment.php" method="post" id="contactForm">
        <input type="hidden" name="postId" value="<?= $postId?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="body" id="body" rows="4" placeholder="Enter your comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>