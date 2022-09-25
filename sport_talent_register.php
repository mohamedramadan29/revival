<?php
ob_start();
session_start();
include 'init.php';

?>

<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["sport_talent_reg_head1"]; ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في الرياضة'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->
<?php
if (isset($_SESSION["username"])) { ?>
    <div class="registeration_message alert alert-danger text-center"> انت بالفعل قيد التسجيل </div>
<?php
} else { ?>

    <div class="contact_form">
        <div class="container">
            <div class="data">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $file = '';
                    $file_tmp = '';
                    $location = '';
                    $uploadplace = "admin/upload/";

                    foreach ($_FILES['talent_image']['name'] as $key => $val) {
                        $file = $_FILES['talent_image']['name'][$key];
                        $file_tmp = $_FILES['talent_image']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $uploadplace . $file);
                        $location .= $file . " ";
                    }

                    $first_name2 = $_POST["first_name2"];
                    $last_name = $_POST["last_name"];
                    $email = $_POST["email"];
                    $mobile = $_POST["mobile"];
                    $country = $_POST["country"];
                    $specialist = $_POST["specialist"];
                    $certificate = $_POST["certificate"];

                    $field = $_POST["field"];
                    $sub_field = $_POST["sub_field"];
                    $register_type = $_POST["register_type"];
                    $experience_info = $_POST["experience_info"];
                    $team_name = $_POST["team_name"];
                    $player_postion = $_POST["player_position"];
                    $player_taller = $_POST["player_taller"];
                    $player_weight = $_POST["player_weight"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $password_repeat = $_POST["password_repeat"];

                    if (isset($_POST["team_register"])) {
                        $team_register = "yes";
                    } else {
                        $team_register = "no";
                    }
                    $errormessage = [];
                    if (isset($_POST["check_privacy"])) {
                    } else {
                        $errormessage[] = $lang["check_privacy"];
                    }

                    if (empty($first_name2)) {
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
                        $errormessage[] = $lang["username_found"];
                    }
                    $stmt = $connect->prepare("SELECT * FROM register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] = $lang["username_found"];
                    }
                    if (empty($errormessage)) {
                        $stmt = $connect->prepare("INSERT INTO sport_register (first_name2, last_name, email, mobile ,talent_image ,country, specialist ,
    certificate , field , sub_field , register_type,
    experience_info,team_name,team_register, username, password,player_weight,player_position,player_taller) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,:ztalent_image,
        :zcountry , :zspecialist ,
        :zcertificate,:zfield,:zsub_field,:zregister_type,
        :zexperience_info, :zteam_name , :zteam_register,:zusername, :zpassword,:zpweight,:zpposition,:zptall)");
                        $stmt->execute(array(
                            "zfirst_name" => $first_name2,
                            "zlast_name" => $last_name,
                            "zemail" => $email,
                            "zmobile" => $mobile,
                            "ztalent_image" => $location,
                            "zcountry" => $country,
                            "zspecialist" => $specialist,
                            "zcertificate" => $certificate,
                            "zfield" => $field,
                            "zsub_field" => $sub_field,
                            "zregister_type" => $register_type,
                            "zexperience_info" => $experience_info,
                            "zteam_name" => $team_name,
                            "zteam_register" => $team_register, 
                            "zusername" => $username,
                            "zpassword" => $password,
                            "zpweight" => $player_weight,
                            "zpposition" => $player_postion,
                            "zptall" => $player_taller,
                        ));
                        if ($stmt) {


                            $to_email = $email;
                            $subject = "اللتسجيل في ريفايفال";
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
                <form class="message_form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info">

                                <div class="col-lg-12 col-12">
                                    <div class="info">

                                        <div class="row">

                                            <div class="col-lg-6 col-12">

                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["first_name"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="first_name2" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name2']; ?>">

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["email"];  ?> <span class="star"> *
                                                        </span></label>
                                                    <input name="email" type="email" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["username"];  ?><span class="star"> * </span>
                                                    </label>
                                                    <input name="username" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['username']; ?>">
                                                </div>
                                                <div class="box mb-3">

                                                    <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star"> *
                                                        </span></label>
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
                                                                <?php echo $country["country_arName"]; ?> </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["certificate"];  ?><span class="star"> *
                                                        </span></label>

                                                    <select name="certificate" class="form-select country9" id="floatingSelectGrid" aria-label="Floating label country2 example">

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
                                                        <option value="<?php echo $lang["ba"];  ?>">
                                                            <?php echo $lang["ba"];  ?>
                                                        </option>
                                                        <option value="<?php echo $lang["masters"];  ?> ">
                                                            <?php echo $lang["masters"];  ?> </option>
                                                    </select>


                                                </div>
                                                <div class="box">
                                                    <label for="floatingSelectGrid"><?php echo $lang["select_field"];  ?><span class="star"> *
                                                        </span></label>
                                                    <select name="field" class="form-select country" id="floatingSelectGrid" aria-label="Floating label country example">

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
                                                        $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='مواهب العالم الرياضية'");
                                                        $stmt->execute();
                                                        $mainfiled = $stmt->fetchAll();
                                                        foreach ($mainfiled as $filed) {
                                                            if ($_SESSION["lang"] == "ar") {
                                                                $fileds = $filed['select_name'];
                                                            } else {
                                                                $fileds = $filed['select_name_en'];
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
                                            <div class="col-lg-6 col-12">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> <?php echo $lang["last_name"];  ?><span class="star"> *
                                                        </span></label>
                                                    <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                                </div>

                                                <div class="box mb-3">
                                                    <label for="floatingInput"><?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                                    <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['specialist']; ?>">

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

                                                <div class="box mb-3">
                                                    <label for="floatingSelectGrid">
                                                        <?php echo $lang["select_sub_field"];  ?><span class="star">
                                                            * </span></label>
                                                    <select name="sub_field" class="form-select country" id="floatingSelectGrid" aria-label="Floating label country example">

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
                                                        $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='مواهب العالم الرياضية'");
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

                                                <label> <?php echo $lang["talent_image"];  ?> </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="talent_image[]" id="files">
                                                                <p> <a> <?php echo $lang["select_image"];  ?> </a></p>
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
                        </div>
                        <div class="experience d-none">
                            <h4> خبراتك </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                        <textarea class="form-control" name="experience_info" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['experience_info']; ?></textarea>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل تلعب فى نادي رسمى </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> اسم النادي </label>
                                                    <input name="team_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['team_name']; ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل انت مسجل رسميا بعقد في قائمة النادي؟!</h4>
                                                    <input class="" name="team_register" type="radio" value="" id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="team_register" type="radio" value="" id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل انت لاعب كرة قدم</h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> العمر </label>
                                                    <input name="player_position" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['player_position']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الوزن</label>
                                                    <input name="player_weight" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['player_weight']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الطول</label>
                                                    <input name="player_taller" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['player_taller']; ?>">
                                                </div>

                                            </div>
                                        </div>

                                    </div>





                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4>فيديو توضح موهبتك </h4>
                                            <input class="form-control" type="file" name="video_talent[]" multiple id="">
                                        </div>
                                        <div class="col-lg-6">
                                            <h4> ارفق المستندات الخاصة بك </h4>
                                            <input type="file" name="fiels_talent[]" id="" class="form-control" multiple>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 cars_sections">
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">

                                    <div class="text">
                                        <h2 class="mb-0"><a href="#"> <?php echo $lang["sport_talent_reg_head1"];  ?> </a>
                                        </h2>
                                        <div class="terms_conditions">
                                            <input type="checkbox" id="checkterms" name="check_privacy">
                                            <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                                <a target="_blank" href="rev_terms.php?page=مواهب العالم الرياضية"> <?php echo $lang["terms"];  ?></a>
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