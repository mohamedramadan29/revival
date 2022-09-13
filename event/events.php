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
            <div class="carousel-item active">
                <div class="overlay">
                </div>
                <img src="../uploads/event1.jpg" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../uploads/event2.jpg" class="d-block w-100" alt="image2">
            </div>
            <div class="carousel-item">
                <div class="overlay"> </div>
                <img src="../uploads/event3.jpg" class="d-block w-100" alt="image3">
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
    <div class="data container ">
        <h2> <?php echo $lang["event_head1"]; ?></h2>
        <p> </p>
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
                <h3 class="modal-title" id="exampleModalLabel"> Events Video </h3>
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
<div class="about">
    <div class="container">
        <div class="data">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="info">
                        <h3> <?php echo $lang["event_head2"]; ?></h3>
                        <p> <?php echo $lang["event_p1"]; ?> </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12 about_events about_event2">
                    <div class="d-flex align-items-center pt-5">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="uploads/video.mp4"
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

                    <ul class="list-unstyled">
                        <li><i class="fa fa-star"></i><?php echo $lang["event_p2"]; ?>
                        <li><i class="fa fa-star"></i> <?php echo $lang["event_p3"]; ?></li>
                        <li><i class="fa fa-star"></i><?php echo $lang["event_p4"]; ?></li>
                        <li><i class="fa fa-star"></i><?php echo $lang["event_p6"]; ?></li>
                        <li><i class="fa fa-star"></i> <?php echo $lang["event_p7"]; ?> </li>


                    </ul>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="out_team_image">
                        <img src="../uploads/event2.jpg" alt="">
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