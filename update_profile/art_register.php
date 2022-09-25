<!-- ****
**
***
Attention Yastaaaaaaaaaaaaaaaa

Cv =====> Talent Video 

-->



<?php
$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $file = '';
        $file_tmp = '';
        $location = "";
        $location2 = '';
        $location3 = '';
        $location4 = '';
        $location5 = '';
        $location6 = '';
        $location7 = '';
        $location8 = '';

        $uploadplace = "admin/upload/";

        // START UPLOAD PROJECT DESIGN (project_design)

        foreach ($_FILES['project_design']['name'] as $key => $val) {
            $file = $_FILES['project_design']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['project_design']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['project_prototype']['name'] as $key => $val) {
            $file = $_FILES['project_prototype']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['project_prototype']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }

        // START UPLOAD project_video (project_video)


        foreach ($_FILES['project_video']['name'] as $key => $val) {
            $file = $_FILES['project_video']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp3 = $_FILES['project_video']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }

        // START UPLOAD project_certificate(project_certificate)


        foreach ($_FILES['project_certificate']['name'] as $key => $val) {
            $file = $_FILES['project_certificate']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp4 = $_FILES['project_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp4, $uploadplace . $file);
            $location4 .= $file . " ";
        }

        // START UPLOAD national_id (national_id)
        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp5 = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp5, $uploadplace . $file);
            $location5 .= $file . " ";
        }


        // START UPLOAD certificate_image

        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp6 = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp6, $uploadplace . $file);
            $location6 .= $file . " ";
        }
        // START UPLOAD last_certificate 


        foreach ($_FILES['last_certificate']['name'] as $key => $val) {
            $file = $_FILES['last_certificate']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp7 = $_FILES['last_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp7, $uploadplace . $file);
            $location7 .= $file . " ";
        }

        // START UPLOAD CV

        foreach ($_FILES['cv']['name'] as $key => $val) {
            $file = $_FILES['cv']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp8 = $_FILES['cv']['tmp_name'][$key];
            move_uploaded_file($file_tmp8, $uploadplace . $file);
            $location8 .= $file . " ";
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

        $password = $_POST["password"];

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

            $stmt = $connect->prepare("UPDATE art_register SET
                first_name=?, last_name=?, email=?,mobile=? , specialist=? ,certificate=? ,
  experience_info=?, language_speak=? , project_details=? , project_name=?,
  project_field=?,project_tools=? , project_date=?,project_competation=?,project_prize=?
  , password=? WHERE username=?");
            $stmt->execute(array(
                $first_name,
                $last_name,
                $email,
                $mobile,
                $specialist,
                $certificate,
                $experience_info,
                $language_speak,
                $project_details,
                $project_name,
                $project_field,
                $project_tools,
                $project_date,
                $project_competation,
                $project_prize,
                $password,
                $_SESSION['username'],
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
            if ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
      project_video=?,project_certificate=?
      ,national_id=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location4,
                    $location5,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
                project_video=?,project_certificate=?
                ,national_id=?,certificate_image=?,last_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location4,
                    $location5,
                    $location6,
                    $location7,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
                project_video=?,project_certificate=?
                ,national_id=?,certificate_image=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location4,
                    $location5,
                    $location6,

                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                     header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp7 != ''  && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
                project_video=?,project_certificate=?
                ,national_id=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location4,
                    $location5,

                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
                project_video=?,project_certificate=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location4,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp3 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?,
                project_video=?
                ,national_id=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,
                    $location3,
                    $location5,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?
                 ,project_certificate=?
                ,national_id=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,

                    $location4,
                    $location5,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?, 
                project_video=?,project_certificate=?
                ,national_id=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location,

                    $location3,
                    $location4,
                    $location5,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != '' && $file_tmp3 != '' && $file_tmp4 != '' && $file_tmp5 != '' && $file_tmp6 != '' && $file_tmp7 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_prototype=?,
                project_video=?,project_certificate=?
                ,national_id=?,certificate_image=?,last_certificate=?,cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location2,
                    $location3,
                    $location4,
                    $location5,
                    $location6,
                    $location7,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp2 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_prototype=?
                  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location2,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '' && $file_tmp3 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,project_video=?   WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location3,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != ''  && $file_tmp4 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?
               ,project_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location4,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != ''  && $file_tmp5 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,national_id=?   WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location5,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != ''  && $file_tmp6 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,certificate_image=? WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location6,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != ''  && $file_tmp7 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,last_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location7,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != ''  && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?,last_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location,
                    $location8,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != '' && $file_tmp3 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_prototype=?,
                project_video=?  WHERE username=?");
                $stmt->execute(array(

                    $location2,
                    $location3,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != ''   && $file_tmp4 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_prototype=? ,project_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location2,
                    $location4,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != ''  && $file_tmp5 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET  project_prototype=? 
                ,national_id=?  WHERE username=?");
                $stmt->execute(array(
                    $location2,
                    $location5,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != '' && $file_tmp6 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_prototype=?, certificate_image=?   WHERE username=?");
                $stmt->execute(array(

                    $location2,

                    $location6,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_prototype=?,cv=?  WHERE username=?");
                $stmt->execute(array(

                    $location2,

                    $location8,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '' && $file_tmp4 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET  
                project_video=?,project_certificate=?   WHERE username=?");
                $stmt->execute(array(

                    $location3,
                    $location4,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '' &&  $file_tmp5 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET  project_video=?
                ,national_id=?   WHERE username=?");
                $stmt->execute(array(

                    $location3,

                    $location5,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '' && $file_tmp6 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET  
                project_video=? ,certificate_image=?  WHERE username=?");
                $stmt->execute(array(
                    $location3,
                    $location6,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '' &&  $file_tmp7 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET
                project_video=? ,last_certificate=?  WHERE username=?");
                $stmt->execute(array(

                    $location3,

                    $location7,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '' && $file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_video=? ,last_certificate=?  WHERE username=?");
                $stmt->execute(array(
                    $location3,
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp1 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=?  WHERE username=?");
                $stmt->execute(array(
                    $location,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp2 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET project_design=? WHERE username=?");
                $stmt->execute(array(
                    $location2,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp3 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET
                project_video=?
                 WHERE username=?");
                $stmt->execute(array(
                    $location3,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp4 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET  project_certificate=?
                WHERE username=?");
                $stmt->execute(array(

                    $location4,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp5 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET national_id=? WHERE username=?");
                $stmt->execute(array(

                    $location5,


                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp6 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET certificate_image=?  WHERE username=?");
                $stmt->execute(array(

                    $location6,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp7 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET last_certificate=?  WHERE username=?");
                $stmt->execute(array(

                    $location7,

                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
                ?>
                    <div class='container'>
                        <div class='alert alert-success text-center'>
                            <?php echo $lang["suc_profile_message"];  ?>
                        </div>
                    </div>
                <?php
                }
            } elseif ($file_tmp8 != '') {
                $stmt = $connect->prepare("UPDATE art_register SET cv=?  WHERE username=?");
                $stmt->execute(array(
                    $location8,
                    $_SESSION['username'],
                ));
                if ($stmt) {
                    header("Location:profile.php");
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
                <div class="error_message">
                    <div class="alert alert-danger"> <?php echo $message ?> </div>
                </div>
    <?php
            }
        }
    }

    ?>




    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">

                <form class="message_form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="info">
                                <?php
                                if (strlen($userdata['personal_image']) > 0) { ?>
                                    <div class="personal_image">
                                        <img src="admin/upload/<?php echo $userdata['personal_image']; ?>" alt="">

                                    </div>
                                <?php
                                } else { ?>


                                    <div class="personal_image">
                                        <img src="uploads/avatar.png" alt="">

                                    </div>

                                <?php
                                }
                                ?>
                                <h2> <?php echo $userdata["first_name"];  ?> <?php echo $userdata["last_name"];  ?> </h2>
                                <p> <?php echo $userdata["email"];  ?></p>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="info2">
                                <div class="contact_form">
                                    <div class="container">
                                        <div class="data">
                                            <!--------------------END PHP  CODE VALIDATION --------------->

                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-12">

                                                                <div class="box mb-3">
                                                                    <label for="first_name"><?php echo $lang["first_name"];  ?><span class="star"> *
                                                                        </span></label>
                                                                    <input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo $userdata['first_name']; ?>">
                                                                </div>

                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["email"];  ?> <span class="star"> *
                                                                        </span>
                                                                    </label>
                                                                    <input name="email" type="email" class="form-control" id="floatingInput" value="<?php echo $userdata['email']; ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["username"];  ?><span class="star">
                                                                            * </span>
                                                                    </label>
                                                                    <input disabled name="username" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata['username']; ?>">
                                                                </div>
                                                                <div class="box mb-3">

                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["mobile"];  ?> <span class="star">
                                                                            * </span></label>
                                                                    <input type="tel" name="mobile" id="phone" class="form-control" value="<?php echo $userdata['mobile']; ?>">

                                                                </div>

                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["certificate"];  ?><span class="star"> *
                                                                        </span></label>

                                                                    <select name="certificate" class="form-select country9" id="floatingSelectGrid" aria-label="Floating label country2 example">

                                                                        <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                            <option value="<?php echo $userdata["certificate"] ?>">
                                                                                <?php echo $userdata["certificate"] ?>
                                                                            </option>
                                                                        <?php
                                                                        } else { ?>
                                                                            <option value=""><?php echo $lang["select"];  ?>
                                                                            </option>

                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <option value=" <?php echo $lang["illiterate"];  ?> ">
                                                                            <?php echo $lang["illiterate"];  ?> </option>
                                                                        <option value=" <?php echo $lang["middle_school"];  ?>">
                                                                            <?php echo $lang["middle_school"];  ?> </option>
                                                                        <option value="<?php echo $lang["secondary"];  ?>">
                                                                            <?php echo $lang["secondary"];  ?> </option>
                                                                        <option value="<?php echo $lang["ba"];  ?>">
                                                                            <?php echo $lang["ba"];  ?>
                                                                        </option>
                                                                        <option value="<?php echo $lang["masters"];  ?> ">
                                                                            <?php echo $lang["masters"];  ?> </option>
                                                                    </select>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-12">
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["last_name"];  ?><span class="star"> * </span></label>
                                                                    <input name="last_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["last_name"] ?>">

                                                                </div>

                                                                <div class="box mb-3">
                                                                    <label for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                        <span class="star"> * </span></label>
                                                                    <input name="specialist" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["specialist"] ?>">
                                                                </div>
                                                                <div class="box mb-3">
                                                                    <label for="floatingInput">
                                                                        <?php echo $lang["password"];  ?><span class="star">
                                                                            * </span></label>
                                                                    <input name="password" type="password" class="form-control passwordinput" id="floatingInput" value="<?php echo $userdata["password"] ?>">
                                                                    <i class="fa fa-eye"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="experience data">
                                <h4 class=""> <?php echo $lang["your_experiences"];  ?> </h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["Brief_about_you"];  ?> </label>
                                            <textarea name="experience_info" class="form-control" name="" id="floatingInput"><?php echo $userdata["experience_info"] ?></textarea>

                                        </div>
                                        <div class="box mb-3">
                                            <label for="floatingInput"> <?php echo $lang["language_speak"] ?> </label>
                                            <textarea name="language_speak" class="form-control" name="" id="floatingInput"><?php echo $userdata["language_speak"] ?></textarea>

                                        </div>
                                        <div class="check_exp">
                                            <h4> <?php echo $lang["have_innovations"];  ?> </h4>
                                            <div class="main_check">
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                                <label class="" for="check_exp1"><?php echo $lang["no"];  ?></label>
                                                <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                                <label class="" for="check_exp2"> <?php echo $lang["yes"];  ?> </label>
                                                <div class="check_exp1_project">
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_name"];  ?>
                                                        </label>
                                                        <input name="project_name" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["project_name"] ?>">
                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["about_project"]; ?>
                                                        </label>
                                                        <textarea name="project_details" class="form-control" name="" id="floatingInput"><?php echo $userdata["project_details"] ?></textarea>

                                                    </div>

                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_filed"]; ?>
                                                        </label>
                                                        <input name="project_field" type="text" class="form-control" id="floatingInput" value="<?php echo $userdata["project_field"] ?>">

                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["techniques_used"]; ?>
                                                        </label>
                                                        <textarea name="project_tools" class="form-control" name="" id="floatingInput"><?php echo $userdata["project_tools"] ?></textarea>

                                                    </div>
                                                    <div class="box mb-3">
                                                        <label for="floatingInput"> <?php echo $lang["project_date"]; ?>
                                                        </label>
                                                        <input name="project_date" type="date" class="form-control" id="floatingInput" value="<?php echo $userdata["project_date"] ?>">

                                                    </div>
                                                    <!-- Do Design -->
                                                    <div class="prototype_deisgn" id="prototype_deisgn">
                                                        <h4> <?php echo $lang["do_design"]; ?> </h4>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design1">
                                                        <label class="" for="check_design1"><?php echo $lang["no"]; ?>
                                                        </label>
                                                        <input class="" name="check_design" type="radio" value="" id="check_design2">
                                                        <label class="" for="check_design2"> <?php echo $lang["yes"]; ?>
                                                        </label>
                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["attach_the_design"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_design[]" id="files" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">

                                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                    </div>
                                                                </div>

                                                                <output id="image-gallery"></output>


                                                            </div>
                                                            <!--     <input type="file" name="project_design[]" class="form-control"
                                                        multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do first prototype -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["prototype_project"]; ?> </h4>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype1">
                                                        <label class="" for="first_prototype1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="first_prototype" type="radio" value="" id="first_prototype2">
                                                        <label class="" for="first_prototype2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_prototype[]" id="files2" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">

                                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                    </div>
                                                                </div>
                                                                <output id="image-gallery2"></output>

                                                            </div>
                                                            <!--   <input class="form-control" type="file" name="project_prototype[]"
                                                        id="" multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do Project Video -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["do_video"]; ?> </h4>

                                                        <!--  <input class="" name="project_video" type="radio" value=""
                                                    id="project_video1"> -->
                                                        <label class="" for="project_video1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="project_video" type="radio" value="" id="project_video2">
                                                        <label class="" for="project_video2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>

                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_video[]" id="files3" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?></a>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">

                                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                    </div>
                                                                </div>
                                                                <output id="image-gallery3"></output>

                                                            </div>

                                                            <!--  <input class="form-control" type="file" name="project_video[]" id=""
                                                        multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- شهادة براءة اختراع -->
                                                    <div class="prototype_deisgn">
                                                        <h4><?php echo $lang["patent_certificate"]; ?> </h4>
                                                        <input class="" name="project_certificate" type="radio" value="" id="project_certificate1">
                                                        <label class="" for="project_certificate1">
                                                            <?php echo $lang["no"]; ?> </label>
                                                        <input class="" name="project_certificate" type="radio" value="" id="project_certificate2">
                                                        <label class="" for="project_certificate2">
                                                            <?php echo $lang["yes"]; ?> </label>
                                                        <div class="check_prototype_resualt">
                                                            <label> <?php echo $lang["select_files"]; ?></label>
                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file" name="project_certificate[]" id="files4" multiple>
                                                                            <p> <a> <?php echo $lang["select_files"]; ?>
                                                                                </a>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">

                                                                        <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                                    </div>
                                                                </div>
                                                                <output id="image-gallery4"></output>

                                                            </div>
                                                            <!--<input class="form-control" type="file" name="project_certificate[]"
                                                        id="" multiple> -->

                                                        </div>
                                                    </div>
                                                    <!-- Do You Share Project -->
                                                    <div class="prototype_deisgn">
                                                        <h4><?php echo $lang["project_competitions"]; ?> </h4>

                                                        <input class="" name="share_project" type="radio" value="" id="share_project1">
                                                        <label class="" for="share_project1"> <?php echo $lang["no"]; ?>
                                                        </label>

                                                        <input class="" name="share_project" type="radio" value="" id="share_project2">
                                                        <label class="" for="share_project2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["participate_in"]; ?>
                                                                </label>
                                                                <textarea name="project_competation" class="form-control" id="floatingInput"> <?php echo $userdata["project_competation"] ?> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Do Project Get Prize -->
                                                    <div class="prototype_deisgn">
                                                        <h4> <?php echo $lang["receive_awards"]; ?> </h4>

                                                        <input class="" name="project_prize" type="radio" value="" id="project_prize1">
                                                        <label class="" for="project_prize1"> <?php echo $lang["no"]; ?>
                                                        </label>
                                                        <input class="" name="project_prize" type="radio" value="" id="project_prize2">
                                                        <label class="" for="project_prize2"> <?php echo $lang["yes"]; ?>
                                                        </label>

                                                        <div class="check_prototype_resualt">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["Mention_prizes"]; ?>
                                                                </label>
                                                                <textarea name="project_prize" class="form-control" id="floatingInput">  <?php echo $userdata["project_prize"] ?> </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4> <?php echo $lang["national_id_image"]; ?> </h4>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="national_id[]" id="files5" multiple>
                                                                <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery5"></output>

                                                </div>
                                                <!--<input class="form-control" type="file" name="national_id[]" id="" multiple> -->

                                            </div>
                                            <div class="col-lg-12">
                                                <h4> <?php echo $lang["upload_cv_document"]; ?> </h4>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="certificate_image[]" id="files6" multiple>
                                                                <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">

                                                            <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                        </div>
                                                    </div>
                                                    <output id="image-gallery6"></output>

                                                </div>

                                                <!--<input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple> -->

                                            </div>
                                            <div class="row">
                                                <h4> <?php echo $lang["following_documents"]; ?></h4>
                                                <div class="col-lg-12">
                                                    <label> <?php echo $lang["scientific_certificate"]; ?> </label>
                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="last_certificate[]" id="files7" multiple>
                                                                    <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>
                                                        <output id="image-gallery7"></output>

                                                    </div>

                                                    <!-- <input class="form-control" type="file" name="last_certificate[]" id=""
                                                multiple> -->

                                                </div>
                                                <div class="col-lg-12">
                                                    <label> <?php echo $lang["upload_video"]; ?></label>

                                                    <div class="box mb-3">
                                                        <div class="upload-file">
                                                            <div class="upload-wrapper">
                                                                <label>
                                                                    <input type="file" name="cv[]" id="files8" multiple>
                                                                    <p> <a> <?php echo $lang["select_files"]; ?> </a></p>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                            </div>
                                                        </div>
                                                        <output id="image-gallery8"></output>

                                                    </div>

                                                    <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 cars_sections">
                                    <div class="item">
                                        <div class="car-wrap rounded ftco-animate">
                                            <div class="text">


                                                <div class="">
                                                    <div class="reservation_button">
                                                        <button type="submit" class="btn main_button"><?php echo $lang["account_update"]; ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </form>



    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
<?php
}
?>