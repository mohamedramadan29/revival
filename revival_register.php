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
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $first_name = $_POST["first_name"];
                    $last_name = $_POST["last_name"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $country = $_POST["country"];
                    $specialist = $_POST["specialist"];

                    $field = $_POST["field"];
                    $sub_field = $_POST["sub_field"];
                    $reg_type = $_POST["register_type"];
                    $certificate = $_POST["certificate"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];

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
                    if (empty($specialist)) {
                        $errormessage[] = $lang["enter_specialist"];
                    }
                    if (empty($certificate)) {
                        $errormessage[] = $lang["enter_cartificate"];
                    }
                    if (empty($field)) {
                        $errormessage[] = $lang["enter_field"];
                    }
                    if (empty($sub_field)) {
                        $errormessage[] = $lang["enter_sub_field"];
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

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] = $lang["username_found"];
                    }

                    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] = $lang["username_found"];
                    }

                    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =  $lang["username_found"];
                    }
                    $stmt = $connect->prepare("SELECT * FROM register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =  $lang["username_found"];
                    }
                    if (empty($errormessage)) {
                        $stmt = $connect->prepare("INSERT INTO register (first_name, last_name,
                    email, mobile , country,
                    specialist, certificate , field, sub_field , reg_type, username, password)
                           VALUES (:zfirst_name,:zlast_name,:zemail,
                            :zmobile, :zcountry, :zspecial,:zcertificate, :zfield,:zsubfield, :zreg_type,:zusername, :zpassword)");
                        $stmt->execute(array(
                            "zfirst_name" => $first_name,
                            "zlast_name" => $last_name,
                            "zemail" => $email,
                            "zmobile" => $mobile,
                            "zcountry" => $country,
                            "zspecial" => $specialist,
                            "zcertificate" => $certificate,
                            "zfield" => $field,
                            "zsubfield" => $sub_field,
                            "zreg_type" => $reg_type,
                            "zusername" => $username,
                            "zpassword" => $password,
                        ));
                        if ($stmt) {

                            $to_email = $email;
                            $subject = "اللتسجيل في ريفايفال";
                            $body =  $lang["revival_register_message"];
                            $headers = "From: info@revivals.site";
                            mail($to_email, $subject, $body, $headers)
                ?>
            <style>
            .message_form {
                display: none !important;
            }
            </style>
            <div class='container'>
                <div class='alert alert-success text-center'> <?php echo $lang["revival_register_message"]; ?>
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
            <form class="message_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["first_name"];  ?><span
                                                class="star"> * </span></label>
                                        <input name="first_name" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["email"];  ?> <span class="star"> *
                                            </span></label>
                                        <input name="email" type="email" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["username"];  ?><span class="star">
                                                * </span>
                                        </label>
                                        <input name="username" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
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
                                        <label for="floatingInput"> <?php echo $lang["certificate"];  ?><span
                                                class="star"> *
                                            </span></label>

                                        <select name="certificate" class="form-select country9" id="floatingSelectGrid"
                                            aria-label="Floating label country2 example">

                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                            <option
                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['certificate']; ?>">
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
                                        <label for="floatingSelectGrid"><?php echo $lang["select_field"];  ?></label>
                                        <select name="field" class="form-select country" id="floatingSelectGrid"
                                            aria-label="Floating label country example">

                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                            <option
                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>">
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
                                                foreach($mainfiled as $filed){
                                                    if ($_SESSION["lang"] == "ar") {
                                                        $fileds = $filed['select_name'];
                                                    } else {
                                                        $fileds = $filed['select_name_en'];
                                                    }
                                                    $fileds =  explode(",", $fileds);
                                                    
                                                    $countfile = count($fileds) - 1;
                                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                                    <option value="<?= $fileds[$i] ?>"><?=  $fileds[$i] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?> 
                                            
                                        </select>

                                    </div>
                                    <div class="box">
                                        <label for="register_type"> <?php echo $lang["register_type"];  ?><span
                                                class="star"> *
                                            </span></label>
                                        <select name="register_type" id="register_type" class="form-select country"
                                            id="register_type" aria-label="country example">
                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>


                                            <option
                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>">
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
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["last_name"];  ?> <span
                                                class="star"> * </span></label>
                                        <input name="last_name" type="text" class="form-control" id="floatingInput"
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
                                        <label for="floatingInput"> <?php echo $lang["specialist"];  ?> <span
                                                class="star"> * </span></label>
                                        <input name="specialist" type="text" class="form-control" id="floatingInput"
                                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>>

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star">
                                                * </span></label>
                                        <input name="password" type="password" class="form-control passwordinput"
                                            id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["confirm_password"];  ?><span
                                                class="star"> *
                                            </span></label>
                                        <input name="password_repeat" type="password" class="form-control"
                                            id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                    </div>

                                    <div class="box mb-3">
                                        <label
                                            for="floatingSelectGrid"><?php echo $lang["select_sub_field"];  ?></label>
                                        <select name="sub_field" class="form-select country" id="floatingSelectGrid"
                                            aria-label="Floating label country example">

                                            <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                            <option
                                                value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>">
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
                                                foreach($mainfiled as $filed){
                                                    if ($_SESSION["lang"] == "ar") {
                                                        $fileds = $filed['select_sub_name'];
                                                    } else {
                                                        $fileds = $filed['select_sub_name_en'];
                                                    }
                                                    $fileds =  explode(",", $fileds);
                                                    
                                                    $countfile = count($fileds) - 1;
                                                    for ($i = 0; $i < $countfile; ++$i) { ?>
                                                    <option value="<?= $fileds[$i] ?>"><?=  $fileds[$i] ?></option>
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
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url(uploads/art1.jpg);">
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