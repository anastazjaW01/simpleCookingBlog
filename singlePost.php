<?php
$name = "singlePost";
require "parts/navbar.php";

//get post from database
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
}else{
    die();
}

//separate ingredients
$ingredients = $post['ingridients'];
$ingredients_array = explode(',', $ingredients);

//get stars amount
$stars = $post['difficult'];

//get autor info from database
$author_id = $post['user_id'];
$author_query = "SELECT * FROM users where id=$author_id";
$author_result = mysqli_query($conn, $author_query);
$author = mysqli_fetch_assoc($author_result);

?>
            <!--Container-->
            <div class="container-fluid main-container">
                <div class="row p-0">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0 d-flex justify-content-center">
                        <img class="img-fluid post_img" src="images/post_images/<?= $post['post_image'] ?>">
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0 ">
                        <h2><?= $post['title'] ?></h2>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <p><small><?= $author['login'] ?> | <?= date("m.d.Y",strtotime($post['date_time'])) ?></small></p>
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0 mb-3">
                        <div class="row text-center recipe_info_text">
                            <div class="col-4">Time</div>
                            <div class="col-4">Difficulty level</div>
                            <div class="col-4">Portion</div>
                        </div>
                        <div class="row text-center recipe_info_icon">
                            <div class="col-4"><p><i class="bi bi-clock-fill"></i> <?= $post['time_needed'] ?> </p></div>
                            <div class="col-4"><p>
                                    <?php for($i = 1; $i <= 5; $i++){
                                        if($i <= $stars){
                                            echo '<i class="bi bi-star-fill pe-1"></i>';
                                        }else{
                                            echo '<i class="bi bi-star pe-1"></i>';
                                        }
                                    } ?>
                            </p></div>
                            <div class="col-4"><p><i class="bi bi-pie-chart-fill"></i> <?= $post['portion_amount'] ?></p></div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <h4>Ingridients</h4>
                        <ul id="ingridientsList">
                        <?php foreach($ingredients_array as $ingredient) : ?>
                            <li class="ingridient" onclick="deleteIngridient(this)"><span><?= $ingredient ?></span></li>
                         <?php endforeach; ?>  
                        </ul>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12 p-0">
                        <div>
                            <h4>Recipe</h4>
                            <p class="recipe_text">
                             &ensp;&ensp; <?= $post['recipe_text'] ?>    
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Add comment...
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form class="form-check p-0 d-flex flex-column align-items-end">
                                    <textarea class="form-check border-success mb-1" id="comment" name="comment" rows="3" placeholder="Write something nice..." style="width: 100%;"></textarea>
                                    <button class="btn btn-success" type="submit" style="width: 30%;">Submit</button>
                                        </form>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <h4>Comments</h4>
                        <p class=""><small>User</small> This post has no comments yet</p>
                        <hr>
                    </div>
                </div>
            </div>
            <?php require "parts/footer.php";?>