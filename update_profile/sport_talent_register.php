<?php
$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
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

        foreach ($_FILES['videos']['name'] as $key => $val) {
            $file = $_FILES['videos']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp1 = $_FILES['videos']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['fiels']['name'] as $key => $val) {
            $file = $_FILES['fiels']['name'][$key];
            $file = str_replace(' ', '', $file);
            $file_tmp2 = $_FILES['fiels']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
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

            if ($file_tmp1 != '' && $file_tmp2 != '') {
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
                if ($stmt) {
                     header("Location:profile.php");

?>

<div class='container'>
    <div class='alert alert-success text-center'>
        تم تعديل البيانات بنجاح
    </div>
</div>
<?php
                }
            } elseif ($file_tmp1 != '') {
                $stmt = $connect->prepare("UPDATE sport_register SET first_name2=? , last_name=? , email=? , mobile=? , specialist=?  ,
                certificate=? ,
                experience_info=? ,team_name=? ,team_register=? ,video_talent=?  , password=? ,player_weight=? ,player_position=? ,player_taller=?  WHERE username=? ");
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
                    $password,
                    $player_weight,
                    $player_postion,
                    $player_taller,
                    $_SESSION["username"],
                ));
                if ($stmt) {
                     header("Location:profile.php");

                ?>

<div class='container'>
    <div class='alert alert-success text-center'>
        تم تعديل البيانات بنجاح
    </div>
</div>
<?php
                }
            } elseif ($file_tmp2 != '') {
                $stmt = $connect->prepare("UPDATE sport_register SET first_name2=? , last_name=? , email=? , mobile=? , specialist=?  ,
                certificate=? ,
                experience_info=? ,team_name=? ,team_register=?   , fiels_talent=? , password=? ,player_weight=? ,player_position=? ,player_taller=?  WHERE username=? ");
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

                    $location2,
                    $password,
                    $player_weight,
                    $player_postion,
                    $player_taller,
                    $_SESSION["username"],
                ));
                if ($stmt) {
                     header("Location:profile.php");

                ?>

<div class='container'>
    <div class='alert alert-success text-center'>
        تم تعديل البيانات بنجاح
    </div>
</div>
<?php
                }
            } else {
                $stmt = $connect->prepare("UPDATE sport_register SET first_name2=? , last_name=? , email=? , mobile=? , specialist=?  ,
                certificate=? ,
                experience_info=? ,team_name=? ,team_register=? , password=? ,player_weight=? ,player_position=? ,player_taller=?  WHERE username=? ");
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


                    $password,
                    $player_weight,
                    $player_postion,
                    $player_taller,
                    $_SESSION["username"],
                ));
                if ($stmt) {
                     header("Location:profile.php");

                ?>

<div class='container'>
    <div class='alert alert-success text-center'>
        تم تعديل البيانات بنجاح
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
                            <h2> <?php echo $userdata["first_name2"];  ?> <?php echo $userdata["first_name2"];  ?> </h2>
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
                                                                <label
                                                                    for="first_name"><?php echo $lang["first_name"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <input name="first_name2" type="text"
                                                                    class="form-control" id="first_name"
                                                                    value="<?php echo $userdata['first_name2']; ?>">
                                                            </div>

                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["email"];  ?> <span class="star"> *
                                                                    </span>
                                                                </label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="floatingInput"
                                                                    value="<?php echo $userdata['email']; ?>">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["username"];  ?><span
                                                                        class="star">
                                                                        * </span>
                                                                </label>
                                                                <input disabled name="username" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value="<?php echo $userdata['username']; ?>">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <!--
                                           <input name="mobile" type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com">-->
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["mobile"];  ?> <span class="star">
                                                                        * </span></label>
                                                                <input type="tel" name="mobile" id="phone"
                                                                    class="form-control"
                                                                    value="<?php echo $userdata['mobile']; ?>">

                                                            </div>

                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["certificate"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>

                                                                <select name="certificate" class="form-select country9"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label country2 example">

                                                                    <?php
                                                                        if (strlen($userdata["certificate"]) > 2) { ?>
                                                                    <option
                                                                        value="<?php echo $userdata["certificate"] ?>">
                                                                        <?php echo $userdata["certificate"] ?>
                                                                    </option>
                                                                    <?php
                                                                        } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                        }
                                                                        ?>

                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <option
                                                                        value=" <?php echo $lang["illiterate"];  ?> ">
                                                                        <?php echo $lang["illiterate"];  ?> </option>
                                                                    <option
                                                                        value=" <?php echo $lang["middle_school"];  ?>">
                                                                        <?php echo $lang["middle_school"];  ?> </option>
                                                                    <option value="<?php echo $lang["secondary"];  ?>">
                                                                        <?php echo $lang["secondary"];  ?> </option>
                                                                    <option value="<?php echo $lang["ba"];  ?>">
                                                                        <?php echo $lang["ba"];  ?>
                                                                    </option>
                                                                    <option value="<?php echo $lang["masters"];  ?> ">
                                                                        <?php echo $lang["masters"];  ?> </option>
                                                                </select>


                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["last_name"];  ?><span
                                                                        class="star"> * </span></label>
                                                                <input name="last_name" type="text" class="form-control"
                                                                    id="floatingInput"
                                                                    value="<?php echo $userdata["last_name"] ?>">

                                                            </div>

                                                            <div class="box mb-3">
                                                                <label
                                                                    for="floatingInput"><?php echo $lang["specialist"];  ?>
                                                                    <span class="star"> * </span></label>
                                                                <input name="specialist" type="text"
                                                                    class="form-control" id="floatingInput"
                                                                    value="<?php echo $userdata["specialist"] ?>">
                                                            </div>
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["password"];  ?><span class="star">
                                                                        * </span></label>
                                                                <input name="password" type="password"
                                                                    class="form-control passwordinput"
                                                                    id="floatingInput"
                                                                    value="<?php echo $userdata["password"] ?>">
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
                            <h4> خبراتك </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                        <textarea class="form-control" name="experience_info"
                                            id="floatingInput"><?php echo $userdata["experience_info"] ?></textarea>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل تلعب فى نادي رسمى </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> اسم النادي </label>
                                                    <input name="team_name" type="text" class="form-control"
                                                        id="floatingInput" value="<?php echo $userdata["team_name"] ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل انت مسجل رسميا بعقد في قائمة النادي؟!</h4>
                                                    <input class="" name="team_register" type="radio" value="no"
                                                        id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="team_register" type="radio" value="yes"
                                                        id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="check_exp">
                                        <h4> هل انت لاعب كرة قدم</h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> العمر </label>
                                                    <input name="player_position" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["player_position"] ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الوزن</label>
                                                    <input name="player_weight" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["player_weight"] ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> الطول</label>
                                                    <input name="player_taller" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["player_taller"] ?>">

                                                </div>

                                            </div>
                                        </div>

                                    </div>





                                </div>
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="videos[]" id="files" multiple
                                                            accept="video/*">
                                                        <p> فيديو توضيح الموهبة
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
                                        <div class="box mb-3">
                                            <div class="upload-file">
                                                <div class="upload-wrapper">
                                                    <label>
                                                        <input type="file" name="fiels[]" id="files2" multiple
                                                            accept=".doc, .docx, .pdf">
                                                        <p> <?php echo $lang["upload_cv_document"]; ?>
                                                        </p>
                                                    </label>
                                                    <span class="files_type"> .doc, .docs,
                                                        .pdf </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">

                                                    <!-- <h2 class="mb-0"> المفات المرفوعه </h2> -->
                                                </div>
                                            </div>

                                            <output id="image-gallery2"></output>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 cars_sections">
                                    <div class="item">
                                        <div class="car-wrap rounded ftco-animate">
                                            <div class="text">


                                                <div class="">
                                                    <div class="reservation_button">
                                                        <button type="submit" class="btn main_button"> تعديل
                                                            الحساب </button>
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