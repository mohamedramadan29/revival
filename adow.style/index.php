<?php
ob_start();
session_start();
$artificial_event = 'artificial_event';
include 'init.php';
    $event_id = 4;
    //  echo $event_id;
    $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
    $stmt->execute(array($event_id));
    $event_data = $stmt->fetch();
    $event_name = $event_data["event_name"];
    //echo $event_name;
 
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

                    <img src="../admin_event/upload/<?php
                                                        if ($_SESSION["lang"] == "ar") {
                                                            echo $banner["image1"];
                                                        } else {
                                                            echo $banner["image2"];
                                                        }
                                                        ?>
                " class="d-block w-100" alt="image1">
                    <div class="carousel-caption d-none d-md-block">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
                        $stmt->execute(array($event_id));
                        $event_logo = $stmt->fetch();

                        ?>
                        <img src="../admin_event/upload/<?php echo $event_logo["event_logo"]; ?>" alt="">
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
            $stmt = $connect->prepare("SELECT * FROM event_banner WHERE banner_page=? ORDER BY banner_id  LIMIT 2");
            $stmt->execute(array($event_name));
            $allbanners = $stmt->fetchAll();
            foreach ($allbanners as $banners) { ?>
                <div class="carousel-item">
                    <div class="overlay">
                    </div>

                    <img src="../admin_event/upload/<?php
                                                        if ($_SESSION["lang"]  == "ar") {
                                                            echo $banners["image1"];
                                                        } else {
                                                            echo $banners["image2"];
                                                        }
                                                        ?>
                " class="d-block w-100" alt="image1">
                    <div class="carousel-caption d-none d-md-block">
                        <img src="../admin_event/upload/<?php echo $event_logo["event_logo"]; ?>" alt="">
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
<!-- START COUNT DOWN -->
<?php
$stmt = $connect->prepare("SELECT * FROM main_events WHERE event_id=?");
$stmt->execute(array($event_id));
$res = $stmt->fetch();
$date = $res['event_date'];
$time = $res['event_time'];
?>
<div class="counter_down">
    <div class="container">
        <div class="data">
            <h2><?php echo $lang['estimat_time'] ?></h2>
            <div class="info">
                <div id="days_time"></div> </span>
                <div id="hours_time"></div>
                <div id="minut_time"></div>
                <div id="second_time"></div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 d-none">
    <div class="row">
        <div class="col-md-12 mt-40">
            <div class="" style="height: 400px;">
                <div class="">
                    <h2> الوقت المتبقي لانطلاق الفاعلية </h2>
                </div>
                <div class="pt-5">
                    <h1 id="counter" class="text-center mt-5 m-auto p-3"></h1>
                </div>
                <div>
                    <h2 id="days"> Days </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script -->
<script>
    <?php
    $data = strtotime($date);
    $getDate = date("F d, Y", $data);
    ?>
    var countDownDate = new Date("<?php echo "$getDate $time"; ?>").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="counter"11
       
        document.getElementById("days").innerHTML = days + "Day : ";
        document.getElementById("days_time").innerHTML = days + "<?= $lang['day'] ?>";
        document.getElementById("hours_time").innerHTML = hours + "<?= $lang['hour'] ?>";
        document.getElementById("minut_time").innerHTML = minutes + "<?= $lang['minute'] ?>";
        document.getElementById("second_time").innerHTML = seconds + "<?= $lang['second'] ?>";
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

<!--  END COUNT DOWN  -->
<!-- START ARTIFICAIL IDEA -->
<div class="idea" id="about_event_id">
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
                            if (!empty($data["about_sub_desc"])) { ?>
                                <ul class="list-unstyled">
                                    <?php
                                    if ($_SESSION["lang"] == "ar") {
                                        $learn = $data['about_sub_desc'];
                                    } else {
                                        $learn = $data['about_sub_desc_en'];
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
                        }
                        ?>
                    </div>


                </div>
                <!--
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM event_about_us WHERE about_page=?");
                        $stmt->execute(array($event_name));
                        $allbanners = $stmt->fetchAll();
                        foreach ($allbanners as $data) {
                            if ($_SESSION["lang"] == "ar") { ?>
                                <img src="../admin_event/upload/<?php echo $data["image1"]; ?>" alt="">
                            <?php
                            } else { ?>
                                <img src="../admin_event/upload/<?php echo $data["image2"]; ?>" alt="">
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                    -->
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
                            <img src="../admin_event/upload/<?php echo $about["taret_image"]; ?>" alt="">
                            <?php
                            ?>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="main_event_speaker">
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-car owl-carousel">
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM event_speaker WHERE event_page=?");
                            $stmt->execute(array($event_name));
                            $about_event = $stmt->fetchAll();
                            foreach ($about_event as $about) { ?>
                                <a href="">
                                    <div class="item">
                                        <div class="car-wrap ftco-animate">
                                            <div class="img d-flex align-items-end" style="background-image: url(../admin_event/upload/<?php if ($_SESSION['lang'] == 'ar') {
                                                                                                                                                echo $about["image1"];
                                                                                                                                            } else {
                                                                                                                                                echo $about["image2"];
                                                                                                                                            } ?>);">
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3> <?php
                                                    if ($_SESSION['lang'] == 'ar') {
                                                        echo $about["speaker_name"];
                                                    } else {
                                                        echo $about["speaker_name_en"];
                                                    }
                                                    ?> </h3>
                                            <p> <?php
                                                if ($_SESSION['lang'] == 'ar') {
                                                    echo $about["speaker_jop"];
                                                } else {
                                                    echo $about["speaker_jop_en"];
                                                }
                                                ?> </p>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
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
                                    <div class="img d-flex align-items-end" style="background-image: url(../admin_event/upload/<?php if ($_SESSION['lang'] == 'ar') {
                                                                                                                                        echo $about["image1"];
                                                                                                                                    } else {
                                                                                                                                        echo $about["image2"];
                                                                                                                                    } ?>);">
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
                            <img src="../uploads/art1.jpg" alt="">
                        </div>

                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art2.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art3.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art_state.jpg" alt="">
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
                            <img src="../uploads/art1.jpg" alt="">
                        </div>

                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art2.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art3.jpg" alt="">
                        </div>
                        <p>ببساطة كوادر مميزة تتكون من نخبة من المواهب من مختلف الدول تعمل في تطوير مشروع ابداعي ومبتكر
                            في مختلف المجالات </p>
                        <button class="btn btn-primary"> <a href="article.php"> قراءة المزيد </a> </button>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="art_info">
                        <div class="image">
                            <img src="../uploads/art_state.jpg" alt="">
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

                <a href="register.php?event_id=<?php echo $event_id; ?> " class="btn button"> <?php echo $lang["register"]; ?> </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->


<?php
include '../' . $tem . 'footer_section.php';
include '../' . $tem . 'footer.php';

?>