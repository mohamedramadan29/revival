<?php
$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
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
        $password = $_POST["password"];

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
            if ($file_tmp1 != '' && $file_tmp2 != '') {

                $stmt = $connect->prepare("UPDATE register SET 
                first_name=?, last_name=?,email=?, mobile=? ,
                specialist=?, certificate=? ,password=?,personal_information=?,
                cv=?,videos=? WHERE username=? ");
                $stmt->execute(array(
                    $first_name,
                    $last_name,
                    $email,
                    $mobile,
                    $specialist,
                    $certificate,
                    $password,
                    $personal_information,
                    $location,
                    $location2,
                    $_SESSION["username"]
                ));
                if ($stmt) {
                    header("Location:profile.php");
?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>

                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '') {
                $stmt = $connect->prepare("UPDATE register SET 
                first_name=?, last_name=?,email=?, mobile=? ,
                specialist=?, certificate=? , password=?,personal_information=?,
                cv=? WHERE username=? ");
                $stmt->execute(array(
                    $first_name,
                    $last_name,
                    $email,
                    $mobile,
                    $specialist,
                    $certificate,
                    $password,
                    $personal_information,
                    $location,

                    $_SESSION["username"]

                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>


                    <div class='container'>
                        <div class='alert alert-success text-center'>

                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php

                }
            } elseif ($file_tmp2 != '') {
                $stmt = $connect->prepare("UPDATE register SET 
                first_name=?, last_name=?,email=?, mobile=? ,
                specialist=?, certificate=? , password=?,personal_information=?,
                 videos=? WHERE username=? ");
                $stmt->execute(array(
                    $first_name,
                    $last_name,
                    $email,
                    $mobile,
                    $specialist,
                    $certificate,
                    $password,
                    $personal_information,

                    $location2,
                    $_SESSION["username"]

                ));
                if ($stmt) {
                    header("Location:profile.php");

                ?>


                    <div class='container'>
                        <div class='alert alert-success text-center'>

                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php

                }
            } else {
                $stmt = $connect->prepare("UPDATE register SET 
                first_name=?, last_name=?,email=?, mobile=? ,
                specialist=?, certificate=? , password=?,personal_information=?
             WHERE username=? ");
                $stmt->execute(array(
                    $first_name,
                    $last_name,
                    $email,
                    $mobile,
                    $specialist,
                    $certificate,
                    $password,
                    $personal_information,
                    $_SESSION["username"]
                ));
                if ($stmt) {
                    header("Location:profile.php");

                ?>


                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php

                }
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

                        <div class="col-lg-4">
                            <div class="info">
                                <?php
                                if (strlen($userdata['personal_image']) > 0) { ?>
                                    <div class="personal_image">
                                        <img src="admin/upload/<?php echo $userdata['personal_image']; ?>" alt="">

                                    </div>
                                <?php
                                } else { ?>


                                    <div class="personal_image">
                                        <img src="uploads/avatar.png" alt="">

                                    </div>

                                <?php
                                }
                                ?>
                                <h2> <?php echo $userdata["first_name"]; ?> <?php echo $userdata["last_name"];  ?> </h2>
                                <p> <?php echo $userdata["email"];  ?></p>

                            </div>
                        </div>
                        <div class="col-lg-8">
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
                                                                    <input name="first_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["first_name"]; ?>">

                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["email"];  ?> <span class="star">
                                                                            *
                                                                        </span></label>
                                                                    <input name="email" type="email" class="form-control" id="floatingInput" value="<?php echo $userdata["email"];  ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["username"];  ?><span class="star">
                                                                            * </span>
                                                                    </label>
                                                                    <input disabled name="username" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["username"]; ?>">
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
                                                                    <label for="floatingInput"><?php echo $lang["certificate"];  ?><span class="star"> *
                                                                        </span></label>

                                                                    <select name="certificate" class="form-select country9" id="floatingSelectGrid" aria-label="Floating label country2 example">

                                                                        <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                            <option value="<?php echo $userdata["certificate"] ?>">
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
                                                                    <label for="floatingInput"><?php echo $lang["last_name"];  ?>
                                                                        <span class="star"> * </span></label>
                                                                    <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["last_name"] ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <!--
                                        <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["mobile"];  ?> <span class="star">
                                                                            * </span></label>
                                                                    <input type="tel" name="mobile" id="phone" class="form-control" value="<?php echo $userdata["mobile"] ?>">

                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["specialist"];  ?> <span class="star"> * </span></label>
                                                                    <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["specialist"] ?>">

                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["password"];  ?><span class="star">
                                                                            * </span></label>
                                                                    <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php echo $userdata["password"] ?>">
                                                                    <i class="fa fa-eye"></i>
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
                                                                        <?php echo $lang["Brief_about_you"]; ?> <span class="star">
                                                                            * </span></label>
                                                                    <textarea name="personal_information" class="form-control"><?php echo $userdata["personal_information"] ?></textarea>
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
                                                            <!--
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
 
                                                                    </div>
                                                                </div>

                                                                <output id="image-gallery2"></output>

                                                            </div>
                                                                -->
                                                            <div class="">
                                                                <div class="reservation_button">
                                                                    <button type="submit" class="btn main_button">
                                                                        <?php echo $lang["account_update"]; ?>
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








<?php
}
?>