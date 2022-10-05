<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الرعاة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> الرعاة  </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input type="text" class="form-control" name="sponser_name">
                        </div>
                        <div class="box">
                            <label id="name"> الاسم الانجليزي
                            </label>
                            <input type="text" class="form-control" name="sponser_name_en">
                        </div>
                        <div class="box">
                            <label id="name"> الرابط
                            </label>
                            <input placeholder="" type="url" class="form-control" name="sponser_link">
                        </div> 

                    </div>
                    <div class="col-lg-6">
                        <div class="box2">
                            <div class="row uploadimage">
                                <div class="col-lg-12">
                                    <div class="">
                                        <label> الصورة </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="" type="file" name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box2">
                            <div class="row uploadimage">
                                <div class="col-lg-12">
                                    <div class="">
                                        <label> الصورة الانجليزي </label>
                                        <input id="logo2" class="form-control dropify_" data-default-file="" type="file" name="image2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <label id="name_en"> اختر الحدث <span> * </span></label>
                            <select required class="form-control" name="event_page" id="cat_active6">
                                <option value=""> اختر الحدث </option>
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_active='فعال'");
                                $stmt->execute();
                                $allevent = $stmt->fetchAll();
                                foreach ($allevent as $event) { ?>
                                    <option value="<?php echo $event["event_name"] ?>"> <?php echo $event["event_name"] ?></option>
                                <?php
                                }

                                ?>
                            </select>
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
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];

            $sponser_name =   $_POST['sponser_name'];
            $sponser_name_en =   $_POST['sponser_name_en'];
            $sponser_link =   $_POST['sponser_link'];
            $event_page =   $_POST['event_page'];

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
            $stmt = $connect->prepare("INSERT INTO event_sponser
                (sponser_name,sponser_name_en,sponser_link,image1,image2,event_page)
                VALUES (:zsponser_name,:zsponser_name_en,:zsponser_link,:zimage,:zimage_en,:zevent_page)");
            $stmt->execute([
                'zsponser_name' => $sponser_name,
                'zsponser_name_en' => $sponser_name_en,
                'zsponser_link' => $sponser_link,
                'zimage' => $image_image1_uploaded,
                'zimage_en' => $image_image2_uploaded,
                'zevent_page' => $event_page,
            ]);
            if ($stmt) { ?>
                <div class="alert-success">
                    تم اضافة محتوي جديد بنجاح
                    <?php header('refresh:3;url=main.php?dir=event_sponser&page=report'); ?>
                </div>

</div>

<?php }
        }
    }
