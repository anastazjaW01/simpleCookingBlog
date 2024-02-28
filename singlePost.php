<?php
$name = "singlePost";
require "parts/navbar.php";
?>
            <!--Container-->
            <div class="container-fluid main-container">
                <div class="row p-0">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <img class="img-fluid post_img" src="images/cookingVlog.jpg"></div>
                        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0 ">
                        <h2>Title</h2></div>
                        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <p><small>Person 12.04.2024</small></p></div>
                        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12 p-0 mb-3">
                            <div class="row text-center recipe_info_text">
                                <div class="col-4">Time</div>
                                <div class="col-4">Difficulty level</div>
                                <div class="col-4">Portion</div>
                            </div>
                            <div class="row text-center recipe_info_icon">
                                <div class="col-4"><p><i class="bi bi-clock-fill"></i> 2h </p></div>
                                <div class="col-4"><p>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                </p></div>
                                <div class="col-4"><p><i class="bi bi-pie-chart-fill"></i> 3</p></div>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1 col-md-12 col-sm-12 col-12 p-0">
                        <h4>Ingridients</h4>
                        <ul id="ingridientsList">
                            <li class="ingridient" onclick="deleteIngridient(this)"><span> milk</span></li>
                            <li class="ingridient" onclick="deleteIngridient(this)"><span>sugar</span></li>
                            <li class="ingridient" onclick="deleteIngridient(this)"><span>1kg flavour</span></li>
                            <li class="ingridient" onclick="deleteIngridient(this)"><span> eggs</span></li>
                            <li class="ingridient" onclick="deleteIngridient(this)"><span>1 glass water</span></li>
                        </ul></div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12 p-0">
                        <div>
                            <h4>Recipe</h4>
                            <p class="recipe_text">
                            Do zrobienia ciasta na dowolne pierogi potrzebujesz również: czysty blat lub stolnica do wałkowania ciasta; wałek; okrągła wykrawaczka do pierogów lub szklankę średnica około 7-9 cm; bawełniana ściereczka; szeroki garnek; i cedzak do łowienia pierogów.
                            Kalorie policzone zostały na podstawie użytych przeze mnie składników. Jest to więc orientacyjna ilość kalorii, ponieważ Twoje składniki mogą mieć inną ilość kalorii niż te, których użyłam ja. Podczas liczenia kalorii nie uwzględniłam wybranego przez Ciebie farszu. Podałam kaloryczność "pustego" pieroga zakładając, że wyszło Ci 60 sztuk.
                            Do szerokiej miski przesiej mąkę. Dodaj sól oraz olej np. rzepakowy. Olej z pestek winogron oraz inne oleje o delikatnym smaku również się sprawdzą. Wlej szklankę gorącej, przegotowanej wody (250 ml) i wyrabiaj chwilę ciasto - najlepiej ręcznie. Na początku, jeśli ciasto jest gorące, możesz je zamieszać łyżką.
                            Ciasto można też śmiało wyrabiać w maszynie np. w Thermomix. Ciasto powinno być miękkie, plastyczne i elastyczne. Kulę ciasta zawiń w folię i odłóż na 30 minut. Ciasto po leżakowaniu nie będzie się kurczyć podczas wałkowania.    
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