<?php
ob_start();
session_start();
$page_title = "حساب شركة وكالة";
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["agency_reg_head1"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<?php
if (isset($_SESSION["username"])) { ?>
    <div class="registeration_message alert alert-danger text-center"> انت بالفعل قيد التسجيل </div>
<?php
} else { ?>
    <div class="contact_form">
        <div class="container">
            <?php
            if (isset($_POST['register_agency'])) {
                echo "Goooood";
            }


            ?>
            <div class="data">
                <form id="first_form" class="message_form ajax_form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info">
                                <div class="col-lg-12 col-12">
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="box mb-3">
                                                    <label for="company_name"> <?php echo $lang["company_name"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="name" type="text" class="form-control" id="company_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['name']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="email"> <?php echo $lang["company_email"];  ?> <span class="star"> *
                                                        </span></label>
                                                    <input name="email" type="email" class="form-control" id="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="phone"> <?php echo $lang["company_phone"];  ?><span class="star"> * </span>
                                                    </label>
                                                    <input name="username" type="text" class="form-control" id="phone" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['phone']; ?>">
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
                                                    <label for="company_tax_number"> <?php echo $lang["company_tax_number"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="tax_number" type="text" class="form-control" id="company_tax_number" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['tax_number']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="box mb-3">
                                                    <label for="username"> <?php echo $lang["username"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="username" type="text" class="form-control" id="username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"><?php echo $lang["confirm_password"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="password_repeat" type="password" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                                </div>
                                                <label> <?php echo $lang["company_logo"];  ?> </label>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="logo" id="files">
                                                                <p> <a> <?php echo $lang["company_logo"];  ?> </a></p>
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
                                                <label> <?php echo $lang["company_attachment"];  ?> </label>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="attachment[]" id="files2">
                                                                <p> <a> <?php echo $lang["company_attachment"];  ?> </a></p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery2"></output>
                                                </div>
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
                                        <h2 class="mb-0"><a href="#"> <?php echo $lang["agency_reg_head1"];  ?> </a>
                                        </h2>
                                        <div class="terms_conditions">
                                            <input type="checkbox" id="checkterms" name="check_privacy">
                                            <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                                <a target="_blank" href="rev_terms.php?page=الوكالة"> <?php echo $lang["terms"];  ?></a>
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <div class="reservation_button">
                                                <button name="register_agency" type="submit" class="btn btn-primary">
                                                    <?php echo $lang["register"];  ?> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- area to display a message after completion of upload -->
                <div id='status'></div>
                <!-- Area to display the percent of progress -->
                <div class="my_progress">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" id="percent" role="progressbar" aria-label="Success striped example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                </div>
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