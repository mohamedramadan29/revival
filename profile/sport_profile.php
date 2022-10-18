<!-- START PROFILE DATA -->
<?php
// START GET EMAIL CONTENT  -->

$stmt = $connect->prepare("SELECT * FROM email_message WHERE email_section='تفعيل الحساب'");
$stmt->execute();
$emaildata = $stmt->fetchAll();

// END GET EMAIL CONTENT -->
?>
<div class="profile_data">
    <?php
    $emailll =  $userinfo['email'];
    if ($userinfo['user_status'] == 'active') {
        $to_email = $emailll;
        $subject = "تفعيل حسابك في ريفايفال";
        foreach ($emaildata as $data) {
            if ($_SESSION['lang'] == 'ar') {
                $body =  $data['email_text'];
            } else {
                $body =  $data['email_text_en'];
            }
        }
        $headers = "From: info@revivals.site";
        mail($to_email, $subject, $body, $headers);
    } else { ?>
        <div class="alert_message alert alert-warning d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                حسابك تحت المراجعه الان سيتم الموافقة قريبا من خلال الادمن عند اكمال جميع الملفات الخاصة بك
            </div>
        </div>
    <?php
    } ?>

    <?php
    if (!empty($userinfo['customer_message'])) { ?>
        <div class="customer_message">
            <div class="alert alert-info">
                <?php

                echo $userinfo['customer_message'];


                ?>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="container">
        <div class="data">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">

                        <form id="change_image_form4" class="change_image_form" action="" method="POST" enctype="multipart/form-data">
                            <?php
                            if (strlen($userinfo['personal_image']) > 0) { ?>
                                <div class="personal_image">
                                    <img src="admin/upload/<?php echo $userinfo['personal_image']; ?>" alt="">
                                </div>
                            <?php
                            } else { ?>
                                <div class="personal_image">
                                    <img src="uploads/avatar.png" alt="">
                                </div>
                            <?php
                            }
                            ?>
                            <input class="change_image" id="change_image4" name="personal_image" type="file">
                            <i class="fa fa-camera"></i>

                        </form>
                        <script>
                            document.getElementById('change_image4').onchange = function() {
                                document.getElementById('change_image_form4').submit();
                            }
                        </script>

                        <?php
                        if (isset($_FILES['personal_image']['name'])) {
                            $file = '';
                            $file_tmp = '';
                            $location = '';
                            $uploadplace = "admin/upload/";
                            // START UPLOAD CV FIELS

                            $file = $_FILES['personal_image']['name'];
                            $file_tmp = $_FILES['personal_image']['tmp_name'];
                            move_uploaded_file($file_tmp, $uploadplace . $file);
                            $location = $file . " ";
                            if ($file_tmp != "") {
                                $stmt = $connect->prepare("UPDATE sport_register SET  personal_image=? WHERE username=?");
                                $stmt->execute(array($location, $_SESSION["username"]));
                            }

                            if ($stmt) {
                                header("Location:profile.php");
                            }
                        }

                        ?>

                        <h2> <?php echo $userinfo['first_name2']; ?> <?php echo $userinfo['last_name'];  ?> </h2>
                        <p> <?php echo $userinfo['email']; ?> </p>

                    </div>
                </div>
                <div class="col-lg-8">
                    <br>
                    <div class="info2">
                        <div class="buttons_links">
                            <ul class="list-unstyled">
                                <li> <a href="update_profile.php" class="btn button">
                                        <?php echo $lang["account_update"]; ?> <i class="fa fa-edit"></i> </a>
                                </li>
                                <li class="d-none"> <a href="ticket.php" class="btn button">
                                        <?php echo $lang["open_ticket"]; ?> <i class="fa fa-message"></i> </a>
                                </li>
                                <?php
                                if ($userinfo['register_type'] == ' وسيط / منشأة ' || $userinfo['register_type'] == 'company') { ?>
                                    <li> <a href="add_talent.php?username=<?php echo $userinfo['username']; ?>" class="btn button">
                                            <?php echo $lang["add_talent"]; ?> <i class="fa fa-user"></i> </a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="dropdown-share d-none">
                                    <a href="#" class="btn button"> <?php echo $lang["business_sharing"]; ?> <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <ul class="list-unstyled">
                                        <li> <a href="share_works_indvidual.php">
                                                <?php echo $lang["Individually_share"]; ?> </a> <i class="fa fa-user"></i></li>
                                        <li> <a href="share_works_team.php"> <?php echo $lang["collectively_share"]; ?>
                                            </a> <i class="fa fa-users"></i>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="add_individual_project.php" class="btn button">
                                        <?php echo $lang["add_new_project"]; ?> <i class="fa fa-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- START GET DATA -->
                    <div class="personal_information">
                        <div class="data2">
                            <h4> <?php echo $lang["personal_information"]; ?> </h4>
                            <div class="information">
                                <ul class="list-unstyled">
                                    <li> <?php echo $lang["first_name"]; ?><span>:</span></li>
                                    <li> <?php echo $lang["last_name"]; ?> <span>:</span></li>
                                    <li> <?php echo $lang["email"]; ?> <span>:</span></li>
                                    <li><?php echo $lang["mobile"]; ?><span>:</span></li>
                                    <li> <?php echo $lang["specialist"]; ?> <span>:</span></li>
                                    <li> <?php echo $lang["certificate"]; ?><span>:</span></li>

                                </ul>
                                <ul class="list-unstyled">

                                    <li> <?php echo $userinfo['first_name2']; ?> </li>
                                    <li> <?php echo $userinfo['last_name']; ?> </li>
                                    <li> <?php echo $userinfo['email']; ?> </li>
                                    <li> <?php echo $userinfo['mobile']; ?> </li>
                                    <li> <?php echo $userinfo['specialist']; ?> </li>
                                    <li> <?php echo $userinfo['certificate']; ?> </li>
                                </ul>
                            </div>
                        </div>

                        <div class="data2">
                            <h4> <?php echo $lang["Brief_about_you"]; ?> </h4>
                            <div class="information">
                                <textarea readonly placeholder="<?php echo $lang["your_experiences"]; ?>">  <?php echo $userinfo['experience_info']; ?> </textarea>
                            </div>
                        </div>

                        <div class="data2">
                            <h4> السيرة الذاتية والمستندات</h4>
                            <div class="person_files">
                                <div class="row">
                                    <?php
                                    $files1 = $userinfo['fiels_talent'];
                                    $files1 = explode(" ", $files1);
                                    $countfile = count($files1) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) {
                                    ?>
                                        <div class="col-lg-6 col-12">
                                            <p class="btn bg-success"> <?= $files1[$i] ?> </p>

                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>


                        <div class="data2">
                            <h4> الفيديوهات </h4>
                            <div class="person_files">
                                <div class="row">
                                    <?php
                                    $files1 = $userinfo['video_talent'];
                                    $files1 = explode(" ", $files1);
                                    $countfile = count($files1) - 1;
                                    for ($i = 0; $i < $countfile; ++$i) {
                                    ?>
                                        <div class="col-lg-6 col-12">
                                            <p class="btn bg-success"> <?= $files1[$i] ?> </p>
                                        </div>
                                    <?php
                                    }
                                    // echo "<p style='color:green;font-size:26px'>عدد " . $count . " images found.";
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END GET DATA -->
                    <!--  START TALENT REGISTER  -->
                    <?php
                    if ($userinfo['register_type'] == ' وسيط / منشأة ' || $userinfo['register_type'] == 'company') { ?>
                        <div class="personal_information">
                            <div class="data2">
                                <h4> المواهب المسجلة </h4>
                                <?php
                                $stmt = $connect->prepare('SELECT * FROM company_register WHERE username=?');
                                $stmt->execute(array($userinfo['username']));
                                $count = $stmt->rowCount();
                                if ($count > 0) { ?>

                                    <div class="table-responsive">
                                        <table id="table" class="table table-light table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> حالة الموهبة </th>
                                                    <th> مشاهدة الموهبة </th>
                                                    <th> الاسم الاول </th>
                                                    <th> الاسم الثاني </th>
                                                    <th> البريد الالكتروني </th>
                                                    <th> الهاتف </th>
                                                    <th> التخصص </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $alltype = $stmt->fetchAll();
                                                foreach ($alltype as $type) { ?> <tr>
                                                        <?php if ($type['user_status'] == 'active') { ?>
                                                            <td> <button class="btn btn-success btn-sm"> تم التفعيل </button> </td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td> <button class="btn btn-warning btn-sm"> تحت المراجعه </button> </td>
                                                        <?php

                                                        } ?>
                                                        <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#talent<?php echo $type['reg_id']; ?> ">
                                                                مشاهدة الموهبة
                                                            </button> </td>
                                                        <td><?php echo $type['first_name']; ?> </td>
                                                        <td><?php echo $type['last_name']; ?> </td>
                                                        <td><?php echo $type['email']; ?> </td>
                                                        <td><?php echo $type['mobile']; ?> </td>
                                                        <td><?php echo $type['specialist']; ?> </td>

                                                    </tr> <?php
                                                        }
                                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- START MODEL -->

                                    <!-- Modal -->
                                    <?php foreach ($alltype as $type) {
                                    ?>
                                        <div class="modal fade" id="talent<?php echo $type['reg_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="myform">
                                                            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                                                                <input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="box">
                                                                            <label id="name"> الاسم الاول </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['first_name']; ?>">
                                                                        </div>
                                                                        <div class="box">
                                                                            <label id="name"> الاسم الاخير </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['last_name']; ?>">
                                                                        </div>
                                                                        <div class="box">
                                                                            <label id="name"> البريد الالكتروني </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['email']; ?>">
                                                                        </div>
                                                                        <div class="box">
                                                                            <label id="name"> رقم الهاتف </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['mobile']; ?>">
                                                                        </div>
                                                                        <div class="box">
                                                                            <label id="name"> الدولة </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['country']; ?>">
                                                                        </div>

                                                                        <div class="box">
                                                                            <label id="name"> نبذة مختصرة </label>
                                                                            <textarea name="" class="form-control"><?php echo $type['experience_info']; ?></textarea>

                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-6">


                                                                        <div class="box">
                                                                            <label id="name"> التخصص </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['specialist']; ?>">
                                                                        </div>

                                                                        <div class="box">
                                                                            <label id="name"> الموهل العلمي </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['certificate']; ?>">
                                                                        </div>

                                                                        <div class="box">
                                                                            <label id="name"> المجال </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['field']; ?>">
                                                                        </div>

                                                                        <div class="box">
                                                                            <label id="name"> المجال الفرعي </label>
                                                                            <input class="form-control" type="text" name="car_name" value="<?php echo $type['sub_field']; ?>">
                                                                        </div>

                                                                        <div class="box">
                                                                            <label id="name"> السيرة الذاتية والمستندات </label>
                                                                            <div class="row">
                                                                                <?php
                                                                                $files1 = $type['fiels_talent'];
                                                                                $files1 = explode(" ", $files1);
                                                                                $countfile = count($files1) - 1;
                                                                                if ($countfile > 0) {
                                                                                    for ($i = 0; $i < $countfile; ++$i) {
                                                                                ?>
                                                                                        <div class="col-12">

                                                                                            <div class="files_style">
                                                                                                <p class="btn bg-gradient-light"> <?= $files1[$i] ?> </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                } else { ?>
                                                                                    <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="box">
                                                                        <label id="name"> الفيديوهات </label>
                                                                        <div class="row">
                                                                            <?php
                                                                            $files1 = $type['video_talent'];
                                                                            $files1 = explode(" ", $files1);
                                                                            $countfile = count($files1) - 1;
                                                                            if ($countfile > 0) {
                                                                                for ($i = 0; $i < $countfile; ++$i) {
                                                                            ?>
                                                                                    <div class="col-lg-4 col-12">
                                                                                        <p class="btn bg-gradient-light"> <?= $files1[$i] ?> </p>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                            } else { ?>

                                                                                <div class="alert alert-danger"> لا يوجد فيديوهات </div>

                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <!-- END MODEL  -->

                                <?php

                                } else { ?>

                                    <div class="alert alert-warning">
                                        لا يوجد مواهب مسجلة من خلالك الان
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!--  END TALENT REGISTER  -->

                    <!--  START TALENT REGISTER  -->
                    <div class="personal_information">
                        <div class="data2">
                            <h4> المشاريع الخاصة بك </h4>
                            <?php

                            $stmt = $connect->prepare('SELECT * FROM revival_add_project WHERE username=?');
                            $stmt->execute(array($userinfo['username']));
                            $count = $stmt->rowCount();
                            if ($count > 0) { ?>

                                <div class="table-responsive">
                                    <table id="table" class="table table-light table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th> حالة المشروع </th>
                                                <th> مشاهدة المشروع </th>
                                                <th> اسم المشروع </th>
                                                <th> وصف مختصر عن المشروع </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $alltype = $stmt->fetchAll();
                                            foreach ($alltype as $type) { ?> <tr>
                                                    <?php if ($type['project_status'] == 'active') { ?>
                                                        <td> <button class="btn btn-success btn-sm"> تم التفعيل </button> </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td> <button class="btn btn-warning btn-sm"> تحت المراجعه </button> </td>
                                                    <?php

                                                    } ?>
                                                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#project<?php echo $type['project_id']; ?>">
                                                            مشاهدة المشروع
                                                        </button> </td>
                                                    <td><?php echo $type['project_name']; ?> </td>

                                                    <td><?php
                                                        $desc = $type['project_desc'];
                                                        $project_desc = substr($desc, 0, 100);
                                                        echo $project_desc; ?> </td>
                                                </tr> <?php }
                                                        ?> </tbody>
                                    </table>
                                </div>

                                <!-- START MODEL -->

                                <!-- Modal -->
                                <?php foreach ($alltype as $type) {
                                ?>
                                    <div class="modal fade" id="project<?php echo $type['project_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="myform">
                                                        <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                                                            <input type="hidden" name="register_id" value="<?php echo $project_id; ?>">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="box">
                                                                        <label id="name"> اسم المشروع </label>
                                                                        <input disabled class="form-control" type="text" name="car_name" value="<?php echo $type['project_name']; ?>">
                                                                    </div>


                                                                    <div class="box">
                                                                        <label id="name"> وصف المشروع </label>
                                                                        <textarea disabled name="" class="form-control"><?php echo $type['project_desc']; ?></textarea>

                                                                    </div>
                                                                    <label for=""> صور المشروع </label>
                                                                    <div class="row">
                                                                        <?php
                                                                        $files1 = $type['project_images'];
                                                                        $files1 = explode(" ", $files1);
                                                                        $countfile = count($files1) - 1;
                                                                        if ($countfile > 0) {
                                                                            for ($i = 0; $i < $countfile; ++$i) {
                                                                        ?>
                                                                                <div class="col-12">

                                                                                    <div class="files_style">
                                                                                        <p class="btn bg-gradient-light"> <?= $files1[$i] ?> </p>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <label for=""> فيديو المشروع </label>
                                                                    <div class="row">
                                                                        <?php
                                                                        $files1 = $type['project_video'];
                                                                        $files1 = explode(" ", $files1);
                                                                        $countfile = count($files1) - 1;
                                                                        if ($countfile > 0) {
                                                                            for ($i = 0; $i < $countfile; ++$i) {
                                                                        ?>
                                                                                <div class="col-12">

                                                                                    <div class="files_style">
                                                                                        <p class="btn bg-gradient-light"> <?= $files1[$i] ?> </p>
                                                                                    </div>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                        } else { ?>
                                                                            <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                        <?php
                                                                        }



                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="box">
                                                                        <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> المعلومات القانوينة </h6>
                                                                        <label for=""> شهادة التسجيل </label>
                                                                        <div class="row">
                                                                            <?php
                                                                            $files1 = $type['certificate_register'];
                                                                            $files1 = explode(" ", $files1);
                                                                            $countfile = count($files1) - 1;
                                                                            if ($countfile > 0) {
                                                                                for ($i = 0; $i < $countfile; ++$i) {
                                                                            ?>
                                                                                    <div class="col-12">

                                                                                        <div class="files_style">
                                                                                            <p class="btn bg-gradient-light"><?= $files1[$i] ?> </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                            <?php
                                                                            }



                                                                            ?>
                                                                        </div>

                                                                        <label for="">الرسومات الهندسية</label>
                                                                        <div class="row">
                                                                            <?php
                                                                            $files1 = $type['eng_draw'];
                                                                            $files1 = explode(" ", $files1);
                                                                            $countfile = count($files1) - 1;
                                                                            if ($countfile > 0) {
                                                                                for ($i = 0; $i < $countfile; ++$i) {
                                                                            ?>
                                                                                    <div class="col-12">

                                                                                        <div class="files_style">
                                                                                            <p class="btn bg-gradient-light"> <?= $files1[$i] ?> </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                            <?php
                                                                            }



                                                                            ?>
                                                                        </div>

                                                                        <label for=""> النموذج المبدئي </label>
                                                                        <div class="row">
                                                                            <?php
                                                                            $files1 = $type['prototype'];
                                                                            $files1 = explode(" ", $files1);
                                                                            $countfile = count($files1) - 1;
                                                                            if ($countfile > 0) {
                                                                                for ($i = 0; $i < $countfile; ++$i) {
                                                                            ?>
                                                                                    <div class="col-12">

                                                                                        <div class="files_style">
                                                                                            <p class="btn bg-gradient-light"><?= $files1[$i] ?> </p>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <div class="alert alert-danger"> لا يوجد ملفات </div>
                                                                            <?php
                                                                            }



                                                                            ?>
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
                                <?php
                                }
                                ?>
                                <!-- END MODEL  -->

                            <?php

                            } else { ?>

                                <div class="alert alert-warning">
                                    لا يوجد مشاريع لديك في الوقت الحالي
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <!--  END TALENT REGISTER  -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PROFILE DATA -->