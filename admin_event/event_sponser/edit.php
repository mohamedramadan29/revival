<?php

if (isset($_GET['sponser_id']) && is_numeric($_GET['sponser_id'])) {
    $sponser_id = $_GET['sponser_id'];
    $stmt = $connect->prepare('SELECT * FROM  event_sponser WHERE sponser_id=?');
    $stmt->execute([$sponser_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل الرعاه </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل المحتوي </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $sponser_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم
                                    </label>
                                    <input type="text" class="form-control" name="sponser_name" value="<?php echo $alltype["sponser_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الرابط
                                    </label>
                                    <input placeholder="https://www.google.com" type="url" class="form-control" name="sponser_link" value="<?php echo $alltype["sponser_link"]; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                                    </div>
                                </div>
                                <div class="box">
                                    <label id="name_en"> اختر الحدث <span> * </span></label>
                                    <select required class="form-control" name="event_page" id="cat_active6">
                                        <option value="">
                                            اختر الحدث </option>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM main_events");
                                        $stmt->execute();
                                        $allevent = $stmt->fetchAll();
                                        foreach ($allevent as $event) { ?>
                                            <option value="<?php echo $event["event_name"]; ?>" <?php if ($alltype["event_page"] == $event["event_name"]) echo "selected"; ?>> <?php echo $event["event_name"]; ?> </option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="box submit_box">
                                <input class="btn btn-primary" name="add_car" type="submit" value="تعديل المحتوي">
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- end new data -->
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // START IMAGE car_imageside
            $image_image1_name = $_FILES['image1']['name'];
            $image_image1_tem = $_FILES['image1']['tmp_name'];
            $image_image1_type = $_FILES['image1']['type'];
            $image_image1_size = $_FILES['image1']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];

            $sponser_name =   $_POST['sponser_name'];
            $sponser_link =   $_POST['sponser_link'];
            $event_page =   $_POST['event_page'];

            $formerror = [];

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

            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE event_sponser SET 
                    sponser_name=?,sponser_link=?,event_page=?
                WHERE sponser_id =?");
                $stmt->execute([
                    $sponser_name,
                    $sponser_link,
                    $event_page,
                    $sponser_id
                ]);
                if ($image_image1_tem != "") {
                    $stmt = $connect->prepare("UPDATE event_sponser SET image1=?
                    WHERE sponser_id =?");
                    $stmt->execute([
                        $image_image1_uploaded,
                        $sponser_id,
                    ]);
                }
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح

                            <?php header('refresh:3,url=main.php?dir=event_sponser&page=report'); ?>
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
