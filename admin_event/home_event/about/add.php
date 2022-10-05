<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> قسم من نحن </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> قسم من نحن </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input required class="form-control" type="text" name="about_name">
                        </div>
                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="about_desc" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="about_desc_en" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> اضافة وصف فرعي
                            </label>
                            <textarea name="about_sub_desc" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"></textarea>
                        </div>

                        <div class="box">
                            <label id="name"> اضافة وصف فرعي باللغه الانجليزية
                            </label>
                            <textarea name="about_sub_desc_en" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row uploadimage">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الصورة </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="" type="file"
                                            name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الصورة الانجليزية </label>
                                        <input id="logo2" class="form-control dropify_" data-default-file="" type="file"
                                            name="image2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الفيديو </label>
                                        <input id="logo3" class="form-control dropify_" data-default-file="" type="file"
                                            name="video1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الفيديو الانجليزية</label>
                                        <input id="logo4" class="form-control dropify_" data-default-file="" type="file"
                                            name="video2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافة محتوي جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {
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
            /// More Validation To Show Error
            $formerror = [];
            if (empty($about_name)) {
                $formerror[] = 'Please Insert About Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
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
                $stmt = $connect->prepare("INSERT INTO event_home_about
                 (about_name, about_desc, about_desc_en , about_sub_desc , about_sub_desc_en , image1 , image2 , video1, video2 )
                VALUES (:zname,:zabout_desc,:zabout_desc_en,:zabout_sub_desc,:zabout_sub_desc_en,:zimage1,:zimage2, :zvideo1, :zvideo2)");
                $stmt->execute([
                    'zname' => $about_name,
                    'zabout_desc' => $about_desc,
                    'zabout_desc_en' => $about_desc_en,
                    'zabout_sub_desc' => $about_sub_desc,
                    'zabout_sub_desc_en' => $about_sub_desc_en,
                    'zimage1' =>  $image_image1_uploaded,
                    'zimage2' => $image_image2_uploaded,
                    'zvideo1' => $video_video1_uploaded,
                    'zvideo2' => $video_video2_uploaded, 

                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة محتوي جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=home_event/about&page=report'); ?>
    </div>

</div>

<?php }
            }
        }
    }