<?php
include "../connect.php";
include "../config.php";
?>

<!-- START GET EMAIL CONTENT  -->
<?php
$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='التسجيل في الذكاء الاصطناعي'");
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
    $experience_info = $_POST["experience_info"];
    $language_speak = $_POST["language_speak"];
    $project_details = $_POST["project_details"];
    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_tools = $_POST["project_tools"];
    $project_date = $_POST["project_date"];
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

    $stmt = $connect->prepare("SELECT * FROM art_register WHERE username = ? OR email=?");
    $stmt->execute(array($username,$email));

    $exist = $stmt->fetch();

    if ($exist > 0) {
        $errormessage[] =  $lang["username_found_or_email"];
    }

    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username = ? OR email=?");
    $stmt->execute(array($username,$email));

    $exist = $stmt->fetch();

    if ($exist > 0) {
        $errormessage[] =  $lang["username_found_or_email"];
    }

    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username = ? OR email=?");
    $stmt->execute(array($username,$email));

    $exist = $stmt->fetch();

    if ($exist > 0) {
        $errormessage[] =  $lang["username_found_or_email"];
    }

    $stmt = $connect->prepare("SELECT * FROM register WHERE username = ? OR email=?");
    $stmt->execute(array($username,$email));

    $exist = $stmt->fetch();

    if ($exist > 0) {
        $errormessage[] =  $lang["username_found_or_email"];
    }
    if (empty($errormessage)) {
        $stmt = $connect->prepare("INSERT INTO art_register (first_name, last_name, email, mobile , talent_image, country, specialist ,
    certificate , field , sub_field , register_type,
    experience_info, language_speak , project_details , project_name,
    project_field, project_tools , project_date,project_competation,project_prize
    ,username, password) 
        VALUES (:zfirst_name , :zlast_name , :zemail , :zmobile ,:ztalent_image,
         :zcountry , :zspecialist ,
         :zcertificate,:zfield,:zsub_field,:zregister_type,
         :zexperience_info, :zlanguage_speak, :zproject_details,
         :zproject_name,:zproject_field,:zproject_tools,:zproject_date,:zproject_competation,
         :zproject_prize,:zusername,:zpassword)");
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
            "zexperience_info" => $experience_info,
            "zlanguage_speak" => $language_speak,
            "zproject_details" => $project_details,
            "zproject_name" => $project_name,
            "zproject_field" => $project_field,
            "zproject_tools" => $project_tools,
            "zproject_date" => $project_date,
            "zproject_competation" => $project_competation,
            "zproject_prize" => $project_prize,
            "zusername" => $username,
            "zpassword" => $password,
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
            <div class='container'>
                <div class='alert alert-success text-center'>
                    <?php
                    foreach ($emaildata as $data) {
                        if ($_SESSION['lang'] == 'ar') {
                            echo  $data['email_text'];
                        } else {
                            echo $data['email_text_en'];
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