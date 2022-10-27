<?php
ob_start();
session_start();
include 'init.php';
if (isset($_GET['talent_id'])) {
    $talent_id = $_GET['talent_id'];
}
if (isset($_GET['cat'])) {
    $cat_name = $_GET['cat'];
}

?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2><?php echo $lang["invest_now"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CODE -->
<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='استثمار في موهبة'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $facility_name = $_POST["facility_name"];

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
        $stmt = $connect->prepare("INSERT INTO investment (first_name, last_name, email, mobile , country, facility_name ,talent_id,cat_name) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,
         :zcountry ,:zfacility_name, :ztalent_id,:zcat_name)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
            "zlast_name" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zcountry" => $country,
            "zfacility_name" => $facility_name,
            "ztalent_id" => $talent_id,
            "zcat_name" => $cat_name,
        ));
        if ($stmt) {
            $to_email = $email;
            $subject = $lang['invest_mail'];
            foreach ($emaildata as $data) {
                if ($_SESSION['lang'] == 'ar') {
                    $body =  $data['email_text'];
                } else {
                    $body =  $data['email_text_en'];
                }
            }

            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers)

?>
            <style>
                .message_form {
                    display: none !important;
                }
            </style>
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
<!--------------------END PHP  CODE VALIDATION --------------->
<!-- START CONTACT FORM -->
<div class="contact_form">
    <div class="container">
        <div class="data">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="first_name"><?php echo $lang["first_name"];  ?><span class="star"> *
                                            </span></label>
                                        <input name="first_name" type="text" class="form-control" id="first_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">
                                    </div>
                                    <div class="box mb-3">
                                        <label for="email"><?php echo $lang["email"];  ?><span class="star"> *
                                            </span></label>
                                        <input name="email" type="text" class="form-control" id="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                    </div>


                                    <div class="box mb-3">
                                        <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                        <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                                * </span></label>
                                        <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">

                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="last_name"><?php echo $lang["last_name"];  ?><span class="star"> *
                                            </span></label>
                                        <input name="last_name" type="text" class="form-control" id="last_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">
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
                                        <label for="Facility_Name"><?php echo $lang["Facility_Name"];  ?></label>
                                        <input name="facility_name" type="text" class="form-control" id="Facility_Name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['facility_name']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/1.jpg);">
                                </div>
                                <div class="text">
                                    <hr>

                                    <div class="terms_conditions">
                                        <input type="checkbox" id="checkterms" name="check_privacy">
                                        <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                            <a target="_blank" href="rev_terms.php?page=مدينة الذكاء الإصطناعي"> <?php echo $lang["terms"];  ?></a>
                                        </label>
                                    </div>
                                    <div class="">
                                        <div class="reservation_button">
                                            <button type="submit" class="btn btn-primary"> <?php echo $lang["invest_now"];  ?> </button>
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