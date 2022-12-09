<?php
ob_start();
session_start();
include "../connect.php";
include "../config.php";


?>




<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في الازياء'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp = '';
    $location = '';
    $uploadplace = "../admin/upload/";
    if (isset($_FILES['talent_image']['name'])) {
        foreach ($_FILES['talent_image']['name'] as $key => $val) {
            $file = $_FILES['talent_image']['name'][$key];
            $file_tmp = $_FILES['talent_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . " ";
        }
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

    $exist1 = $stmt->fetch();
    if ($exist1 > 0) {
        $errormessage[] =  $lang["username_found"];
    }

    $stmt = $connect->prepare("SELECT * FROM art_register WHERE email=?");
    $stmt->execute(array($email));

    $exist11 = $stmt->fetch();
    if ($exist11 > 0) {
        $errormessage[] =  $lang["email_found"];
    }


    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ?");
    $stmt->execute(array($username));

    $exist2 = $stmt->fetch();

    if ($exist2 > 0) {
        $errormessage[] =  $lang["username_found"];
    }
    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE email=?");
    $stmt->execute(array($email));

    $exist22 = $stmt->fetch();

    if ($exist22 > 0) {
        $errormessage[] =  $lang["email_found"];
    }
    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username = ?");
    $stmt->execute(array($username));

    $exist3 = $stmt->fetch();
    if ($exist3 > 0) {
        $errormessage[] =  $lang["username_found"];
    }

    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE email=?");
    $stmt->execute(array($email));

    $exist33 = $stmt->fetch();
    if ($exist33 > 0) {
        $errormessage[] =  $lang["email_found"];
    }


    $stmt = $connect->prepare("SELECT * FROM register WHERE username = ?");
    $stmt->execute(array($username));

    $exist4 = $stmt->fetch();
    if ($exist4 > 0) {
        $errormessage[] =  $lang["username_found"];
    }
    $stmt = $connect->prepare("SELECT * FROM register WHERE email=?");
    $stmt->execute(array($email));

    $exist44 = $stmt->fetch();
    if ($exist44 > 0) {
        $errormessage[] =  $lang["email_found"];
    }
    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO fash_register (first_name, last_name, email, mobile ,talent_image, country, specialist ,
                	certificate , field , sub_field , register_type  , project_name,
                    project_field,project_competation,project_prize,project_certificate_image,username, password)
                        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,:ztalent_image,
                         :zcountry , :zspecialist ,
                         :zcertificate,:zfield,:zsub_field,:zregister_type,
                         :zproject_name,:zproject_field ,:zproject_competation,
                         :zproject_prize,:zproject_certificate_image,:zusername,:zpassword)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
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
            "zproject_name" => $project_name,
            "zproject_field" => $project_field,
            "zproject_competation" => $project_competation,
            "zproject_prize" => $project_prize,
            "zproject_certificate_image" => $location,
            "zusername" => $username,
            "zpassword" => $password,
        ));
        if ($stmt) {?>
        <script>
                document.getElementById("first_form").reset();
                setTimeout(() => {
                    let url = "login.php";
                    window.location.href = url;
                }, 6000);
            </script>

        <?php

            $to_email = $email;
            $subject = $lang['register_in_fashion_email'];
            foreach ($emaildata as $data) {
                if ($_SESSION['lang'] == 'ar') {
                    $body =  $data['email_text'];
                } else {
                    $body =  $data['email_text_en'];
                }
            }
            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers) ?>
             
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
?>