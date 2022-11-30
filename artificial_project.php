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
                <img src="uploads/art1.jpg" class="d-block w-100" alt="image1">
            </div>
        </div>
    </div>
    <div class="data container ">
        <h2> <?php echo $lang['art_talent']; ?> </h2>
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
                    <h2> <?php echo $lang['category']; ?> </h2>
                    <div class="form-group">
                        <form method="get" name="select_form">
                            <div class="exhibition_cat">
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='مدينة الذكاء الإصطناعي'");
                                $stmt->execute();
                                $selection = $stmt->fetchAll();
                                foreach ($selection as $select) {
                                    $checked = [];
                                    if (isset($_GET['brands'])) {
                                        $checked = $_GET['brands'];
                                    }
                                ?>

                                    <div class="form-check">
                                        <input class="form-check-input" name="brands[]" type="checkbox" value="<?php echo $select['select_id'] ?>" id="<?php echo $select['select_id'] ?>" <?php if (in_array($select['select_id'], $checked)) {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?>>
                                        <label class="form-check-label" for="<?php echo $select['select_id'] ?>"> <?php echo $select['select_name']; ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <button class="mt-3 search_button btn btn-primary btn-block btn-sm" type="submit" class="form-control"> <?php echo $lang['search']; ?> </button>
                        </form>
                    </div>
                </div>

                <!-- //////////////////////// START FORM SELECTIONS //////////////////////////////  -->
                <?php
                if (isset($_GET['brands'])) { ?>
                    <div class="col-lg-9">
                        <div class="row">
                            <?php

                            $branedchecked = [];
                            $branedchecked = $_GET['brands'];
                            foreach ($branedchecked as $brand) {
                                $stmt = $connect->prepare("SELECT * FROM art_register WHERE user_show='نعم' AND field IN ($brand)");
                                $stmt->execute();
                                $count = $stmt->rowCount();
                                $alltalent_register = $stmt->fetchAll();
                                foreach ($alltalent_register as $talent) { ?>
                                    <div class="col-lg-4">
                                        <div class="info">
                                            <?php
                                            if (!empty($talent['talent_image'])) { ?>
                                                <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="admin/upload/avatar.png" alt="">
                                            <?php
                                            }

                                            ?>

                                            <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['art_register_id']; ?> </h3>
                                            <p> <?php
                                                $exp_info = $talent['experience_info'];
                                                $exp = substr($exp_info, 0, 150);
                                                echo $exp; ?> <?php echo " ... ";  ?> </p>
                                            <a href="project_details.php?cat=art&talent_id=<?php echo $talent['art_register_id']; ?>" class="btn button"> <?php echo $lang['watch_talent'] ?> </a>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                            $stmt = $connect->prepare("SELECT * FROM company_register
                        WHERE user_show='نعم' AND cat_name='art' AND field IN ($brand) ");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $alltalent_register = $stmt->fetchAll();
                            foreach ($alltalent_register as $talent) { ?>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <?php
                                        if (!empty($talent['talent_image'])) { ?>
                                            <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                        <?php
                                        } else { ?>
                                            <img src="admin/upload/avatar.png" alt="">
                                        <?php
                                        }
                                        ?>
                                        <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['reg_id']; ?> </h3>
                                        <p> <?php
                                            $exp_info = $talent['experience_info'];
                                            $exp = substr($exp_info, 0, 150);
                                            echo $exp; ?> <?php echo " ... ";  ?> </p>
                                        <a href="project_details.php?cat=art&talent_id_sub=<?php echo $talent['reg_id']; ?>" class="btn button"><?php echo $lang['watch_talent'] ?></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM  revival_add_project 
                        WHERE project_show='نعم' AND cat_name='art'");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $alltalent_register = $stmt->fetchAll();
                            foreach ($alltalent_register as $talent) { ?>
                                    <!--
                                <div class="col-lg-4">
                                    <div class="info">
                                        <?php
                                        if (!empty($talent['project_images'])) { ?>
                                            <img src="admin/upload/<?php echo $talent['project_images']; ?>" alt="">
                                        <?php
                                        } else { ?>
                                            <img src="admin/upload/avatar.png" alt="">
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
                                        $stmt->execute(array($talent['username']));
                                        $user_project_data = $stmt->fetch();
                                        ?>
                                        <h3> <?php echo $user_project_data['first_name'] ?> # <?php echo  $user_project_data['art_register_id']; ?> </h3>
                                        <p> <?php
                                            $exp_info = $user_project_data['experience_info'];
                                            $exp = substr($exp_info, 0, 150);
                                            echo $exp; ?> <?php echo " ... ";  ?> </p>
                                        <a href="project_details.php?cat=art&talent_id=<?php echo $user_project_data['art_register_id']; ?>" class="btn button"><?php echo $lang['watch_talent'] ?></a>
                                    </div>
                                </div>
                                -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php    } else { ?>

                    <div class="col-lg-9">
                        <div class="row">
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM art_register WHERE user_show='نعم'");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $alltalent_register = $stmt->fetchAll();
                            foreach ($alltalent_register as $talent) { ?>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <?php
                                        if (!empty($talent['talent_image'])) { ?>
                                            <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="admin/upload/avatar.png" alt="">
                                        <?php
                                        }

                                        ?>

                                        <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['art_register_id']; ?> </h3>
                                        <p> <?php
                                            $exp_info = $talent['experience_info'];
                                            $exp = substr($exp_info, 0, 150);
                                            echo $exp; ?> <?php echo " ... ";  ?> </p>
                                        <a href="project_details.php?cat=art&talent_id=<?php echo $talent['art_register_id']; ?>" class="btn button"><?php echo $lang['watch_talent'] ?></a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM company_register
                        WHERE user_show='نعم' AND cat_name='art'");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $alltalent_register = $stmt->fetchAll();
                            foreach ($alltalent_register as $talent) { ?>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <?php
                                        if (!empty($talent['talent_image'])) { ?>
                                            <img src="admin/upload/<?php echo $talent['talent_image']; ?>" alt="">
                                        <?php
                                        } else { ?>
                                            <img src="admin/upload/avatar.png" alt="">
                                        <?php
                                        }

                                        ?>

                                        <h3> <?php echo $talent['first_name'] ?> # <?php echo  $talent['reg_id']; ?> </h3>
                                        <p> <?php
                                            $exp_info = $talent['experience_info'];
                                            $exp = substr($exp_info, 0, 150);
                                            echo $exp; ?> <?php echo " ... ";  ?> </p>
                                        <a href="project_details.php?cat=art&talent_id_sub=<?php echo $talent['reg_id']; ?>" class="btn button">  <?php echo $lang['watch_talent'] ?>   </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            $stmt = $connect->prepare("SELECT * FROM  revival_add_project 
                        WHERE project_show='نعم' AND cat_name='art'");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $alltalent_register = $stmt->fetchAll();
                            foreach ($alltalent_register as $talent) { ?>
                                <div class="col-lg-4">
                                    <div class="info">
                                        <?php
                                        if (!empty($talent['project_images'])) { ?>
                                            <img src="admin/upload/<?php echo $talent['project_images']; ?>" alt="">
                                        <?php
                                        } else { ?>
                                            <img src="admin/upload/avatar.png" alt="">
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
                                        $stmt->execute(array($talent['username']));
                                        $user_project_data = $stmt->fetch();
                                        ?>
                                        <h3> <?php echo $user_project_data['first_name'] ?> # <?php echo  $user_project_data['art_register_id']; ?> </h3>
                                        <p> <?php
                                            $exp_info = $user_project_data['experience_info'];
                                            $exp = substr($exp_info, 0, 150);
                                            echo $exp; ?> <?php echo " ... ";  ?> </p>
                                        <a href="project_details.php?cat=art&talent_id=<?php echo $user_project_data['art_register_id']; ?>" class="btn button"> <?php echo $lang['watch_talent'] ?> </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>


                    </div>

                <?php
                } ?>
                <!--///////////////////////// END FORM SELECTIONS  ////////////////////////////////-->

            </div>

        </div>
    </div>
</div>
<!-- END OUR SERVICES  -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>