<?php
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
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

        foreach ($_FILES['project_certificate_image']['name'] as $key => $val) {
            $file = $_FILES['project_certificate_image']['name'][$key];
            $file_tmp1 = $_FILES['project_certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp1, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file_tmp2 = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp2, $uploadplace . $file);
            $location2 .= $file . " ";
        }


        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file_tmp3 = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp3, $uploadplace . $file);
            $location3 .= $file . " ";
        }


        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        //$country = $_POST["country"];
        $specialist = $_POST["specialist"];
        $certificate = $_POST["certificate"];

        //$field = $_POST["field"];
        //$sub_field = $_POST["sub_field"];
        //$register_type = $_POST["register_type"];
        $project_name = $_POST["project_name"];
        $project_field = $_POST["project_field"];
        $project_competation = $_POST["project_competation"];
        $project_prize = $_POST["project_prize"];

        //$username = $_POST["username"];
        $password = $_POST["password"];
        //$password_repeat = $_POST["password_repeat"];



        $errormessage = [];
        /*
        if (isset($_POST["check_privacy"])) {
        } else {
            $errormessage[] = $lang["check_privacy"];
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
        */

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
            $stmt = $connect->prepare("UPDATE fash_register SET first_name=?, last_name=?, email=?, mobile=?, specialist=? ,
            certificate=? , project_name=?,
            project_field=?,project_competation=?,project_prize=?,project_certificate_image=?,
            national_id=?,certificate_image=?, password=? WHERE username=?");
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
                $_SESSION["username"]
            ));
            if ($stmt) {
                header("refresh: 0");
?>

<div class='container'>
    <div class='alert alert-success text-center'> تم تعديل البيانات بنجاح
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
                                                                <label
                                                                    for="first_name"><?php echo $lang["first_name"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <input name="first_name" type="text"
                                                                    class="form-control" id="first_name"
                                                                    value="<?php echo $userdata['first_name']; ?>">
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
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label
                                                                    for="selectcountry"><?php echo $lang["country"];  ?></label>
                                                                <select name="country" class="form-select country3"
                                                                    id="selectcountry"
                                                                    aria-label="Floating label select example">

                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['country']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>





                                                                    <?php
                                                                    $stmt = $connect->prepare("SELECT * FROM countries");
                                                                    $stmt->execute();
                                                                    $allcountry = $stmt->fetchall();
                                                                    foreach ($allcountry as $country) { ?>
                                                                    <option
                                                                        value="<?php echo $country["country_code"]; ?>">
                                                                        <?php echo $country["country_arName"]; ?>
                                                                    </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                                    -->
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

                                                                    <option value=""> الموهل العلمي </option>
                                                                    <option value="امي"> امي </option>
                                                                    <option value="اعدادي"> اعدادي </option>
                                                                    <option value="ثانوي"> ثانوي </option>
                                                                    <option value="بكالوريوس"> بكالوريوس </option>
                                                                    <option value="ماجتسير"> ماجتسير </option>
                                                                </select>


                                                            </div>
                                                            <!--
                                                            <div class="box">
                                                                <label
                                                                    for="country9"><?php echo $lang["select_field"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <select name="field" class="form-select country9"
                                                                    id="country9"
                                                                    aria-label="Floating label country2 example"
                                                                    value="<?php echo $_REQUEST['field']; ?>">

                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['field']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <option value="ذكاء اصطناعي ">ذكاء اصطناعي
                                                                    </option>
                                                                    <option value="واقع افتراضي ">واقع افتراضي
                                                                    </option>
                                                                    <option value="ميتافيرس">ميتافيرس </option>
                                                                    <option value="واقع معزز ">واقع معزز </option>
                                                                </select>

                                                            </div>
                                                                    -->

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
                                                            <!--
                                                            <div class="box mb-3">
                                                                <label for="floatingInput">
                                                                    <?php echo $lang["confirm_password"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <input name="password_repeat" type="password"
                                                                    class="form-control" id="floatingInput"
                                                                    value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo $_REQUEST['password_repeat']; ?>">
                                                            </div>
                                                                    -->
                                                            <!--
                                                            <div class="box">
                                                                <label
                                                                    for="floatingSelectGrid"><?php echo $lang["select_sub_field"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <select name="sub_field" class="form-select country8"
                                                                    id="floatingSelectGrid"
                                                                    aria-label="Floating label select example">

                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['sub_field']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <option value="برمجة">برمجة </option>
                                                                    <option value="تصميم">تصميم </option>
                                                                    <option value="تحليل نظم">تحليل نظم</option>
                                                                    <option value="بيغ داتا ">بيغ داتا </option>
                                                                    <option value="مصمم برمجيات">مصمم برمجيات
                                                                    </option>
                                                                </select>

                                                            </div>
                                                                    -->
                                                            <!--
                                                            <div class="box">
                                                                <label for="register_type">
                                                                    <?php echo $lang["register_type"];  ?><span
                                                                        class="star"> *
                                                                    </span></label>
                                                                <select name="register_type" id="register_type"
                                                                    class="form-select country" id="register_type"
                                                                    aria-label="country example">
                                                                    <?php
                                                                    if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>


                                                                    <option
                                                                        value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>">
                                                                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST")  echo $_REQUEST['register_type']; ?>
                                                                    </option>
                                                                    <?php
                                                                    } else { ?>
                                                                    <option value=""><?php echo $lang["select"];  ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>


                                                                    <option value="فردي"> فردي </option>
                                                                    <option value="وسيط او شركة "> وسيط او شركة
                                                                    </option>
                                                                </select>
                                                            </div>
                                                                    -->

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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="check_exp">
                                        <h4> هل لديك مشروع قائم </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> اسم المشروع </label>
                                                    <input name="project_name" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["project_name"] ?>">

                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput"> مجال المشروع </label>
                                                    <input name="project_field" type="text" class="form-control"
                                                        id="floatingInput" placeholder=""
                                                        value="<?php echo $userdata["project_field"] ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل شاركت اعمالك في مسابقات أو معارض!</h4>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design1">
                                                    <label class="" for="check_design1"> لا </label>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design2">
                                                    <label class="" for="check_design2"> نعم </label>
                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> ماهي المسابقات والمعارض التي شارك فيه؟
                                                            </label>
                                                            <textarea name="project_competation" class="form-control"
                                                                name=""
                                                                id="floatingInput"><?php echo $userdata["project_competation"] ?></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Do first prototype -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل حصل أعمالك على جوائز؟ </h4>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype1">
                                                    <label class="" for="first_prototype1"> لا </label>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype2">
                                                    <label class="" for="first_prototype2"> نعم </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="form-group mb-3">
                                                            <label for=""> الجوائز </label>
                                                            <textarea class="form-control" name="project_prize"
                                                                id="floatingInput"> <?php echo $userdata["project_prize"] ?> </textarea>

                                                        </div>

                                                        <div class="col-lg-12">
                                                            <label> صور الشهادات </label>

                                                            <div class="box mb-3">
                                                                <div class="upload-file">
                                                                    <div class="upload-wrapper">
                                                                        <label>
                                                                            <input type="file"
                                                                                name="project_certificate_image[]"
                                                                                id="files" multiple>
                                                                            <p> <a>اختر الملفات </a></p>
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

                                                            <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

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
                                            <label> البطاقة الوطنية </label>

                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="national_id[]" id="files2"
                                                                multiple>
                                                            <p> <a>اختر الملفات </a></p>
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

                                            <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                        </div>

                                        <div class="col-lg-12">
                                            <label> صورة من المستند </label>

                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="certificate_image[]" id="files3"
                                                                multiple>
                                                            <p> <a> اختر الملفات </a></p>
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

                                            <!--     <input class="form-control" type="file" name="cv[]" id="" multiple> -->

                                        </div>

                                    </div>



                                </div>

                            </div>

                        </div>


                    </div>
                </div>
                <div class="">
                    <div class="reservation_button">
                        <button type="submit" class="btn main_button">
                            تعديل الحساب </button>
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