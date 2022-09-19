<?php
ob_start();
session_start();
include 'init.php';
$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
}
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
}
$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
}
$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
}
?>
<div class="cars hero faq booking">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo  $lang["add_new_project_h1"]; ?></h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $uploadplace = "admin/upload/";

    foreach ($_FILES['files1']['name'] as $key => $val) {
        $file = $_FILES['files1']['name'][$key];
        $file_tmp = $_FILES['files1']['tmp_name'][$key];
        move_uploaded_file($file_tmp, $uploadplace . $file);
        $location .= $file . " ";
    }
    foreach ($_FILES['files2']['name'] as $key => $val) {
        $file = $_FILES['files2']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp2 = $_FILES['files2']['tmp_name'][$key];
        move_uploaded_file($file_tmp2, $uploadplace . $file);
        $location2 .= $file . " ";
    }

    foreach ($_FILES['files3']['name'] as $key => $val) {
        $file = $_FILES['files3']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp3 = $_FILES['files3']['tmp_name'][$key];
        move_uploaded_file($file_tmp3, $uploadplace . $file);
        $location3 .= $file . " ";
    }

    foreach ($_FILES['files4']['name'] as $key => $val) {
        $file = $_FILES['files4']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp4 = $_FILES['files4']['tmp_name'][$key];
        move_uploaded_file($file_tmp4, $uploadplace . $file);
        $location4 .= $file . " ";
    }

    foreach ($_FILES['files5']['name'] as $key => $val) {
        $file = $_FILES['files5']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp5 = $_FILES['files5']['tmp_name'][$key];
        move_uploaded_file($file_tmp5, $uploadplace . $file);
        $location5 .= $file . " ";
    }

    $project_name = $_POST["project_name"];
    $project_desc = $_POST["about_project"];
    $errormessage = [];
    if (empty($project_name)) {
        $errormessage[] = $lang["add_project_name_error"];
    }
    if (empty($project_desc)) {
        $errormessage[] = $lang["add_project_decs_error"];
    }
    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO revival_add_project (
            project_name, project_desc, certificate_register, eng_draw,
            prototype,project_images,project_video, username) VALUES (
                :zproject_name, :zproject_desc , :zcert_register,:zeng_draw,
                :zprototype,:zproject_image,:zproject_video,:zusername
            )");
        $stmt->execute(array(
            "zproject_name" => $project_name,
            "zproject_desc" => $project_desc,
            "zcert_register" => $location,
            "zeng_draw" => $location2,
            "zprototype" => $location3,
            "zproject_image" => $location4,
            "zproject_video" => $location5,
            "zusername" =>  $_SESSION["username"],
        ));
        if ($stmt) {
            $to_email = $email;
            $subject = "اضافة مشروع جديد";
            $body =  $lang["add_new_project_from_user"];
            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers)
?>
            <style>
                .message_form {
                    display: none !important;
                }
            </style>
            <div class='container'>
                <div class='alert alert-success text-center'> <?php echo $lang["add_new_project_from_user"]; ?>
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
        <form name="" class="message_form" action="" method="POST" enctype="multipart/form-data">
            <div class="data">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="box mb-3">
                                        <label for="first_name"><?php echo $lang["project_name"];  ?><span class="star">
                                                *
                                            </span></label>
                                        <input name="project_name" type="text" class="form-control" id="first_name" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['project_name']; ?>">
                                    </div>
                                    <h3> <?php echo  $lang["legal_information"]; ?> </h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label> <?php echo  $lang["registration_certificate"]; ?> </label>
                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files1[]" id="files" multiple>
                                                                        <p> <a>
                                                                                <?php echo  $lang["select_files"]; ?></a>
                                                                        </p>
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
                                                        <!--     <input type="file" name="project_design[]" class="form-control"
                                                        multiple> -->

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label> <?php echo  $lang["engineering_drawings"]; ?></label>
                                                    <div class="check_prototype_resualt">

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files2[]" id="files2" multiple>
                                                                        <p> <a> <?php echo  $lang["select_files"]; ?>
                                                                            </a>
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

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <div class="">
                                                    <label><?php echo  $lang["Prototype"]; ?></label>
                                                    <div class="check_prototype_resualt">

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="files3[]" id="files3" multiple>
                                                                        <p> <a><?php echo  $lang["select_files"]; ?></a>
                                                                        </p>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                </div>
                                                            </div>

                                                            <output id="image-gallery3"></output>


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-12">
                                    <h3><?php echo  $lang["about_project"]; ?></h3>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="about_project" id="floatingInput" cols="30" rows="6"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="">
                                                <label> <?php echo  $lang["project_image"]; ?></label>
                                                <div class="check_prototype_resualt">

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="files4[]" id="files4" multiple>
                                                                    <p> <a> <?php echo  $lang["select_files"]; ?></a>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>

                                                        <output id="image-gallery4"></output>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="">
                                                <label> <?php echo  $lang["project_video"]; ?></label>
                                                <div class="check_prototype_resualt">

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="files5[]" id="files5" multiple>
                                                                    <p> <a> <?php echo  $lang["select_files"]; ?></a>
                                                                    </p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>

                                                        <output id="image-gallery5"></output>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                    <div class="reservation_button">
                                        <input class="btn button" type="submit" value="<?php echo  $lang["add_new_project_h1"]; ?>">
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
<!-- END CONTACT FORM -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>