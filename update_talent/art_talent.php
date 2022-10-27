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
    if (empty($specialist)) {
        $errormessage[] = $lang["enter_specialist"];
    }
    if (empty($certificate)) {
        $errormessage[] = $lang["enter_cartificate"];
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
        $stmt = $connect->prepare("UPDATE company_register SET
        first_name=?, last_name=?, email=?,mobile=?, specialist=?,certificate=? WHERE reg_id=?
  ");
        $stmt->execute(array(
            $first_name,
            $last_name,
            $email,
            $mobile,
            $specialist,
            $certificate, 
            $register_id
        ));
        if ($file_tmp5 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET national_id=? WHERE reg_id=?");
            $stmt->execute(array($location5, $register_id));
        }
        if ($file_tmp6 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET certificate_image=? WHERE reg_id=?");
            $stmt->execute(array($location6, $register_id));
        }

        if ($file_tmp7 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET last_certificate=? WHERE reg_id=?");
            $stmt->execute(array($location7, $register_id));
        }

        if ($file_tmp8 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET cv=? WHERE reg_id=?");
            $stmt->execute(array($location8, $register_id));
        }


        if ($file_tmp9 != '') {
            $stmt = $connect->prepare("UPDATE company_register SET talent_images=? WHERE reg_id=?");
            $stmt->execute(array($location9, $register_id));
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