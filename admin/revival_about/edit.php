<?php

if (isset($_GET['about_id']) && is_numeric($_GET['about_id'])) {
    $about_id = $_GET['about_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_about_us WHERE about_id=?');
    $stmt->execute([$about_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> تعديل البانر </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i>تعديل المحتوي </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="typ_id" value="<?php echo $about_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input required class="form-control" type="text" name="about_name"
                                value="<?php echo $alltype["about_name"]; ?>">
                        </div>
                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="about_desc" id=""
                                class="form-control"><?php echo $alltype["about_desc"]; ?></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="about_desc_en" id=""
                                class="form-control"><?php echo $alltype["about_desc_en"]; ?></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> اضافة وصف فرعي
                            </label>
                            <textarea name="about_sub_desc" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"><?php echo $alltype["about_sub_desc"]; ?></textarea>
                        </div>

                        <div class="box">
                            <label id="name"> اضافة وصف فرعي باللغه الانجليزية
                            </label>
                            <textarea name="about_sub_desc_en" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"><?php echo $alltype["about_sub_desc_en"]; ?></textarea>
                        </div>


                        <div class="box">
                            <label id="name_en"> اختر الصفحة <span> * </span></label>
                            <select class="form-control" name="about_page" id="cat_active6">
                                <option value="">
                                    اختر الصفحة </option>
                                <option <?php if ($alltype["about_page"] == "الرئيسية") echo "selected"; ?>
                                    value="الرئيسية"> الرئيسية </option>
                                <option
                                    <?php if ($alltype["about_page"] == "مدينة الذكاء الإصطناعي") echo "selected"; ?>
                                    value="مدينة الذكاء الإصطناعي"> مدينة الذكاء الإصطناعي </option>
                                <option <?php if ($alltype["about_page"] == "مواهب العالم الرياضية") echo "selected"; ?>
                                    value="مواهب العالم الرياضية"> مواهب العالم الرياضية </option>
                                <option <?php if ($alltype["about_page"] == "الأزياء والمجوهرات") echo "selected"; ?>
                                    value="الأزياء والمجوهرات"> الأزياء والمجوهرات </option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row uploadimage">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الصورة </label>
                                        <input id="logo" class="form-control dropify_"
                                            data-default-file="upload/<?php echo $alltype["image1"]; ?>" type="file"
                                            name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الصورة الانجليزية </label>
                                        <input id="logo2" class="form-control dropify_"
                                            data-default-file="upload/<?php echo $alltype["image2"]; ?>" type="file"
                                            name="image2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الفيديو </label>
                                        <input id="logo3" class="form-control dropify_"
                                            data-default-file="upload/<?php echo $alltype["video1"]; ?>" type="file"
                                            name="video1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الفيديو الانجليزية</label>
                                        <input id="logo4" class="form-control dropify_"
                                            data-default-file="upload/<?php echo $alltype["video2"]; ?>" type="file"
                                            name="video2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="تعديل المحتوي">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // START IMAGE car_imageside
            $image_image1_name = $_FILES['image1']['name'];
            $image_image1_tem = $_FILES['image1']['tmp_name'];
            $image_image1_type = $_FILES['image1']['type'];
            $image_image1_size = $_FILES['image1']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            $image_image2_name = $_FILES['image2']['name'];
            $image_image2_tem = $_FILES['image2']['tmp_name'];
            $image_image2_type = $_FILES['image2']['type'];
            $image_image2_size = $_FILES['image2']['size'];
            // START VIDEO car_imageside
            $video_video1_name = $_FILES['video1']['name'];
            $video_video1_tem = $_FILES['video1']['tmp_name'];
            $video_video1_type = $_FILES['video1']['type'];
            $video_video1_size = $_FILES['video1']['size'];
            //    $video_allowed_extention = ['jpg', 'jpeg', 'png'];
            $video_video2_name = $_FILES['video2']['name'];
            $video_video2_tem = $_FILES['video2']['tmp_name'];
            $video_video2_type = $_FILES['video2']['type'];
            $video_video2_size = $_FILES['video2']['size'];
            //  $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            $about_name =  $_POST['about_name'];
            $about_desc = $_POST['about_desc'];
            $about_desc_en =   $_POST['about_desc_en'];
            $about_sub_desc =   $_POST['about_sub_desc'];
            $about_sub_desc_en =   $_POST['about_sub_desc_en'];
            $about_page =   $_POST['about_page'];

            $formerror = [];
            if (empty($about_name)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

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
            $video_video1_uploaded =
                rand(0, 100000000) . '.' . $video_video1_name;
            move_uploaded_file(
                $video_video1_tem,
                'upload/' . $video_video1_uploaded
            );
            $video_video2_uploaded =
                rand(0, 100000000) . '.' . $video_video2_name;
            move_uploaded_file(
                $video_video2_tem,
                'upload/' . $video_video2_uploaded
            );

            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE revival_about_us SET 
                    about_name=?,about_desc=?,about_desc_en=?,about_sub_desc=?,about_sub_desc_en=?,about_page=?
                WHERE about_id=?");
                $stmt->execute([
                    $about_name,
                    $about_desc,
                    $about_desc_en,
                    $about_sub_desc,
                    $about_sub_desc_en,
                    $about_page,
                    $about_id,
                ]);
                if ($image_image1_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET image1=?
                WHERE about_id=?");
                    $stmt->execute([
                        $image_image1_uploaded,
                        $about_id,
                    ]);
                } elseif ($image_image2_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET image2=?
                    WHERE about_id=?");
                    $stmt->execute([
                        $image_image2_uploaded,
                        $about_id,
                    ]);
                } elseif ($video_video1_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET video1=?
                    WHERE about_id=?");
                    $stmt->execute([
                        $video_video1_uploaded,
                        $about_id,
                    ]);
                } elseif ($video_video2_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET video2=?
                    WHERE about_id=?");
                    $stmt->execute([
                        $video_video2_uploaded,
                        $about_id,
                    ]);
                } elseif ($video_video1_tem != "" && $video_video2_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET video1=?, video2=?
                    WHERE about_id=?");
                    $stmt->execute([
                        $video_video1_uploaded,
                        $video_video2_uploaded,
                        $about_id,
                    ]);
                } elseif ($image_image1_tem != "" && $image_image2_tem != "") {
                    $stmt = $connect->prepare("UPDATE revival_about_us SET image1=?,image2=? 
                    WHERE about_id=?");
                    $stmt->execute([
                        $image_image1_uploaded,
                        $image_image2_uploaded,
                        $about_id,
                    ]);
                }
                if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل المحتوي بنجاح

        <?php header('refresh:3,url=main.php?dir=revival_about&page=report'); ?>


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