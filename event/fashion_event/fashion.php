<?php
ob_start();
session_start();
$fashion_event = 'fashion_event';
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero artif new_artif">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay">
                </div>
                <img src="../../uploads/fash1.jpg" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../../uploads/fash2.jpg" class="d-block w-100" alt="image2">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../../uploads/fash3.jpg" class="d-block w-100" alt="image3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="data container timeout ">
        <img src="../../uploads/logo3.png" alt="">
        <h2> <?php echo $lang["index_h1"]; ?></h2>
        <div class="row time-countdown justify-content-center">
            <div id="clock" class="time-count"></div>
        </div>

        <h2> <?php echo $lang["index_h2"]; ?></h2>

    </div>
</div>
</div>
<!-- END HERO SECTION -->
<!-- START ARTIFICAIL IDEA -->
<div class="idea" id="about_event">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h3> <?php echo $lang["index_h3"]; ?></h3>

                        <p> <?php echo $lang["index_p1"]; ?> </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <img src="../../uploads/fash2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTIFICIAL IDEA -->
<!-- START ARTIFICAIL IDEA -->
<div class="idea">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="info">
                        <h3> <?php echo $lang["index_why_h"]; ?> </h3>

                        <p> <?php echo $lang["index_p2"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTIFICIAL IDEA -->
<!-- START STAT -->
<div class="stat art_state">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="info">
                            <i class="fa fa-address-card"></i>
                            <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">1234</h2>
                            <p> <?php echo $lang["index_h4"]; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="info">
                            <i class="fa-solid fa-heart"></i>
                            <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">60</h2>
                            <p><?php echo $lang["index_h6"]; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="info">
                            <i class="fa fa-users"></i>

                            <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">100</h2>
                            <p> <?php echo $lang["index_h7"]; ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="info">
                            <i class="fa-solid fa-cube"></i>
                            <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">20</h2>
                            <p> <?php echo $lang["index_h8"]; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STAT -->
<!-- START VISION SECTION -->
<div class="vision" id="goals">
    <div class="container">
        <div class="data">
            <h2> <?php echo $lang["index_h9"]; ?></h2>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <i class="fa-solid fa-bullseye"></i>
                        <ul class="list-unstyled">
                            <li> <?php echo $lang["index_p3"]; ?> </li>
                            <li><?php echo $lang["index_p4"]; ?></li>
                            <li> <?php echo $lang["index_p6"]; ?> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <i class="fa-solid fa-bullseye"></i>
                        <ul class="list-unstyled">
                            <li><?php echo $lang["index_p7"]; ?></li>
                            <li><?php echo $lang["index_p8"]; ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE SECTION -->
<!-- START OUR Team  -->
<div class="our_services our_team">
    <div class="container">
        <div class="data">
            <h2> <?php echo $lang["index_h10"]; ?></h2>
            <div class="row info_data">
                <div class="col-lg-6 col-12">

                    <ul class="list-unstyled">
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p10"]; ?>
                        </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p12"]; ?></li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p13"]; ?> </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p14"]; ?></li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p16"]; ?></li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p17"]; ?> </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p18"]; ?></li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["index_p19"]; ?></li>

                    </ul>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="out_team_image">
                        <img src="../../uploads/fash6.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="row" id="speakers">
                <h2> <?php echo $lang["index_h11"]; ?> </h2>
                <div class="col-lg-3">
                    <div class="info">
                        <img class="" src="../../uploads/team1.webp" alt="">
                        <h3> <a href="#"> اريج </a> </h3>

                        <p> مبرمج</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img src="../../uploads/person2.webp" alt="">
                        <h3> <a href="#"> فهد احمد</a> </h3>

                        <p>
                            مصمم</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img src="../../uploads/person3.webp" alt="">
                        <h3> <a href="#"> شيماء محمد </a> </h3>

                        <p> مسوق الكتروني </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img src="../../uploads/person4.webp" alt="">
                        <h3> <a href="#">زين الدين </a> </h3>

                        <p> فنان ابداعي </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OUR Team  -->
<!-- START ARTIFICIAL iNTELLIEGENCE PROJECT -->
<div class="art_filed_main_active">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="info">
                    <h4> <?php echo $lang["index_h12"]; ?> </h4>
                    <ul class="list-unstyled">
                        <li> <i class="fa fa-star"></i> <?php echo $lang["index_p20"]; ?> </li>
                        <li> <i class="fa fa-star"></i> <?php echo $lang["index_p21"]; ?> </li>
                        <li> <i class="fa fa-star"></i> <?php echo $lang["index_p22"]; ?> </li>
                        <li> <i class="fa fa-star"></i> <?php echo $lang["index_p23"]; ?> </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- START OUR SPONSER -->

<section class="ftco-section ftco-no-pt bg-light cars_sections sponser" id="sponser">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2"> <?php echo $lang["index_h13"]; ?> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/ai.png);">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/logo2.png);">
                                </div>

                            </div>
                        </div>
                    </a>
                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/ai2.jpg);">
                                </div>

                            </div>
                        </div>
                    </a>
                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/sport.png);">
                                </div>

                            </div>
                        </div>
                    </a>
                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/ai2.jpg);">
                                </div>

                            </div>
                        </div>
                    </a>

                    <a href="../../index.php">
                        <div class="item">
                            <div class="car-wrap ftco-animate">
                                <div class="img d-flex align-items-end"
                                    style="background-image: url(../../uploads/sport.png);">
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OUR SPONSER -->


<!-- START CONTACT SECTION -->
<div class="contact_us contactus_home">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> <?php echo $lang["index_h14"]; ?> </h2>

                <a href="register.php" class="btn button"> <?php echo $lang["register"]; ?> </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<?php
include '../../' . $tem . 'footer_section.php';
include '../../' . $tem . 'footer.php';


?>