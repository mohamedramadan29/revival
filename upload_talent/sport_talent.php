<?php
include "../connect.php";
include "../config.php";
session_start();

$username = $_SESSION["username"];
$cat_name = "sport";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = '';
    $file_tmp1 = '';
    $file_tmp2 = '';
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

    if (isset($_FILES['videos']['name'])) {
        foreach ($_FILES['videos']['name'] as $key => $val) {
            $file = $_FILES['videos']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['videos']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
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


        $stmt = $connect->prepare("INSERT INTO company_register (first_name, last_name , email,mobile,talent_image,specialist,
                certificate,
                experience_info,team_name,team_register,player_weight,player_position,player_taller,video_talent,fiels_talent,username,cat_name)
                VALUES(:zfname,:zlname,:zemail,:zmobile,:ztalent_image,:zspecialist,:zcertificate,:zexperience,:zteam_name,:zteam_register,:zplayer_weight,:zplayer_position,
                :zplayer_taller,:zvideo_talent,:zfiles_talent,:zusername,:zcat_name) ");
        $stmt->execute(array(
            "zfname" => $first_name,
            "zlname" => $last_name,
            "zemail" => $email,
            "zmobile" => $mobile,
            "ztalent_image" => $location9,
            "zspecialist" => $specialist,
            "zcertificate" => $certificate,
            "zexperience" => $experience_info,
            "zteam_name" => $team_name,
            "zteam_register" => $team_register,
            "zplayer_weight" => $player_weight,
            "zplayer_position" => $player_postion,
            "zplayer_taller" => $player_taller,
            "zvideo_talent" => $location,
            "zfiles_talent" => $location2,
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
           // header("Location:profile.php");
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