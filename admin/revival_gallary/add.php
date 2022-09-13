<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة بانر </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> اضافة بانر </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم البانر
                            </label>
                            <input required class="form-control" type="text" name="banner_name">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان البانر
                            </label>
                            <input required class="form-control" type="text" name="banner_head">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان البانر باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="banner_head_en">
                        </div>
                        <div class="box">
                            <label id="name"> وصف البانر
                            </label>
                            <input required class="form-control" type="text" name="banner_desc">
                        </div>

                        <div class="box">
                            <label id="name"> وصف البانر باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="banner_desc_en">
                        </div>


                        <div class="box">
                            <label id="name_en"> اختر الصفحة <span> * </span></label>
                            <select class="form-control" name="banner_page" id="cat_active6">
                                <option value=""> اختر الصفحة </option>
                                <option value="الرئيسية"> الرئيسية </option>
                                <option value="مدينة الذكاء الإصطناعي"> مدينة الذكاء الإصطناعي </option>
                                <option value="مواهب العالم الرياضية"> مواهب العالم الرياضية </option>
                                <option value="الأزياء والمجوهرات"> الأزياء والمجوهرات </option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row uploadimage">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> البانر </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="" type="file"
                                            name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> البانر الانجليزية </label>
                                        <input id="logo2" class="form-control dropify_" data-default-file="" type="file"
                                            name="image2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافة بانر جديد">
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
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            $banner_name =  $_POST['banner_name'];
            $banner_page = $_POST['banner_page'];
            $banner_head =   $_POST['banner_head'];
            $banner_head_en =   $_POST['banner_head_en'];
            $banner_desc =   $_POST['banner_desc'];
            $banner_desc_en =   $_POST['banner_desc_en'];

            /// More Validation To Show Error
            $formerror = [];
            if (empty($banner_name)) {
                $formerror[] = 'Please Insert banner Name';
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
                $stmt = $connect->prepare("INSERT INTO revival_banner (banner_name, image1, image2 , banner_page , banner_head , banner_head_en , banner_desc , banner_desc_en)
                VALUES (:zname,:zimage1,:zimage2,:zbanner_page,:zbanner_head,:zbanner_head_en,:zbanner_desc, :zbanner_desc_en)");
                $stmt->execute([
                    'zname' => $banner_name,
                    'zimage1' => $image_image1_uploaded,
                    'zimage2' => $image_image2_uploaded,
                    'zbanner_page' => $banner_page,
                    'zbanner_head' => $banner_head,
                    'zbanner_head_en' => $banner_head_en,
                    'zbanner_desc' => $banner_desc,
                    'zbanner_desc_en' => $banner_desc_en,

                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة بانر جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=banner&page=report'); ?>
    </div>

</div>

<?php }
            }
        }
    }