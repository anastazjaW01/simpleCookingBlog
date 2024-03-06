<?php
$name = "manageusers";
require "parts/navbar.php";

//get user info from database without admin
$current_user = $_SESSION['user_id'];
$user_query = "SELECT * FROM users WHERE NOT id=$current_user";
$user_result = mysqli_query($conn, $user_query);
?>
            <!--Container-->
            <div class="container-fluid main-container">
                 <!--Show an alert when user deleting successfully-->
             <?php if(isset($_SESSION['delete_user_succ'])):?>
            <div class="col-6 offset-3">
            <p class="alert alert-success alert-dismissible fade show" role="alert">
            <?=$_SESSION['delete_user_succ'];
                unset($_SESSION['delete_user_succ']);?>
            <button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
            <?php endif ?>
             <!--Show an alert when an error occurs while deleting user-->
             <?php if(isset($_SESSION['delete_user'])):?>
            <div class="col-6 offset-3">
            <p class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> 
            <?=$_SESSION['delete_user'];
                unset($_SESSION['delete_user']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
            <?php endif ?>
            <div class="row"><h4>Hello Admin!</h4></div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 side-panel">
                    <div class="manage">
                    <a href="<?= $root ?>admin_user/createPost.php"><div class="manage-panel">ADD POST</div></a>
                    <a href="<?= $root ?>admin_user/"><div class="manage-panel">MANAGE POSTS</div></a>
                    <a href="<?= $root ?>admin_user/manageComments.php"><div class="manage-panel">MANAGE COMMENTS</div></a>
                    <a href="<?= $root ?>admin_user/manageUsers.php"><div class="manage-panel active">MANAGE USERS</div></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12  info-table ">
                <?php if(mysqli_num_rows($user_result) > 0) : ?>
                    <table class="table">
                        <thead class="table-light sticky-header">
                            <tr>
                                <th scope="col" class="col-5">E-mail</th>
                                <th scope="col" class="col-4">Login</th>
                                <th scope="col" class="col-2">Posts</th>
                                <th scope="col" class="col-1">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($user = mysqli_fetch_assoc($user_result)) : ?>
                            <?php
                                    $id = $user['id'];
                                    $post_number = "SELECT COUNT(*) AS posts_number FROM posts WHERE user_id=$id";
                                    $post_number_result = mysqli_query($conn, $post_number);
                                    $number = mysqli_fetch_assoc($post_number_result);
                            ?>
                            <tr>
                                <td scope="row"><?= $user['email'] ?></td>
                                <td><?= $user['login'] ?></td>
                                <td><?= $number['posts_number'] ?></td>
                                <td><a href="<?= $root ?>admin_user/deleteUsers.php?id=<?= $user['id'] ?>"><button class="btn btn-danger" type="submit">Delete</button></a></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert alert-secondary d-flex align-items-center fw-bold" role="alert"><?= "No users to show." ?></div>
                    <?php endif; ?>  
                </div>
            </div>
            </div>
            <?php require "parts/footer.php"; ?>