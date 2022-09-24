<?php

if (isset($_GET['project_id']) && is_numeric($_GET['project_id'])) {
    $project_id = $_GET['project_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_add_project WHERE project_id =?');
    $stmt->execute([$project_id]);
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
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة المشروع </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> مشاهدة المشروع </h6>
        </div>

        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="register_id" value="<?php echo $project_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم المشروع </label>
                            <input required class="form-control" type="text" name="car_name"
                                value="<?php echo $alltype['project_name']; ?>">
                        </div>


                        <div class="box">
                            <label id="name"> وصف المشروع </label>
                            <textarea name="" class="form-control"><?php echo $alltype['project_desc']; ?></textarea>

                        </div>

                        <div class="box">
                            <label id="name"> حالة المشروع </label>
                            <select class="form-control" name="project_status" id="">
                                <option value=""> اختر حالة المشروع </option>

                                <option <?php if ($alltype['project_status'] == 'active')  echo 'selected'; ?>
                                    value="active"> تفعيل </option>
                                <option <?php if ($alltype['project_status'] == 'pending')  echo 'selected'; ?>
                                    value="pending"> تحت المراجعه </option>
                            </select>
                        </div>

                        <div class="box">
                            <label id="name"> العرض في المعرض </label>
                            <select class="form-control" name="project_show" id="">
                                <option value=""> اختر </option>

                                <option <?php if ($alltype['project_show'] == 'نعم')  echo 'selected'; ?>
                                    value="نعم"> نعم </option>
                                <option <?php if ($alltype['project_show'] == 'لا')  echo 'selected'; ?>
                                    value="لا"> لا </option>
                            </select>
                        </div>



                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <h6 class="fw-bold mb-3 mt-3 bg-gradient-blue p-2"> المعلومات القانوينة </h6>
                            <label for=""> شهادة التسجيل </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['certificate_register'];
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

                            <label for="">الرسومات الهندسية</label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['eng_draw'];
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

                            <label for=""> النموذج المبدئي </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['prototype'];
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
                            <label for=""> صور المشروع </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['project_images'];
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
                            <label for=""> فيديو المشروع </label>
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


                <div class="box submit_box">
                    <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل المشروع ">
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $project_status =  $_POST['project_status'];
            $project_show =  $_POST['project_show'];

            $stmt = $connect->prepare("UPDATE revival_add_project SET project_status=? , project_show=? WHERE project_id   =? ");
            $stmt->execute([
                $project_status,
                $project_show,
                $project_id,


            ]);

            if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل المشروع بنجاح
        <?php header('refresh:3;url=main.php?dir=revival_add_new_project&page=report'); ?>
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