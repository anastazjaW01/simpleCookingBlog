<?php
$name = "manageusers";
require "parts/navbar.php";
?>
            <!--Container-->
            <div class="container-fluid main-container">
            <div class="row"><h4>Hello Admin!</h4></div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 side-panel">
                    <div class="manage">
                    <a href="createPost.php"><div class="manage-panel">ADD POST</div></a>
                    <a href="managePosts.php"><div class="manage-panel">MANAGE POSTS</div></a>
                    <a href="manageComments.php"><div class="manage-panel">MANAGE COMMENTS</div></a>
                    <a href="manageUsers.php"><div class="manage-panel active">MANAGE USERS</div></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12  info-table ">
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
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">jane.roster@gmail.com</td>
                                <td>Jane1204</td>
                                <td>12</td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <?php require "parts/footer.php"; ?>