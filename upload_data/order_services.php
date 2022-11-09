<?php
session_start();
include "../connect.php";
include "../config.php";
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='طلب خدمة جديد'");
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


    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $service_name = $_POST["service_name"];
    $message = $_POST["message"];


    // START UPLOAD national_id (national_id)
    foreach ($_FILES['order_files']['name'] as $key => $val) {
        $file = $_FILES['order_files']['name'][$key];
        $file = str_replace(' ', '', $file);
        $file_tmp1 = $_FILES['order_files']['tmp_name'][$key];
        move_uploaded_file($file_tmp1, $uploadplace . $file);
        $location .= $file . " ";
    }



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

    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO revival_order_services (first_name, last_name,
                    email, mobile , service_name, country,message,files )
                           VALUES (:zfirst_name,:zlast_name,:zemail,
                            :zmobile,:zserv_name ,:zcountry, :zmessage,:zfiles)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
            "zlast_name" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zserv_name" => $service_name,
            "zcountry" => $country,
            "zmessage" => $message,
            "zfiles" => $location,

        ));
        if ($stmt) {

            $to_email = $email;
            $subject = $lang['email_order_serve'];
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