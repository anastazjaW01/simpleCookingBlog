<?php
$name = "category";
require "parts/navbar.php";

//get posts where category is 
if(isset($_GET['id'])){
  $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE category_id = $id ORDER BY date_time DESC";
  $result = mysqli_query($conn, $query);
}else{
  header('location: ' . $root);
  die();
}

//get category info from database
$category_id = $id;
$category_query = "SELECT * FROM categories where id=$category_id";
$category_result = mysqli_query($conn, $category_query);
$category = mysqli_fetch_assoc($category_result);

?>
        <!--Container-->
  <div class="container-fluid main-container ps-0">
    <div class="row parent">
      <div id="child_background" style="background-image: url(http://localhost/simpleCookingBlog/images/category/<?= $category['photo'] ?>?v=<?php echo time(); ?>);"></div>
      <h1 class="col-2 offset-5 d-flex justify-content-center align-content-center"><?= $category['name'] ?></h1>
    </div>
  <?php if(mysqli_num_rows($result) > 0) : ?>
    <div class="row">
      <?php while ($post = mysqli_fetch_assoc($result)) : ?>
        <div class="elem col-lg-4 col-md-6 col-sm-12 mb-5">
           <div class="card little-card">
              <div class="img-card"><img src="images/post_images/<?= $post['post_image'] ?>" class="card-img-top" alt="Recipe photo"></div>
              <div class="card-body">
                  <h5 class="card-title"><?= $post['title'] ?></h5>
                  <?php
                      //get user info from database
                        $author_id = $post['user_id'];
                        $author_query = "SELECT * FROM users where id=$author_id";
                        $author_result = mysqli_query($conn, $author_query);
                        $author = mysqli_fetch_assoc($author_result);

                        //get likes info from database
                        if(isset($_SESSION['user_id'])){
                        $user = $_SESSION['user_id'];
                        $all_post = $post['id'];
                        $like_query = "SELECT * FROM likes WHERE user_id = $user AND post_id = $all_post";
                        $like_result = mysqli_query($conn, $like_query);
                        (mysqli_num_rows($like_result) > 0) ? $class = 'bi bi-heart-fill ps-2' : $class = 'bi bi-heart ps-2';
                      }

                        //style for user logged in and user not logged in
                        (isset($_SESSION['user_id'])) ? $all_class = $class : $all_class = 'bi bi-heart ps-2';
                  ?>
                  <p class="card-subtitle"><?= $author['login']?> | <?= $category['name'] ?></p>
                  <p class="card-subtitle"><small class="date"><?= date("m.d.Y",strtotime($post['date_time'])) ?></small></p>
                  <p class="card-text text"><?= substr($post['recipe_text'],0,150)?></p>
                  <a href="<?= $root ?>singlePost.php?id=<?= $post['id'] ?>" class="btn btn-success" style="width:70%;">Read more</a>
                  <a class="like" href="<?= $root ?>addLikes_logic.php?id=<?= $post['id'] ?>">
                    <i class="<?= $all_class ?>" style="font-size:large;">
                      <small><?= $post['likes'] > 0 ? $post['likes'] : '' ?></small>
                    </i>
                  </a>
              </div>
          </div>
        </div>
        <?php endwhile; ?>
    </div>
  </div>
  <?php else : ?>
    <div class="row">
      <div class="elem col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 offset-sm-0 mb-5 d-flex justify-content-center">
      <h2 class="text-secondary">There are no posts for this category :&#40;</h2>
      </div>
    </div>
  <?php endif; ?>
    <?php require "parts/footer.php";?>