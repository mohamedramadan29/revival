<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["order_services_h1"]; ?> </h2>
        </div>
    </div>
</div>

<!-- END HERO SECTION -->


<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <form id="first_form"  class="ajax_form" action="upload_data/order_services.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["first_name"]; ?> <span class="star"> * </span> </label>
                                        <input name="first_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["email"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input name="email" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="country2"><?php echo $lang["select_services"]; ?> </label>
                                        <select name="service_name" class="form-select country2" id="country2" aria-label="Floating label select example">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['service_name']; ?>">
                                                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['service_name']; ?>
                                                </option>
                                            <?php
                                            } else { ?>
                                                <option value=""><?php echo $lang["select"];  ?></option>

                                            <?php
                                            }
                                            ?>

                                            <option value="Artificial Intelligence"><?php echo $lang["artificial"]; ?>
                                            </option>
                                            <option value="Sports Talents"> <?php echo $lang["sports"]; ?></option>
                                            <option value="Fashion and Jewelery"> <?php echo $lang["fashion"]; ?>
                                            </option>
                                        </select>

                                    </div>


                                    <div class="col-lg-6">
                                        <h4> <?php echo $lang["files"]; ?> </h4>
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="order_files[]" id="files" multiple>
                                                        <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">

                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                </div>
                                            </div>
                                            <output id="image-gallery"></output>

                                        </div>

                                        <!--<input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple> -->

                                    </div>

                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span class="star"> * </span> </label>
                                        <input name="last_name" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                    </div>

                                    <div class="box mb-3">
                                        <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                        <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                                * </span></label>
                                        <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['mobile']; ?>">

                                    </div>


                                    <div class="box mb-3">
                                        <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                        <select name="country" class="form-select country3" id="selectcountry" aria-label="Floating label select example">

                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
                                                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>
                                                </option>
                                            <?php
                                            } else { ?>
                                                <option value=""><?php echo $lang["select"];  ?></option>

                                            <?php
                                            }
                                            ?>
                                            <?php
                                            $stmt = $connect->prepare("SELECT * FROM countries");
                                            $stmt->execute();
                                            $allcountry = $stmt->fetchall();
                                            foreach ($allcountry as $country) { ?>
                                                <option value="<?php echo $country["country_code"]; ?>">
                                                    <?php
                                                    if ($_SESSION["lang"] == "ar") {
                                                        echo $country["country_arName"];
                                                    } else {
                                                        echo $country["country_enName"];
                                                    }
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingTextarea"><?php echo $lang["message"]; ?> </label>
                                        <textarea name="message" class="form-control" placeholder="" id="floatingTextarea"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['message']; ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/header2.jpg);">
                                </div>
                                <div class="text">
                                    <div class="terms_conditions">
                                        <input type="checkbox" id="checkterms" name="check_privacy">
                                        <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                            <a target="_blank" href="rev_terms.php?page=طلب خدمة"> <?php echo $lang["terms"];  ?></a>
                                        </label>
                                    </div>
                                    <div class="">
                                        <div class="reservation_button">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo $lang["order_serv"]; ?> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Area to display the percent of progress -->
            <!-- area to display a message after completion of upload -->
            <div id='status'></div>
            <div class="my_progress">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>