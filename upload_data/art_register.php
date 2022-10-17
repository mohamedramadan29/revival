<?php
session_start();
include "../connect.php";
include "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp1 = '';
    $file_tmp2 = '';
    $file_tmp3 = '';
    $file_tmp4 = '';
    $file_tmp5 = '';
    $file_tmp6 = '';
    $file_tmp7 = '';
    $file_tmp8 = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $location6 = '';
    $location7 = '';
    $location8 = '';

    $uploadplace = "../admin/upload/";

    // START UPLOAD PROJECT DESIGN (project_design)
    if (isset($_FILES['project_design']['name'])) {
        foreach ($_FILES['project_design']['name'] as $key => $val) {
            $file = $_FILES['project_design']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['project_design']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
    }


    /////////////////
    // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

    if (isset($_FILES['project_prototype']['name'])) {
        foreach ($_FILES['project_prototype']['name'] as $key => $val) {
            $file = $_FILES['project_prototype']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['project_prototype']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }
    }
    // START UPLOAD project_video (project_video)

    if (isset($_FILES['project_video']['name'])) {
        foreach ($_FILES['project_video']['name'] as $key => $val) {
            $file = $_FILES['project_video']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp3 = $_FILES['project_video']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }
    }

    // START UPLOAD project_certificate(project_certificate)

    if (isset($_FILES['project_certificate']['name'])) {
        foreach ($_FILES['project_certificate']['name'] as $key => $val) {
            $file = $_FILES['project_certificate']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp4 = $_FILES['project_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp4, $uploadplace . $file);
            $location4 .= $file . " ";
        }
    }

    // START UPLOAD national_id (national_id)
    if (isset($_FILES['national_id']['name'])) {
        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp5 = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp5, $uploadplace . $file);
            $location5 .= $file . " ";
        }
    }


    // START UPLOAD certificate_image
    if (isset($_FILES['certificate_image']['name'])) {
        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp6 = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp6, $uploadplace . $file);
            $location6 .= $file . " ";
        }
    }
    // START UPLOAD last_certificate 

    if (isset($_FILES['last_certificate']['name'])) {
        foreach ($_FILES['last_certificate']['name'] as $key => $val) {
            $file = $_FILES['last_certificate']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp7 = $_FILES['last_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp7, $uploadplace . $file);
            $location7 .= $file . " ";
        }
    }

    // START UPLOAD CV
    if (isset($_FILES['cv']['name'])) {
        foreach ($_FILES['cv']['name'] as $key => $val) {
            $file = $_FILES['cv']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp8 = $_FILES['cv']['tmp_name'][$key];
            move_uploaded_file($file_tmp8, $uploadplace . $file);
            $location8 .= $file . " ";
        }
    }
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $specialist = $_POST["specialist"];
    $certificate = $_POST["certificate"];
    $experience_info = $_POST["experience_info"];
    $language_speak = $_POST["language_speak"];
    $project_details = $_POST["project_details"];
    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_tools = $_POST["project_tools"];
    $project_date = $_POST["project_date"];
    $project_competation = $_POST["project_competation"];
    $project_prize = $_POST["project_prize"];

    $password = $_POST["password"];

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

        $stmt = $connect->prepare("UPDATE art_register SET
        first_name=?, last_name=?, email=?,mobile=? , specialist=? ,certificate=? ,
experience_info=?, language_speak=? , project_details=? , project_name=?,
project_field=?,project_tools=? , project_date=?,project_competation=?,project_prize=?
, password=? WHERE username=?");
        $stmt->execute(array(
            $first_name,
            $last_name,
            $email,
            $mobile,
            $specialist,
            $certificate,
            $experience_info,
            $language_speak,
            $project_details,
            $project_name,
            $project_field,
            $project_tools,
            $project_date,
            $project_competation,
            $project_prize,
            $password,
            $_SESSION['username'],
        ));
        if ($file_tmp1 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET project_design=? WHERE username=?");
            $stmt->execute(array(
                $location,
                $_SESSION['username'],
            ));
        }
        if ($file_tmp2 != '') {

            $stmt = $connect->prepare("UPDATE art_register SET project_prototype=?  WHERE username=?");
            $stmt->execute(array(
                $location2,
                $_SESSION['username'],
            ));
        }

        if ($file_tmp3 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET project_video=?  WHERE username=?");
            $stmt->execute(array(
                $location3,
                $_SESSION['username'],
            ));
        }
        if ($file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET project_certificate=? WHERE username=?");
            $stmt->execute(array(
                $location4,
                $_SESSION['username']
            ));
        }
        if ($file_tmp5 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET national_id=?
             WHERE username=?");
            $stmt->execute(array(
                $location5,
                $_SESSION['username'],
            ));
        }
        if ($file_tmp6 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET certificate_image=? WHERE username=?");
            $stmt->execute(array(
                $location6,
                $_SESSION['username'],
            ));
        }
        if ($file_tmp7 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET last_certificate=?  WHERE username=?");
            $stmt->execute(array(
                $location7,
                $_SESSION['username'],
            ));
        }
        if ($file_tmp8 != '') {
            $stmt = $connect->prepare("UPDATE art_register SET cv=?  WHERE username=?");
            $stmt->execute(array(
                $location8,
                $_SESSION['username'],
            ));
        }

        if ($stmt) { ?>
            <script>
                document.getElementById("update_1").reset();
                setTimeout(() => {
                    document.location.reload();
                }, 2000);
            </script>
            <?php

            ?>
            <div class='container'>
                <div class='alert alert-success text-center'>
                    <?php echo $lang["suc_profile_message"];  ?>
                </div>
            </div>
        <?php
        }
    } else { ?>

        <style>
            .my_progress {
                display: none;
            }
        </style>
        <?php
        foreach ($errormessage as $message) { ?>
            <div class="error_message">
                <div class="alert alert-danger"> <?php echo $message ?> </div>
            </div>
<?php
        }
    }
}
