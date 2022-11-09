<!-- START GET EMAIL CONTENT  -->
<?php
include '../../connect.php';
include "config.php";
$stmt = $connect->prepare("SELECT * FROM email_message_event WHERE email_section='حساب جديد'");
$stmt->execute();
$emaildata = $stmt->fetchAll();
?>
<!-- START CODE -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $event_id = $_POST["event_id"];
    $payment_mode = $_POST["payment_mode"];
    $trasnaction_id = $_POST['transaction_id'];
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


    if (empty($errormessage)) {

        $stmt = $connect->prepare("INSERT INTO artificial_event_register (first_name, last_name, email, mobile , country , event_id,payment_mode,trasnaction_id) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,
         :zcountry,:zevent_id,:zpayment_mode,:ztrasnaction_id)");
        $stmt->execute(array(
            "zfirst_name" => $first_name,
            "zlast_name" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zcountry" => $country,
            "zevent_id" => $event_id,
            "zpayment_mode" => $payment_mode,
            "ztrasnaction_id" => $trasnaction_id,
        ));
        if ($stmt) {
            echo "201";
            $to_email = $email;
            $subject = $lang['register_in_eventss'];
            foreach ($emaildata as $data) {
                if ($_SESSION['lang'] == 'ar') {
                    $body =  $data['email_text'];
                } else {
                    $body =  $data['email_text_en'];
                }
            }
            $headers = "From: info@revivals.site";
            mail($to_email, $subject, $body, $headers);
            //header("Location:profile.php");
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
        <?php }
    } else {

        foreach ($errormessage as $message) { ?>
            <div class="error_message">
                <div class="alert alert-danger"> <?php echo $message ?> </div>
            </div>
<?php
        }
    }
} ?>