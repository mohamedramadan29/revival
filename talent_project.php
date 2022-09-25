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
            <h2><?php echo $lang["our_talent"]; ?></h2>
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
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM sport_register WHERE user_show='نعم'");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $alltalent_register = $stmt->fetchAll();
                        foreach ($alltalent_register as $talent) { ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                    <h3> <?php echo $talent['first_name2'] ?> # <?php echo  $talent['sport_register_id']; ?> </h3>
                                    <p> <?php
                                        $exp_info = $talent['experience_info'];
                                        $exp = substr($exp_info, 0, 150);
                                        echo $exp; ?> <?php echo " ... ";  ?> </p>
                                    <a href="project_details_sport.php?cat=sport&talent_id=<?php echo $talent['sport_register_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="row">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM company_register
                        WHERE user_show='نعم' AND cat_name='sport'");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $alltalent_register = $stmt->fetchAll();
                        foreach ($alltalent_register as $talent) { ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                    <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['reg_id']; ?> </h3>
                                    <p> <?php
                                        $exp_info = $talent['experience_info'];
                                        $exp = substr($exp_info, 0, 150);
                                        echo $exp; ?> <?php echo " ... ";  ?> </p>
                                    <a href="project_details_sport.php?cat=sport&talent_id_sub=<?php echo $talent['reg_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="row">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM revival_add_project 
                        WHERE project_show='نعم' AND cat_name='sport'");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $alltalent_register = $stmt->fetchAll();
                        foreach ($alltalent_register as $talent) { ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/upload/<?php echo $talent['project_images']; ?>" alt="">
                                    <?php
                                    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
                                    $stmt->execute(array($talent['username']));
                                    $user_project_data = $stmt->fetch();
                                    ?>
                                    <h3> <?php echo $user_project_data['first_name2'] ?> # <?php echo  $user_project_data['sport_register_id']; ?> </h3>
                                    <p> <?php
                                        $exp_info = $user_project_data['experience_info'];
                                        $exp = substr($exp_info, 0, 150);
                                        echo $exp; ?> <?php echo " ... ";  ?> </p>
                                    <a href="project_details_sport.php?cat=sport&talent_id=<?php echo $user_project_data['sport_register_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
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