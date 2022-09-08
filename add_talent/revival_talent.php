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
                    'zfname'=>$first_name,
                    'zlname'=>$last_name,
                    'zemail'=>$email,
                    'zmobile'=>$mobile,
                    'zspecialist'=>$specialist,
                    'zcertificate'=>$certificate,
                    'zpersonal_information'=>$personal_information,
                    'zcv'=>$location,
                    'zvideos'=>$location2,
                    'zusername'=>$username

                ));
                if ($stmt) {
                    header("refresh: 0");
?>


<div class='container'>
    <div class='alert alert-success text-center'>
    <?php echo $lang['add_talent_suc'];  ?>
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
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["first_name"];  ?><span
                                                                        class="star"> * </span></label>
                                                                <input name="first_name" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value="">

                                                            </div>
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["email"];  ?> <span class="star">
                                                                        *
                                                                    </span></label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="floatingInput"
                                                                    value="">
                                                            </div>
  
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingSelectGrid"><?php echo $lang["country"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <select name="country" class="form-select country3"
                                                                    id="selectcountry"
                                                                    aria-label="Floating label select example">
                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>



                                                                    <?php
                                                                    $stmt = $connect->prepare("SELECT * FROM countries");
                                                                    $stmt->execute();
                                                                    $allcountry = $stmt->fetchall();
                                                                    foreach ($allcountry as $country) { ?>
                                                                    <option
                                                                        value="<?php echo $country["country_code"]; ?>">
                                                                        <?php echo $country["country_arName"]; ?>
                                                                    </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                                    -->
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["certificate"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>

                                                                <select name="certificate" class="form-select country9"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label country2 example">

                                                                    <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                    <option
                                                                        value="">
                                                                        <?php echo $userdata["certificate"] ?>
                                                                    </option>
                                                                    <?php
                                                                        } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                        }
                                                                        ?>

                                                                    <!--  <option value=""> الموهل العلمي </option> -->
                                                                    <option
                                                                        value=" <?php echo $lang["illiterate"];  ?> ">
                                                                        <?php echo $lang["illiterate"];  ?> </option>
                                                                    <option
                                                                        value=" <?php echo $lang["middle_school"];  ?>">
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
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingSelectGrid"><?php echo $lang["select_field"];  ?></label>
                                                                <select name="field" class="form-select country"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label country example">

                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <option value="ادارة"> ادارة </option>
                                                                    <option value="تسويق">تسويق</option>
                                                                    <option value="تنطيم فعاليات">تنطيم فعاليات
                                                                    </option>

                                                                </select>

                                                            </div>
                                                                    -->
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label for="floatingSelectGrid">
                                                                    <?php echo $lang["register_type"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <select name="reg_type" class="form-select country"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label country example">
                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['reg_type']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['reg_type']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <option value="فردي"> فردي </option>
                                                                    <option value="وسيط او شركة "> وسيط او شركة
                                                                    </option>

                                                                </select>

                                                            </div>
                                                                    -->
                                                        </div>

                                                        <div class="col-lg-6 col-12">
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["last_name"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <input name="last_name" type="text" class="form-control"
                                                                    id="floatingInput"
                                                                    value="">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["mobile"];  ?> <span class="star">
                                                                        * </span></label>
                                                                <input type="tel" name="mobile" id="phone"
                                                                    class="form-control"
                                                                    value="">

                                                            </div>
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["specialist"];  ?> <span
                                                                        class="star"> * </span></label>
                                                                <input name="specialist" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value="">

                                                            </div>
                                                             
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["confirm_password"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <input name="password_repeat" type="password"
                                                                    class="form-control" id="floatingInput"
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                                            </div>
                                                                -->
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingSelectGrid"><?php echo $lang["select_sub_field"];  ?></label>
                                                                <select name="sub_field" class="form-select country"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label select example">
                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <option value="ترجمة"> ترجمة </option>
                                                                    <option value="كتابة محتوي "> كتابة محتوي </option>
                                                                    <option value="تصميم هوية "> تصميم هوية </option>

                                                                </select>

                                                            </div>
                                                                    -->

                                                        </div>
                                                        <div class=" mb-3">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["Brief_about_you"]; ?> <span
                                                                        class="star">
                                                                        * </span></label>
                                                                <textarea name="personal_information"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="cv[]" id="files"
                                                                            multiple accept=".doc, .docx, .pdf">
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
                                                                        <input type="file" name="videos[]" id="files2"
                                                                            multiple accept="video/*">
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
 
 