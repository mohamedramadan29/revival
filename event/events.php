<?php
ob_start();
session_start();
$eventpage = 'event';
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="hero artif">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $stmt = $connect->prepare("SELECT * FROM event_home_banner ORDER BY banner_id DESC LIMIT 1");
            $stmt->execute();
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
                </div>
            <?php
            }
            ?>



            <?php
            $stmt = $connect->prepare("SELECT * FROM event_home_banner ORDER BY banner_id  LIMIT 2");
            $stmt->execute();
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
    <div class="data container ">
        <?php
        $stmt = $connect->prepare("SELECT * FROM event_home_banner ORDER BY banner_id  LIMIT 1");
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
                        $stmt = $connect->prepare("SELECT * FROM event_home_about  ORDER BY about_id LIMIT 1 ");
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
                <div class="col-lg-6 col-12 about_events" style="background-image: url(../admin_event/upload/<?php if ($_SESSION["lang"] == "ar") {
                                                                                                                    echo $about["image1"];
                                                                                                                } else {
                                                                                                                    echo $about["image2"];
                                                                                                                } ?>) ;">
                    <div class="d-flex align-items-center pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="../admin_event/upload/<?php if ($_SESSION["lang"] == "ar") {
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
<!-- START ABOUT THREE EVENT -->
<div class="about_three_event">
    <div class="container">
        <div class="data">
            <h3> <?php echo $lang["event_head3"]; ?> </h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                        <img src="../uploads/art3.jpg" alt="">
                        <h2><?php echo $lang["event_head7"]; ?></h2>
                        <p> <?php echo $lang["exhiption_p1"]; ?> </p>
                        <a href="artifiicial_event/artificial.php" class="btn button">
                            <?php echo $lang["event_button"]; ?> </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="../uploads/fashion.jpg" alt="">
                        <h2> <?php echo $lang["event_head9"]; ?></h2>
                        <p> <?php echo $lang["exhiption_p2"]; ?> </p>
                        <a href="fashion_event/fashion.php" class="btn button"> <?php echo $lang["event_button"]; ?></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="../uploads/sport2.jpg" alt="">
                        <h2> <?php echo $lang["event_head8"]; ?> </h2>
                        <p> <?php echo $lang["exhiption_p3"]; ?> </p>
                        <a href="sport_talent_event/talent.php" class="btn button">
                            <?php echo $lang["event_button"]; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START OUR Team  -->
<div class="our_services our_team">
    <div class="container">
        <div class="data">
            <h2> <?php echo $lang["event_head4"]; ?> </h2>
            <div class="row info_data">
                <div class="col-lg-6 col-12">

                    <?php
                    $stmt = $connect->prepare("SELECT * FROM event_home_reason  ORDER BY reason_id LIMIT 1 ");
                    $stmt->execute();
                    $allabout = $stmt->fetchAll();
                    foreach ($allabout as $about) { ?>
                        <ul class="list-unstyled">
                            <?php
                            if ($_SESSION["lang"] == "ar") {
                                $learn = $about['reasons'];
                            } else {
                                $learn = $about['reasons_en'];
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
                        foreach ($allabout as $about) { ?>
                            <img src="../admin_event/upload/<?php echo $about["reason_image"]; ?>" alt="">

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END OUR Team  -->
<!-- START CONTACT SECTION -->
<div class="contact_us contactus_home">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2> <?php echo $lang["event_head6"]; ?> </h2>
                <p> <?php echo $lang["event_p8"]; ?> </p>

            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<?php
include '../' . $tem . 'footer_section.php';
include '../' . $tem . 'footer.php';


?>