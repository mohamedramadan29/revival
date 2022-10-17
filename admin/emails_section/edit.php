<?php

if (isset($_GET['email_id']) && is_numeric($_GET['email_id'])) {
    $email_id = $_GET['email_id'];
    $stmt = $connect->prepare('SELECT * FROM email_message WHERE email_id=?');
    $stmt->execute([$email_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> الايميلات </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> الايميلات </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $email_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الايميل
                                    </label>
                                    <textarea class="form-control" name="email_text"> <?php echo $alltype["email_text"]; ?> </textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الايميل باللغه الانجليزية
                                    </label>
                                    <textarea class="form-control" name="email_text_en"> <?php echo $alltype["email_text_en"]; ?> </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="car_color"> اختر قسم الايميل </label>
                                    <select id="cat_active2" class="form-control" name="email_section" id="">
                                        <option value=""> اختر القسم </option>
                                        <option value="التسجيل في الذكاء الاصطناعي" <?php if ($alltype["email_section"] == "التسجيل في الذكاء الاصطناعي") echo "selected"; ?>> ايميل التسجبل في الذكاء الاصطناعي </option>
                                        <option value="التسجيل في الرياضة" <?php if ($alltype["email_section"] == "التسجيل في الرياضة") echo "selected"; ?>> ايميل التسجيل في الرياضة </option>
                                        <option value="التسجيل في الازياء" <?php if ($alltype["email_section"] == "التسجيل في الازياء") echo "selected"; ?>> ايميل التسجيل في الازياء </option>
                                        <option value="التسجيل في ريفايفال" <?php if ($alltype["email_section"] == "التسجيل في ريفايفال") echo "selected"; ?>> ايميل التسجيل في ريفايفال </option>
                                        <option value="اضافة مشروع جديد" <?php if ($alltype["email_section"] == "اضافة مشروع جديد") echo "selected"; ?>> ايميل اضافة مشروع جديد </option>
                                        <option value="رسالة التواصل" <?php if ($alltype["email_section"] == "رسالة التواصل") echo "selected"; ?>> ايميل التواصل </option>
                                        <option value="استثمار في موهبة" <?php if ($alltype["email_section"] == "استثمار في موهبة") echo "selected"; ?>>استثمار في موهبة</option>
                                        <option value="اضافة موهبة" <?php if ($alltype["email_section"] == "اضافة موهبة") echo "selected"; ?>>اضافة موهبة</option>
                                        <option value="تفعيل الحساب" <?php if ($alltype["email_section"] == "تفعيل الحساب") echo "selected"; ?>>تفعيل الحساب</option>
                                        <option value="التسجيل في الكورس" <?php if ($alltype["email_section"] == "التسجيل في الكورس") echo "selected"; ?>>التسجيل في الكورس</option>
                                        <option value="الموافقة علي التسجيل في الكورس" <?php if ($alltype["email_section"] == "الموافقة علي التسجيل في الكورس") echo "selected"; ?>>الموافقة علي التسجيل في الكورس</option>
                                        <option value="الاشتراك في القائمة البريدية" <?php if ($alltype["email_section"] == "الاشتراك في القائمة البريدية") echo "selected"; ?>>الاشتراك في القائمة البريدية</option>
                                        <option value="اضافة خبر جديد" <?php if ($alltype["email_section"] == "اضافة خبر جديد") echo "selected"; ?>>اضافة خبر جديد</option>
                                        <option value="اضافة مقال جديد" <?php if ($alltype["email_section"] == "اضافة مقال جديد") echo "selected"; ?>>اضافة مقال جديد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="box submit_box">
                                <input class="btn btn-primary" name="add_car" type="submit" value="تعديل البريد الالكتروني">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // START IMAGE car_imageside
            $email_text = $_POST['email_text'];
            $email_text_en = $_POST['email_text_en'];
            $email_section = $_POST['email_section'];
            $formerror = [];
            if (empty($email_text)) {
                $formerror[] = 'Please Insert Email Text';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                $stmt = $connect->prepare("UPDATE email_message SET email_text=?,email_text_en=?,
    email_section=?
        WHERE email_id=?");
                $stmt->execute([
                    $email_text,
                    $email_text_en,
                    $email_section,
                    $email_id,
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل الايميل بنجاح

                            <?php header('refresh:3,url=main.php?dir=emails_section&page=report'); ?>


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
