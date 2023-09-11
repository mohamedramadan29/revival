<?php
ob_start();
session_start();
$page_title = "حساب شركة وكالة";
include 'init.php';
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='الوكالة'");
$stmt->execute();
$emaildata = $stmt->fetchAll();

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
                $file = '';
                $file_tmp = '';
                $location = '';
                $uploadplace = "admin/agency/uploads";
                if (isset($_FILES['attachment']['name'])) {
                    foreach ($_FILES['attachment']['name'] as $key => $val) {
                        $file = $_FILES['attachment']['name'][$key];
                        $file_tmp = $_FILES['attachment']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $uploadplace . $file);
                        $location .= $file . " ";
                    }
                }
                // main image
                if (!empty($_FILES['main_image']['name'])) {
                    $main_image_name = $_FILES['main_image']['name'];
                    $main_image_name = str_replace(' ', '-', $main_image_name);
                    $main_image_temp = $_FILES['main_image']['tmp_name'];
                    $main_image_type = $_FILES['main_image']['type'];
                    $main_image_size = $_FILES['main_image']['size'];
                    $main_image_uploaded = time() . '_' . $main_image_name;
                    $upload_path = "admin/agency/uploads/" . $main_image_uploaded;
                    // Move the uploaded image to its destination
                    move_uploaded_file($main_image_temp, $upload_path);
                    // Check the image type and convert it to WebP if it's supported
                    if (exif_imagetype($upload_path) === IMAGETYPE_JPEG) {
                        $image = imagecreatefromjpeg($upload_path);
                    } elseif (exif_imagetype($upload_path) === IMAGETYPE_PNG) {
                        $image = imagecreatefrompng($upload_path);
                    }
                    if ($image !== false) {
                        $webp_path = "admin/agency/uploads/" . pathinfo($main_image_uploaded, PATHINFO_FILENAME) . '.webp';
                        // Save the image as WebP
                        imagewebp($image, $webp_path);
                        // Clean up memory
                        imagedestroy($image);
                        // Update the uploaded image path to the WebP version
                        $main_image_uploaded = pathinfo($main_image_uploaded, PATHINFO_FILENAME) . '.webp';
                    }
                } else {
                    $main_image_uploaded = '';
                }
                $name = $_POST["name"];
                $email = $_POST["email"];
                $mobile = $_POST["phone"];
                $country = $_POST["country"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password_repeat = $_POST["password_repeat"];
                $tax_number = $_POST["tax_number"];
                $errormessage = [];
                if (isset($_POST["check_privacy"])) {
                } else {
                    $errormessage[] = $lang["check_privacy"];
                }

                if (empty($name)) {
                    $errormessage[] = $lang["company_name_error"];
                }
                if (empty($email)) {
                    $errormessage[] =  $lang["enter_email"];
                }
                if (empty($mobile)) {
                    $errormessage[] =  $lang["enter_mobile"];
                }
                if (empty($username)) {
                    $errormessage[] =  $lang["enter_username"];
                }
                if (empty($password)) {
                    $errormessage[] =  $lang["enter_password"];
                }
                if (strlen($password) < 8) {
                    $errormessage[] =  $lang["weak_pass"];
                }

                $stmt = $connect->prepare("SELECT * FROM art_register WHERE username = ?");
                $stmt->execute(array($username));

                $exist1 = $stmt->fetch();
                if ($exist1 > 0) {
                    $errormessage[] =  $lang["username_found"];
                }

                $stmt = $connect->prepare("SELECT * FROM art_register WHERE email=?");
                $stmt->execute(array($email));

                $exist11 = $stmt->fetch();
                if ($exist11 > 0) {
                    $errormessage[] =  $lang["email_found"];
                }
                $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ?");
                $stmt->execute(array($username));
                $exist2 = $stmt->fetch();
                if ($exist2 > 0) {
                    $errormessage[] =  $lang["username_found"];
                }
                $stmt = $connect->prepare("SELECT * FROM sport_register WHERE email=?");
                $stmt->execute(array($email));

                $exist22 = $stmt->fetch();

                if ($exist22 > 0) {
                    $errormessage[] =  $lang["email_found"];
                }
                $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username = ?");
                $stmt->execute(array($username));

                $exist3 = $stmt->fetch();
                if ($exist3 > 0) {
                    $errormessage[] =  $lang["username_found"];
                }

                $stmt = $connect->prepare("SELECT * FROM fash_register WHERE email=?");
                $stmt->execute(array($email));

                $exist33 = $stmt->fetch();
                if ($exist33 > 0) {
                    $errormessage[] =  $lang["email_found"];
                }
                ///////////////
                $stmt = $connect->prepare("SELECT * FROM agency_register WHERE username = ?");
                $stmt->execute(array($username));

                $exist4 = $stmt->fetch();
                if ($exist4 > 0) {
                    $errormessage[] =  $lang["username_found"];
                }

                $stmt = $connect->prepare("SELECT * FROM agency_register WHERE email=?");
                $stmt->execute(array($email));

                $exist44 = $stmt->fetch();
                if ($exist44 > 0) {
                    $errormessage[] =  $lang["email_found"];
                }

                $stmt = $connect->prepare("SELECT * FROM register WHERE username = ?");
                $stmt->execute(array($username));

                $exist4 = $stmt->fetch();
                if ($exist4 > 0) {
                    $errormessage[] =  $lang["username_found"];
                }
                $stmt = $connect->prepare("SELECT * FROM register WHERE email=?");
                $stmt->execute(array($email));

                $exist44 = $stmt->fetch();
                if ($exist44 > 0) {
                    $errormessage[] =  $lang["email_found"];
                }

                if ($exist4 > 0) {
                    $errormessage[] = $lang["username_found_or_email"];
                }
                if (empty($errormessage)) {
                    $stmt = $connect->prepare("INSERT INTO agency_register (name, email, phone ,country,logo,attachment,tax_number,username, password) 
                    VALUES (:zname , :zemail , :zphone,  :zcountry , :zlogo ,
                    :zattachment,:ztax_number,:zusername, :zpassword)");
                    $stmt->execute(array(
                        "zname" => $name,
                        "zemail" => $email,
                        "zphone" => $mobile,
                        "zcountry" => $country,
                        "zlogo" => $main_image_uploaded,
                        "zattachment" => $location,
                        "ztax_number" => $tax_number,
                        "zusername" => $username,
                        "zpassword" => $password,
                    ));
                    if ($stmt) {
                        $to_email = $email;
                        $subject = $lang['register_in_sportt'];
                        foreach ($emaildata as $data) {
                            if ($_SESSION['lang'] == 'ar') {
                                $body =  $data['email_text'];
                            } else {
                                $body =  $data['email_text_en'];
                            }
                        }
                        $headers = "From: info@revivals.site";
                        mail($to_email, $subject, $body, $headers);

            ?>
                        <div class='container'>
                            <div class='alert alert-success text-center'>
                                <?php
                                foreach ($emaildata as $data) {
                                    if ($_SESSION['lang'] == 'ar') {
                                        echo   $data['email_text'];
                                    } else {
                                        echo  $data['email_text_en'];
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                        header("refresh:1;url=login");
                    }
                } else { ?>
                    <style>
                        .my_progress {
                            display: none;
                        }
                    </style>
                    <?php

                    foreach ($errormessage as $message) { ?>
                        <div class="error_message">
                            <div class="alert alert-danger"> <?php echo $message ?> </div>
                        </div>
            <?php
                    }
                }
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
                                                    <input required name="name" type="text" class="form-control" id="company_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['name']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="email"> <?php echo $lang["company_email"];  ?> <span class="star"> *
                                                        </span></label>
                                                    <input required name="email" type="email" class="form-control" id="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="phone"> <?php echo $lang["company_phone"];  ?><span class="star"> * </span>
                                                    </label>
                                                    <input required name="phone" type="text" class="form-control" id="phone" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['phone']; ?>">
                                                </div>

                                                <div class="box mb-3">
                                                    <label for="selectcountry"><?php echo $lang["country"];  ?></label>
                                                    <select required name="country" class="form-select country3" id="selectcountry" aria-label="Floating label select example">

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
                                                    <input required name="tax_number" type="text" class="form-control" id="company_tax_number" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['tax_number']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="box mb-3">
                                                    <label for="username"> <?php echo $lang["username"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input required name="username" type="text" class="form-control" id="username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input required name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"><?php echo $lang["confirm_password"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input required name="password_repeat" type="password" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                                </div>
                                                <label> <?php echo $lang["company_logo"];  ?> </label>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input required type="file" name="main_image" id="files">
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
                                                                <input required type="file" name="attachment[]" id="files2">
                                                                <p> <a> <?php echo $lang["company_attachment"];  ?> </a></p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
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
                                            <input required type="checkbox" id="checkterms" name="check_privacy">
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