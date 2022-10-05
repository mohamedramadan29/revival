<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اسباب المشاركة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> اسباب المشاركة </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسباب المشاركة
                            </label>
                            <textarea placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)" name="reasons" id="" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> اسباب المشاركة باللغه الانجليزية
                            </label>
                            <textarea placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)" name="reasons_en" id="" class="form-control"></textarea>
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

            $reasons =   $_POST['reasons'];
            $reasons_en =   $_POST['reasons_en'];

            /// More Validation To Show Error

                $image_image1_uploaded =
                    rand(0, 100000000) . '.' . $image_image1_name;
                move_uploaded_file(
                    $image_image1_tem,
                    'upload/' . $image_image1_uploaded
                );
                $stmt = $connect->prepare("INSERT INTO event_home_reason
                (reasons, reasons_en, reason_image)
                VALUES (:zreason,:zreason_en,:zimage)");
                $stmt->execute([
                    'zreason' => $reasons,
                    'zreason_en' => $reasons_en,
                    'zimage' => $image_image1_uploaded
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة محتوي جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=home_event/reason&page=report'); ?>
    </div>

</div>

<?php }
          
        }
    }