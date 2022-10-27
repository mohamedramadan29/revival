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

    if (isset($_FILES['video_talent']['name'])) {
        foreach ($_FILES['video_talent']['name'] as $key => $val) {
            $file = $_FILES['video_talent']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp8 = $_FILES['video_talent']['tmp_name'][$key];
            move_uploaded_file($file_tmp8, $uploadplace . $file);
            $location8 .= $file . " ";
        }
    }

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $specialist = $_POST["specialist"];

    $project_name = $_POST["project_name"];
    $project_field = $_POST["project_field"];
    $project_competation = $_POST["project_competation"];
    $project_prize = $_POST["project_prize"];

    $personal_information = $_POST["personal_information"];

    $register_id = $_POST['register_id'];

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
    $stmt = $connect->prepare("SELECT * FROM art_register WHERE email=?");
    $stmt->execute(array($email));

    $exist11 = $stmt->fetch();
    if ($exist11 > 0) {
        $errormessage[] =  $lang["email_found"];
    }

    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE email=?");
    $stmt->execute(array($email));

    $exist22 = $stmt->fetch();

    if ($exist22 > 0) {
        $errormessage[] =  $lang["email_found"];
    }

    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE email=?");
    $stmt->execute(array($email));

    $exist33 = $stmt->fetch();
    if ($exist33 > 0) {
        $errormessage[] =  $lang["email_found"];
    }

    $stmt = $connect->prepare("SELECT * FROM register WHERE email=?");
    $stmt->execute(array($email));

    $exist44 = $stmt->fetch();
    if ($exist44 > 0) {
        $errormessage[] =  $lang["email_found"];
    }

    if (empty($errormessage)) {

        $stmt = $connect->prepare("UPDATE company_register SET first_name=?, last_name=?, email=?, mobile=?,specialist=? ,
        project_name=?,
        project_field=?,project_competation=?,project_prize=?,
        personal_information=?,username=?,cat_name=? WHERE reg_id=? ");
        $stmt->execute(array(
            $first_name, $last_name, $email, $mobile, $specialist,
            $project_name, $project_field, $project_competation, $project_prize,
            $personal_information, $username, $cat_name, $register_id
        ));
        if ($file_tmp1 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET project_certificate_image=? WHERE reg_id=?");
            $stmt->execute(array(
                $location, $register_id
            ));
        }
        if ($file_tmp2 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET national_id=? WHERE reg_id=?");
            $stmt->execute(array(
                $location2, $register_id
            ));
        }
        if ($file_tmp3 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET certificate_image=? WHERE reg_id=?");
            $stmt->execute(array(
                $location3, $register_id
            ));
        }
        if ($file_tmp9 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET talent_images=? WHERE reg_id=?");
            $stmt->execute(array(
                $location9, $register_id
            ));
        }
        if ($file_tmp8 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET video_talent=? WHERE reg_id=?");
            $stmt->execute(array(
                $location8, $register_id
            ));
        }
        if ($stmt) { ?>
            <script> 
                setTimeout(() => {
                    let url = "profile.php";
                    window.location.href = url;
                }, 6000);
            </script>
            <div class='container'>
                <div class='alert alert-success text-center'>
                <?php echo $lang['suc_talent_update']; ?>
                </div>
            </div>
        <?php
            //  header("Location:profile.php");
        }
    } else {
        foreach ($errormessage as $message) { ?>
            <style>
                .my_progress {
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