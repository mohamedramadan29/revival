<?php

if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $stmt = $connect->prepare('SELECT * FROM courses WHERE course_id =?');
    $stmt->execute([$course_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
?>



<div class="container">

    <!-- start new data -->
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> مشاهدة الكورس </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-edit"></i> مشاهدة الكورس </h6>
        </div>

        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_name"
                                value="<?php echo $alltype["course_name"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> اسم الكورس باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="course_name_en"
                                value="<?php echo $alltype["course_name_en"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> عدد ايام الكورس
                            </label>
                            <input required class="form-control" type="number" name="course_num_days"
                                value="<?php echo $alltype["course_num_days"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> سعر الكورس
                            </label>
                            <input required class="form-control" type="number" name="course_price"
                                value="<?php echo $alltype["course_price"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> مدرب الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_constructor"
                                value="<?php echo $alltype["course_constructor"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> مكان الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_place"
                                value="<?php echo $alltype["course_place"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> خبرة مقدم الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_constructor_learn"
                                placeholder="html , css , javascript , ...."
                                value="<?php echo $alltype["course_constructor_learn"] ?>">
                        </div>
                        <div class="box">
                            <label id="name"> نبذة عن مقدم الكورس
                            </label>
                            <textarea name="course_constructor_info" class="form-control" placeholder=" ">
                            <?php echo $alltype["course_constructor_info"] ?>
                            </textarea>
                        </div>
                        <div class="box">
                            <label id="name"> نبذة عن مقدم الكورس الانجليزية
                            </label>
                            <textarea name="course_constructor_info_en" class="form-control" placeholder=" ">
                            <?php echo $alltype["course_constructor_info_en"] ?>
                            </textarea>
                        </div>
                        <div class="box2">
                            <label for="">صورة مقدم الكورس<span> * </span> </label>
                            <div class="">
                                <input id="logo" class="form-control dropify_"
                                    data-default-file="upload/<?php echo $alltype["image1"] ?>" type="file"
                                    name="image1" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>



                        <div class="box2">
                            <label for=""> صورة الكورس العربية <span> * </span> </label>
                            <div class="">
                                <input id="logo2" class="form-control dropify_"
                                    data-default-file="upload/<?php echo $alltype["image2"] ?>" type="file"
                                    name="image2" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>
                        <div class="box2">
                            <label for=""> صورة الكورس الانجليزية <span> * </span> </label>
                            <div class="">
                                <input id="logo3" class="form-control dropify_"
                                    data-default-file="upload/<?php echo $alltype["image3"] ?>" type="file"
                                    name="image3" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> ماذا ستتعلم من الكورس
                            </label>
                            <textarea name="course_learn" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["course_learn"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> ماذا ستتعلم من الكورس الانجليزية
                            </label>
                            <textarea name="course_learn_en" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["course_learn_en"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> متطلبات الكورس
                            </label>
                            <textarea name="course_requirement" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["course_requirement"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> متطلبات الكورس الانجليزية
                            </label>
                            <textarea name="course_requirement_en" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["course_requirement_en"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> وصف الكورس
                            </label>
                            <textarea name="course_description"
                                class="form-control"><?php echo $alltype["course_description"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> وصف الكورس الانجليزية
                            </label>
                            <textarea name="course_description_en"
                                class="form-control"><?php echo $alltype["course_description_en"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> لمن هذا الكورس
                            </label>
                            <textarea name="how_course" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["how_course"] ?></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> لمن هذا الكورس الانجليزية
                            </label>
                            <textarea name="how_course_en" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["how_course_en"] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="box submit_box">
                    <input class="btn btn-primary text-center" name="add_car" type="submit" value=" تعديل الكورس ">
                </div>
            </form>
        </div>
    </div>
    <!-- end new data -->

</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // START Constructor Image 
            $image1_name = $_FILES['image1']['name'];
            $image1_tem = $_FILES['image1']['tmp_name'];
            $image1_type = $_FILES['image1']['type'];
            $image1_size = $_FILES['image1']['size'];

            $image_allowed_extention = ['jpg', 'jpeg', 'png'];

            // START Arabic Image
            $image2_name = $_FILES['image2']['name'];
            $image2_tem = $_FILES['image2']['tmp_name'];
            $image2_type = $_FILES['image2']['type'];
            $image2_size = $_FILES['image2']['size'];

            // START English Image
            $image3_name = $_FILES['image3']['name'];
            $image3_tem = $_FILES['image3']['tmp_name'];
            $image3_type = $_FILES['image3']['type'];
            $image3_size = $_FILES['image3']['size'];

            $course_name = $_POST['course_name'];
            $course_name_en = $_POST['course_name_en'];
            $course_num_days = $_POST['course_num_days'];
            $course_constructor = $_POST['course_constructor'];
            $course_price = $_POST['course_price'];
            $course_place = $_POST['course_place'];
            $course_learn = $_POST['course_learn'];
            $course_learn_en = $_POST['course_learn_en'];
            $course_requirement = $_POST['course_requirement'];
            $course_requirement_en = $_POST['course_requirement_en'];
            $course_description_en = $_POST['course_description_en'];
            $course_description = $_POST['course_description'];
            $how_course_en = $_POST['how_course_en'];
            $how_course = $_POST['how_course'];
            $course_constructor_learn = $_POST['course_constructor_learn'];
            $course_constructor_info_en = $_POST['course_constructor_info_en'];
            $course_constructor_info = $_POST['course_constructor_info'];

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
            $image3_uploaded = rand(0, 100000000) . '.' . $image3_name;
            move_uploaded_file(
                $image3_tem,
                'upload/' . $image3_uploaded
            );

            $stmt = $connect->prepare("UPDATE  courses SET course_name=?,course_name_en=?,
            course_num_days=? , course_constructor=?, course_price=? , course_place=?, course_learn=?,course_learn_en=?,
            course_requirement=?,course_requirement_en=?,course_description=?,course_description_en=?,
            how_course=?,how_course_en=?,course_constructor_learn=?,course_constructor_info=?,course_constructor_info_en=?
              WHERE course_id  =? ");
            $stmt->execute([
                $course_name,
                $course_name_en,
                $course_num_days,
                $course_constructor,
                $course_price,
                $course_place,
                $course_learn,
                $course_learn_en,
                $course_requirement,
                $course_requirement_en,
                $course_description,
                $course_description_en,
                $how_course,
                $how_course_en,
                $course_constructor_learn,
                $course_constructor_info,
                $course_constructor_info_en,

                $course_id
            ]);

            if ($stmt) { ?>
<div class="container">
    <div class="alert-success">
        تم تعديل المستخدم بنجاح
        <?php header('refresh:0;url=main.php?dir=courses&page=report'); ?>
    </div>
</div>
<?php }
            if ($image1_tem != '' && $image2_tem != '' && $image3_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image1=?,image2=?,image3=? WHERE course_id  =? ");
                $stmt->execute([
                    $image1_uploaded,
                    $image2_uploaded,
                    $image3_uploaded,
                    $course_id
                ]);
            } elseif ($image1_tem != '' && $image2_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image1=?,image2=? WHERE course_id  =? ");
                $stmt->execute([
                    $image1_uploaded,
                    $image2_uploaded,

                    $course_id
                ]);
            } elseif ($image1_tem != '' && $image3_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image1=?,image3=? WHERE course_id  =? ");
                $stmt->execute([
                    $image1_uploaded,
                    $image3_uploaded,

                    $course_id
                ]);
            } elseif ($image2_tem != '' && $image3_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image2=?,image3=? WHERE course_id  =? ");
                $stmt->execute([
                    $image2_uploaded,
                    $image3_uploaded,
                    $course_id
                ]);
            } elseif ($image1_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image1=? WHERE course_id  =? ");
                $stmt->execute([
                    $image1_uploaded,

                    $course_id
                ]);
            } elseif ($image2_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image2=? WHERE course_id  =? ");
                $stmt->execute([
                    $image2_uploaded,

                    $course_id
                ]);
            } elseif ($image3_tem != '') {
                $stmt = $connect->prepare("UPDATE  courses SET image3=? WHERE course_id  =? ");
                $stmt->execute([

                    $image3_uploaded,
                    $course_id
                ]);
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