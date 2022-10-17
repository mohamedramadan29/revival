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
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='الرئيسية' ORDER BY banner_id DESC LIMIT 1");
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
            $stmt = $connect->prepare("SELECT * FROM revival_banner WHERE banner_page='الرئيسية' ORDER BY banner_id  LIMIT 2");
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
                        $stmt = $connect->prepare("SELECT * FROM revival_about_us WHERE about_page ='الرئيسية' ORDER BY about_id LIMIT 1 ");
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
                <div class="col-lg-6 col-12 about_events" style="background-image: url(admin/upload/<?php if ($_SESSION["lang"] == "ar") {
                                                                                                        echo $about["image1"];
                                                                                                    } else {
                                                                                                        echo $about["image2"];
                                                                                                    } ?>) ;">
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
<!-- START VISION SECTION -->
<div class="vision">
    <div class="container">
        <div class="data">
            <div class="row">
                <?php
                $stmt = $connect->prepare("SELECT * FROM  revival_goals WHERE goal_page ='الرئيسية' ORDER BY goal_id LIMIT 1 ");
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
                                <p> <?php echo $goal["goal_desc"] ?> </p>
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
<!-- START OUR SERVICES  -->
<div class="our_services">
    <div class="container-fluid">
        <div class="data">
            <h2> <?php echo $lang["index_h3"] ?></h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/header2.jpg" alt="">
                        <p> <?php echo $lang["serv1"] ?> </p>
                        <a href="order_services.php" class="btn button"> <?php echo $lang["order_serv"] ?> </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/fash2.jpg" alt="">
                        <p> <?php echo $lang["serv2"] ?> </p>
                        <a href="order_services.php" class="btn button"> <?php echo $lang["order_serv"] ?> </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/sport3.jpg" alt="">

                        <p> <?php echo $lang["serv3"] ?></p>
                        <a href="order_services.php" class="btn button"> <?php echo $lang["order_serv"] ?> </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END OUR SERVICES  -->
<!-- START OUR Team  -->
<div class="our_services our_team">
    <div class="container">
        <div class="data">
            <h2> <?php echo $lang["import_head"] ?></h2>
            <div class="row info_data">
                <div class="col-lg-6 col-12">
                    <div class="our_team_info">
                        <p> <?php echo $lang["import_p"] ?> </p>
                    </div>
                    <h3><?php echo $lang["target_cat"] ?></h3>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-star"></i> <?php echo $lang["target_gov"] ?> </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["target_com"] ?> </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["target_work"] ?> </li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["target_unmoney"] ?></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="out_team_image">
                        <img src="uploads/services.png" alt="">
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- END OUR Team  -->

<!-- START CARS SECTION -->
<section class="ftco-section ftco-no-pt bg-light event_sections">
    <div class="container">
        <h2> <?php echo $lang["courses"] ?> </h2>
        <div class="row">
            <?php
            $stmt = $connect->prepare("SELECT * FROM courses WHERE course_status = 'active' ORDER BY course_id DESC LIMIT 3");
            $stmt->execute();
            $allcourses = $stmt->fetchAll();
            foreach ($allcourses as $course) { ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="img rounded d-flex align-items-end" style="background-image: url(admin/upload/<?php if ($_SESSION["lang"] == "ar") {
                                                                                                                            echo $course["image2"];
                                                                                                                        } else {
                                                                                                                            echo $course["image3"];
                                                                                                                        }
                                                                                                                        ?>);">
                            </div>
                            <div class="text">
                                <h2 class="mb-0"><a href="#">
                                        <?php
                                        if ($_SESSION["lang"] == "ar") {
                                            echo $course["course_name"];
                                        } else {
                                            echo $course["course_name_en"];
                                        }
                                        ?>
                                    </a></h2>
                                <div class="mb-3">
                                    <span class="cat"> <?php echo $course["course_place"] ?></span>
                                </div>
                                <div class="d-flex mb-0 justify-content-between prop">
                                    <ul class="list-unstyled">
                                        <li> <?php echo $lang["course_head3"] ?>: </li>
                                        <li> <?php echo $lang["course_head4"] ?> : </li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li> <?php echo $course["course_num_days"] ?> ايام </li>
                                        <li> <?php echo $course["course_constructor"] ?> </li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between mb-0 check">
                                    <div> <span> <?php echo $lang["course_head6"] ?> </span>
                                        <h6> <?php echo $course["course_price"] ?> $ </h6>
                                    </div>
                                    <div>
                                        <a href="course_details.php?course_id=<?php echo $course["course_id"] ?>" class="btn button">
                                            <?php echo $lang["course_button"] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <a href="courses.php" class="btn button show_course_button"> <?php echo $lang["watch_course"] ?></a>
        </div>
    </div>
</section>
<!-- END CAR SECTIONS -->
<!-- START STAT -->
<div class="stat">
    <div class="container">
        <div class="data">
            <div class="row"> 
                <div class="col-lg-3 col-6">
                    <div class="info">
                        <i class="fa fa-shirt"></i>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">934</h2>
                        <p> <?php echo $lang["fash_talent"] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info">
                        <i class="fa-solid fa-futbol"></i>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">621</h2>
                        <p> <?php echo $lang["sport_talent"] ?> </p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info">
                        <i class="fa fa-brain"></i>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">123</h2>
                        <p><?php echo $lang["art_talent"] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="info">
                        <i class="fa-solid fa-users"></i>
                        <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">87</h2>
                        <p> <?php echo $lang["index_instructor"] ?> </p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- END STAT -->
<!-- START ARTICLES  
<div class="articles">
    <div class="container-fluid">
        <div class="data">
            <h2> المقالات </h2>
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="uploads/fashion2.jpg" alt="">
                        </div>

                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="uploads/fashion.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="uploads/header4.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="uploads/header2.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTICLES -->
<!-- START NEW NEWS DESIGN -->

<div class="new_articles_design">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <h2> <?php echo $lang["last_news"] ?></h2>
                <div class="carousel-item active">
                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_news_sport"] ?></h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM news WHERE new_category = 'sport' ORDER BY new_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["new_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?> <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["new_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?>
                                                <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="news.php?cat=sport">
                                    <?php echo $lang["read_more_sport"] ?> </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_news_art"] ?> </h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM news WHERE new_category = 'art_int' ORDER BY new_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["new_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?>
                                                <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["new_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?>
                                                <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>

                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="news.php?cat=art_int">
                                    <?php echo $lang["read_more_art"] ?> </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_news_fash"] ?></h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM news WHERE new_category = 'fashion' ORDER BY new_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["new_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?>
                                                <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["new_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?> <a href="new_new.php?new_id=<?php echo $sport_new["new_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>

                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="news.php?cat=fashion">
                                    <?php echo $lang["read_more_fash"] ?></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- END NEW NEWS DESIGN -->

<!-- START IMAGE GALARY -->
<div class="image_gallary">
    <div class="container">
        <div class="top">
            <ul>
                <?php
                $stmt = $connect->prepare("SELECT * FROM revival_gallary");
                $stmt->execute();
                $allimages = $stmt->fetchAll();
                foreach ($allimages as $image) { ?>
                    <li><a href="#<?php echo $image["image1"]; ?>"><img src="admin/upload/<?php echo $image["image1"]; ?>"></a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <?php
            foreach ($allimages as $image) { ?>
                <a href="#_1" class="lightbox trans" id="<?php echo $image["image1"]; ?>"><img src="admin/upload/<?php echo $image["image1"]; ?>"></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- END IMAGE GALARY -->
<!-- START NEW ARTICLES DESIGN -->

<div class="new_articles_design">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <h2> <?php echo $lang["last_articles"] ?></h2>
                <div class="carousel-item active">
                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_article_sport"] ?></h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM articles WHERE article_category = 'sport' ORDER BY article_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["article_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?> <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["article_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?>
                                                <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="articles.php?cat=sport">
                                    <?php echo $lang["read_more_sport"] ?> </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_article_art"] ?></h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM articles WHERE article_category = 'art_int' ORDER BY article_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["article_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?> <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["article_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?>
                                                <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="articles.php?cat=art_int">
                                    <?php echo $lang["read_more_art"] ?> </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="data">
                        <div class="row">
                            <h4> <?php echo $lang["last_article_fash"] ?></h4>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM articles WHERE article_category = 'fashion' ORDER BY article_id DESC LIMIT 3 ");
                            $stmt->execute();
                            $allsportnews = $stmt->fetchAll();
                            foreach ($allsportnews as $sport_new) {
                                if ($_SESSION["lang"] == "ar") { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image1"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_ar =  $sport_new["article_desc"];
                                            ?>
                                            <p> <?php echo substr($desc_ar, 0, 100); ?> <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?> </a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="col-lg-4">
                                        <div class="art_info">
                                            <div class="image">
                                                <img src="admin/upload/<?php echo $sport_new["image2"] ?>" alt="">
                                            </div>
                                            <?php
                                            $desc_en =  $sport_new["article_desc_en"];
                                            ?>
                                            <p> <?php echo substr($desc_en, 0, 100); ?>
                                                <a href="article.php?article_id=<?php echo $sport_new["article_id"] ?>">
                                                    <?php echo $lang["read_more"] ?></a>
                                            </p>

                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="read_more">
                            <button class="btn button"> <a href="articles.php?cat=fashion">
                                    <?php echo $lang["read_more_fash"] ?> </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- END NEW ARTICLES DESIGN -->
<!-- START CONTACT SECTION -->
<div class="contact_us contactus_home">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> <?php echo $lang["why_revival"] ?></h2>
                <p> <?php echo $lang["why_revival_p"] ?> </p>
                <h3> <?php echo $lang["register_in_revival"] ?></h3>

                <a href="revival_register.php" class="btn button"> <?php echo $lang["register_now"] ?> </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>