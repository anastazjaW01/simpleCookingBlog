<?php
$name = "homepage";
require "parts/navbar.php";

//get latest post from database
$first_post = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 1";
$first_post_result = mysqli_query($conn, $first_post);
$first = mysqli_fetch_assoc($first_post_result);

//get autor info from database
$first_author_id = $first['user_id'];
$first_author_query = "SELECT * FROM users where id=$first_author_id";
$first_author_result = mysqli_query($conn, $first_author_query);
$first_author = mysqli_fetch_assoc($first_author_result);
  
//get category info from database
$first_category_id = $first['category_id'];
$first_category_query = "SELECT * FROM categories where id=$first_category_id";
$first_category_result = mysqli_query($conn, $first_category_query);
$first_category = mysqli_fetch_assoc($first_category_result);

//get next posts from database
$query = "SELECT * FROM posts WHERE date_time < (SELECT MAX(date_time) FROM posts) ORDER BY date_time DESC";
$result = mysqli_query($conn, $query);

//get likes info from database
$user = $_SESSION['user_id'];
$first_post = $first['id'];
$like_query = "SELECT * FROM likes WHERE user_id = $user AND post_id = $first_post";
$like_result = mysqli_query($conn, $like_query);
(mysqli_num_rows($like_result) > 0) ? $class = 'bi bi-heart-fill ps-2' : $class = 'bi bi-heart ps-2';

//style for user logged in and user not logged in
(isset($_SESSION['user_id'])) ? $f_class = $class : $f_class = 'bi bi-heart ps-2';

?>
    <!--Container-->
    <div class="container-fluid main-container" >
    <div class="row d-flex justify-content-center mx-lg-4 mx-md-2 mx-sm-1 px-lg-4 px-md-2 px-sm-1">
    <h3 class="d-flex justify-content-center pt-4">Hello foodie!</h3>

    <div class="card big-card flex-row mb-5 mt-3 p-0">
      <div class="card-left"><img src="images/post_images/<?= $first['post_image'] ?>" class="card-img-top img-fluid img-big" alt="New"></div>
      <div class="card-body card-right">
      <h4 class="card-title ct-bg"><a href="#"><?= $first['title'] ?></a></h4>
      <p class="card-subtitle cst-bg"><?= $first_author['login'] ?> | <?= $first_category['name'] ?></p>
      <p class="card-text start-text"> <?= substr($first['recipe_text'], 0, 200) ?>...</p>
      <p class="card-text"><small class="text-body-secondary">Last updated <?= date("H:i A",strtotime($first['date_time'])) ?></small></p>
      <div><a href="<?= $root ?>singlePost.php?id=<?= $first['id'] ?>" class="btn btn-success">Read more</a>
      <a class="" href="<?= $root ?>addLikes_logic.php?id=<?= $first['id'] ?>"><i class="<?= $f_class ?>" style="font-size:large;">
      <small style="font-size:70%;"><?= $first['likes'] ?></small></i></a></div>
      </div>
      </div>
    </div>

  <div class="row">
  <?php if(mysqli_num_rows($result) > 0) : ?>
  <?php while ($post = mysqli_fetch_assoc($result)) : ?>
    <?php 
      //get autor info from database
        $author_id = $post['user_id'];
        $author_query = "SELECT * FROM users where id=$author_id";
        $author_result = mysqli_query($conn, $author_query);
        $author = mysqli_fetch_assoc($author_result);
        
        //get category info from database
        $category_id = $post['category_id'];
        $category_query = "SELECT * FROM categories where id=$category_id";
        $category_result = mysqli_query($conn, $category_query);
        $category = mysqli_fetch_assoc($category_result);

        //get all likes info from database
        $all_post = $post['id'];
        $likes_query = "SELECT * FROM likes WHERE user_id = $user AND post_id = $all_post";
        $likes_result = mysqli_query($conn, $likes_query);
        (mysqli_num_rows($likes_result) > 0) ? $class = 'bi bi-heart-fill ps-2' : $class = 'bi bi-heart ps-2';

        //style for user logged in and user not logged in
        (isset($_SESSION['user_id'])) ? $all_class = $class : $all_class = 'bi bi-heart ps-2';
    ?>
    <div class="elem col-lg-4 col-md-6 col-sm-12 mb-3">
    <div class="card little-card">
    <div class="img-card"><img src="images/post_images/<?= $post['post_image'] ?>" class="card-img-top" alt="Recipe photo"></div>
    <div class="card-body">
    <h5 class="card-title"><?= $post['title'] ?></h5>
    <p class="card-subtitle"><?= $author['login'] ?> | <?= $category['name']?></p>
    <p class="card-subtitle"><small class="date"><?= date("m.d.Y",strtotime($post['date_time'])) ?></small></p>
    <p class="card-text"><?= substr($post['recipe_text'], 0, 150) ?>...</p>
    <a href="<?= $root ?>singlePost.php?id=<?= $post['id'] ?>" class="btn btn-success" style="width:70%;">Read more</a>
    <a class="" href="<?= $root ?>addLikes_logic.php?id=<?= $post['id'] ?>"><i class="<?= $all_class ?>" style="font-size:large;">
    <small style="font-size:70%;"><?= $post['likes'] ?></small></i></a>
    </div>
    </div>
  </div>
  <?php endwhile; ?>
  <?php else : ?>
    <div class="row">
    <div class="elem col-lg-4 col-md-6 col-sm-12 mb-5 justify-content-center">
      <h2 class="text-secondary">There are no posts yet :&#40;</h2>
      </div>
    </div>
  <?php endif; ?>

    </div>
    </div>
<?php require "parts/footer.php";?>