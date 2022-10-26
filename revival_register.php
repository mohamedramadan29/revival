<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["register_now_in_revival"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->


<!-- START CONTACT FORM -->
<?php
if (isset($_SESSION["username"])) { ?>
    <div class="registeration_message alert alert-danger text-center"> <?php echo $lang["ready_register"];  ?> </div>
<?php
} else { ?>

    <div class="contact_form">
        <div class="container">
            <div class="data">

                <form id="first_form" class="message_form ajax_form" action="upload_forms/upload_revival_register.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="info">

                                <div class="row">
                                    <https://socialimark.com/wabell/div class="col-lg-6 col-12">
                                        <div class="box mb-3">
                                            <label for="first_name"><?php echo $lang["first_name"];  ?><span class="star"> * </span></label>
                                            <input name="first_name" type="text" class="form-control" id="first_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                        </div>
                                        <div class="box mb-3">
                                            <label for="email"> <?php echo $lang["email"];  ?> <span class="star"> *
                                                </span></label>
                                            <input name="email" type="email" class="form-control" id="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                        </div>
                                        <div class="box mb-3">
                                            <label for="username"><?php echo $lang["username"];  ?><span class="star">
                                                    * </span>
                                            </label>
                                            <input name="username" type="text" class="form-control" id="username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
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
                                            <label for="certificate"> <?php echo $lang["certificate"];  ?><span class="star"> *
                                                </span></label>

                                            <select name="certificate" class="form-select country9" id="certificate" aria-label="Floating label country2 example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['certificate']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['certificate']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>





                                                <!--  <option value=""> الموهل العلمي </option> -->
                                                <option value=" <?php echo $lang["illiterate"];  ?> ">
                                                    <?php echo $lang["illiterate"];  ?> </option>
                                                <option value=" <?php echo $lang["middle_school"];  ?>">
                                                    <?php echo $lang["middle_school"];  ?> </option>
                                                <option value="<?php echo $lang["secondary"];  ?>">
                                                    <?php echo $lang["secondary"];  ?> </option>
                                                <option value="<?php echo $lang["ba"];  ?>"> <?php echo $lang["ba"];  ?>
                                                </option>
                                                <option value="<?php echo $lang["masters"];  ?> ">
                                                    <?php echo $lang["masters"];  ?> </option>
                                            </select>


                                        </div>
                                        <div class="box mb-3">
                                            <label for="filed"><?php echo $lang["select_field"];  ?></label>
                                            <select name="field" class="form-select country" id="filed" aria-label="Floating label country example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='ريفايفال'");
                                                $stmt->execute();
                                                $mainfiled = $stmt->fetchAll();
                                                foreach ($mainfiled as $filed) {
                                                    foreach ($mainfiled as $filed) {
                                                        if ($_SESSION["lang"] == "ar") {
                                                            $fileds = $filed['select_name'];
                                                        } else {
                                                            $fileds = $filed['select_name_en'];
                                                        }?>
                                                         <option value="<?php echo $filed['select_id']; ?>">  <?php echo $fileds ?> </option>
                                                         <?php
                                                        }
                                                }
                                                ?>

                                            </select>

                                        </div>
                                        <div class="box">
                                            <label for="register_type"> <?php echo $lang["register_type"];  ?><span class="star"> *
                                                </span></label>
                                            <select name="register_type" id="register_type" class="form-select country" id="register_type" aria-label="country example">
                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>


                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>


                                                <option value="<?php echo $lang["Individually"];  ?> ">
                                                    <?php echo $lang["Individually"];  ?> </option>
                                                <option value=" <?php echo $lang["broker_company"];  ?> ">
                                                    <?php echo $lang["broker_company"];  ?> </option>
                                            </select>
                                        </div>
                                    </https:>
                                    <div class="col-lg-6 col-12">
                                        <div class="box mb-3">
                                            <label for="last_name"><?php echo $lang["last_name"];  ?> <span class="star"> * </span></label>
                                            <input name="last_name" type="text" class="form-control" id="last_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                        </div>
                                        <div class="box mb-3">

                                            <label for="floatingInput"> <?php echo $lang["mobile"];  ?>
                                                <span class="star">
                                                    * </span></label>
                                            <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">

                                        </div>
                                        <div class="box mb-3">
                                            <label for="spec"> <?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                            <input name="specialist" type="text" class="form-control" id="spec" <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>>

                                        </div>
                                        <div class="box mb-3">
                                            <label for="password"> <?php echo $lang["password"];  ?><span class="star">
                                                    * </span></label>
                                            <input name="password" type="password" class="form-control passwordinput" id="password" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </div>

                                        <div class="box mb-3">
                                            <label for="repass"> <?php echo $lang["confirm_password"];  ?><span class="star"> *
                                                </span></label>
                                            <input name="password_repeat" type="password" class="form-control" id="repass" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                        </div>

                                        <div class="box mb-3">
                                            <label for="sub_filed"><?php echo $lang["select_sub_field"];  ?></label>
                                            <select name="sub_field" class="form-select country" id="sub_filed" aria-label="Floating label country example">

                                                <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                    <option value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>">
                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>
                                                    </option>
                                                <?php
                                                } else { ?>
                                                    <option value=""><?php echo $lang["select"];  ?></option>

                                                <?php
                                                }
                                                ?>
                                                <?php
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='ريفايفال'");
                                                $stmt->execute();
                                                $mainfiled = $stmt->fetchAll();
                                                foreach ($mainfiled as $filed) {
                                                    if ($_SESSION["lang"] == "ar") {
                                                        $fileds = $filed['select_sub_name'];
                                                    } else {
                                                        $fileds = $filed['select_sub_name_en'];
                                                    }
                                                    $fileds =  explode(",", $fileds);

                                                    $countfile = count($fileds) - 1;
                                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                                        <option value="<?= $fileds[$i] ?>"><?= $fileds[$i] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 cars_sections">
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/art1.jpg);">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#"> <?php echo $lang["register_now_in_revival"];  ?></a>
                                        </h2>
                                        <div class="terms_conditions">
                                            <input type="checkbox" id="checkterms" name="check_privacy">
                                            <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                                <a target="_blank" href="rev_terms.php?page=الرئيسية"> <?php echo $lang["terms"];  ?></a>
                                            </label>
                                        </div>
                                        <hr>
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
                </form>

                <!---------------------  START NEW CODE ---------------------------->

                <!-- Area to display the percent of progress -->

                <div class="m-3 d-none">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>

                <!-- area to display a message after completion of upload -->
                <div id='status'></div>

                <!------------------------- END NEW CODE ------------------->



            </div>
        </div>
    </div>
    <!-- END CONTACT FORM -->

<?php
}
?>

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>