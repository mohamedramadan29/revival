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
                <img src="uploads/sport3.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> <?php echo $lang["talent_project_h1"]; ?> </h2>
    </div>
</div>
</div>
<!-- END HERO SECTION -->

<!-- START OUR SERVICES  -->
<div class="our_services">
    <div class="container-fluid">
        <div class="data">
            <h2><?php echo $lang["talent"]; ?></h2>
            <div class="row">
                <div class="col-lg-3">
                    <h2> <?php echo $lang["category"]; ?> </h2>
                    <div class="form-group">
                        <div class="exhibition_cat">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="all">
                                <label class="form-check-label" for="all">
                                    <?php echo $lang["watch_all_cat"]; ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check1">
                                <label class="form-check-label" for="check1">
                                    <?php echo $lang["programming"]; ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check2" checked>
                                <label class="form-check-label" for="check2">
                                    <?php echo $lang["chemstry"]; ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check3" checked>
                                <label class="form-check-label" for="check3">
                                    <?php echo $lang["metav"]; ?>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport.png" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport1.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport6.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sprot4.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport3.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport2.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info">
                                <img src="uploads/sport3.jpg" alt="">
                                <h3> <?php echo $lang["talent"]; ?> #1 </h3>
                                <p> كن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت
                                    وسأعرض قيقة وأساس تلك </p>
                                <a href="project_details.php" class="btn button">
                                    <?php echo $lang["watch_talent"]; ?></a>
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