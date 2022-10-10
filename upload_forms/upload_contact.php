<?php
include "../connect.php";
include "../config.php";
?>

<!-- START GET EMAIL CONTENT  -->
<?php

$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='رسالة التواصل'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- END GET EMAIL CONTENT -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = '';
    $file_tmp = '';
    $location = "";
    $uploadplace = "../admin/upload/";
    // START UPLOAD contact_files
    if (isset($_FILES['contact_files']['name'])) {

        foreach ($_FILES['contact_files']['name'] as $key => $val) {
            $file = $_FILES['contact_files']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp = $_FILES['contact_files']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . " ";
        }
    }

    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_message = $_POST["user_message"];
    $email_subject = $_POST["email_subject"];

    $errormessage = [];

    if (empty($user_name)) {
        $errormessage[] =  $lang['enter_username'];
    }

    if (empty($user_email)) {
        $errormessage[] =  $lang['enter_email'];
    }

    if (empty($user_message)) {
        $errormessage[] = $lang['enter_message'];
    }

    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO contact_us (contact_name, contact_email,email_subject ,contact_message,fiels)
                            VALUES (:zname, :zemail,:zemail_subject,:zmessage,:zfiles)");
        $stmt->execute(array(
            "zname" => $user_name,
            "zemail" => $user_email,
            "zemail_subject" => $email_subject,
            "zmessage" => $user_message,
            "zfiles" => $location,
        ));
        if ($stmt) {
            $to_email = $user_email;
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