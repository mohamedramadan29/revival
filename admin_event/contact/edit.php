<?php

if (isset($_GET['message_id']) && is_numeric($_GET['message_id'])) {
    $message_id = $_GET['message_id'];
    $stmt = $connect->prepare('SELECT * FROM event_contact WHERE contact_id=?');
    $stmt->execute([$message_id]);
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
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة محتوي الرسالة </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i>  مشاهدة محتوي الرسالة    </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="typ_id" value="<?php echo $message_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم  المرسل
                            </label>
                            <input required class="form-control" type="text" name="banner_name"
                                value="<?php echo $alltype["contact_name"]; ?>">
                        </div>
                        <div class="box">
                            <label id="name">    البريد الالكتروني
                            </label>
                            <input required class="form-control" type="text" name="banner_name"
                                value="<?php echo $alltype["contact_email"]; ?>"> 
                        </div>
                        <div class=" box">
                            <label id="name"> محتوي الرسالة
                            </label>
                            <textarea name="contact_message" class="form-control">
                            <?php echo $alltype["contact_message"]; ?>
                            </textarea>
                        </div>
                        <div class="box">
                            <label id="name">  تاريخ الرسالة   
                            </label>
                            <input required class="form-control" type="text" name="contact_date"
                                value="<?php echo $alltype["contact_date"]; ?>">
                        </div> 
                    </div>
                    <div class="col-lg-6">
                    <div class="box">
                            <label id="name">   الملفات المرفوعه   </label>
                            <div class="row">
                                <?php
                                        $files1 = $alltype['fiels'];
                                        $files1 = explode(" ", $files1);
                                        $countfile = count($files1) - 1;
                                        if ($countfile > 0) {
                                            for ($i = 0; $i < $countfile; ++$i) {
                                        ?>
                                <div class="col-12">

                                    <div class="files_style">
                                        <p> <a class="btn bg-gradient-light" target="_blank"
                                                href="../admin/upload/<?= $files1[$i] ?>">
                                                <i class="fa fa-file"></i>
                                                <?= $files1[$i] ?></a></p>
                                    </div>
                                </div>
                                <?php
                                            }
                                        } else { ?>
                                <div class="alert alert-danger"> لا يوجد ملفات </div>
                                <?php
                                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                    <div class="box submit_box d-none">
                        <input class="btn btn-primary" name="add_car" type="submit" value="   تعديل البانر  ">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

            $formerror = [];
            if (empty($banner_name)) {
                $formerror[] = 'Please Insert Name';
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
                        'upload/' . $image_image1_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE revival_banner SET banner_name=?,image1=?,
            banner_page=?,banner_head=?,banner_head_en=?,banner_desc=?,banner_desc_en=?
                WHERE banner_id=?");
                    $stmt->execute([
                        $banner_name,
                        $image_image1_uploaded,
                        $banner_page,
                        $banner_head,
                        $banner_head_en,
                        $banner_desc,
                        $banner_desc_en,
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
                        'upload/' . $image_image2_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE revival_banner SET banner_name=?,image2=?,
                    banner_page=?,banner_head=?,banner_head_en=?,banner_desc=?,banner_desc_en=?
                        WHERE banner_id=?");
                    $stmt->execute([
                        $banner_name,
                        $image_image2_uploaded,
                        $banner_page,
                        $banner_head,
                        $banner_head_en,
                        $banner_desc,
                        $banner_desc_en,
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
                        'upload/' . $image_image2_uploaded
                    );
                    $image_image1_uploaded =
                        rand(0, 100000000) . '.' . $image_image1_name;
                    move_uploaded_file(
                        $image_image1_tem,
                        'upload/' . $image_image1_uploaded
                    );
                    $stmt = $connect->prepare("UPDATE revival_banner SET banner_name=?,image1=?,image2=?,
            banner_page=?,banner_head=?,banner_head_en=?,banner_desc=?,banner_desc_en=?
                WHERE banner_id=?");
                    $stmt->execute([
                        $banner_name,
                        $image_image1_uploaded,
                        $image_image2_uploaded,
                        $banner_page,
                        $banner_head,
                        $banner_head_en,
                        $banner_desc,
                        $banner_desc_en,
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
                    $stmt = $connect->prepare("UPDATE revival_banner SET banner_name=?, 
            banner_page=?,banner_head=?,banner_head_en=?,banner_desc=?,banner_desc_en=?
                WHERE banner_id=?");
                    $stmt->execute([
                        $banner_name,

                        $banner_page,
                        $banner_head,
                        $banner_head_en,
                        $banner_desc,
                        $banner_desc_en,
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