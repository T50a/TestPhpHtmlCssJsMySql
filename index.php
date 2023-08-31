<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__  . '/includes/head.php';?>
   <body class="main-layout">
      <?php include_once __DIR__  . '/includes/loader.php';?>
      <?php include_once __DIR__  . '/includes/header.php';?>
      <section >
         <div class="banner-main">
            <img src="images/banner.png" alt="#"/>
            <div class="container">
               <div class="text-bg">
                  <h1>KOK<br><strong class="white">ZHAILAU</strong></h1>
               </div>
            </div>
         </div>
      </section>
      <!-- our blog -->
      <div id="blog" class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Latest posts</h2>
                  </div>
               </div>
            </div>
            <div class="row">
                <?php
                include_once 'db/pdo.php';
                $posts = $pdo->query("SELECT * FROM `posts` ORDER BY `id` DESC")->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posts as $post) {
                    ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-box">
                        <figure><img src=<?= $post['image'];?> alt="#"/>
                            <span><?php
                                $timestamp = strtotime($post['created_at']);
                                echo date('Y-m-d', $timestamp);?></span>
                        </figure>
                        <div class="travel">
                            <span>Post  By:  <?php echo $post['author_name'];?></span>

                        </div>
                        <h3><?= $post['title'];?></h3>
                        <p><?= $post['body'];?></p>
                        <a href="/post.php?id=<?= $post['id']; ?>">Read more</a>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
         </div>
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