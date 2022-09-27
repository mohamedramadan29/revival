<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> محتوي الايميلات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> محتوي الايميلات </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <label id="name"> محتوي الايميل
                            </label>
                            <textarea name="email_text" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> محتوي الايميل باللغه الانجليزية
                            </label>
                            <textarea name="email_text_en" class="form-control"></textarea>
                        </div>
                        <div class="box">
                            <label id="car_color"> اختر قسم الايميل </label>
                            <select id="cat_active2" class="form-control" name="email_section" id="">
                                <option value=""> اختر القسم </option>
                                <option value="التسجيل في الذكاء الاصطناعي"> ايميل التسجبل في الذكاء الاصطناعي </option>
                                <option value="التسجيل في الرياضة"> ايميل التسجيل في الرياضة </option>
                                <option value="التسجيل في الازياء"> ايميل التسجيل في الازياء </option>
                                <option value="التسجيل في ريفايفال"> ايميل التسجيل في ريفايفال </option>
                                <option value="اضافة مشروع جديد"> ايميل اضافة مشروع جديد </option>
                                <option value="رسالة التواصل"> ايميل التواصل </option>
                                <option value="طلب خدمة جديد"> ايميل طلب خدمة جديدة </option>
                                <option value="استثمار في موهبة"> الاستثمار في موهبة </option>
                            </select>
                        </div>
                    </div>
                    <div class="box submit_box">
                        <input class="btn btn-primary" name="add_car" type="submit" value="اضافه ايميل جديد">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {
            $email_text = $_POST['email_text'];
            $email_text_en = $_POST['email_text_en'];
            $email_section = $_POST['email_section'];
            /// More Validation To Show Error
            $formerror = [];
            if (empty($email_text)) {
                $formerror[] = 'Please Insert email text';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }
            if (empty($formerror)) {
                $stmt = $connect->prepare("INSERT INTO email_message (email_text,email_text_en,
                email_section)
                VALUES (:zemail_text,:zemail_text_en,:zemail_section)");
                $stmt->execute([
                    'zemail_text' => $email_text,
                    'zemail_text_en' => $email_text_en,
                    'zemail_section' => $email_section,
                ]);
                if ($stmt) { ?>
                    <div class="alert-success">
                        تم اضافة بريد الكتروني جديد بنجاح
                        <?php header('refresh:3;url=main.php?dir=emails_section&page=report'); ?>
                    </div>
</div>
<?php }
            }
        }
    }
