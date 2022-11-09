 <?php
    include "connect.php";
    include "config.php";
    $stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في الكورس'");
    $stmt->execute();
    $emaildata = $stmt->fetchAll();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $country = $_POST["country"];
        $course_id = $_POST['course_id'];
        $payment_mode = $_POST['payment_mode'];
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

            $stmt = $connect->prepare("INSERT INTO course_register 
            (first_name,last_name,email,mobile,country,course_id,payment_mode,trasnaction_id)
    VALUES(:zfirst_name,:zlast_name,:zemail,:zmobile,:zcountry,:zcourse_id,:zpayment_mode,:ztrasnaction_id)");
            $stmt->execute(array(
                "zfirst_name" => $first_name,
                "zlast_name" => $last_name,
                "zemail" => $email,
                "zmobile" => $mobile,
                "zcountry" => $country,
                "zcourse_id" => $course_id,
                "zpayment_mode" => $payment_mode,
                "ztrasnaction_id" => $trasnaction_id, 
            ));
            if ($stmt) {
                echo "201";
                $to_email = $email;
                $subject = $lang['course_register_email'];
                foreach ($emaildata as $data) {
                    if ($_SESSION['lang'] == 'ar') {
                        $body =  $data['email_text'];
                    } else {
                        $body =  $data['email_text_en'];
                    }
                }
                $headers = "From: info@revivals.site";
                mail($to_email, $subject, $body, $headers); ?>

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