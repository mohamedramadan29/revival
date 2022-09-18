<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الاحداث الرئيسية </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> الاحداث الرئيسية </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <label id="name"> اسم الحدث
                            </label>
                            <input required class="form-control" type="text" name="event_name">
                        </div>
                        <div class="box">
                            <label id="name"> اسم الحدث باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="event_name_en">
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                                <label> البانر </label>
                                <input id="logo" class="form-control dropify_" data-default-file="" type="file" name="image1" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>
                        <div class="box">
                            <label id="car_color"> الحالة </label>
                            <select id="cat_active2" class="form-control" name="event_active" id="">
                                <option value=""> اختر الحالة </option>
                                <option value="فعال"> فعال </option>
                                <option value="غير فعال"> غير فعال </option>
                            </select>
                        </div>
                        <div class="box submit_box">
                            <input class="btn btn-primary" name="add_car" type="submit" value="اضافه حدث جديد">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {
            $image_image1_name = $_FILES['image1']['name'];
            $image_image1_tem = $_FILES['image1']['tmp_name'];
            $image_image1_type = $_FILES['image1']['type'];
            $image_image1_size = $_FILES['image1']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];

            $event_name = $_POST['event_name'];
            $event_name_en = $_POST['event_name_en'];
            $event_active = $_POST['event_active'];
            $image_image1_uploaded =
                rand(0, 100000000) . '.' . $image_image1_name;
            move_uploaded_file(
                $image_image1_tem,
                'upload/' . $image_image1_uploaded
            );

            /// More Validation To Show Error 
            $stmt = $connect->prepare("INSERT INTO main_events (event_name,event_name_en,event_logo,event_active)
                VALUES (:zevent_name,:zevent_name_en,:zimage1,:zevent_active)");
            $stmt->execute([
                'zevent_name' => $event_name,
                'zevent_name_en' => $event_name_en,
                'zimage1' => $image_image1_uploaded,
                'zevent_active' => $event_active,
            ]);
            if ($stmt) { ?>
                <div class="alert-success">
                    تم اضافة حدث جديد بنجاح
                    <?php header('refresh:3;url=main.php?dir=main_event&page=report'); ?>
                </div>

</div>

<?php }
        }
    }
