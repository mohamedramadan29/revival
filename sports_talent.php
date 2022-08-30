<?php
ob_start();
session_start();
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero artif">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='مواهب العالم الرياضية' ORDER BY banner_id DESC LIMIT 1");
            $stmt->execute();
            $allbanner = $stmt->fetchAll();
            foreach ($allbanner as $banner) { ?>
            <div class="carousel-item active">
                <div class="overlay">
                </div>

                <img src="admin/upload/<?php
                                            if ($_SESSION["lang"] == "ar") {
                                                echo $banner["image1"];
                                            } else {
                                                echo $banner["image2"];
                                            }
                                            ?>
                " class="d-block w-100" alt="image1">
            </div>
            <?php
            }
            ?>



            <?php
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='مواهب العالم الرياضية' ORDER BY banner_id  LIMIT 2");
            $stmt->execute();
            $allbanners = $stmt->fetchAll();
            foreach ($allbanners as $banners) { ?>
            <div class="carousel-item">
                <div class="overlay">
                </div>

                <img src="admin/upload/<?php
                                            if ($_SESSION["lang"]  == "ar") {
                                                echo $banners["image1"];
                                            } else {
                                                echo $banners["image2"];
                                            }
                                            ?>
                " class="d-block w-100" alt="image1">
            </div>
            <?php
            }
            ?>

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

    <div class="data container data_logo">
        <img src="uploads/sport.png" alt="">
        <?php
        $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='مواهب العالم الرياضية' ORDER BY banner_id  LIMIT 1");
        $stmt->execute();
        $allbanners = $stmt->fetchAll();
        foreach ($allbanners as $banners) { ?>
        <h2>
            <?php
                if ($_SESSION["lang"] == "ar") {
                    echo $banners["banner_head"];
                } else {
                    echo $banners["banner_head_en"];
                }
                ?>
        </h2>
        <p>
            <?php
                if ($_SESSION["lang"] == "ar") {
                    echo $banners["banner_desc"];
                } else {
                    echo $banners["banner_desc_en"];
                }
                ?>
        </p>

        <?php
        } ?>

    </div>
</div>
</div>
<!-- END HERO SECTION -->

<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"> شركه ريفايفال </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->
<!-- START ABOUT -->
<div class="about about_talent">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h3> <?php echo $lang["sport_int_head2"] ?></h3>
                        <p> <?php echo $lang["sport_int_p1"] ?></p>

                    </div>
                </div>
                <div class="col-lg-6 col-12 about_events">
                    <div class="d-flex align-items-center pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="../uploads/video.mp4"
                            data-bs-target="#videoModal">
                            <span></span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT -->

<!-- START CONTACT SECTION -->
<div class="contact_us sport_talent_register">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> <?php echo $lang["sport_int_register"] ?></h2>
                <p> <?php echo $lang["sport_int_p4"] ?>
                </p>
                <a href="sport_talent_register.php" class="btn button"><?php echo $lang["sport_int_register_now"] ?></a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<!-- START VISION SECTION 
<div class="vision">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa-solid fa-bullseye"></i>
                        <h3> <?php echo $lang["sport_int_head4"] ?> </h3>
                        <ul class="list-unstyled">
                            <li> <?php echo $lang["sport_int_goal1"] ?> </li>
                            <li> <?php echo $lang["sport_int_goal2"] ?></li>
                            <li> <?php echo $lang["sport_int_goal3"] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa fa-signal"></i>
                        <h3> <?php echo $lang["sport_int_head6"] ?> </h3>
                        <p> <?php echo $lang["sport_int_vision"] ?> </p>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="info">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <h3> <?php echo $lang["sport_int_head7"] ?> </h3>
                        <p> <?php echo $lang["sport_int_message"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!-- END MESSAGE SECTION -->

<!-- START ARTIFICIAL iNTELLIEGENCE PROJECT -->
<section class="ftco-section ftco-no-pt bg-light cars_sections art_sub_projects">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <h2 class="mb-2"> <?php echo $lang["sport_int_project"] ?> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport2.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport3.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport1.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="car-wrap ftco-animate">
                            <div class="img d-flex align-items-end" style="background-image: url(uploads/sport3.jpg);">
                            </div>
                            <div class="text">
                                <h3 class="mb-0"><a href="project_details.php"> الموهبة #1 </a></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="all-vec">
                <a href="artificial_project.php" class="btn text-center button m-auto">
                    <?php echo $lang["sport_int_all_project"] ?></a>
            </div>
        </div>
    </div>
</section>
<!-- START ARTIFICIAL iNTELLIEGENCE PROJECT -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>