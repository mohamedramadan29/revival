<?php
include "../connect.php";
include "../config.php";
session_start(); 
$username = $_SESSION["username"];
$cat_name = "art";


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
    $experience_info = $_POST["experience_info"];
    $language_speak = $_POST["language_speak"];
    $project_details = $_POST["project_details"];
    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_tools = $_POST["project_tools"];
    $project_date = $_POST["project_date"];
    $project_competation = $_POST["project_competation"];
    $project_prize = $_POST["project_prize"];


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
        /*  if ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {*/

        $stmt = $connect->prepare("INSERT INTO company_register  (
                first_name, last_name, email,mobile, specialist,certificate ,
  experience_info, language_speak , project_details, project_name,
  project_field,project_tools, project_date,project_competation,project_prize,project_design,project_prototype,
      project_video,project_certificate
      ,national_id,certificate_image,last_certificate,cv,username,cat_name,talent_images
  ) VALUES(:zfname,:zlname,:zemail,:zmobile,:zspecialist,:zcertificate,:zexperience_info,
  :zlanguage_speak,:zproject_details,:zproject_name,:zproject_field,:zproject_tools,:zproject_data,:zproject_competation,
  :zproject_prize,:zproject_design,:zproject_prototype,:zproject_video,:zproject_certificate,:znational_id,:zcertificate_image,
  :zlast_certificate,:zcv,:zusername,:zcat_name,:ztalent_images)");
        $stmt->execute(array(
            "zfname" => $first_name,
            "zlname" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "zspecialist" => $specialist,
            "zcertificate" => $certificate,
            "zexperience_info" => $experience_info,
            "zlanguage_speak" => $language_speak,
            "zproject_details" => $project_details,
            "zproject_name" => $project_name,
            "zproject_field" => $project_field,
            "zproject_tools" => $project_tools,
            "zproject_data" => $project_date,
            "zproject_competation" => $project_competation,
            "zproject_prize" => $project_prize,
            "zproject_design" => $location,
            "zproject_prototype" => $location2,
            "zproject_video" => $location3,
            "zproject_certificate" => $location4,
            "znational_id" => $location5,
            "zcertificate_image" => $location6,
            "zlast_certificate" => $location7,
            "zcv" => $location8,
            "zusername" => $username,
            "zcat_name" => $cat_name,
            "ztalent_images" => $location9,
        )); 
        if ($stmt) {?>

            <script>
                document.getElementById("first_form").reset();
                setTimeout(() => {
                    document.location.reload();
                }, 2000);
            </script>
            <?php
            $to_email = $email;
            $subject = "اضافة موهبة جديدة";
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