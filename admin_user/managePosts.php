<?php
$name = "manageposts";
require "parts/navbar.php";

//get user from database
$current_user = $_SESSION['user_id'];

//get user data
$query_user = "SELECT id, title, date_time, category_id  FROM posts WHERE user_id = $current_user ORDER BY id DESC"; 
$get_posts = mysqli_query($conn, $query_user);

//get admin data 
$query_admin = "SELECT * FROM posts ORDER BY id DESC";
$get_all_posts = mysqli_query($conn,$query_admin);

?>
            <!--Container-->
            <div class="container-fluid main-container">
            <!--Show an alert when an error occurs while creating a post-->
            <?php if(isset($_SESSION['add-post-succ'])):?>
            <div class="col-5>
            <p class="alert alert-success alert-dismissible fade show" role="alert">
            <?=$_SESSION['add-post-succ'];
                unset($_SESSION['add-post-succ']);?>
            <button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
            <?php endif ?>
            <div class="row"><h4>Hello User!</h4></div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 side-panel">
                    <div class="manage">
                    <a href="createPost.php"><div class="manage-panel">ADD POST</div></a>
                    <a href="managePosts.php"><div class="manage-panel active">MANAGE POSTS</div></a>
                    <?php if(isset($_SESSION['is_admin'])) : ?>
                    <a href="manageComments.php"><div class="manage-panel">MANAGE COMMENTS</div></a>
                    <a href="manageUsers.php"><div class="manage-panel">MANAGE USERS</div></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12  info-table ">
                    <form>
                        <?php if(isset($_SESSION['is_admin'])) : ?>
                        <?php if(mysqli_num_rows($get_all_posts) > 0) : ?>
                    <table class="table">
                        <thead class="table-light sticky-header">
                            <tr>
                                <th scope="col" class="col-3">Title</th>
                                <th scope="col" class="col-3">Category</th>
                                <th scope="col" class="col-2">Authotr</th>
                                <th scope="col" class="col-2">Date</th>
                                <th scope="col" class="col-1">Edit </th>
                                <th scope="col" class="col-1">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($admin_posts = mysqli_fetch_assoc($get_all_posts)) : ?>
                                <?php 
                                //get name from table categories
                                $category_id = $admin_posts['$category_id'];
                                $category_query = "SELECT name FROM categories WHERE id = $category_id";
                                $category_result = mysqli_query($conn, $category_query);
                                $category = mysqli_fetch_assoc($category_result);

                                //get authors posts from users table
                                $author_id = $admin_posts['user_id'];
                                $author_query = "SELECT * FROM users WHERE id = $author_id";
                                $author_result = mysqli_query($conn, $author_query);
                                $author = mysqli_fetch_assoc($author_result); 
                                ?>
                            <tr>
                                <td scope="row"><?= $admin_posts['title'] ?></td>
                                <td><?= $category['name'] ?></td>
                                <td><?= $author['login'] ?></td>
                                <td><small><?= $admin_posts['date_time'] ?></small></td>
                                <td><a href = "<?= $root ?>admin_user/editPost.php?id=<?= $admin_posts['id'] ?>"><button class="btn btn-secondary" type="button"> Edit </button></a></td>
                                <td><a href = "<?= $root ?>admin_user/deletePost.php?id=<?= $admin_posts['id'] ?>"><button class="btn btn-danger" type="button">Delete</button></a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert alert-danger d-flex align-items-center fw-bold" role="alert"><?= "No posts to show." ?></div>
                    <?php endif; ?>
                    <?php endif; ?>
                    </form>
                </div>
            </div>
            </div>
            <?php require "parts/footer.php"; ?>