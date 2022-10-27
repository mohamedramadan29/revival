<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["course_head1"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CARS SECTION -->
<section class="ftco-section ftco-no-pt bg-light event_sections">
    <div class="container">
        <h2> <?php echo $lang["courses"] ?> </h2>
        <div class="row">

            <?php
            $stmt = $connect->prepare("SELECT * FROM courses WHERE course_status = 'active' ORDER BY course_id DESC");
            $stmt->execute();
            $allcourses = $stmt->fetchAll();
            foreach ($allcourses as $course) { ?>
            <div class="col-lg-4">
                <div class="item">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end"
                            style="background-image: url(admin/upload/<?php if ($_SESSION["lang"] == "ar") {
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

                                    <li> <?php echo $course["course_num_days"] ?> <?php echo $lang["days"] ?> </li>
                                    <li> <?php echo $course["course_constructor"] ?> </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between mb-0 check">
                                <div> <span> <?php echo $lang["course_head6"] ?> </span>
                                    <h6> <?php echo $course["course_price"] ?> $ </h6>
                                </div>
                                <div>
                                    <a href="course_details.php?course_id=<?php echo $course["course_id"] ?>"
                                        class="btn button">
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
        </div>
    </div>
</section>
<!-- END CAR SECTIONS -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>