<?php
session_start();
include "../connect.php";
include "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp1 = '';
    $file_tmp2 = '';
    $location = "";
    $location2 = '';
    $location3 = '';
    $location4 = '';
    $location5 = '';
    $location6 = '';
    $location7 = '';
    $location8 = '';
    $file_tmp9 = '';
    $location9 = '';

    $uploadplace = "../admin/upload/";

    // START UPLOAD PROJECT DESIGN (project_design)
    if (isset($_FILES['videos']['name'])) {
        foreach ($_FILES['videos']['name'] as $key => $val) {
            $file = $_FILES['videos']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['videos']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
    }
    if (isset($_FILES['talent_images']['name'])) {
        foreach ($_FILES['talent_images']['name'] as $key => $val) {
            $file = $_FILES['talent_images']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp9 = $_FILES['talent_images']['tmp_name'][$key];
            move_uploaded_file($file_tmp9, $uploadplace . $file);
            $location9 .= $file . " ";
        }
    }
    /////////////////
    // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

    if (isset($_FILES['fiels']['name'])) {
        foreach ($_FILES['fiels']['name'] as $key => $val) {
            $file = $_FILES['fiels']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['fiels']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }
    }

    $first_name = $_POST["first_name2"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    //$country = $_POST["country"];
    $specialist = $_POST["specialist"];
    $certificate = $_POST["certificate"];

    //   $field = $_POST["field"];
    // $sub_field = $_POST["sub_field"];
    //$register_type = $_POST["register_type"];
    $experience_info = $_POST["experience_info"];
    $team_name = $_POST["team_name"];

    if (isset($_POST['team_register'])) {
        $team_register = 'yes';
    } else {
        $team_register = 'no';
    }

    $player_postion = $_POST["player_position"];
    $player_taller = $_POST["player_taller"];
    $player_weight = $_POST["player_weight"];
    //$username = $_POST["username"];
    $password = $_POST["password"];
    //$password_repeat = $_POST["password_repeat"];

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
        $stmt = $connect->prepare("UPDATE sport_register SET first_name2=? , last_name=? , email=? , mobile=? , specialist=?  ,
        certificate=? ,
        experience_info=? ,team_name=? ,team_register=? ,video_talent=? , fiels_talent=? , password=? ,player_weight=? ,player_position=? ,player_taller=?  WHERE username=? ");
        $stmt->execute(array(
            $first_name,
            $last_name,
            $email,
            $mobile,
            $specialist,
            $certificate,
            $experience_info,
            $team_name,
            $team_register,
            $location,
            $location2,
            $password,
            $player_weight,
            $player_postion,
            $player_taller,
            $_SESSION["username"],
        ));
        if ($file_tmp1 != '') {
            $stmt = $connect->prepare("UPDATE sport_register SET video_talent=? WHERE username=? ");
            $stmt->execute(array(
                $location,
                $_SESSION["username"],
            ));
        }
        if ($file_tmp2 != '') {
            $stmt = $connect->prepare("UPDATE sport_register SET fiels_talent=? WHERE username=? ");
            $stmt->execute(array(
                $location2,
                $_SESSION["username"],
            ));
        }
        if ($file_tmp9 != '') {
            $stmt = $connect->prepare("UPDATE sport_register SET talent_images=?  WHERE username=?");
            $stmt->execute(array(
                $location9,
                $_SESSION['username'],
            ));
        }
        if ($stmt) { ?>

            <script>
                document.getElementById("update_3").reset();
                setTimeout(() => {
                    let url = "profile.php";
                    window.location.href = url;
                }, 6000);
            </script>

            <?php
            //   header("Location:profile.php");
            ?>
            <div class='container'>
                <div class='alert alert-success text-center'>
                    <?php echo $lang["suc_profile_message"];  ?>
                </div>
            </div>
        <?php
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