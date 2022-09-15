<?php

if (isset($_GET['reason_id']) && is_numeric($_GET['reason_id'])) {
    $reason_id = $_GET['reason_id'];
    $stmt = $connect->prepare('SELECT * FROM event_home_reason WHERE reason_id=?');
    $stmt->execute([$reason_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل محتوي الاسباب </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل المحتوي </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $reason_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> اسباب المشاركة
                                    </label>
                                    <textarea placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)" name="reasons" id="" class="form-control"><?php echo $alltype["reasons"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> اسباب المشاركة باللغه الانجليزية
                                    </label>
                                    <textarea placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)" name="reasons_en" id="" class="form-control"><?php echo $alltype["reasons_en"]; ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <div class="row uploadimage">
                                        <div class="col-lg-6">
                                            <div class="">
                                                <label> الصورة </label>
                                                <input id="logo" class="form-control dropify_" data-default-file="upload/<?php echo $alltype["reason_image"]; ?>" type="file" name="image1" value="">
                                            </div>
                                            <div id="logo_" class="col-md-3">
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <div class="box submit_box">
                                <input class="btn btn-primary" name="add_car" type="submit" value="تعديل المحتوي">
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

            $reasons =  $_POST['reasons'];
            $reasons_en = $_POST['reasons_en'];

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

                $stmt = $connect->prepare("UPDATE event_home_reason SET 
                    reasons=?,reasons_en=?
                WHERE reason_id =?");
                $stmt->execute([
                    $reasons,
                    $reasons_en,
                    $reason_id,
                ]);
                if ($image_image1_tem != "") {
                    $stmt = $connect->prepare("UPDATE event_home_reason SET image1=?
                    WHERE reason_id =?");
                    $stmt->execute([
                        $image_image1_uploaded,
                        $reason_id,
                    ]);
                }  
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح

                            <?php header('refresh:3,url=main.php?dir=home_event/reason&page=report'); ?>
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
