<?php
ob_start();
session_start();
$fashion_event = 'fashion_event';

include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["join_team_h1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="info">

                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box mb-3">
                                    <label for="floatingInput"><?php echo $lang["first_name"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box  mb-3">
                                    <label for="floatingInput"> <?php echo $lang["email"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="email" class="form-control" id="floatingInput" placeholder=" ">

                                </div>

                                <div class="box mb-3">
                                    <label for="floatingTextarea"> <?php echo $lang["message"]; ?> </label>
                                    <textarea class="form-control" placeholder="" id="floatingTextarea"></textarea>

                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box  mb-3">
                                    <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span class="star"> *
                                        </span> </label>
                                    <input type="text" class="form-control" id="floatingInput" placeholder="">

                                </div>
                                <div class="box mb-3">
                                    <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                    <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                            * </span></label>
                                    <input type="tel" name="mobile" id="phone" class="form-control"
                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['mobile']; ?>">

                                </div>
                                <div class="box mb-3">
                                    <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                    <select name="country" class="form-select country3" id="selectcountry"
                                        aria-label="Floating label select example">

                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                        <option
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
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
                                    <label for="floatingSelectGrid"> <?php echo $lang["choose_are_you"];  ?> </label>
                                    <select class="form-select country" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option value=""> <?php echo $lang["choose_are_you"];  ?> </option>
                                        <option value="<?php echo $lang["Journalist"];  ?>">
                                            <?php echo $lang["Journalist"];  ?> </option>
                                        <option value="<?php echo $lang["you_speaker"];  ?>">
                                            <?php echo $lang["you_speaker"];  ?> </option>
                                        <option value=" <?php echo $lang["my_media"];  ?>">
                                            <?php echo $lang["my_media"];  ?> </option>

                                    </select>

                                </div>
                                <div class="col-lg-6">
                                    <label> <?php echo $lang["files"];  ?> </label>

                                    <div class="box mb-3">
                                        <div class="upload-file">
                                            <div class="upload-wrapper">
                                                <label>
                                                    <input type="file" name="contact_files[]" id="files" multiple>
                                                    <p> <a> <?php echo $lang["select_files"];  ?> </a></p>
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



                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 cars_sections">
                    <div class="item">
                        <div class="car-wrap rounded ftco-animate">
                            <div class="text">
                                <div class="">
                                    <div class="reservation_button">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo $lang["register"];  ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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