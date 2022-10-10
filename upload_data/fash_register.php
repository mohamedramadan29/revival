<?php
session_start();
include "../connect.php";
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp1 = '';
    $file_tmp2 = '';
    $file_tmp3 = '';
    $file_tmp4 = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $location6 = '';
    $location7 = '';
    $location8 = '';

    $uploadplace = "../admin/upload/";



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
    if (isset($_FILES['talent_video']['name'])) {
        foreach ($_FILES['talent_video']['name'] as $key => $val) {
            $file = $_FILES['talent_video']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp4 = $_FILES['talent_video']['tmp_name'][$key];
            move_uploaded_file($file_tmp4, $uploadplace . $file);
            $location4 .= $file . " ";
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

    $password = $_POST["password"];

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
        if ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        national_id=?,certificate_image=?, password=?,personal_information=?,talent_video=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $location2,
                $location3,
                $password,
                $personal_information,
                $location4,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //   header("Location:profile.php");
?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != "") {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        national_id=?,certificate_image=?, password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $location2,
                $location3,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,national_id=?,
        certificate_image=?, password=?,personal_information=?,talent_video=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location2,
                $location3,
                $password,
                $personal_information,
                $location4,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp1 != '' && $file_tmp2 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        national_id=?, password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $location2,

                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp1 != '' && $file_tmp3 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        certificate_image=?, password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $location3,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //   header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp1 != '' && $file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        certificate_image=?, password=?,personal_information=?,talent_video=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $password,
                $personal_information,
                $location4,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp2 != '' && $file_tmp3 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,national_id=?,
        certificate_image=?, password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location2,
                $location3,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp2 != '' && $file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,national_id=?
        , password=?,personal_information=?,talent_video=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location2,
                $password,
                $personal_information,
                $location4,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //   header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp3 != '' && $file_tmp4 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,
        certificate_image=?, password=?,personal_information=?,talent_video=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location3,
                $password,
                $personal_information,
                $location4,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //   header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp1 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
        password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                // header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp2 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,national_id=?,
        password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location2,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
        } elseif ($file_tmp3 != '') {
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
        certificate=? , project_name=?,
        project_field=?,project_competation=?,project_prize=?,certificate_image=?,
        password=?,personal_information=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $project_name,
                $project_field,
                $project_competation,
                $project_prize,
                $location3,
                $password,
                $personal_information,
                $_SESSION["username"]
            ));
            if ($stmt) {
                //  header("Location:profile.php");
            ?>

                <div class='container'>
                    <div class='alert alert-success text-center'>
                        <?php echo $lang["suc_profile_message"];  ?>
                    </div>
                </div>
            <?php
            }
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
