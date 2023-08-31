<?php
    include_once __DIR__ . '/db/pdo.php';
    $postId = $_GET['id'];
    $postSelect = $pdo->prepare("SELECT * FROM `posts` WHERE `id` = :id");
    $postSelect->execute([
      ':id' => $postId,
    ]);
    $post = $postSelect->fetch(PDO::FETCH_ASSOC);

    if ($post === false) {
        die('Post not found!');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__  . '/includes/head.php';?>
   <body class="main-layout">
      <?php include_once __DIR__  . '/includes/loader.php';?>,
      <?php include_once __DIR__  . '/includes/header.php';?>
      <div id="blog" class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2> <?= $post['title']; ?> </h2>
                     <figure>
                        <span><?php
                            $timestamp = strtotime($post['created_at']);
                            echo date('Y-m-d', $timestamp);?></span>
                        <span>Post  By:  <?= $post['author_name']; ?></span>
                     </figure>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="blog-box">
                     <figure><img class="posted" src="<?= $post['image']; ?>" alt="#"/>

                     </figure>
                     <div class="travel">


                     </div>
                     <h3><?= $post['subtitle']; ?></h3>
                     <p><?= $post['body']; ?></p>
                  </div>
               </div>
            </div>
             <?php include_once __DIR__ . '/includes/comments.php'?>
         </div>
      <?php include_once __DIR__  . '/includes/footer.php';?>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>

   </body>
</html>