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
                <img src="uploads/art2.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> <?php echo $lang["exhiption_head1"]; ?> </h2>
        <p> <?php echo $lang["exhiption_head2"]; ?></p>
    </div>
</div>
</div>
<!-- END HERO SECTION -->

<!-- START OUR SERVICES  -->
<div class="our_services">
    <div class="container-fluid">
        <div class="data">
            <h2> <?php echo $lang["exhiption_head1"]; ?> </h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/header2.jpg" alt="">
                        <h3> <?php echo $lang["exhiption_head3"]; ?></h3>
                        <p> <?php echo $lang["exhiption_p1"]; ?></p>
                        <a href="talent_project.php" class="btn button">
                            <?php echo $lang["exhiption_button"]; ?></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/fashion.jpg" alt="">
                        <h3><?php echo $lang["exhiption_head4"]; ?></h3>
                        <p> <?php echo $lang["exhiption_p2"]; ?> </p>
                        <a href="talent_project.php" class="btn button"> <?php echo $lang["exhiption_button"]; ?> </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <img src="uploads/sport.jpg" alt="">
                        <h3> <?php echo $lang["exhiption_head6"]; ?></h3>
                        <p> <?php echo $lang["exhiption_p3"]; ?></p>
                        <a href="talent_project.php" class="btn button"> <?php echo $lang["exhiption_button"]; ?></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END OUR SERVICES  -->
<!-- START CONTACT SECTION -->
<div class="contact_us">
    <div class="overlay">
        <div class="container">
            <div class="data">
                <h2><?php echo $lang["exhiption_head7"]; ?> </h2>
                <p>
                    <?php echo $lang["exhiption_p4"]; ?>
                </p>
                <a href="contact.php" class="btn button"> <?php echo $lang["exhiption_contact"]; ?> </a>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT SECTION -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>