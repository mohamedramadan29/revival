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
                <img src="uploads/fash1.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> مواهب الازياء والموضة </h2>
    </div>
</div>
</div>
<!-- END HERO SECTION -->

<!-- START OUR SERVICES  -->
<div class="our_services">
    <div class="container-fluid">
        <div class="data">
            <h2>المواهب</h2>
            <div class="row">
                <div class="col-lg-3">
                    <h2> الاقسام </h2>
                    <div class="form-group">
                        <div class="exhibition_cat">
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='الأزياء والمجوهرات'");
                            $stmt->execute();
                            $selection = $stmt->fetch();

                            if ($_SESSION["lang"] == "ar") {
                                $main_filed = $selection['select_name'];
                            } else {
                                $main_filed = $selection['select_name_en'];
                            }
                            $main_filed = explode(",", $main_filed);
                            $countfile = count($main_filed) - 1;
                            for ($i = 0; $i < $countfile; ++$i) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="<?= $main_filed[$i] ?>">
                                    <label class="form-check-label" for="<?= $main_filed[$i] ?>">
                                        <?= $main_filed[$i] ?>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM fash_register WHERE user_show='نعم'");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $alltalent_register = $stmt->fetchAll();
                        foreach ($alltalent_register as $talent) { ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                    <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['fash_register_id']; ?> </h3>
                                    <p> <?php
                                        $exp_info = $talent['personal_information'];
                                        $exp = substr($exp_info, 0, 150);
                                        echo $exp; ?> <?php echo " ... ";  ?> </p>
                                    <a href="project_details_fash.php?cat=fash&talent_id=<?php echo $talent['fash_register_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        $stmt = $connect->prepare("SELECT * FROM company_register
                        WHERE user_show='نعم' AND cat_name='fash'");
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
                                    <a href="project_details_fash.php?cat=fash&talent_id_sub=<?php echo $talent['reg_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        $stmt = $connect->prepare("SELECT * FROM  revival_add_project 
                        WHERE project_show='نعم' AND cat_name='fash'");
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $alltalent_register = $stmt->fetchAll();
                        foreach ($alltalent_register as $talent) { ?>
                            <div class="col-lg-4">
                                <div class="info">
                                    <img src="admin/upload/<?php echo $talent['project_images']; ?>" alt="">
                                    <?php
                                    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
                                    $stmt->execute(array($talent['username']));
                                    $user_project_data = $stmt->fetch();
                                    ?>
                                    <h3> <?php echo $user_project_data['first_name'] ?> # <?php echo  $user_project_data['fash_register_id']; ?> </h3>
                                    <p> <?php
                                        $exp_info = $user_project_data['personal_information'];
                                        $exp = substr($exp_info, 0, 150);
                                        echo $exp; ?> <?php echo " ... ";  ?> </p>
                                    <a href="project_details_fash.php?cat=fash&talent_id=<?php echo $user_project_data['fash_register_id']; ?>" class="btn button"> مشاهدة الموهبة </a>
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