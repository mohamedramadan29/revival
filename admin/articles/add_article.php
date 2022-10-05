<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> المقالات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> المقالات </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> عنوان المقال
                            </label>
                            <input required class="form-control" type="text" name="ques">
                        </div>
                        <div class="box">
                            <label id="name"> العنوان باللغه الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="ques_en">
                        </div>
                        <div class="box">
                            <label id="car_color"> اختر القسم </label>
                            <select id="cat_active2" class="form-control" name="category" id="">
                                <option value=""> اختر القسم </option>
                                <option value="art_int"> الذكاء الاصطناعي </option>
                                <option value="sport"> الرياضة </option>
                                <option value="fashion"> الازياء والموضة </option>
                            </select>
                        </div>

                        <div class="box2">
                            <label for=""> الصورة العربية <span> * </span> </label>
                            <div class="">
                                <input id="logo" class="form-control dropify_" data-default-file="" type="file"
                                    name="image1" value="">
                            </div>
                            <div id="logo_" class="col-md-3">
                            </div>
                        </div>

                        <div class="box2">
                            <label for=""> الصورة الانجليزية <span> * </span> </label>
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
                            <label for="">محتوي المقال </label>
                            <textarea required name="answer1" id="" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label for="">محتوي المقال باللغه الانجليزية </label>
                            <textarea required name="answer2" id="" class="form-control"></textarea>
                        </div>


                    </div>

                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافه مقال جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {

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
            $art_decs = $_POST['answer1'];
            $art_desc_en = $_POST['answer2'];
            $art_category = $_POST['category'];

            /// More Validation To Show Error
            $formerror = [];
            if (empty($art_title)) {
                $formerror[] = 'Please Insert article Title';
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
                $stmt = $connect->prepare("INSERT INTO articles (article_title,article_title_en,
                article_desc , article_desc_en, article_category , image1, image2)
                VALUES (:zart_title,:zart_title_en,:zart_desc,:zart_desc_en,:zart_cat,:zimage1,:zimage2)");
                $stmt->execute([
                    'zart_title' => $art_title,
                    'zart_title_en' => $art_title_en,
                    'zart_desc' => $art_decs,
                    'zart_desc_en' => $art_desc_en,
                    'zart_cat' => $art_category,
                    'zimage1' => $image1_uploaded,
                    'zimage2' => $image2_uploaded,
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة مقال جديد بنجاح
        <?php header('refresh:3000000;url=main.php?dir=articles&page=report'); ?>
    </div>

    <?php
    $stmt = $connect->prepare("SELECT * FROM articles ORDER BY article_id DESC LIMIT 1");
    $stmt->execute();
    $articledata = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM subscribe");
    $stmt->execute();
    $allsub = $stmt->fetchAll();
    foreach($allsub as $sub){
        $to_email = $sub['sub_email'];
        $subject = "تم اضافة مقال جديد في موقع ريفايفال";
        $body = $articledata['article_title'];
        $headers = "From: info@revivals.site";
        mail($to_email, $subject, $body, $headers);
    }
    
    ?>

</div>

<?php }
            }
        }
    }