<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> المتحدثين </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> المتحدثين </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input type="text" class="form-control" name="speaker_name">
                        </div>
                        <div class="box">
                            <label id="name"> التخصص
                            </label>
                            <input type="text" class="form-control" name="speaker_jop">
                        </div> 

                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row uploadimage">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> الصورة </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="" type="file" name="image1" value="">
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

            $speaker_name =   $_POST['speaker_name'];
            $speaker_jop =   $_POST['speaker_jop'];
            $event_page =   $_POST['event_page'];

            /// More Validation To Show Error

            $image_image1_uploaded =
                rand(0, 100000000) . '.' . $image_image1_name;
            move_uploaded_file(
                $image_image1_tem,
                'upload/' . $image_image1_uploaded
            );
            $stmt = $connect->prepare("INSERT INTO event_speaker
                (speaker_name,speaker_jop,image1,event_page)
                VALUES (:zspeaker_name,:zspeaker_jop,:zimage,:zevent_page)");
            $stmt->execute([
                'zspeaker_name' => $speaker_name,
                'zspeaker_jop' => $speaker_jop,
                'zimage' => $image_image1_uploaded,
                'zevent_page' => $event_page,
            ]);
            if ($stmt) { ?>
                <div class="alert-success">
                    تم اضافة محتوي جديد بنجاح
                    <?php header('refresh:3;url=main.php?dir=event_speakers&page=report'); ?>
                </div>

</div>

<?php }
        }
    }
