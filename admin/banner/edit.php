<?php

if (isset($_GET['ban_id']) && is_numeric($_GET['ban_id'])) {
    $ban_id = $_GET['ban_id'];
    $stmt = $connect->prepare('SELECT * FROM banner WHERE ban_id=?');
    $stmt->execute([$ban_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?> </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $lang['edit_banner']; ?></li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> <?php echo $lang['edit_banner']; ?> </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="typ_id" value="<?php echo $ban_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box2">
                            <label id="name"> <?php echo $lang['banner_name']; ?>
                            </label>
                            <input required class="form-control" type="text" name="ban_name"
                                value="<?php echo $alltype['ban_name']; ?>">
                        </div>
                        <div class="box2">
                            <label id="name"> <?php echo $lang['banner_name_en']; ?>
                            </label>
                            <input required class="form-control" type="text" name="ban_name_en"
                                value="<?php echo $alltype['ban_name_en']; ?>">
                        </div>
                        <div class="box2">
                            <label id="name_en"> <?php echo $lang['banner_place']; ?> <span> * </span></label>
                            <input class="form-control" type="text" name="ban_place"
                                value="<?php echo $alltype['ban_place']; ?>">
                        </div>
                        <div class="box2">
                            <label id="name_en"> <?php echo $lang['banner_website']; ?> <span> * </span></label>
                            <select class="form-control" name="ban_url" id="cat_active6">
                                <option value=""> <?php echo $lang['banner_website']; ?></option>
                                <option value="1"> الموقع الاول </option>
                                <option value="2"> الموقع الثانى </option>
                                <option value="3"> الموقع الثالث </option>
                            </select>
                        </div>
                        <div class="box2">
                            <label id="name_en"> لينك البانر </label>
                            <input placeholder="https://www.google.com" class="form-control" type="url" name="ban_link"
                                value="<?php echo $alltype['banner_link']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row uploadimage">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> <?php echo $lang['banner_image']; ?> </label>
                                        <input id="logo" class="form-control dropify_"
                                            data-default-file="../uploads/<?php echo $alltype['ban_image']; ?>"
                                            type="file" name="image1" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label> <?php echo $lang['banner_image_en']; ?></label>
                                        <input id="logo2" class="form-control dropify_"
                                            data-default-file="../uploads/<?php echo $alltype['ban_image_en']; ?>"
                                            type="file" name="image2" value="">
                                    </div>
                                    <div id="logo_" class="col-md-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit"
                            value="<?php echo $lang['edit_banner']; ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $ban_name = filter_var($_POST['ban_name'], FILTER_SANITIZE_STRING);
            $ban_name_en = filter_var($_POST['ban_name_en'], FILTER_SANITIZE_STRING);
            $ban_place = filter_var($_POST['ban_place'], FILTER_SANITIZE_STRING);
            $ban_url = filter_var($_POST['ban_url'], FILTER_SANITIZE_STRING);
            $ban_link = $_POST['ban_link'];
            $formerror = [];
            if (empty($ban_name)) {
                $formerror[] = 'Please Insert Your Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                if ($image_image1_tem != '') {
                    $image_image1_uploaded =
                        rand(0, 100000000) . '.' . $image_image1_name;
                    move_uploaded_file(
                        $image_image1_tem,
                        '../uploads/' . $image_image1_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE banner SET ban_name=?,ban_image=?,
            ban_place=?,ban_website=?,ban_name_en=?,banner_link=?
                WHERE ban_id=?");
                    $stmt->execute([
                        $ban_name,
                        $image_image1_uploaded,
                        $ban_place,
                        $ban_url,
                        $ban_name_en,
                        $ban_link,
                        $ban_id,
                    ]);
                    if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل البانر بنجاح

        <?php header('refresh:3,url=main.php?dir=banner&page=report'); ?>


    </div>
</div>

<?php }
                } elseif ($image_image2_tem != '') {
                    $image_image2_uploaded =
                        rand(0, 100000000) . '.' . $image_image2_name;
                    move_uploaded_file(
                        $image_image2_tem,
                        '../uploads/' . $image_image2_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE banner SET ban_name=?,ban_image_en=?,
    ban_place=?,ban_website=?,ban_name_en=?,banner_link=?
        WHERE ban_id=?");
                    $stmt->execute([
                        $ban_name,
                        $image_image2_uploaded,
                        $ban_place,
                        $ban_url,
                        $ban_name_en,
                        $ban_link,
                        $ban_id,
                    ]);
                    if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل البانر بنجاح

        <?php header('refresh:3,url=main.php?dir=banner&page=report'); ?>


    </div>
</div>

<?php }
                } elseif ($image_image2_tem != '' && $image_image1_tem != '') {
                    $image_image2_uploaded =
                        rand(0, 100000000) . '.' . $image_image2_name;
                    move_uploaded_file(
                        $image_image2_tem,
                        '../uploads/' . $image_image2_uploaded
                    );
                    $image_image1_uploaded =
                        rand(0, 100000000) . '.' . $image_image1_name;
                    move_uploaded_file(
                        $image_image1_tem,
                        '../uploads/' . $image_image1_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE banner SET ban_name=?,ban_image=?,ban_image_en=?,
ban_place=?,ban_website=?,ban_name_en=?,banner_link=?
    WHERE ban_id=?");
                    $stmt->execute([
                        $ban_name,
                        $image_image1_uploaded,
                        $image_image2_uploaded,
                        $ban_place,
                        $ban_url,
                        $ban_name_en,
                        $ban_link,
                        $ban_id,
                    ]);
                    if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل البانر بنجاح

        <?php header('refresh:3,url=main.php?dir=banner&page=report'); ?>


    </div>
</div>

<?php }
                } else {
                    $stmt = $connect->prepare(
                        'UPDATE banner SET ban_name=?,
                ban_place=?,ban_website=?,ban_name_en=?,banner_link=?
                    WHERE ban_id=?'
                    );
                    $stmt->execute([
                        $ban_name,
                        $ban_place,
                        $ban_url,
                        $ban_name_en,
                        $ban_link,
                        $ban_id,
                    ]);
                    if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل النوع بنجاح
        <?php header('refresh:3,url=main.php?dir=banner&page=report'); ?>
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