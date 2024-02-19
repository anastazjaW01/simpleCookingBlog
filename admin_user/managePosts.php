<?php
$name = "manageposts";
require "parts/navbar.php";
?>
            <!--Container-->
            <div class="container-fluid main-container">
            <div class="row"><h4>Hello User!</h4></div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 side-panel">
                    <div class="manage">
                    <a href="createPost.php"><div class="manage-panel">ADD POST</div></a>
                    <a href="managePosts.php"><div class="manage-panel active">MANAGE POSTS</div></a>
                    <a href="manageComments.php"><div class="manage-panel">MANAGE COMMENTS</div></a>
                    <a href="manageUsers.php"><div class="manage-panel">MANAGE USERS</div></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12  info-table ">
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
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td scope="row">Spaghetti Bolonese</td>
                                <td>Italian cuisine</td>
                                <td>Jane1204</td>
                                <td><small>12-02-2024</small></td>
                                <td><button class="btn btn-secondary"> Edit </button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <?php require "parts/footer.php"; ?>