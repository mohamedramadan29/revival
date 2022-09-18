<?php
ob_start();
session_start();
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero">
    <div id="carouselExampleFade" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay">
                </div>
                <img src="../uploads/art1.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> Artificial Intelligence Projects </h2>
    </div>
</div>
</div>
<!-- END HERO SECTION -->

<!-- START OUR SERVICES  -->
<div class="our_services">
    <div class="container-fluid">
        <div class="data">
            <h2> Artificial Intelligence Projects </h2>
            <div class="row">
                <div class="col-lg-3">
                    <h2> Category </h2>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="all">
                            <label class="form-check-label" for="all">
                                All Category
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="check1">
                            <label class="form-check-label" for="check1">
                                GPS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="check2" checked>
                            <label class="form-check-label" for="check2">
                                PICNIC SET
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="check3" checked>
                            <label class="form-check-label" for="check3">
                                CHILD SEAT
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art1.jpg" alt="">
                                <h3> Project 1 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                                <a href="project_details.php" class="btn button"> Project Details </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art2.jpg" alt="">
                                <h3> Project 2 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art3.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/header2.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/header3.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/header4.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art1.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art2.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art3.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art1.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art2.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="../uploads/art3.jpg" alt="">
                                <h3> Project 3 </h3>
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod hic consequatur,
                                    voluptatibus
                                    voluptas aliquam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END OUR SERVICES  -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>