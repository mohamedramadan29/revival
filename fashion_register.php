<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["fashion_reg_head1"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START CONTACT FORM -->
<?php
if (isset($_SESSION["username"])) { ?>
<div class="registeration_message alert alert-danger text-center"> <?php echo $lang["ready_register"];  ?></div>
<?php
} else { ?>
<div class="contact_form">
    <div class="container">
        <div class="data">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // START UPLOAD PROJECT DESIGN (project_design)
                    foreach ($_FILES['project_certificate_image']['name'] as $key => $project_certificate_image) {

                        $newproject_certificate_image = time() . "_" . $project_certificate_image;
                        move_uploaded_file($_FILES['project_certificate_image']['tmp_name'][$key], 'admin/upload/art_upload/' . $newproject_certificate_image);
                        $location = 'admin/upload/art_upload/' . $newproject_certificate_image;
                    }

                    // START UPLOAD national_id (national_id)
                    foreach ($_FILES['national_id']['name'] as $key => $national_id) {
                        $newnational_id = time() . "_" . $national_id;
                        move_uploaded_file($_FILES['national_id']['tmp_name'][$key], 'admin/upload/art_upload/' . $newnational_id);
                        $location2 = 'admin/upload/art_upload/' . $newnational_id;
                    }
                    // START UPLOAD certificate_image
                    foreach ($_FILES['certificate_image']['name'] as $key => $certificate_image) {
                        $newcertificate_image = time() . "_" . $certificate_image;
                        move_uploaded_file($_FILES['certificate_image']['tmp_name'][$key], 'admin/upload/art_upload/' . $newcertificate_image);
                        $location3 = 'admin/upload/art_upload/' . $newcertificate_image;
                    }

                    $first_name = $_POST["first_name"];
                    $last_name = $_POST["last_name"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $country = $_POST["country"];
                    $specialist = $_POST["specialist"];
                    $certificate = $_POST["certificate"];

                    $field = $_POST["field"];
                    $sub_field = $_POST["sub_field"];
                    $register_type = $_POST["register_type"];
                    $project_name = $_POST["project_name"];
                    $project_field = $_POST["project_field"];
                    $project_competation = $_POST["project_competation"];
                    $project_prize = $_POST["project_prize"];

                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $password_repeat = $_POST["password_repeat"];

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
                        $errormessage[] =    $lang["username_found"];
                    }

                    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =   $lang["username_found"];
                    }

                    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =   $lang["username_found"];
                    }
                    $stmt = $connect->prepare("SELECT * FROM register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =    $lang["username_found"];
                    }
                    if (empty($errormessage)) {
                        $stmt = $connect->prepare("INSERT INTO fash_register (first_name, last_name, email, mobile , country, specialist ,
                	certificate , field , sub_field , register_type  , project_name,
                    project_field,project_competation,project_prize,project_certificate_image,
                    national_id,certificate_image,username, password)
                        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,
                         :zcountry , :zspecialist ,
                         :zcertificate,:zfield,:zsub_field,:zregister_type,
                         :zproject_name,:zproject_field ,:zproject_competation,
                         :zproject_prize,:zproject_certificate_image,:znational_id,:zcertificate_image,:zusername,:zpassword)");
                        $stmt->execute(array(
                            "zfirst_name" => $first_name,
                            "zlast_name" => $last_name,
                            "zemail" => $email,
                            "zmobile" => $mobile,
                            "zcountry" => $country,
                            "zspecialist" => $specialist,
                            "zcertificate" => $certificate,
                            "zfield" => $field,
                            "zsub_field" => $sub_field,
                            "zregister_type" => $register_type,
                            "zproject_name" => $project_name,
                            "zproject_field" => $project_field,
                            "zproject_competation" => $project_competation,
                            "zproject_prize" => $project_prize,
                            "zproject_certificate_image" => $location,
                            "znational_id" => $location2,
                            "zcertificate_image" => $location3,
                            "zusername" => $username,
                            "zpassword" => $password,
                        ));
                        if ($stmt) {

                            $to_email = $email;
                            $subject = "اللتسجيل في ريفايفال";
                            $body =  $lang["fashion_register_message"];
                            $headers = "From: info@revivals.site";
                            mail($to_email, $subject, $body, $headers) ?>
            <style>
            .message_form {
                display: none !important;
            }
            </style>
            <div class='container'>
                <div class='alert alert-success text-center'> <?php echo $lang["fashion_register_message"]; ?>
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
            <form class="message_form" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["first_name"];  ?><span> * </span>
                                        </label>
                                        <input name="first_name" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["email"];  ?> <span> *
                                            </span></label>
                                        <input name="email" type="email" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["username"];  ?> <span
                                                class="star"> * </span>
                                        </label>
                                        <input name="username" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
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
                                        <select name="field" class="form-select country4" id="floatingSelectGrid"
                                            aria-label="Floating label country2 example">

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

                                            <option value=" <?php echo $lang["design_fash_f"];  ?>">
                                                <?php echo $lang["design_fash_f"];  ?> </option>
                                            <option value="<?php echo $lang["sewing_f"];  ?>">
                                                <?php echo $lang["sewing_f"];  ?> </option>
                                            <option value="<?php echo $lang["makeup_f"];  ?> ">
                                                <?php echo $lang["makeup_f"];  ?> </option>
                                            <option value="<?php echo $lang["drawing_f"];  ?>">
                                                <?php echo $lang["drawing_f"];  ?> </option>
                                        </select>

                                    </div>


                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> <?php echo $lang["last_name"];  ?><span
                                                class="star"> * </span> </label>
                                        <input name="last_name" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                    </div>

                                    <div class="box mb-3">
                                        <label for="floatingInput"><?php echo $lang["specialist"];  ?> <span
                                                class="star"> * </span></label>
                                        <input name="specialist" type="text" class="form-control" id="floatingInput"
                                            value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['specialist']; ?>">
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
                                        <select name="sub_field" class="form-select country3" id="floatingSelectGrid"
                                            aria-label="Floating label select example">

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

                                            <option value="   <?php echo $lang["drawing_on_canvas_sub_f"];  ?>    ">
                                                <?php echo $lang["drawing_on_canvas_sub_f"];  ?> </option>
                                            <option value=" <?php echo $lang["models_design_sub_f"];  ?>  ">
                                                <?php echo $lang["models_design_sub_f"];  ?> </option>
                                            <option value="   <?php echo $lang["face_makeup_sub_f"];  ?>   ">
                                                <?php echo $lang["face_makeup_sub_f"];  ?> </option>
                                            <option value="  <?php echo $lang["Hairstyle_sub_f"];  ?>   ">
                                                <?php echo $lang["Hairstyle_sub_f"];  ?> </option>

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
                            </div>
                        </div>
                    </div>
                    <div class="experience d-none">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="check_exp">
                                    <h4> هل لديك مشروع قائم </h4>
                                    <div class="main_check">
                                        <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                        <label class="" for="check_exp1"> لا </label>
                                        <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                        <label class="" for="check_exp2"> نعم </label>
                                        <div class="check_exp1_project">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput"> اسم المشروع </label>
                                                <input name="project_name" type="text" class="form-control"
                                                    id="floatingInput"
                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_name']; ?>">

                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="floatingInput"> مجال المشروع </label>
                                                <input name="project_field" type="text" class="form-control"
                                                    id="floatingInput" placeholder=""
                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_field']; ?>">

                                            </div>
                                            <!-- Do Design -->
                                            <div class="prototype_deisgn">
                                                <h4> هل شاركت اعمالك في مسابقات أو معارض!</h4>
                                                <input class="" name="check_design" type="radio" value=""
                                                    id="check_design1">
                                                <label class="" for="check_design1"> لا </label>
                                                <input class="" name="check_design" type="radio" value=""
                                                    id="check_design2">
                                                <label class="" for="check_design2"> نعم </label>
                                                <div class="check_prototype_resualt">
                                                    <div class="form-group mb-3">
                                                        <label for=""> ماهي المسابقات والمعارض التي شارك فيه؟ </label>
                                                        <textarea name="project_competation" class="form-control"
                                                            name=""
                                                            id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_competation']; ?> </textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Do first prototype -->
                                            <div class="prototype_deisgn">
                                                <h4> هل حصل أعمالك على جوائز؟ </h4>

                                                <input class="" name="first_prototype" type="radio" value=""
                                                    id="first_prototype1">
                                                <label class="" for="first_prototype1"> لا </label>

                                                <input class="" name="first_prototype" type="radio" value=""
                                                    id="first_prototype2">
                                                <label class="" for="first_prototype2"> نعم </label>

                                                <div class="check_prototype_resualt">
                                                    <div class="form-group mb-3">
                                                        <label for=""> الجوائز </label>
                                                        <textarea class="form-control" name="project_prize"
                                                            id="floatingInput">  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_prize']; ?> </textarea>

                                                    </div>
                                                    <div class="">
                                                        <div class="">
                                                            <label> صور الشهادات</label>
                                                            <input class="form-control" type="file"
                                                                name="project_certificate_image[]" multiple id="">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4> البطاقة الوطنية </h4>
                                        <input class="form-control" type="file" name="national_id[]" id="" multiple>

                                    </div>
                                    <div class="col-lg-6">
                                        <h4>صورة من المستند</h4>
                                        <input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 cars_sections">
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="text">
                                    <h2 class="mb-0"><a href="#"> <?php echo $lang["fashion_reg_head1"];  ?></a></h2>
                                    <div class="terms_conditions">
                                        <input type="checkbox" id="checkterms" name="check_privacy">
                                        <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                            <?php if ($_SESSION["lang"] == "ar") { ?>

                                            <a href="fash_terms.php"> <?php echo $lang["terms"];  ?> </a>
                                            <?php
                                                } else { ?>
                                            <a href="fash_terms_en.php"> <?php echo $lang["terms"];  ?> </a>
                                            <?php

                                                } ?>


                                        </label>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <div class="reservation_button">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo $lang["register"];  ?> </button>
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