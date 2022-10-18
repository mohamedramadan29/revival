<?php
include "../connect.php";
include "../config.php";
?>



<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في ريفايفال'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $specialist = $_POST["specialist"];

    $field = $_POST["field"];
    $sub_field = $_POST["sub_field"];
    $reg_type = $_POST["register_type"];
    $certificate = $_POST["certificate"];
    $username = $_POST["username"];
    $password = $_POST["password"];

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
        $stmt = $connect->prepare("INSERT INTO register (first_name, last_name,
                    email, mobile , country,
                    specialist, certificate , field, sub_field , reg_type, username, password)
                           VALUES (:zfirst_name,:zlast_name,:zemail,
                            :zmobile, :zcountry, :zspecial,:zcertificate, :zfield,:zsubfield, :zreg_type,:zusername, :zpassword)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
            "zlast_name" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zcountry" => $country,
            "zspecial" => $specialist,
            "zcertificate" => $certificate,
            "zfield" => $field,
            "zsubfield" => $sub_field,
            "zreg_type" => $reg_type,
            "zusername" => $username,
            "zpassword" => $password,
        ));
        if ($stmt) {
            ?>
              <script>
                document.getElementById("first_form").reset();
                setTimeout(() => {
                    document.location.reload();
                }, 2000);
            </script>
            <?php

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
                <div class='alert alert-success text-center'> <?php
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
    } else {?>
        <style>
        .my_progress{
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