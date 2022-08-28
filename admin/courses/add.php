<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة كورس جديد </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> اضافة كورس جديد </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> اسم الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_name">
                        </div>
                        <div class="box">
                            <label id="name"> اسم الكورس باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="course_name_en">
                        </div>
                        <div class="box">
                            <label id="name"> عدد ايام الكورس
                            </label>
                            <input required class="form-control" type="number" name="course_num_days">
                        </div>
                        <div class="box">
                            <label id="name"> سعر الكورس
                            </label>
                            <input required class="form-control" type="number" name="course_price">
                        </div>
                        <div class="box">
                            <label id="name"> مدرب الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_constructor">
                        </div>
                        <div class="box">
                            <label id="name"> مكان الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_place">
                        </div>
                        <div class="box">
                            <label id="name"> خبرة مقدم الكورس
                            </label>
                            <input required class="form-control" type="text" name="course_constructor_learn"
                                placeholder="html , css , javascript , ....">
                        </div>
                        <div class="box">
                            <label id="name"> نبذة عن مقدم الكورس
                            </label>
                            <textarea name="course_constructor_info" class="form-control" placeholder=" "></textarea>
                        </div>
                        <br>
                        <br>
                        <div class="box2">
                            <label for="">صورة مقدم الكورس<span> * </span> </label>
                            <div class="">
                                <input id="logo" class="form-control dropify_" data-default-file="" type="file"
                                    name="image1" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>



                        <div class="box2">
                            <label for=""> صورة الكورس العربية <span> * </span> </label>
                            <div class="">
                                <input id="logo2" class="form-control dropify_" data-default-file="" type="file"
                                    name="image2" value="">
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
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> متطلبات الكورس
                            </label>
                            <textarea name="course_requirement" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> وصف الكورس
                            </label>
                            <textarea name="course_description" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> لمن هذا الكورس
                            </label>
                            <textarea name="how_course" class="form-control"
                                placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "></textarea>
                        </div>

                        <div class="box2">
                            <label for=""> صورة الكورس الانجليزية <span> * </span> </label>
                            <div class="">
                                <input id="logo3" class="form-control dropify_" data-default-file="" type="file"
                                    name="image3" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>


                    </div>

                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافه كورس جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {

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
            $course_requirement = $_POST['course_requirement'];
            $course_description = $_POST['course_description'];
            $how_course = $_POST['how_course'];
            $course_constructor_learn = $_POST['course_constructor_learn'];
            $course_constructor_info = $_POST['course_constructor_info'];


            /// More Validation To Show Error
            $formerror = [];
            if (empty($course_name)) {
                $formerror[] = 'Please Insert Course Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

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
                $stmt = $connect->prepare("INSERT INTO  courses (course_name,course_name_en,
                course_num_days , course_constructor, course_price , course_place, course_learn,
                course_requirement,course_description,how_course,course_constructor_learn,course_constructor_info,
                image1,image2,image3)
                VALUES (:zcourse_name,:zcourse_name_en,:zcourse_num_days,:zcourse_constructor,:zcourse_price,
                :zcourse_place,:zcourse_learn,:zcourse_reqirement,:zcourse_description,:zcourse_how,
                :zcourse_constructor_learn,:zcourse_constructor_info,:zimage1,:zimage2,:zimage3)");
                $stmt->execute([
                    'zcourse_name' => $course_name,
                    'zcourse_name_en' => $course_name_en,
                    'zcourse_num_days' => $course_num_days,
                    'zcourse_constructor' => $course_constructor,
                    'zcourse_price' => $course_price,
                    'zcourse_place' => $course_place,
                    'zcourse_learn' => $course_learn,
                    'zcourse_reqirement' => $course_requirement,
                    'zcourse_description' => $course_description,
                    'zcourse_how' => $how_course,
                    'zcourse_constructor_learn' => $course_constructor_learn,
                    'zcourse_constructor_info' => $course_constructor_info,
                    'zimage1' => $image1_uploaded,
                    'zimage2' => $image2_uploaded,
                    'zimage3' => $image3_uploaded
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة كورس جديد بنجاح
        <?php header('refresh:3000000;url=main.php?dir=courses&page=report'); ?>
    </div>

</div>

<?php }
            }
        }
    }