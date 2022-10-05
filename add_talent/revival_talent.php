<?php

$username = $_GET["username"];

// START UPDATE CODE 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    // $country = $_POST["country"];
    $specialist = $_POST["specialist"];

    //   $field = $_POST["field"];
    //   $sub_field = $_POST["sub_field"];
    //      $reg_type = $_POST["reg_type"];
    $certificate = $_POST["certificate"];
    //    $username = $_POST["username"];
    //  $password = $_POST["password"];

    $personal_information = $_POST["personal_information"];

    $file = '';
    $file_tmp = '';
    $location = '';
    $location2 = '';


    $uploadplace = "admin/upload/";

    // START GET EMAIL CONTENT  -->

    $stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='اضافة موهبة'");
    $stmt->execute();
    $emaildata = $stmt->fetchAll();

    // END GET EMAIL CONTENT -->
    // START UPLOAD CV FIELS
    foreach ($_FILES['cv']['name'] as $key => $val) {
        $file = $_FILES['cv']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp1 = $_FILES['cv']['tmp_name'][$key];

        move_uploaded_file($file_tmp1, $uploadplace . $file);
        $location .= $file . " ";
    }

    // START VIDEOS UPLOAD FIELS 
    foreach ($_FILES['videos']['name'] as $key => $val) {
        $file = $_FILES['videos']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp2 = $_FILES['videos']['tmp_name'][$key];
        move_uploaded_file($file_tmp2, $uploadplace . $file);
        $location2 .= $file . " ";
    }


    $errormessage = [];
    /*
        if (isset($_POST["check_privacy"])) {
        } else {
            $errormessage[] = $lang["check_privacy"];
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
*/

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

    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO company_register ( 
                first_name, last_name,email, mobile ,
                specialist, certificate,personal_information,
                cv,videos,username) VALUES (:zfname,:zlname,:zemail,:zmobile,
                :zspecialist,:zcertificate,:zpersonal_information,
                :zcv,:zvideos,:zusername)");
        $stmt->execute(array(
            'zfname' => $first_name,
            'zlname' => $last_name,
            'zemail' => $email,
            'zmobile' => $mobile,
            'zspecialist' => $specialist,
            'zcertificate' => $certificate,
            'zpersonal_information' => $personal_information,
            'zcv' => $location,
            'zvideos' => $location2,
            'zusername' => $username

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
            header("Location:profile.php");
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

// END UPDATE CODE
?>




<div class="profile_data update_profile">
    <div class="container">
        <div class="data">
            <form class="message_form" action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="info2">
                            <div class="contact_form">
                                <div class="container">
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <div class="info">

                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput"><?php echo $lang["first_name"];  ?><span class="star"> * </span></label>
                                                                <input name="first_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['first_name']; ?>">

                                                            </div>
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["email"];  ?> <span class="star">
                                                                        *
                                                                    </span></label>
                                                                <input name="email" type="email" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
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
                                                                <label for="floatingInput"><?php echo $lang["last_name"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['last_name']; ?>">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["mobile"];  ?> <span class="star">
                                                                        * </span></label>
                                                                <input type="tel" name="mobile" id="phone" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['mobile']; ?>">

                                                            </div>
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                                                <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['specialist']; ?>">

                                                            </div>
                                                        </div>
                                                        <div class=" mb-3">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["Brief_about_you"]; ?> <span class="star">
                                                                        * </span></label>
                                                                <textarea name="personal_information" class="form-control"><?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['personal_information']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="cv[]" id="files" multiple accept=".doc, .docx, .pdf">
                                                                        <p> <?php echo $lang["upload_cv_document"]; ?>
                                                                        </p>
                                                                    </label>
                                                                    <span class="files_type"> .doc, .docs,
                                                                        .pdf </span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>

                                                            <output id="image-gallery"></output>

                                                        </div>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="videos[]" id="files2" multiple accept="video/*">
                                                                        <p> <?php echo $lang["upload_video"]; ?>
                                                                        </p>
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
                                                        <div class="">
                                                            <div class="reservation_button">
                                                                <button type="submit" class="btn main_button">
                                                                    <?php echo $lang["add_talent"]; ?>
                                                                </button>
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
</div>
</div>

</div>
</div>
</div>
</div>