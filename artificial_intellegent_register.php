<?php
ob_start();
session_start();
include 'init.php';

?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["art_int_reg_head1"];  ?> </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<!-- START CONTACT FORM -->
<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في الذكاء الاصطناعي'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->
<?php
if (isset($_SESSION["username"])) { ?>
    <div class="registeration_message alert alert-danger text-center"> <?php echo $lang["ready_register"];  ?> </div>
<?php
} else { ?>
    <div class="contact_form">
        <div class="container">
            <div class="data">

                <!-- START CODE -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $file = '';
                    $file_tmp = '';
                    $location = "admin/upload/art_upload/";
                    $location2 = 'admin/upload/art_upload/';
                    $location3 = 'admin/upload/art_upload/';
                    $location4 = 'admin/upload/art_upload/';
                    $location5 = 'admin/upload/art_upload/';
                    $location6 = 'admin/upload/art_upload/';
                    $location7 = 'admin/upload/art_upload/';
                    $location8 = 'admin/upload/art_upload/';

                    // START UPLOAD PROJECT DESIGN (project_design)
                    /*
                foreach ($_FILES['project_design']['name'] as $key => $project_design) {

                    $newproject_design = time() . "_" . $project_design;
                    move_uploaded_file($_FILES['project_design']['tmp_name'][$key], 'admin/upload/art_upload/' . $newproject_design);

                    $location = 'admin/upload/art_upload/' . $newproject_design;
                }
                */
                    foreach ($_FILES['project_design']['name'] as $key => $val) {
                        $file = $_FILES['project_design']['name'][$key];
                        $file_tmp = $_FILES['project_design']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location . $file);
                        $location .= $file . " ";
                    }
                    /////////////////
                    // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)
                    /*
                foreach ($_FILES['project_prototype']['name'] as $key => $project_prototype) {

                    $newproject_prototype = time() . "_" . $project_prototype;
                    move_uploaded_file($_FILES['project_prototype']['tmp_name'][$key], 'admin/upload/art_upload/' . $newproject_prototype);
                    $location2 = 'admin/upload/art_upload/' . $newproject_prototype;
                }
                */

                    foreach ($_FILES['project_prototype']['name'] as $key => $val) {
                        $file = $_FILES['project_prototype']['name'][$key];
                        $file_tmp = $_FILES['project_prototype']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location2 . $file);
                        $location2 .= $file . " ";
                    }

                    // START UPLOAD project_video (project_video)
                    /*
                foreach ($_FILES['project_video']['name'] as $key => $project_video) {

                    $newproject_video = time() . "_" . $project_video;
                    move_uploaded_file($_FILES['project_video']['tmp_name'][$key], 'admin/upload/art_upload/' . $newproject_video);
                    $location3 = 'admin/upload/art_upload/' . $newproject_video;
                }
                */

                    foreach ($_FILES['project_video']['name'] as $key => $val) {
                        $file = $_FILES['project_video']['name'][$key];
                        $file_tmp = $_FILES['project_video']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location3 . $file);
                        $location3 .= $file . " ";
                    }

                    // START UPLOAD project_certificate(project_certificate)
                    /*
                foreach ($_FILES['project_certificate']['name'] as $key => $project_certificate) {

                    $newproject_certificate = time() . "_" . $project_certificate;
                    move_uploaded_file($_FILES['project_certificate']['tmp_name'][$key], 'admin/upload/art_upload/' . $newproject_certificate);
                    $location4 = 'admin/upload/art_upload/' . $newproject_certificate;
                }
                */

                    foreach ($_FILES['project_certificate']['name'] as $key => $val) {
                        $file = $_FILES['project_certificate']['name'][$key];
                        $file_tmp = $_FILES['project_certificate']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location4 . $file);
                        $location4 .= $file . " ";
                    }

                    // START UPLOAD national_id (national_id)
                    foreach ($_FILES['national_id']['name'] as $key => $val) {
                        $file = $_FILES['national_id']['name'][$key];
                        $file_tmp = $_FILES['national_id']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location . $file);
                        $location5 .= $file . " ";
                    }


                    // START UPLOAD certificate_image
                    /*
                foreach ($_FILES['certificate_image']['name'] as $key => $certificate_image) {
                    $newcertificate_image = time() . "_" . $certificate_image;
                    move_uploaded_file($_FILES['certificate_image']['tmp_name'][$key], 'admin/upload/art_upload/' . $newcertificate_image);
                    $location6 = 'admin/upload/art_upload/' . $newcertificate_image;
                }
                */

                    foreach ($_FILES['certificate_image']['name'] as $key => $val) {
                        $file = $_FILES['certificate_image']['name'][$key];
                        $file_tmp = $_FILES['certificate_image']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location6 . $file);
                        $location6 .= $file . " ";
                    }
                    // START UPLOAD last_certificate 
                    /*
                foreach ($_FILES['last_certificate']['name'] as $key => $last_certificate) {
                    $newlast_certificate = time() . "_" . $last_certificate;
                    move_uploaded_file($_FILES['last_certificate']['tmp_name'][$key], 'admin/upload/art_upload/' . $newlast_certificate);
                    $location7 = 'admin/upload/art_upload/' . $newlast_certificate;
                }
                */

                    foreach ($_FILES['last_certificate']['name'] as $key => $val) {
                        $file = $_FILES['last_certificate']['name'][$key];
                        $file_tmp = $_FILES['last_certificate']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location7 . $file);
                        $location7 .= $file . " ";
                    }

                    // START UPLOAD CV
                    /*
                foreach ($_FILES['cv']['name'] as $key => $cv) {
                    $newcv = time() . "_" . $cv;
                    move_uploaded_file($_FILES['cv']['tmp_name'][$key], 'admin/upload/art_upload/' . $newcv);
                    $location8 = 'admin/upload/art_upload/' . $newcv;
                }
                */

                    foreach ($_FILES['cv']['name'] as $key => $val) {
                        $file = $_FILES['cv']['name'][$key];
                        $file_tmp = $_FILES['cv']['tmp_name'][$key];
                        move_uploaded_file($file_tmp, $location8 . $file);
                        $location8 .= $file . " ";
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
                    $experience_info = $_POST["experience_info"];
                    $language_speak = $_POST["language_speak"];
                    $project_details = $_POST["project_details"];
                    $project_name = $_POST["project_name"];
                    $project_field = $_POST["project_field"];
                    $project_tools = $_POST["project_tools"];
                    $project_date = $_POST["project_date"];
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
                        $errormessage[] =  $lang["username_found"];
                    }

                    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ?");
                    $stmt->execute(array($username));

                    $exist = $stmt->fetch();

                    if ($exist > 0) {
                        $errormessage[] =  $lang["username_found"];
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
                        $stmt = $connect->prepare("INSERT INTO art_register (first_name, last_name, email, mobile , country, specialist ,
    certificate , field , sub_field , register_type,
    experience_info, language_speak , project_details , project_name,
    project_field, project_tools , project_date,project_competation,project_prize
    ,username, password) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,
         :zcountry , :zspecialist ,
         :zcertificate,:zfield,:zsub_field,:zregister_type,
         :zexperience_info, :zlanguage_speak, :zproject_details,
         :zproject_name,:zproject_field,:zproject_tools,:zproject_date,:zproject_competation,
         :zproject_prize,:zusername,:zpassword)");
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
                            "zexperience_info" => $experience_info,
                            "zlanguage_speak" => $language_speak,
                            "zproject_details" => $project_details,
                            "zproject_name" => $project_name,
                            "zproject_field" => $project_field,
                            "zproject_tools" => $project_tools,
                            "zproject_date" => $project_date,
                            "zproject_competation" => $project_competation,
                            "zproject_prize" => $project_prize,
                            "zusername" => $username,
                            "zpassword" => $password,
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
                <!--------------------END PHP  CODE VALIDATION --------------->
                <form name="" class="message_form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="info">
                                <div class="row">
                                    <div class="col-lg-6 col-12">

                                        <div class="box mb-3">
                                            <label for="first_name"><?php echo $lang["first_name"];  ?><span class="star"> *
                                                </span></label>
                                            <input name="first_name" type="text" class="form-control" id="first_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">
                                        </div>

                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["email"];  ?> <span class="star"> *
                                                </span>
                                            </label>
                                            <input name="email" type="email" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"><?php echo $lang["username"];  ?><span class="star">
                                                    * </span>
                                            </label>
                                            <input name="username" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['username']; ?>">
                                        </div>
                                        <div class="box mb-3">
                                            <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                            <label for="floatingInput"> <?php echo $lang["mobile"];  ?> <span class="star">
                                                    * </span></label>
                                            <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['mobile']; ?> ">

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
                                                <option value="<?php echo $lang["ba"];  ?>"> <?php echo $lang["ba"];  ?>
                                                </option>
                                                <option value="<?php echo $lang["masters"];  ?> ">
                                                    <?php echo $lang["masters"];  ?> </option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["last_name"];  ?><span class="star"> * </span></label>
                                            <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">

                                        </div>

                                        <div class="box mb-3">
                                            <label for="floatingInput"><?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                            <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['specialist']; ?>">
                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["password"];  ?><span class="star">
                                                    * </span></label>
                                            <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["confirm_password"];  ?><span class="star"> *
                                                </span></label>
                                            <input name="password_repeat" type="password" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                        </div>
                                        <div class="box">
                                            <label for="country9"><?php echo $lang["select_field"];  ?><span class="star"> *
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
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='مدينة الذكاء الإصطناعي'");
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

                                        <div class="box">
                                            <label for="floatingSelectGrid"><?php echo $lang["select_sub_field"];  ?><span class="star"> *
                                                </span></label>
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
                                                $stmt = $connect->prepare("SELECT * FROM form_selection WHERE select_form='مدينة الذكاء الإصطناعي'");
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
                                                    <?php echo $lang["Individually"]; ?> </option>
                                                <option value="<?php echo $lang["broker_company"]; ?>">
                                                    <?php echo $lang["broker_company"];  ?> </option>
                                            </select>
                                        </div>
                                        <br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="experience d-none">
                            <h4 class=""> خبراتك </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                        <textarea name="experience_info" class="form-control" name="" id="floatingInput">  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['experience_info']; ?> </textarea>

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput">ما هي اللغات التي تجيدها تحدثا وكتابة</label>
                                        <textarea name="language_speak" class="form-control" name="" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['language_speak']; ?> </textarea>

                                    </div>
                                    <div class="check_exp">
                                        <h4> هل لديك ابتكارات </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> اسم المشروع </label>
                                                    <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_name']; ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput">نبذة عن المشروع</label>
                                                    <textarea name="project_details" class="form-control" name="" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_details']; ?> </textarea>

                                                </div>

                                                <div class="box mb-3">
                                                    <label for="floatingInput"> مجال المشروع </label>
                                                    <input name="project_field" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_field']; ?>">

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> ماهي التقنيات المستخدمة فى انجاز المشروع
                                                    </label>
                                                    <textarea name="project_tools" class="form-control" name="" id="floatingInput">  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_tools']; ?> </textarea>

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput">تاريخ انجاز المشروع</label>
                                                    <input name="project_date" type="date" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_date']; ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn" id="prototype_deisgn">
                                                    <h4> هل يوجد تصميم !</h4>
                                                    <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>
                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق التصميم </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_design[]" id="files" multiple>
                                                                        <p> <a>اختر الملفات </a></p>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>

                                                            <div id="image-gallery" class="imagegallay">
                                                                <ul class="thumb-Images" id="imgList">

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <!--     <input type="file" name="project_design[]" class="form-control"
                                                        multiple> -->

                                                    </div>
                                                </div>
                                                <!-- Do first prototype -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل يوجد نموذج اولي للمشروع؟</h4>

                                                    <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                    <label class="" for="first_prototype1"> لا </label>

                                                    <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                    <label class="" for="first_prototype2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق صورة </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_prototype[]" id="files2" multiple>
                                                                        <p> <a>اختر الملفات </a></p>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>
                                                            <output class="image-gallery">
                                                                <ul class="thumb-Images" id="imgList2">
                                                                </ul>
                                                            </output>

                                                        </div>
                                                        <!--   <input class="form-control" type="file" name="project_prototype[]"
                                                        id="" multiple> -->

                                                    </div>
                                                </div>
                                                <!-- Do Project Video -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل يوجد فيديو للمشروع؟</h4>

                                                    <!--  <input class="" name="project_video" type="radio" value=""
                                                    id="project_video1"> -->
                                                    <label class="" for="project_video1"> لا </label>

                                                    <input class="" name="project_video" type="radio" value="" id="project_video2">
                                                    <label class="" for="project_video2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق الفيديو </label>

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_video[]" id="files3" multiple>
                                                                        <p> <a>اختر الملفات </a></p>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>
                                                            <!-- <output id="image-gallery"></output> -->

                                                        </div>

                                                        <!--  <input class="form-control" type="file" name="project_video[]" id=""
                                                        multiple> -->

                                                    </div>
                                                </div>
                                                <!-- شهادة براءة اختراع -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل يوجد شهادة براءة اختراع!</h4>
                                                    <input class="" name="project_certificate" type="radio" value="" id="project_certificate1">
                                                    <label class="" for="project_certificate1"> لا </label>
                                                    <input class="" name="project_certificate" type="radio" value="" id="project_certificate2">
                                                    <label class="" for="project_certificate2"> نعم </label>
                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق الشهادة </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_certificate[]" id="files4" multiple>
                                                                        <p> <a>اختر الملفات </a></p>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>
                                                            <!-- <output id="image-gallery"></output> -->

                                                        </div>
                                                        <!--<input class="form-control" type="file" name="project_certificate[]"
                                                        id="" multiple> -->

                                                    </div>
                                                </div>
                                                <!-- Do You Share Project -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل شارك المشروع في مسابقات؟</h4>

                                                    <input class="" name="share_project" type="radio" value="" id="share_project1">
                                                    <label class="" for="share_project1"> لا </label>

                                                    <input class="" name="share_project" type="radio" value="" id="share_project2">
                                                    <label class="" for="share_project2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> ماهي المسابقات التي شارك فيه؟
                                                            </label>
                                                            <textarea name="project_competation" class="form-control" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_competation']; ?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Do Project Get Prize -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل حصل المشروع على جوائز؟</h4>

                                                    <input class="" name="project_prize" type="radio" value="" id="project_prize1">
                                                    <label class="" for="project_prize1"> لا </label>
                                                    <input class="" name="project_prize" type="radio" value="" id="project_prize2">
                                                    <label class="" for="project_prize2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> اذكر الجوائز
                                                            </label>
                                                            <textarea name="project_prize" class="form-control" id="floatingInput"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_prize']; ?> </textarea>
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
                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="national_id[]" id="files5" multiple>
                                                            <p> <a>اختر الملفات </a></p>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">

                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                    </div>
                                                </div>
                                                <!-- <output id="image-gallery"></output> -->

                                            </div>
                                            <!--<input class="form-control" type="file" name="national_id[]" id="" multiple> -->

                                        </div>
                                        <div class="col-lg-6">
                                            <h4>صورة من المستند</h4>
                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="certificate_image[]" id="files6" multiple>
                                                            <p> <a>اختر الملفات </a></p>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">

                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                    </div>
                                                </div>
                                                <!-- <output id="image-gallery"></output> -->

                                            </div>

                                            <!--<input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple> -->

                                        </div>
                                        <div class="row">
                                            <h4> ارفق المستندات التالية </h4>
                                            <div class="col-lg-6">
                                                <label> اخر شهادة علمية</label>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="last_certificate[]" id="files7" multiple>
                                                                <p> <a>اختر الملفات </a></p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <!-- <output id="image-gallery"></output> -->

                                                </div>

                                                <!-- <input class="form-control" type="file" name="last_certificate[]" id=""
                                                multiple> -->

                                            </div>
                                            <div class="col-lg-6">
                                                <label> الفيديوهات </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="cv[]" id="files8" multiple>
                                                                <p> <a>اختر الملفات </a></p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <!-- <output id="image-gallery"></output> -->

                                                </div>

                                                <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

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
                                        <h2 class="mb-0"><a href="#"> <?php echo $lang["art_int_reg_head1"];  ?></a>
                                        </h2>
                                        <div class="terms_conditions">
                                            <input type="checkbox" id="checkterms" name="check_privacy">
                                            <label for="checkterms"> <?php echo $lang["iagree"];  ?>
                                                <a target="_blank" href="rev_terms.php?page=مدينة الذكاء الإصطناعي"> <?php echo $lang["terms"];  ?></a>
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="">
                                            <div class="reservation_button">
                                                <input onclick="reload()" type="submit" class="btn btn-primary" value=" <?php echo $lang["register"];  ?>  ">
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