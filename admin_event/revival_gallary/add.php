<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة صورة الي المعرض </li>
                </ol>
            </nav>
            
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> اضافة صورة الي المعرض </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
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
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافة صورة جديدة">
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
            /// More Validation To Show Error

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
                $stmt = $connect->prepare("INSERT INTO revival_gallary (image1, image2)
                VALUES (:zimage1,:zimage2)");
                $stmt->execute([
                    'zimage1' => $image_image1_uploaded,
                    'zimage2' => $image_image2_uploaded

                ]);
                if ($stmt) { ?>
    <div class="alert-success">
         تم اضافة صورة جديد بنجاح الي المعرض
        <?php header('refresh:3;url=main.php?dir=revival_gallary&page=report'); ?>
    </div>

</div>

<?php }
          
        }
    }