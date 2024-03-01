<?php
$name = "editpost";
require "parts/navbar.php";
?>
            <!--Container-->
            <div class="container-fluid main-container">
                <form method="POST" action="<?php $root ?>editPost_logic.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mb-lg-0 pb-lg-0 mb-md-1 pb-md-1 mb-sm-3 pb-sm-3 pb-5 mb-5 left_section">
                        <div class="row" style="height: 80%;">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="form-floating mb-3">
                                        <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Fruit salad">
                                         <label for="floatingInput">Title</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="recipe" placeholder="Write recipe text here..." id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Recipe</label>
                                </div>
                            </div>
                            <div class="offset-lg-0 col-lg-4 offset-md-0 col-md-4 offset-sm-0 col-sm-12">
                                <div class="ingredients p-1" id="ingredients" style="height:100%;"><h6>Ingredients</h6>
                                <div class="ingredient">
                                    <i class="bi bi-dot"></i>
                                    <input type="text" name="ingridient[]" placeholder="ingredient">
                                    <i class="bi bi-x" id="remove"></i>
                                </div>
                                <div class="add_ingredient" id="add_ingredient" onclick="add_ingredient()">
                                <i class="bi bi-plus"></i>Add next
                                </div>
                            </div></div>
                        </div>
                        <div class="row mt-3" style="height: 20%;">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12"><h6>Image</h6>
                            <div class="mb-3">
                                <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png" id="formFile">
                            </div>    
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12 ps-lg-2 ps-md-2 pe-md-1 px-sm-2"><h6>Time</h6>
                                <div class="input-group mb-3">
                                 <label class="input-group-text" for="timeSelect"><i class="bi bi-clock-fill"></i></label>
                                    <select class="form-select" id="timeSelect" name="time">
                                         
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12 pe-lg-2 pe-md-2 ps-md-1 px-sm-2"><h6>Portion</h6>
                            <div class="input-group mb-3">
                                 <label class="input-group-text" for="portionSelect"><i class="bi bi-pie-chart-fill"></i></label>
                                    <select class="form-select" id="portionSelect" name="portion">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2x col-md-12 col-sm-12 mt-lg-0 mt-md-0 mt-sm-3 mt-3 pt-lg-0 pt-md-0 pt-sm-1 right-section">
                        <div class="row category" id="category" style="height: 80%;">
                        <h6>Category</h6>
                        </div>
                        <div class="row difficult mt-3" style="height: 20%;"><h6>Difficult</h6>
                            <ul class="star_rating">
                                <li class="star" id="5"><label><input type="radio" value="5" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="4"><label><input type="radio" value="4" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="3"><label><input type="radio" value="3" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="2"><label><input type="radio" value="2" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="1"><label><input type="radio" value="1" name="star"><i class="bi bi-star-fill"></i></label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 pt-3">
                    <div class="col-lg-8 col-md-12 col-sm-12 mt-3 pt-3 pb-3 mb-3 pb-sm-0 mb-sm-0 pb-md-3 mb-md-3 pb-lg-0 mb-lg-0"><div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2" ><button class="btn btn-success" style="width: 100%;" type="reset">Reset</button></div>
                    <div class="col-lg-4 col-md-6 col-sm-12"><button class="btn btn-success" style="width: 100%;"type="submit" name="submit">Edit</button></div>
                    </div></div>
                </div>
                </form>
            </div>
            <?php require "parts/footer.php"; ?>