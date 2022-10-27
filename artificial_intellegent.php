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
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='مدينة الذكاء الإصطناعي' ORDER BY banner_id DESC LIMIT 1");
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
                    <div class="carousel-caption d-none d-md-block">
                        <img src="uploads/aia.jpg" alt="">
                        <h5 class="animate__animated animate__fadeInUp"> <?php if ($_SESSION['lang'] == 'ar') {
                                                                                echo $banner['banner_head'];
                                                                            } else {
                                                                                echo $banner['banner_head_en'];
                                                                            } ?> </h5>
                        <p class="animate__animated animate__fadeInUp animate__slow">
                            <?php if ($_SESSION['lang'] == 'ar') {
                                echo $banner['banner_desc'];
                            } else {
                                echo $banner['banner_desc_en'];
                            } ?>
                        </p>
                    </div>
                </div>

            <?php
            }
            ?>



            <?php
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='مدينة الذكاء الإصطناعي' ORDER BY banner_id  LIMIT 2");
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
                    <div class="carousel-caption d-none d-md-block">
                        <img src="uploads/aia.jpg" alt="">
                        <h5 class="animate__animated animate__fadeInUp"> <?php if ($_SESSION['lang'] == 'ar') {
                                                                                echo $banners['banner_head'];
                                                                            } else {
                                                                                echo $banners['banner_head_en'];
                                                                            } ?> </h5>
                        <p class="animate__animated animate__fadeInUp animate__slow">
                            <?php if ($_SESSION['lang'] == 'ar') {
                                echo $banners['banner_desc'];
                            } else {
                                echo $banners['banner_desc_en'];
                            } ?>
                        </p>
                    </div>
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
</div>
</div>
<!-- END HERO SECTION -->

<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"> </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <video controls src="" id="video"></video>
                    <!-- <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="" play="false"></iframe>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->
<!-- START ABOUT -->
<div class="about">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h3> <?php echo $lang["index_h2"] ?></h3>
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM revival_about_us WHERE about_page ='مدينة الذكاء الإصطناعي' ORDER BY about_id LIMIT 1 ");
                        $stmt->execute();
                        $allabout = $stmt->fetchAll();
                        foreach ($allabout as $about) {

                            if ($_SESSION["lang"] == "ar") { ?>
                                <p> <?php echo $about["about_desc"] ?> </span> </p>
                            <?php
                            } else { ?>
                                <p> <?php echo $about["about_desc_en"] ?> </span> </p>

                            <?php
                            }
                            ?>


                            <ul class="list-unstyled">
                                <?php
                                if ($_SESSION["lang"] == "ar") {
                                    $learn = $about['about_sub_desc'];
                                } else {
                                    $learn = $about['about_sub_desc_en'];
                                }
                                $learn = explode(",", $learn);
                                $countfile = count($learn) - 1;
                                for ($i = 0; $i < $countfile; ++$i) { ?>

                                    <li><i class="fa fa-star"> </i> <?= $learn[$i] ?></li>
                                <?php
                                }
                                ?>

                            </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-12 about_events" style="background-image: url(admin/upload/<?php echo $about["image1"] ?>) ;">
                    <div class="d-flex align-items-center pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="admin/upload/<?php if ($_SESSION["lang"] == "ar") {
                                                                                                                    echo $about["video1"];
                                                                                                                } else {
                                                                                                                    echo $about["video2"];
                                                                                                                } ?>" data-bs-target="#videoModal">
                            <span></span>
                        </button>

                    </div>
                </div>
            <?php

                        }
            ?>
            </div>
        </div>
    </div>
</div>
<!-- END ABOUT -->
<!-- START EVENT PROGRAME -->
<div class="art_sport_active">
    <div class="container">
        <div class="data">
            <h3 class="text-center"> <?php echo $lang["art_int_head3"] ?></h3>
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="info">
                        <ul class="list-unstyled">
                            <li> <i class="fa fa-mouse"></i> <?php echo $lang["art_int_p2"] ?> </li>
                            <li><i class="fa fa-mouse"></i> <?php echo $lang["art_int_p3"] ?> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <div class="image">
                            <img src="uploads/chip2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END EVENT PROGRAME -->
<!-- START CONTACT SECTION -->
<div class="contact_us">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> <?php echo $lang["art_int_register"] ?></h2>
                <p> <?php echo $lang["art_int_p4"] ?>
                </p>
                <a href="artificial_intellegent_register.php" class="btn button">
                    <?php echo $lang["art_int_register_now"] ?> </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<!-- START VISION SECTION -->
<div class="vision">
    <div class="container">
        <div class="data">
            <div class="row">
                <?php
                $stmt = $connect->prepare("SELECT * FROM  revival_goals WHERE goal_page ='مدينة الذكاء الإصطناعي' ORDER BY goal_id LIMIT 1 ");
                $stmt->execute();
                $allgoals = $stmt->fetchAll();
                foreach ($allgoals as $goal) { ?>
                    <div class="col-lg-4 col-12">
                        <div class="info">
                            <i class="fa-solid fa-bullseye"></i>

                            <?php ?>


                            <?php
                            if ($_SESSION["lang"] == "ar") { ?>
                                <h3> <?php echo $goal["goal_head"] ?> </h3>
                                <p> <?php
                                    $goal_desc = $goal['goal_desc'];
                                    if (strpos($goal_desc, ",")) { ?>
                                <ul class="list-unstyled">
                                    <?php
                                        if ($_SESSION["lang"] == "ar") {
                                            $goal_desc = $goal['goal_desc'];
                                        }
                                        $goal_desc = explode(",", $goal_desc);
                                        $countfile = count($goal_desc) - 1;
                                        for ($i = 0; $i < $countfile; ++$i) { ?>
                                        <li> <span><i class="fa fa-star"></i></span> <?= $goal_desc[$i] ?> </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            <?php
                                    } else {
                                        echo $goal["goal_desc"];
                                    }
                            ?> </p>
                        <?php
                            } else { ?>
                            <h3> <?php echo $goal["goal_head_en"] ?> </h3>
                            <p> <?php echo $goal["goal_desc_en"] ?> </p>
                        <?php
                            }
                        ?>


                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="info">
                            <i class="fa fa-signal"></i>
                            <?php
                            if ($_SESSION["lang"] == "ar") { ?>
                                <h3> <?php echo $goal["vision_head"] ?> </h3>
                                <p> <?php echo $goal["vision_desc"] ?> </p>
                            <?php
                            } else { ?>
                                <h3> <?php echo $goal["vision_head_en"] ?> </h3>
                                <p> <?php echo $goal["vision_desc_en"] ?> </p>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="info">
                            <i class="fa-solid fa-handshake-angle"></i>
                            <?php
                            if ($_SESSION["lang"] == "ar") { ?>
                                <h3> <?php echo $goal["message_head"] ?> </h3>
                                <p> <?php echo $goal["message_desc"] ?> </p>
                            <?php
                            } else { ?>
                                <h3> <?php echo $goal["message_head_en"] ?> </h3>
                                <p> <?php echo $goal["message_desc_en"] ?> </p>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                <?php
                } ?>

            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE SECTION --> 
<?php
include  $tem . 'footer_section.php';
include  $tem . 'footer.php';


?>