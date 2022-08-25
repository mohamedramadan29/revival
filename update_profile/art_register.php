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
            $file_tmp = $_FILES['project_design']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location .= $file . " ";
        }
        /////////////////
        // START UPLOAD PROJECT PROTOTYPE TYPE (project_prototype)

        foreach ($_FILES['project_prototype']['name'] as $key => $val) {
            $file = $_FILES['project_prototype']['name'][$key];
            $file_tmp = $_FILES['project_prototype']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location2 .= $file . " ";
        }

        // START UPLOAD project_video (project_video)


        foreach ($_FILES['project_video']['name'] as $key => $val) {
            $file = $_FILES['project_video']['name'][$key];
            $file_tmp = $_FILES['project_video']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location3 .= $file . " ";
        }

        // START UPLOAD project_certificate(project_certificate)


        foreach ($_FILES['project_certificate']['name'] as $key => $val) {
            $file = $_FILES['project_certificate']['name'][$key];
            $file_tmp = $_FILES['project_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location4 .= $file . " ";
        }

        // START UPLOAD national_id (national_id)
        foreach ($_FILES['national_id']['name'] as $key => $val) {
            $file = $_FILES['national_id']['name'][$key];
            $file_tmp = $_FILES['national_id']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location5 .= $file . " ";
        }


        // START UPLOAD certificate_image

        foreach ($_FILES['certificate_image']['name'] as $key => $val) {
            $file = $_FILES['certificate_image']['name'][$key];
            $file_tmp = $_FILES['certificate_image']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location6 .= $file . " ";
        }
        // START UPLOAD last_certificate 


        foreach ($_FILES['last_certificate']['name'] as $key => $val) {
            $file = $_FILES['last_certificate']['name'][$key];
            $file_tmp = $_FILES['last_certificate']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location7 .= $file . " ";
        }

        // START UPLOAD CV

        foreach ($_FILES['cv']['name'] as $key => $val) {
            $file = $_FILES['cv']['name'][$key];
            $file_tmp = $_FILES['cv']['tmp_name'][$key];
            move_uploaded_file($file_tmp, $uploadplace . $file);
            $location8 .= $file . " ";
        }
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        //  $country = $_POST["country"];
        $specialist = $_POST["specialist"];
        $certificate = $_POST["certificate"];

        //  $field = $_POST["field"];
        //  $sub_field = $_POST["sub_field"];
        // $register_type = $_POST["register_type"];
        $experience_info = $_POST["experience_info"];
        $language_speak = $_POST["language_speak"];
        $project_details = $_POST["project_details"];
        $project_name = $_POST["project_name"];
        $project_field = $_POST["project_field"];
        $project_tools = $_POST["project_tools"];
        $project_date = $_POST["project_date"];
        $project_competation = $_POST["project_competation"];
        $project_prize = $_POST["project_prize"];

        //  $username = $_POST["username"];
        $password = $_POST["password"];
        // $password_repeat = $_POST["password_repeat"];

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

            $stmt = $connect->prepare("UPDATE art_register SET
              first_name=?, last_name=?, email=?,mobile=? , specialist=? ,certificate=? ,
experience_info=?, language_speak=? , project_details=? , project_name=?,
project_field=?,project_tools=? , project_date=?,project_design=?,project_prototype=?,
project_video=?,project_certificate=?,project_competation=?,project_prize=?
,national_id=?,certificate_image=?,last_certificate=?,cv=?, password=? WHERE username=?");
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
                $location,
                $location2,
                $location3,
                $location4,
                $project_competation,
                $project_prize,
                $location5,
                $location6,
                $location7,
                $location8,
                $password,
                $_SESSION['username'],
            ));
            if ($stmt) {
                header("refresh: 0");

?>

<div class='container'>
    <div class='alert alert-success text-center'>
        تم تعديل البيانات بنجاح
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
                            <h4 class=""> خبراتك </h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box mb-3">
                                        <label for="floatingInput"> اكتب نبذةعن خبراتك</label>
                                        <textarea name="experience_info" class="form-control" name=""
                                            id="floatingInput"><?php echo $userdata["experience_info"] ?></textarea>

                                    </div>
                                    <div class="box mb-3">
                                        <label for="floatingInput">ما هي اللغات التي تجيدها
                                            تحدثا وكتابة</label>
                                        <textarea name="language_speak" class="form-control" name=""
                                            id="floatingInput"><?php echo $userdata["language_speak"] ?></textarea>

                                    </div>
                                    <div class="check_exp">
                                        <h4> هل لديك ابتكارات </h4>
                                        <div class="main_check">
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp1">
                                            <label class="" for="check_exp1"> لا </label>
                                            <input class="" name="check_exp" type="radio" value="" id="check_exp2">
                                            <label class="" for="check_exp2"> نعم </label>
                                            <div class="check_exp1_project">
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> اسم المشروع
                                                    </label>
                                                    <input name="project_name" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["project_name"] ?>">
                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput">نبذة عن
                                                        المشروع</label>
                                                    <textarea name="project_details" class="form-control" name=""
                                                        id="floatingInput"><?php echo $userdata["project_details"] ?></textarea>

                                                </div>

                                                <div class="box mb-3">
                                                    <label for="floatingInput"> مجال المشروع
                                                    </label>
                                                    <input name="project_field" type="text" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["project_field"] ?>">

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput"> ماهي التقنيات
                                                        المستخدمة فى انجاز المشروع
                                                    </label>
                                                    <textarea name="project_tools" class="form-control" name=""
                                                        id="floatingInput"><?php echo $userdata["project_tools"] ?></textarea>

                                                </div>
                                                <div class="box mb-3">
                                                    <label for="floatingInput">تاريخ انجاز
                                                        المشروع</label>
                                                    <input name="project_date" type="date" class="form-control"
                                                        id="floatingInput"
                                                        value="<?php echo $userdata["project_date"] ?>">

                                                </div>
                                                <!-- Do Design -->
                                                <div class="prototype_deisgn" id="prototype_deisgn">
                                                    <h4> هل يوجد تصميم !</h4>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design1">
                                                    <label class="" for="check_design1"> لا
                                                    </label>
                                                    <input class="" name="check_design" type="radio" value=""
                                                        id="check_design2">
                                                    <label class="" for="check_design2"> نعم
                                                    </label>
                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق التصميم </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_design[]"
                                                                            id="files" multiple>
                                                                        <p> <a> ارفع التصميم من هنا </a>
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
                                                    <h4> هل يوجد نموذج اولي للمشروع؟</h4>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype1">
                                                    <label class="" for="first_prototype1"> لا
                                                    </label>

                                                    <input class="" name="first_prototype" type="radio" value=""
                                                        id="first_prototype2">
                                                    <label class="" for="first_prototype2"> نعم
                                                    </label>

                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق صورة </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_prototype[]"
                                                                            id="files2" multiple>
                                                                        <p> <a> ارفق الملفات من هنا </a>
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
                                                    <h4> هل يوجد فيديو للمشروع؟</h4>

                                                    <!--  <input class="" name="project_video" type="radio" value=""
                                                    id="project_video1"> -->
                                                    <label class="" for="project_video1"> لا
                                                    </label>

                                                    <input class="" name="project_video" type="radio" value=""
                                                        id="project_video2">
                                                    <label class="" for="project_video2"> نعم
                                                    </label>

                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق الفيديو </label>

                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_video[]"
                                                                            id="files3" multiple>
                                                                        <p> <a> ارفق الفيديو من هنا </a>
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
                                                    <h4> هل يوجد شهادة براءة اختراع!</h4>
                                                    <input class="" name="project_certificate" type="radio" value=""
                                                        id="project_certificate1">
                                                    <label class="" for="project_certificate1">
                                                        لا </label>
                                                    <input class="" name="project_certificate" type="radio" value=""
                                                        id="project_certificate2">
                                                    <label class="" for="project_certificate2">
                                                        نعم </label>
                                                    <div class="check_prototype_resualt">
                                                        <label> ارفق الشهادة </label>
                                                        <div class="box mb-3">
                                                            <div class="upload-file">
                                                                <div class="upload-wrapper">
                                                                    <label>
                                                                        <input type="file" name="project_certificate[]"
                                                                            id="files4" multiple>
                                                                        <p> <a> ارفق الشهادات من هنا </a>
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
                                                    <h4> هل شارك المشروع في مسابقات؟</h4>

                                                    <input class="" name="share_project" type="radio" value=""
                                                        id="share_project1">
                                                    <label class="" for="share_project1"> لا
                                                    </label>

                                                    <input class="" name="share_project" type="radio" value=""
                                                        id="share_project2">
                                                    <label class="" for="share_project2"> نعم
                                                    </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> ماهي
                                                                المسابقات التي شارك فيه؟
                                                            </label>
                                                            <textarea name="project_competation" class="form-control"
                                                                id="floatingInput"> <?php echo $userdata["project_competation"] ?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Do Project Get Prize -->
                                                <div class="prototype_deisgn">
                                                    <h4> هل حصل المشروع على جوائز؟</h4>

                                                    <input class="" name="project_prize" type="radio" value=""
                                                        id="project_prize1">
                                                    <label class="" for="project_prize1"> لا
                                                    </label>
                                                    <input class="" name="project_prize" type="radio" value=""
                                                        id="project_prize2">
                                                    <label class="" for="project_prize2"> نعم
                                                    </label>

                                                    <div class="check_prototype_resualt">
                                                        <div class="box mb-3">
                                                            <label for="floatingInput"> اذكر
                                                                الجوائز
                                                            </label>
                                                            <textarea name="project_prize" class="form-control"
                                                                id="floatingInput">  <?php echo $userdata["project_prize"] ?> </textarea>
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
                                            <h4> البطاقة الوطنية </h4>
                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="national_id[]" id="files5"
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
                                                <output id="image-gallery5"></output>

                                            </div>
                                            <!--<input class="form-control" type="file" name="national_id[]" id="" multiple> -->

                                        </div>
                                        <div class="col-lg-12">
                                            <h4>صورة من المستند</h4>
                                            <div class="box mb-3">
                                                <div class="upload-file">
                                                    <div class="upload-wrapper">
                                                        <label>
                                                            <input type="file" name="certificate_image[]" id="files6"
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
                                                <output id="image-gallery6"></output>

                                            </div>

                                            <!--<input class="form-control" type="file" name="certificate_image[]" id=""
                                            multiple> -->

                                        </div>
                                        <div class="row">
                                            <h4> ارفق المستندات التالية </h4>
                                            <div class="col-lg-12">
                                                <label> اخر شهادة علمية</label>
                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="last_certificate[]" id="files7"
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
                                                    <output id="image-gallery7"></output>

                                                </div>

                                                <!-- <input class="form-control" type="file" name="last_certificate[]" id=""
                                                multiple> -->

                                            </div>
                                            <div class="col-lg-12">
                                                <label> الفيديوهات </label>

                                                <div class="box mb-3">
                                                    <div class="upload-file">
                                                        <div class="upload-wrapper">
                                                            <label>
                                                                <input type="file" name="cv[]" id="files8" multiple>
                                                                <p> <a>اختر الملفات </a></p>
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