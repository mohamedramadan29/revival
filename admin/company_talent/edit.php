<?php

if (isset($_GET['register_id']) && is_numeric($_GET['register_id'])) {
    $register_id = $_GET['register_id'];
    $stmt = $connect->prepare('SELECT * FROM company_register WHERE reg_id  =?');
    $stmt->execute([$register_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
?>

<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة الموهبة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> مشاهدة المستخدم </h6>
        </div>

        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم الاول </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['first_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> الاسم الاخير </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['last_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> البريد الالكتروني </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['email']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> رقم الهاتف </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['mobile']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> الدولة </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['country']; ?>">
                        </div>

                        <div class="box">
                            <label id="name"> نبذة مختصرة </label>
                            <textarea name="" class="form-control"><?php echo $alltype['experience_info']; ?></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> اللغات الذى يجيدها </label>
                            <textarea name="" class="form-control"><?php echo $alltype['language_speak']; ?></textarea>

                        </div>

                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> هل لديك ابتكارات</h6>
                            <label id="name"> اسم المشروع </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['project_name']; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> مجال المشروع </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['project_field']; ?>">
                        </div>
                        <div class="box">
                            <label id="name">نبذة عن المشروع</label>
                            <textarea name="" class="form-control"><?php echo $alltype['project_details']; ?></textarea>

                        </div>
                        <div class="box">
                            <label id="name">تاريخ انجاز المشروع</label>
                            <input  class="form-control" type="date" name="car_name"
                                value="<?php echo $alltype['project_date']; ?>">
                        </div>


                        <div class="box">
                            <label id="name"> ماهي التقنيات المستخدمة فى انجاز المشروع </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['project_tools']; ?>">
                        </div>

                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> هل يوجد تصميم
                            </h6>
                            <label id="name"> الملفات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_design'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> هل يوجد نموذج اولي للمشروع؟

                            </h6>
                            <label id="name"> الملفات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_prototype'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2">هل يوجد فيديو للمشروع؟

                            </h6>
                            <label id="name"> الملفات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_video'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> هل يوجد شهادة براءة اختراع!

                            </h6>
                            <label id="name"> الملفات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_certificate'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> هل شارك المشروع في مسابقات؟

                            </h6>
                            <textarea name=""
                                class="form-control"><?php echo $alltype['project_competation']; ?></textarea>

                        </div>
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2">هل حصل المشروع على جوائز؟

                            </h6>
                            <textarea name="" class="form-control"><?php echo $alltype['project_prize']; ?></textarea>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> التخصص </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['specialist']; ?>">
                        </div>

                        <div class="box">
                            <label id="name"> الموهل العلمي </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['certificate']; ?>">
                        </div>

                        <div class="box">
                            <label id="name"> المجال </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['field']; ?>">
                        </div>

                        <div class="box">
                            <label id="name"> المجال الفرعي </label>
                            <input  class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['sub_field']; ?>">
                        </div> 
                        <div class="box">
                            <label id="name"> اكتب رسالة خاصة للمستخدم </label>
                            <textarea name="customer_message"
                                class="form-control"><?php echo $alltype['customer_message']; ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> حالة الموهبة </label>
                            <select class="form-control" name="user_status" id="">
                                <option value=""> اختر حالة الموهبة </option>

                                <option <?php if ($alltype['user_status'] == 'active')  echo 'selected'; ?>
                                    value="active"> تفعيل </option>
                                <option <?php if ($alltype['user_status'] == 'pending')  echo 'selected'; ?>
                                    value="pending"> تحت المراجعه </option>
                            </select>
                        </div>
                        <div class="box">
                            <label id="name"> عرض الموهبة في المعرض </label>
                            <select class="form-control" name="user_show" id="">
                                <option value=""> اختر </option>

                                <option <?php if ($alltype['user_show'] == 'active')  echo 'selected'; ?>
                                    value="نعم"> نعم </option>
                                <option <?php if ($alltype['user_show'] == 'pending')  echo 'selected'; ?>
                                    value="لا"> لا </option>
                            </select>
                        </div>

                        <div class="box">
                            <label id="name"> اخر شهادة علمية</label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['last_certificate'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <label id="name"> السيرة الذاتية والمستندات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['certificate_image'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <div class="box">
                            <label id="name"> الفيديوهات </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_video'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
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
                        <label id="name"> صورة البطاقة الوطنية </label>
                        <div class="row">
                            <?php
                                    $files1 = $alltype['national_id'];
                                    $files1 = explode(" ", $files1);
                                    $countfile = count($files1) - 1;
                                    if ($countfile > 0) {
                                        for ($i = 0; $i < $countfile; ++$i) {
                                    ?>
                            <div class="col-12">

                                <div class="files_style">
                                    <p> <a class="btn bg-gradient-light" target="_blank"
                                            href="upload/<?= $files1[$i] ?>">
                                            <i class="fa fa-file"></i>
                                            <?= $files1[$i] ?></a></p>
                                </div>
                            </div>
                            <?php
                                        }
                                    } else { ?>

                            <div class="alert alert-danger"> لا يوجد صورة البطاقة الوطنية </div>

                            <?php
                                    }
                                    ?>
                        </div>
                    </div>

                </div>

                <div class="box submit_box">
                    <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل الموهبة ">
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_status =  $_POST['user_status'];
            $user_show =  $_POST['user_show'];
            $customer_message =  $_POST['customer_message'];

            $stmt = $connect->prepare("UPDATE company_register SET user_status=?,user_show=?,customer_message=? WHERE reg_id  =? ");
            $stmt->execute([
                $user_status,
                $user_show,
                $customer_message,
                $register_id,


            ]);

            if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل المستخدم بنجاح
        <?php header('refresh:3;url=main.php?dir=company_talent&page=report'); ?>
    </div>
</div>
<?php }
        }
    }
} else {
    ?>
<div class="container">
    <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
</div>
<?php
}