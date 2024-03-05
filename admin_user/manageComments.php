<?php
$name = "managecomments";
require "parts/navbar.php";

$comment_query = "SELECT * FROM comments";
$comment_result = mysqli_query($conn, $comment_query);
?>
            <!--Container-->
            <div class="container-fluid main-container">
            <div class="row"><h4>Hello Admin!</h4></div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 side-panel">
                    <div class="manage">
                    <a href="<?= $root ?>admin_user/createPost.php"><div class="manage-panel">ADD POST</div></a>
                    <a href="<?= $root ?>admin_user/"><div class="manage-panel">MANAGE POSTS</div></a>
                    <a href="<?= $root ?>admin_user/manageComments.php"><div class="manage-panel active">MANAGE COMMENTS</div></a>
                    <a href="<?= $root ?>admin_user/manageUsers.php"><div class="manage-panel">MANAGE USERS</div></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12  info-table ">
                <?php if(mysqli_num_rows($comment_result) > 0) : ?>
                    <table class="table">
                        <thead class="table-light sticky-header">
                            <tr>
                                <th scope="col" class="col-3">Title</th>
                                <th scope="col" class="col-6">Text</th>
                                <th scope="col" class="col-2">Authotr</th>
                                <th scope="col" class="col-1">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($comment = mysqli_fetch_assoc($comment_result)) : ?>
                                <?php
                                    //get comment author
                                    $comm_author = $comment['user_id'];
                                    $author_query = "SELECT login FROM users WHERE id=$comm_author";
                                    $author_result = mysqli_query($conn, $author_query);
                                    $author = mysqli_fetch_assoc($author_result);
                                    //get post title
                                    $post_title = $comment['post_id'];
                                    $post_query = "SELECT title FROM posts WHERE id=$post_title";
                                    $post_result = mysqli_query($conn, $post_query);
                                    $title = mysqli_fetch_assoc($post_result);
                                ?>
                            <tr>
                                <td scope="row"><?= $title['title'] ?></td>
                                <td><?= substr($comment['comm_text'], 0, 100) ?></td>
                                <td><?= $author['login'] ?></td>
                                <td><button class="btn btn-danger" href="<?= $root ?>admin_user/deleteComm.php?id=<?= $comment['id'] ?>" type="submit">Delete</button></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert alert-secondary d-flex align-items-center fw-bold" role="alert"><?= "No comments to show." ?></div>
                    <?php endif; ?>    
                </div>
            </div>
            </div>
            <?php require "parts/footer.php"; ?>