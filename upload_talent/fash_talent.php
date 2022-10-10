<?php
include "../connect.php";
include "../config.php";
session_start();

$username = $_SESSION['username'];
$cat_name = "fash";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = '';
    $file_tmp1 = '';
    $file_tmp2 = '';
    $file_tmp3 = '';
    $file_tmp9 = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $location6 = '';
    $location7 = '';
    $location8 = '';
    $location9 = '';

    $uploadplace = "../admin/upload/";
    // START GET EMAIL CONTENT  -->

    $stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='اضافة موهبة'");
    $stmt->execute();
    $emaildata = $stmt->fetchAll();

    // END GET EMAIL CONTENT -->
    // START UPLOAD PROJECT DESIGN (project_design)
    if (isset($_FILES['project_certificate_image']['name'])) {


        foreach ($_FILES['project_certificate_image']['name'] as $key => $val) {
            $file = $_FILES['project_certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['project_certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
    }
    /////////////////
    // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)
    if (isset($_FILES['national_id']['name'])) {


        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }
    }

    if (isset($_FILES['certificate_image']['name'])) {
        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp3 = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }
    }
    // START Talent Image
    if (isset($_FILES['talent_image']['name'])) {
        foreach ($_FILES['talent_image']['name'] as $key => $val) {
            $file = $_FILES['talent_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp9 = $_FILES['talent_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp9, $uploadplace . $file);
            $location9 .= $file . " ";
        }
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $specialist = $_POST["specialist"];
    $certificate = $_POST["certificate"];

    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_competation = $_POST["project_competation"];
    $project_prize = $_POST["project_prize"];

    $personal_information = $_POST["personal_information"];

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

        $stmt = $connect->prepare("INSERT INTO company_register (first_name, last_name, email, mobile,talent_image,specialist ,
                certificate, project_name,
                project_field,project_competation,project_prize,project_certificate_image,
                national_id,certificate_image,personal_information,username,cat_name)
                VALUES (:zfname,:zlname,:zemail,:zmobile,:ztalent_image,:zspecialist,:zcertificate,
                :zproject_name,
                :zproject_field,:zproject_competition,:zproject_prize,:zproject_certificate_image,
                :znational_id,:zcertificate_image,:zpersonal_information,:zusername,:zcat_name)");
        $stmt->execute(array(
            "zfname" => $first_name,
            "zlname" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "ztalent_image" => $location9,
            "zspecialist" => $specialist,
            "zcertificate" => $certificate,
            "zproject_name" => $project_name,
            "zproject_field" => $project_field,
            "zproject_competition" => $project_competation,
            "zproject_prize" => $project_prize,
            "zproject_certificate_image" => $location,
            "znational_id" => $location2,
            "zcertificate_image" => $location3,
            "zpersonal_information" => $personal_information,
            "zusername" => $username,
            "zcat_name" => $cat_name,
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
                            echo   $data['email_text'];
                        } else {
                            echo  $data['email_text_en'];
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
          //  header("Location:profile.php");
        }
    } else {
        foreach ($errormessage as $message) { ?>
        <style>
            .my_progress{
                display: none;
            }
        </style>
            <div class="error_message">
                <div class="alert alert-danger"> <?php echo $message ?> </div>
            </div>
<?php
        }
    }
}

?>