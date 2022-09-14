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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp = '';
    $location = "";


    $uploadplace = "admin/upload/";


    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $service_name = $_POST["service_name"];
    $message = $_POST["message"];


    // START UPLOAD national_id (national_id)
    foreach ($_FILES['order_files']['name'] as $key => $val) {
        $file = $_FILES['order_files']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp1 = $_FILES['order_files']['tmp_name'][$key];
        move_uploaded_file($file_tmp1, $uploadplace . $file);
        $location .= $file . " ";
    }



    $errormessage = [];

    if (isset($_POST["check_privacy"])) {
    } else {
        $errormessage[] = $lang["check_privacy"];
    }

    if (empty($first_name)) {
        $errormessage[] = $lang["enter_first_name"];
    }

    if (empty($last_name)) {
        $errormessage[] =  $lang["enter_last_name"];
    }
    if (empty($email)) {
        $errormessage[] =  $lang["enter_email"];
    }
    if (empty($mobile)) {
        $errormessage[] =  $lang["enter_mobile"];
    }

    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO revival_order_services (first_name, last_name,
                    email, mobile , service_name, country,message,files )
                           VALUES (:zfirst_name,:zlast_name,:zemail,
                            :zmobile,:zserv_name ,:zcountry, :zmessage,:zfiles)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
            "zlast_name" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zserv_name" => $service_name,
            "zcountry" => $country,
            "zmessage" => $message,
            "zfiles" => $location,

        ));
        if ($stmt) {

            $to_email = $email;
            $subject = "اللتسجيل في ريفايفال";
            $body =  $lang["revival_register_message"];
            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers)
?>
<style>
.contact_form {
    display: none !important;
}
</style>
<div class='container'>
    <div class='alert alert-success text-center'> <?php echo $lang["revival_order_services"]; ?>
    </div>
</div>
<?php
        }
    } else {
        foreach ($errormessage as $message) { ?>
<div class="error_message">
    <div class="alert alert-danger"> <?php echo $message ?> </div>
</div>
<?php
        }
    }
}
?>
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["first_name"]; ?> <span
                                                class="star"> * </span> </label>
                                        <input name="first_name" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["email"]; ?> <span class="star"> *
                                            </span> </label>
                                        <input name="email" type="text" class="form-control" id="floatingInput"
                                            placeholder=""
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="country2"><?php echo $lang["select_services"]; ?> </label>
                                        <select name="service_name" class="form-select country2" id="country2"
                                            aria-label="Floating label select example">
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                            <option
                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['service_name']; ?>">
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
                                        <label for="floatingInput"> <?php echo $lang["last_name"]; ?> <span
                                                class="star"> * </span> </label>
                                        <input name="last_name" type="text" class="form-control" id="floatingInput"
                                            placeholder=""
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

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
                                        <label for="floatingTextarea"><?php echo $lang["message"]; ?> </label>
                                        <textarea name="message" class="form-control" placeholder=""
                                            id="floatingTextarea"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['message']; ?></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url(uploads/header2.jpg);">
                                </div>
                                <div class="text">

                                    <div class="terms_conditions">
                                        <input type="checkbox" id="checkterms" name="check_privacy">
                                        <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                            <?php if (isset($_SESSION["lang"]) == "ar") { ?>

                                            <a href="fash_terms.php"> <?php echo $lang["terms"];  ?> </a>
                                            <?php
                                            } else { ?>
                                            <a href="fash_terms_en.php"> <?php echo $lang["terms"];  ?> </a>
                                            <?php
                                            } ?>
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
        </div>
    </div>
</div>
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>