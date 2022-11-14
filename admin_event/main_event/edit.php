<?php

if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $stmt = $connect->prepare('SELECT * FROM main_events WHERE event_id=?');
    $stmt->execute([$event_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <div class="container">

            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> جميع الاحداث </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> جميع الاحداث </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $event_id; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                    <label id="name"> اسم الحدث
                                    </label>
                                    <input required class="form-control" type="text" name="event_name" value="<?php echo $alltype["event_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> اسم الحدث باللغه الانجليزية
                                    </label>
                                    <input required class="form-control" type="text" name="event_name_en" value="<?php echo $alltype["event_name_en"]; ?>">
                                </div>
                                <div class="box2">
                                    <label id="name"> تاريخ انطلاق الفاعلية
                                    </label>
                                    <input required class="form-control" type="date" name="date" value="<?php echo $alltype["event_date"]; ?>">
                                </div>
                                <div class="box2">
                                    <label id="name"> وقت انطلاق الفاعلية
                                    </label>
                                    <input required class="form-control" type="time" name="time" value="<?php echo $alltype["event_time"]; ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> البانر </label>
                                        <input id="logo" class="form-control dropify_" data-default-file="upload/<?php echo $alltype["event_logo"]; ?>" type="file" name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="box">
                                    <label id="car_color"> الحالة </label>
                                    <select id="cat_active2" class="form-control" name="event_active" id="">
                                        <option value=""> اختر الحالة </option>
                                        <option value="فعال" <?php if ($alltype["event_active"] == "فعال") echo "selected"; ?>> فعال </option>
                                        <option value="غير فعال" <?php if ($alltype["event_active"] == "غير فعال") echo "selected"; ?>> غير فعال </option>
                                    </select>
                                </div>
                                <div class="box submit_box">
                                    <input class="btn btn-primary" name="add_car" type="submit" value="تعديل الحدث">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // START Arabic Image 
            $image1_name = $_FILES['image1']['name'];
            $image1_tem = $_FILES['image1']['tmp_name'];
            $image1_type = $_FILES['image1']['type'];
            $image1_size = $_FILES['image1']['size'];
            $image_allowed_extention = ['jpg', 'jpeg', 'png'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $event_name = $_POST['event_name'];
            $event_name_en = $_POST['event_name_en'];
            $event_active = $_POST['event_active'];
            $formerror = [];

            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                if ($image1_tem != '') {
                    $image1_uploaded = rand(0, 100000000) . '.' . $image1_name;
                    move_uploaded_file(
                        $image1_tem,
                        'upload/' . $image1_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE main_events SET event_name=?,event_name_en=?,
                    event_logo=?,event_active=?,event_date=?,event_time=?
                        WHERE event_id=?");
                    $stmt->execute([
                        $event_name,
                        $event_name_en,
                        $image1_uploaded,
                        $event_active,
                        $date,
                        $time,
                        $event_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل الحدث بنجاح

                                <?php header('refresh:3,url=main.php?dir=main_event&page=report'); ?>


                            </div>
                        </div>

                    <?php }
                } else {

                    $stmt = $connect->prepare("UPDATE main_events SET event_name=?,event_name_en=?,event_active=?,event_date=?,event_time=?
                        WHERE event_id=?");
                    $stmt->execute([
                        $event_name,
                        $event_name_en,
                        $event_active,
                        $date,
                        $time,
                        $event_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل الحدث بنجاح

                                <?php header('refresh:3,url=main.php?dir=main_event&page=report'); ?>


                            </div>
                        </div>

    <?php }
                }
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
