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
                                <div class="box">
                                    <label id="car_color"> الحالة </label>
                                    <select id="cat_active2" class="form-control" name="event_active" id="">
                                        <option value=""> اختر الحالة </option>
                                        <option value="فعال" <?php if($alltype["event_name"] ="فعال") echo "selected";?>> فعال </option>
                                        <option value="غير فعال" <?php if($alltype["event_name"] ="غير فعال") echo "selected";?>> غير فعال </option>
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

            // START Engish Arabic
            $image2_name = $_FILES['image2']['name'];
            $image2_tem = $_FILES['image2']['tmp_name'];
            $image2_type = $_FILES['image2']['type'];
            $image2_size = $_FILES['image2']['size'];

            $art_title = $_POST['ques'];
            $art_title_en = $_POST['ques_en'];
            $art_desc = $_POST['answer1'];
            $art_desc_en = $_POST['answer2'];
            $art_category = $_POST['category'];
            $formerror = [];
            if (empty($art_title)) {
                $formerror[] = 'Please Insert Title';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                if ($image1_tem != '' && $image2_tem != '') {
                    $image1_uploaded = rand(0, 100000000) . '.' . $image1_name;
                    move_uploaded_file(
                        $image1_tem,
                        'upload/' . $image1_uploaded
                    );

                    $image2_uploaded = rand(0, 100000000) . '.' . $image2_name;
                    move_uploaded_file(
                        $image2_tem,
                        'upload/' . $image2_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE articles SET article_title=?,article_title_en=?,
                    article_desc=?,article_desc_en=?,article_category=?,image1=?,image2=?
                        WHERE article_id=?");
                    $stmt->execute([
                        $art_title,
                        $art_title_en,
                        $art_desc,
                        $art_desc_en,
                        $art_category,
                        $image1_uploaded,
                        $image2_uploaded,
                        $article_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل المقال بنجاح

                                <?php header('refresh:3,url=main.php?dir=articles&page=report'); ?>


                            </div>
                        </div>

                    <?php }
                } elseif ($image1_tem != '') {
                    $image1_uploaded = rand(0, 100000000) . '.' . $image1_name;
                    move_uploaded_file(
                        $image1_tem,
                        'upload/' . $image1_uploaded
                    );

                    $stmt = $connect->prepare("UPDATE articles SET article_title=?,article_title_en=?,
                    article_desc=?,article_desc_en=?,article_category=?,image1=?
                        WHERE article_id=?");
                    $stmt->execute([
                        $art_title,
                        $art_title_en,
                        $art_desc,
                        $art_desc_en,
                        $art_category,
                        $image1_uploaded,
                        $article_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل المقال بنجاح

                                <?php header('refresh:3,url=main.php?dir=articles&page=report'); ?>


                            </div>
                        </div>

                    <?php }
                } elseif ($image2_tem != '') {
                    $image2_uploaded = rand(0, 100000000) . '.' . $image2_name;
                    move_uploaded_file(
                        $image2_tem,
                        'upload/' . $image2_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE articles SET article_title=?,article_title_en=?,
                    article_desc=?,article_desc_en=?,article_category=?,image2=?
                        WHERE article_id=?");
                    $stmt->execute([
                        $art_title,
                        $art_title_en,
                        $art_desc,
                        $art_desc_en,
                        $art_category,
                        $image2_uploaded,
                        $article_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل المقال بنجاح

                                <?php header('refresh:3,url=main.php?dir=articles&page=report'); ?>


                            </div>
                        </div>

                    <?php }
                } else {

                    $stmt = $connect->prepare("UPDATE articles SET article_title=?,article_title_en=?,
                    article_desc=?,article_desc_en=?,article_category=?
                        WHERE article_id=?");
                    $stmt->execute([
                        $art_title,
                        $art_title_en,
                        $art_desc,
                        $art_desc_en,
                        $art_category,
                        $article_id
                    ]);
                    if ($stmt) { ?>
                        <div class="container">
                            <div class="alert-success">
                                تم تعديل المقال بنجاح

                                <?php header('refresh:3,url=main.php?dir=articles&page=report'); ?>


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
