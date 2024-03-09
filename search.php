<?php
$name = "search";
require "parts/navbar.php";

//check searching phrase
if(isset($_GET['search']) && isset($_GET['submit'])){
  $search_phrase = filter_var($_GET['search'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $search = htmlspecialchars($search_phrase, ENT_QUOTES);
  $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
  $result = mysqli_query($conn, $query);
}

?>
        <!--Container-->
<div class="container-fluid main-container"> 
  <div class="row search-title d-flex justify-content-center mb-5 mt-5">
    <form method="GET" action="<?= $root ?>search.php" class="search-panel col-lg-8 col-md-10 col-sm-12 d-flex justify-content-between p-3" style="height: 30%;">
      <input type="search" name="search" class="search-txt" placeholder='"Searching phrase"'>
      <div><button type="search" name="submit"><i class="bi bi-search search-icon"></i></button></div>
    </form>
  </div>
  <?php if(mysqli_num_rows($result) > 0) : ?>
  <div class="row">
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

         //get likes info from database
          $user = $_SESSION['user_id'];
          $all_post = $post['id'];
          $like_query = "SELECT * FROM likes WHERE user_id = $user AND post_id = $all_post";
          $like_result = mysqli_query($conn, $like_query);
          (mysqli_num_rows($like_result) > 0) ? $class = 'bi bi-heart-fill ps-2' : $class = 'bi bi-heart ps-2';
        
          //style for user logged in and user not logged in
          (isset($_SESSION['user_id'])) ? $all_class = $class : $all_class = 'bi bi-heart ps-2';
    ?>
    <div class="elem col-lg-4 col-md-6 col-sm-12 col-12 mb-5">
      <div class="card little-card">
         <div class="img-card"><img src="images/post_images/<?= $post['post_image'] ?>" class="card-img-top" alt="Recipe photo"></div>
         <div class="card-body">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <p class="card-subtitle"><?= $author['login'] ?> | <?= $category['name']?></p>
            <p class="card-subtitle"><small class="date"><?= date("m.d.Y",strtotime($post['date_time'])) ?></small></p>
            <p class="card-text"><?= substr($post['recipe_text'], 0, 150) ?>...</p>
            <a href="<?= $root ?>singlePost.php?id=<?= $post['id'] ?>" class="btn btn-success" style="width:70%;">Read more</a>
            <a class="like" href="<?= $root ?>addLikes_logic.php?id=<?= $post['id'] ?>"><i class="<?= $all_class ?>" style="font-size:large;">
            <small><?= $post['likes'] ?></small></i></a>
         </div>
      </div>
    </div>  
    <?php endwhile; ?>      
  </div>
  <?php else : ?>
  <!--Error-->
  <div class="row search-title d-flex justify-content-center mb-5 mt-5">
    <div class="search-none col-lg-8 col-md-10 col-sm-12 p-3 d-flex justify-content-center">
      <div class="pe-2"><i class="bi bi-search"></i></div>
      <div>"No results for your search phrase."</div>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php require "parts/footer.php";?>