<?php
$username = $_GET["username"];
$cat_name = "fash";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $location6 = '';
    $location7 = '';
    $location8 = '';
    $location9 = '';

    $uploadplace = "admin/upload/";
    // START GET EMAIL CONTENT  -->

    $stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='اضافة موهبة'");
    $stmt->execute();
    $emaildata = $stmt->fetchAll();

    // END GET EMAIL CONTENT -->
    // START UPLOAD PROJECT DESIGN (project_design)

    foreach ($_FILES['project_certificate_image']['name'] as $key => $val) {
        $file = $_FILES['project_certificate_image']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp1 = $_FILES['project_certificate_image']['tmp_name'][$key];
        move_uploaded_file($file_tmp1, $uploadplace . $file);
        $location .= $file . " ";
    }
    /////////////////
    // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

    foreach ($_FILES['national_id']['name'] as $key => $val) {
        $file = $_FILES['national_id']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp2 = $_FILES['national_id']['tmp_name'][$key];
        move_uploaded_file($file_tmp2, $uploadplace . $file);
        $location2 .= $file . " ";
    }


    foreach ($_FILES['certificate_image']['name'] as $key => $val) {
        $file = $_FILES['certificate_image']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp3 = $_FILES['certificate_image']['tmp_name'][$key];
        move_uploaded_file($file_tmp3, $uploadplace . $file);
        $location3 .= $file . " ";
    }
    // START Talent Image

    foreach ($_FILES['talent_image']['name'] as $key => $val) {
        $file = $_FILES['talent_image']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp9 = $_FILES['talent_image']['tmp_name'][$key];
        move_uploaded_file($file_tmp9, $uploadplace . $file);
        $location9 .= $file . " ";
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $specialist = $_POST["specialist"];
    $certificate = $_POST["certificate"];

    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_competation = $_POST["project_competation"];
    $project_prize = $_POST["project_prize"];

    $personal_information = $_POST["personal_information"];

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

        $stmt = $connect->prepare("INSERT INTO company_register (first_name, last_name, email, mobile,talent_image,specialist ,
                certificate, project_name,
                project_field,project_competation,project_prize,project_certificate_image,
                national_id,certificate_image,personal_information,username,cat_name)
                VALUES (:zfname,:zlname,:zemail,:zmobile,:ztalent_image,:zspecialist,:zcertificate,
                :zproject_name,
                :zproject_field,:zproject_competition,:zproject_prize,:zproject_certificate_image,
                :znational_id,:zcertificate_image,:zpersonal_information,:zusername,:zcat_name)");
        $stmt->execute(array(
            "zfname" => $first_name,
            "zlname" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "ztalent_image" => $location9,
            "zspecialist" => $specialist,
            "zcertificate" => $certificate,
            "zproject_name" => $project_name,
            "zproject_field" => $project_field,
            "zproject_competition" => $project_competation,
            "zproject_prize" => $project_prize,
            "zproject_certificate_image" => $location,
            "znational_id" => $location2,
            "zcertificate_image" => $location3,
            "zpersonal_information" => $personal_information,
            "zusername" => $username,
            "zcat_name" => $cat_name,
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

?>


<?php
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=? AND user_status='active'");
$stmt->execute(array($username));
$count  = $stmt->rowCount();
if ($count >  0) { ?>
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
                                            <!--------------------END PHP  CODE VALIDATION --------------->

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
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["email"];  ?> <span class="star"> *
                                                                        </span>
                                                                    </label>
                                                                    <input name="email" type="email" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['email']; ?>">
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
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["last_name"];  ?><span class="star"> * </span></label>
                                                                    <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['last_name']; ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                        <span class="star"> * </span></label>
                                                                    <input name="specialist" type="text" class="form-control" id="floatingInput" value=" <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['specialist']; ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label> <?php echo $lang["talent_image"];  ?> </label>
                                                                    <div class="upload-file">
                                                                        <div class="upload-wrapper">
                                                                            <label>
                                                                                <input type="file" name="talent_image[]" id="files9">
                                                                                <p> <a> <?php echo $lang["select_image"];  ?> </a></p>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                        </div>
                                                                    </div>
                                                                    <output id="image-gallery9"></output>

                                                                </div>

                                                                <div class=" mb-3">
                                                                    <div class="box mb-3">
                                                                        <label for="floatingInput">
                                                                            <?php echo $lang["Brief_about_you"]; ?> <span class="star">
                                                                                * </span></label>
                                                                        <textarea name="personal_information" class="form-control"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['personal_information']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="experience data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="check_exp">
                                            <h4> <?php echo $lang["existing_project"]; ?> </h4>
                                            <div class="main_check">
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                                <label class="" for="check_exp1"> <?php echo $lang["no"]; ?> </label>
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                                <label class="" for="check_exp2"> <?php echo $lang["yes"]; ?> </label>
                                                <div class="check_exp1_project">
                                                    <div class="form-group mb-3">
                                                        <label for="floatingInput">
                                                            <?php echo $lang["project_name"]; ?></label>
                                                        <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_name']; ?>">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="floatingInput">
                                                            <?php echo $lang["project_filed"]; ?></label>
                                                        <input name="project_field" type="text" class="form-control" id="floatingInput" placeholder="" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_field']; ?>">

                                                    </div>
                                                    <!-- Do Design -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["works_participated"]; ?> </h4>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                        <label class="" for="check_design1">
                                                            <?php echo $lang["no"]; ?></label>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                        <label class="" for="check_design2"> <?php echo $lang["yes"]; ?>
                                                        </label>
                                                        <div class="check_prototype_resualt">
                                                            <div class="form-group mb-3">
                                                                <label for=""> <?php echo $lang["What_competitions"]; ?>
                                                                </label>
                                                                <textarea name="project_competation" class="form-control" name="" id="floatingInput"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_competation']; ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Do first prototype -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["work_received_awards"]; ?></h4>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                        <label class="" for="first_prototype1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                        <label class="" for="first_prototype2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="form-group mb-3">
                                                                <label for=""> <?php echo $lang["Awards"]; ?> </label>
                                                                <textarea class="form-control" name="project_prize" id="floatingInput"><?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['project_prize']; ?></textarea>

                                                            </div>

                                                            <div class="col-lg-12">
                                                                <label> <?php echo $lang["Certificate_images"]; ?> </label>

                                                                <div class="box mb-3">
                                                                    <div class="upload-file">
                                                                        <div class="upload-wrapper">
                                                                            <label>
                                                                                <input type="file" name="project_certificate_image[]" id="files" multiple accept="image/*">
                                                                                <p> <a> <?php echo $lang["select_files"]; ?>
                                                                                    </a></p>
                                                                            </label>
                                                                            <span class="files_type"> .jpg, .jpeg,
                                                                                .png, .gif </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12">

                                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                        </div>
                                                                    </div>
                                                                    <output id="image-gallery"></output>

                                                                </div>

                                                                <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="row">

                                            <div class="col-lg-12">
                                                <label> <?php echo $lang["national_id_image"]; ?> </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="national_id[]" id="files2" multiple accept="image/*">
                                                                <p> <?php echo $lang["select_files"]; ?>
                                                                </p>
                                                            </label>
                                                            <span class="files_type"> .jpg, .jpeg,
                                                                .png, .gif </span>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery2"></output>

                                                </div>

                                                <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                            </div>

                                            <div class="col-lg-12">
                                                <label>
                                                    <p> <?php echo $lang["upload_cv_document"]; ?>
                                                    </p>
                                                </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="certificate_image[]" id="files3" multiple accept=".doc, .docx, .pdf">
                                                                <p> <?php echo $lang["select_files"]; ?>
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
                                                    <output id="image-gallery3"></output>

                                                </div>

                                                <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="">
                        <div class="reservation_button">
                            <button type="submit" class="btn main_button">
                                <?php echo $lang["add_talent"]; ?></button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <br>
    <br>
    <div class="alert_message alert alert-warning d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>
            حسابك تحت المراجعه الان سيتم الموافقة قريبا من خلال الادمن عند اكمال جميع الملفات الخاصة بك
        </div>
    </div>
    <br>
    <br>
<?php
} ?>


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