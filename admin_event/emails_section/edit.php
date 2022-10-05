<?php

if (isset($_GET['email_id']) && is_numeric($_GET['email_id'])) {
    $email_id = $_GET['email_id'];
    $stmt = $connect->prepare('SELECT * FROM email_message_event WHERE email_id=?');
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
                                        <option value="تواصل من الصفحة الرئيسية" <?php if ($alltype["email_section"] == "تواصل من الصفحة الرئيسية") echo "selected"; ?>>تواصل من الصفحة الرئيسية</option>
                                        <option value="تواصل من الحدث" <?php if ($alltype["email_section"] == "تواصل من الحدث") echo "selected"; ?>>تواصل من الحدث</option>
                                        <option value="شارك في الفعالية" <?php if ($alltype["email_section"] == "شارك في الفعالية") echo "selected"; ?>>شارك في الفعالية</option>
                                        <option value="انضم الي فريق" <?php if ($alltype["email_section"] == "انضم الي فريق") echo "selected"; ?>>انضم الي فريق</option>
                                        <option value="حساب جديد" <?php if ($alltype["email_section"] == "حساب جديد") echo "selected"; ?>>حساب جديد</option>
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
                $stmt = $connect->prepare("UPDATE email_message_event SET email_text=?,email_text_en=?,
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
