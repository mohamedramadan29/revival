<?php

if (isset($_GET['gallary_id']) && is_numeric($_GET['gallary_id'])) {
    $gallary_id = $_GET['gallary_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_gallary WHERE gallary_id=?');
    $stmt->execute([$gallary_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <div class="container">

            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> تعديل صور المعرض </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل صور المعرض </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $gallary_id; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="row uploadimage">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label> الصورة </label>
                                                <input id="logo" class="form-control dropify_" data-default-file="upload/<?php echo $alltype["image1"]; ?>" type="file" name="image1" value="">
                                            </div>
                                            <div id="logo_" class="col-md-3">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label> الصورة الانجليزية </label>
                                                <input id="logo2" class="form-control dropify_" data-default-file="upload/<?php echo $alltype["image2"]; ?>" type="file" name="image2" value="">
                                            </div>
                                            <div id="logo_" class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box submit_box">
                                <input class="btn btn-primary" name="add_car" type="submit" value=" تعديل الصورة  ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $image_image1_name = $_FILES['image1']['name'];
            $image_image1_tem = $_FILES['image1']['tmp_name'];
            $image_image1_type = $_FILES['image1']['type'];
            $image_image1_size = $_FILES['image1']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            $image_image2_name = $_FILES['image2']['name'];
            $image_image2_tem = $_FILES['image2']['tmp_name'];
            $image_image2_type = $_FILES['image2']['type'];
            $image_image2_size = $_FILES['image2']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            if ($image_image1_tem != '' && $image_image2_tem != '') {
                $image_image1_uploaded =
                rand(0, 100000000) . '.' . $image_image1_name;
            move_uploaded_file(
                $image_image1_tem,
                'upload/' . $image_image1_uploaded
            );
                $image_image2_uploaded =
                    rand(0, 100000000) . '.' . $image_image2_name;
                move_uploaded_file(
                    $image_image2_tem,
                    'upload/' . $image_image2_uploaded
                );
                $stmt = $connect->prepare("UPDATE revival_gallary SET image1=?,image2=?
                WHERE gallary_id=?");
                $stmt->execute([
                    $image_image1_uploaded,
                    $image_image2_uploaded,
                    $gallary_id,
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل الصورة بنجاح
                            <?php header('refresh:3,url=main.php?dir=revival_gallary&page=report'); ?>
                        </div>
                    </div>

    <?php }
            }
            elseif ($image_image1_tem != '') {
                $image_image1_uploaded =
                    rand(0, 100000000) . '.' . $image_image1_name;
                move_uploaded_file(
                    $image_image1_tem,
                    'upload/' . $image_image1_uploaded
                );
                $stmt = $connect->prepare("UPDATE revival_gallary SET image1=?
                WHERE gallary_id=?");
                $stmt->execute([
                    $image_image1_uploaded,
                    $gallary_id,
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل الصورة بنجاح

                            <?php header('refresh:3,url=main.php?dir=revival_gallary&page=report'); ?>


                        </div>
                    </div>

                <?php }
            } elseif ($image_image2_tem != '') {
                $image_image2_uploaded =
                    rand(0, 100000000) . '.' . $image_image2_name;
                move_uploaded_file(
                    $image_image2_tem,
                    'upload/' . $image_image2_uploaded
                );
                $stmt = $connect->prepare("UPDATE revival_gallary SET image2=?
                        WHERE gallary_id=?");
                $stmt->execute([
                    $image_image2_uploaded,
                    $gallary_id,
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل الصورة بنجاح

                            <?php header('refresh:3,url=main.php?dir=revival_gallary&page=report'); ?>


                        </div>
                    </div>
                <?php }
            } 
        }
    }
} else {
    ?>
    <div class="container">
        <div class="alert alert-danger"> لا يوجد بيانات لهذا العنصر </div>
    </div>
<?php
}
