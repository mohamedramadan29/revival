<?php
include "../connect.php";
include "../config.php";
session_start();
?>





<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='اضافة مشروع جديد'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->



<?php

$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
    $cat_name = "revival_register";
}
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
    $cat_name = "fash";
}
$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
    $cat_name = "art";
}
$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$data = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    $email = $data["email"];
    $cat_name = "sport";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp = '';
    $file_tmp2 = '';
    $file_tmp3 = '';
    $file_tmp4 = '';
    $file_tmp5 = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $uploadplace = "../admin/upload/";

    if (isset($_FILES['files1']['name'])) {
        foreach ($_FILES['files1']['name'] as $key => $val) {
            $file = $_FILES['files1']['name'][$key];
            $file_tmp = $_FILES['files1']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . " ";
        }
    }

    if (isset($_FILES['files2']['name'])) {
        foreach ($_FILES['files2']['name'] as $key => $val) {
            $file = $_FILES['files2']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['files2']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }
    }
    if (isset($_FILES['files3']['name'])) {

        foreach ($_FILES['files3']['name'] as $key => $val) {
            $file = $_FILES['files3']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp3 = $_FILES['files3']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }
    }
    if (isset($_FILES['files4']['name'])) {
        foreach ($_FILES['files4']['name'] as $key => $val) {
            $file = $_FILES['files4']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp4 = $_FILES['files4']['tmp_name'][$key];
            move_uploaded_file($file_tmp4, $uploadplace . $file);
            $location4 .= $file . " ";
        }
    }
    if (isset($_FILES['files5']['name'])) {
        foreach ($_FILES['files5']['name'] as $key => $val) {
            $file = $_FILES['files5']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp5 = $_FILES['files5']['tmp_name'][$key];
            move_uploaded_file($file_tmp5, $uploadplace . $file);
            $location5 .= $file . " ";
        }
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
            prototype,project_images,project_video, username,cat_name) VALUES (
                :zproject_name, :zproject_desc , :zcert_register,:zeng_draw,
                :zprototype,:zproject_image,:zproject_video,:zusername,:zcat_name
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
            "zcat_name" => $cat_name,
        ));
        if ($stmt) {
            $to_email = $email;
            $subject = "اضافة مشروع جديد";
            foreach ($emaildata as $data) {
                if ($_SESSION['lang'] == 'ar') {
                    $body =  $data['email_text'];
                } else {
                    $body =  $data['email_text_en'];
                }
            }
            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers);
            //  header("Location:profile.php");
?>

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