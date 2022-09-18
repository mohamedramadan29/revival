<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    //  echo $event_id;

    $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
    $stmt->execute(array($event_id));
    $event_data = $stmt->fetch();
    $event_name = $event_data["event_name"];
    //echo $event_name;
}
?>
<!-- START HERO SECTION -->
<div class="hero artif new_artif">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $stmt = $connect->prepare("SELECT * FROM event_banner WHERE banner_page=? ORDER BY banner_id DESC LIMIT 1");
            $stmt->execute(array($event_name));
            $allbanner = $stmt->fetchAll();
            foreach ($allbanner as $banner) { ?>
                <div class="carousel-item active">
                    <div class="overlay">
                    </div>

                    <img src="../../admin_event/upload/<?php
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
            $stmt = $connect->prepare("SELECT * FROM event_banner WHERE banner_page=? ORDER BY banner_id  LIMIT 2");
            $stmt->execute(array($event_name));
            $allbanners = $stmt->fetchAll();
            foreach ($allbanners as $banners) { ?>
                <div class="carousel-item">
                    <div class="overlay">
                    </div>

                    <img src="../../admin_event/upload/<?php
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
    <div class="data container timeout ">
        <img src="../../uploads/logo3.png" alt="">
        <h2> <?php echo $lang["index_h1"]; ?></h2>
        <div class="row time-countdown justify-content-center">
            <div id="clock" class="time-count"></div>
        </div>
        <h2> <?php echo $event_data["event_name"]; ?> </h2>
    </div>
</div>
</div>
<!-- END HERO SECTION -->
<!-- START ARTIFICAIL IDEA -->
<div class="idea" id="about_event_id">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="info">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM event_about_us WHERE about_page=?");
                        $stmt->execute(array($event_name));
                        $allbanners = $stmt->fetchAll();
                        foreach ($allbanners as $data) {
                            $about_desc = $data["about_desc"];
                            $about_desc_en = $data["about_desc_en"];
                        ?>
                            <h3> <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        echo $data["about_name"];
                                    } else {
                                        echo $data["about_name_en"];
                                    }
                                    ?>
                            </h3>
                            <p> <?php
                                if ($_SESSION["lang"] == "ar") {
                                    echo substr($about_desc, 0, 700);
                                } else {
                                    echo substr($about_desc_en, 0, 700);
                                }
                                ?> </p>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM event_about_us WHERE about_page=?");
                        $stmt->execute(array($event_name));
                        $allbanners = $stmt->fetchAll();
                        foreach ($allbanners as $data) {
                            if ($_SESSION["lang"] == "ar") { ?>
                                <img src="../../admin_event/upload/<?php echo $data["image1"]; ?>" alt="">
                            <?php
                            } else { ?>
                                <img src="../../admin_event/upload/<?php echo $data["image2"]; ?>" alt="">
                        <?php
                            }
                        }
                        ?>
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
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM event_about_us WHERE about_page=?");
                        $stmt->execute(array($event_name));
                        $allbanners = $stmt->fetchAll();
                        foreach ($allbanners as $data) {
                            $about_desc = $data["about_desc"];
                            $about_desc_en = $data["about_desc_en"];
                        ?>
                            <h3> <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        echo $data["about_name"];
                                    } else {
                                        echo $data["about_name_en"];
                                    }
                                    ?>
                            </h3>
                            <p> <?php
                                if ($_SESSION["lang"] == "ar") {
                                    echo $about_desc;
                                } else {
                                    echo $about_desc_en;
                                }
                                ?> </p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTIFICIAL IDEA -->

<!-- WHY AVIR SECTION -->
<div class="why_avir">
    <div class="container">
        <?php
        $stmt = $connect->prepare("SELECT * FROM addition_section WHERE event_page=? ORDER BY add_id LIMIT 2");
        $stmt->execute(array($event_name));
        $allbanners = $stmt->fetchAll();
        foreach ($allbanners as $data) { ?>
            <div class="data">
                <h2> <?php
                        if ($_SESSION["lang"] == "ar") {
                            echo $data["add_name"];
                        } else {
                            echo $data["add_name_en"];
                        }
                        ?> </h2>
                <?php
                if (!empty($data["add_desc"])) { ?>
                    <p> <?php

                        if ($_SESSION["lang"] == "ar") {
                            echo $data["add_desc"];
                        } else {
                            echo $data["add_desc_en"];
                        }
                        ?>
                    </p>
                <?php
                }
                if (!empty($data["add_sub_desc"])) { ?>
                    <ul class="list-unstyled">
                        <?php
                        if ($_SESSION["lang"] == "ar") {
                            $learn = $about['add_sub_desc'];
                        } else {
                            $learn = $about['add_sub_desc_en'];
                        }
                        $learn = explode(",", $learn);
                        $countfile = count($learn) - 1;
                        for ($i = 0; $i < $countfile; ++$i) { ?>
                            <li><i class="fa fa-star"> </i> <?= $learn[$i] ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>

            </div>
        <?php
        } ?>


    </div>

</div>
<!-- END WHY AVIR SECTION -->
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
                            <p> <?php echo $lang["index_h4"]; ?> </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="info">
                            <i class="fa-solid fa-heart"></i>
                            <h2 class="text-primary fw-bold mb-0" data-toggle="counter-up">60</h2>
                            <p> <?php echo $lang["index_h6"]; ?></p>
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

<!-- START OUR Team  -->
<div class="our_services our_team" id="kind">
    <div class="container">
        <div class="data">
            <h2> <?php echo $lang["index_h10"]; ?> </h2>
            <div class="row info_data">
                <div class="col-lg-6 col-12">
                    <?php
                    $stmt = $connect->prepare("SELECT * FROM target_category WHERE event_page=?");
                    $stmt->execute(array($event_name));
                    $about_event = $stmt->fetchAll();
                    foreach ($about_event as $about) { ?>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $about['target_category'];
                            } else {
                                $learn = $about['target_category_en'];
                            }
                            $learn = explode(",", $learn);
                            $countfile = count($learn) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                                <li><i class="fa fa-star"> </i> <?= $learn[$i] ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="out_team_image">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM target_category WHERE event_page=?");
                        $stmt->execute(array($event_name));
                        $about_event = $stmt->fetchAll();
                        foreach ($about_event as $about) { ?>
                            <img src="../../admin_event/upload/<?php echo $about["taret_image"]; ?>" alt="">
                            <?php
                            ?>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="row" id="speakers">
                <h2> <?php echo $lang["index_h11"]; ?> </h2>
                <?php
                $stmt = $connect->prepare("SELECT * FROM event_speaker WHERE event_page=?");
                $stmt->execute(array($event_name));
                $about_event = $stmt->fetchAll();
                foreach ($about_event as $about) { ?>
                    <div class="col-lg-3">
                        <div class="info">
                            <img class="" src="../../admin_event/upload/<?php echo $about["image1"]; ?>" alt="">
                            <h3> <a href="#"> <?php echo $about["speaker_name"]; ?> </a> </h3>
                            <p> <?php echo $about["speaker_jop"]; ?> </p>
                        </div>
                    </div>
                    <?php
                    ?>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END OUR Team  -->
<!-- START VISION SECTION -->
<div class="vision" id="vision">
    <div class="container">
        <div class="data">
            <div class="row">
                <?php
                $stmt = $connect->prepare("SELECT * FROM event_goals WHERE goal_page=?");
                $stmt->execute(array($event_name));
                $about_event = $stmt->fetchAll();
                foreach ($about_event as $about) {
                    $goal_head = $about["goal_head"];
                    if (!empty($goal_head)) { ?>
                        <div class="col-lg-4 col-12">
                            <div class="info">
                                <i class="fa-solid fa-bullseye"></i>
                                <h3> <?php
                                        if ($_SESSION["lang"] == "ar") {
                                            echo $about["goal_head"];
                                        } else {
                                            echo $about["goal_head_en"];
                                        }
                                        ?> </h3>

                                <ul class="list-unstyled">
                                    <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        $learn = $about['goal_desc'];
                                    } else {
                                        $learn = $about['goal_desc_en'];
                                    }
                                    $learn = explode(",", $learn);
                                    $countfile = count($learn) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                        <li> <span><i class="fa fa-star"></i></span> </i> <?= $learn[$i] ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                    <?php
                    $vision_head = $about["vision_head"];
                    if (!empty($goal_head)) { ?>

                        <div class="col-lg-4 col-12">
                            <div class="info">
                                <i class="fa fa-signal"></i>
                                <h3> <?php
                                        if ($_SESSION["lang"] == "ar") {
                                            echo $about["vision_head"];
                                        } else {
                                            echo $about["vision_head_en"];
                                        }
                                        ?> </h3>
                                <p> <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        echo $about["vision_desc"];
                                    } else {
                                        echo $about["vision_desc_en"];
                                    }
                                    ?> </p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    $message_head = $about["message_head"];
                    if (!empty($message_head)) { ?>
                        <div class="col-lg-4 col-12">
                            <div class="info">
                                <i class="fa-solid fa-handshake-angle"></i>
                                <h3> <?php
                                        if ($_SESSION["lang"] == "ar") {
                                            echo $about["message_head"];
                                        } else {
                                            echo $about["message_head_en"];
                                        }
                                        ?> </h3>
                                <p> <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        echo $about["message_desc"];
                                    } else {
                                        echo $about["message_desc_en"];
                                    }
                                    ?> </p>
                            </div>
                        </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE SECTION -->

<!-- START CONTACT SECTION -->
<!-- WHY AVIR SECTION -->
<div class="why_avir">
    <div class="container">
        <?php
        $stmt = $connect->prepare("SELECT * FROM addition_section WHERE event_page=? ORDER BY add_id DESC LIMIT 2");
        $stmt->execute(array($event_name));
        $allbanners = $stmt->fetchAll();
        foreach ($allbanners as $data) { ?>
            <div class="data">
                <h2> <?php
                        if ($_SESSION["lang"] == "ar") {
                            echo $data["add_name"];
                        } else {
                            echo $data["add_name_en"];
                        }
                        ?> </h2>
                <?php
                if (!empty($data["add_desc"])) { ?>
                    <p> <?php

                        if ($_SESSION["lang"] == "ar") {
                            echo $data["add_desc"];
                        } else {
                            echo $data["add_desc_en"];
                        }
                        ?>
                    </p>
                <?php
                }
                if (!empty($data["add_sub_desc"])) { ?>
                    <ul class="list-unstyled">
                        <?php
                        if ($_SESSION["lang"] == "ar") {
                            $learn = $data['add_sub_desc'];
                        } else {
                            $learn = $data['add_sub_desc_en'];
                        }
                        $learn = explode(",", $learn);
                        $countfile = count($learn) - 1;
                        for ($i = 0; $i < $countfile; ++$i) { ?>
                            <li><i class="fa fa-star"> </i> <?= $learn[$i] ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>

            </div>
        <?php
        } ?>


    </div>

</div>
<!-- END WHY AVIR SECTION -->
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

                    <?php
                    $stmt = $connect->prepare("SELECT * FROM event_sponser WHERE event_page=?");
                    $stmt->execute(array($event_name));
                    $about_event = $stmt->fetchAll();
                    foreach ($about_event as $about) { ?>
                        <a href="<?php echo $about["sponser_link"]; ?>">
                            <div class="item">
                                <div class="car-wrap ftco-animate">
                                    <div class="img d-flex align-items-end" style="background-image: url(../../admin_event/upload/<?php echo $about["image1"]; ?>);">
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OUR SPONSER -->
<!-- START NEW NEWS DESIGN -->
<!-- START ARTICLES  -->
<div class="articles d-none">
    <div class="container-fluid">
        <div class="data">
            <h2> الاخبار </h2>
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art1.jpg" alt="">
                        </div>

                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art2.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art3.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art_state.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="read_more">
                    <button class="btn button"> <a href="articles.php"> المزيد </a> </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ARTICLES -->
<!-- START NEWS  -->
<div class="articles d-none">
    <div class="container-fluid">
        <div class="data">
            <h2> المقالات </h2>
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art1.jpg" alt="">
                        </div>

                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art2.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art3.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../../uploads/art_state.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="read_more">
                    <button class="btn button"> <a href="articles.php"> المزيد </a> </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END NEW NEWS DESIGN -->
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