<?php

if (isset($_GET['term_id']) && is_numeric($_GET['term_id'])) {
    $term_id = $_GET['term_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_terms WHERE term_id=?');
    $stmt->execute([$term_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل الشروط والاحكام </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل الشروط والاحكام </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $term_id; ?>">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="box">
                                    <label id="name"> الاسم
                                    </label>
                                    <input required class="form-control" type="text" name="term_name" value="<?php echo $alltype["term_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الاسم الانجليزية
                                    </label>
                                    <input required class="form-control" type="text" name="term_name_en" value="<?php echo $alltype["term_name_en"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name_en"> اختر الصفحة <span> * </span></label>
                                    <select class="form-control" name="term_page" id="cat_active6">
                                        <option value="">
                                            اختر الصفحة </option>
                                        <option <?php if ($alltype["term_page"] == "الرئيسية") echo "selected"; ?> value="الرئيسية"> الرئيسية </option>
                                        <option <?php if ($alltype["term_page"] == "مدينة الذكاء الإصطناعي") echo "selected"; ?> value="مدينة الذكاء الإصطناعي"> مدينة الذكاء الإصطناعي </option>
                                        <option <?php if ($alltype["term_page"] == "مواهب العالم الرياضية") echo "selected"; ?> value="مواهب العالم الرياضية"> مواهب العالم الرياضية </option>
                                        <option <?php if ($alltype["term_page"] == "الأزياء والمجوهرات") echo "selected"; ?> value="الأزياء والمجوهرات"> الأزياء والمجوهرات </option>
                                        <option <?php if ($alltype["term_page"] == "الوكالة") echo "selected"; ?> value="الوكالة"> الوكالة </option>
                                    </select>
                                </div>

                                <div class="box">
                                    <label id="name"> اضافة الشروط
                                    </label>
                                    <textarea required name="term_data" id="" class="form-control" placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"><?php echo $alltype["term_data"]; ?></textarea>
                                </div>

                                <div class="box">
                                    <label id="name"> اضافة الشروط باللغه الانجليزية
                                    </label>
                                    <textarea required name="term_data_en" id="" class="form-control" placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"><?php echo $alltype["term_data_en"]; ?></textarea>
                                </div>

                                <div class="box submit_box">
                                    <input class="btn btn-primary" name="add_car" type="submit" value="تعديل المحتوي">
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['term_name'];
            $name_en = $_POST['term_name_en'];
            $term_page = $_POST['term_page'];
            $term_data = $_POST['term_data'];
            $term_data_en = $_POST['term_data_en'];

            $formerror = [];
            if (empty($name)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {


                $stmt = $connect->prepare("UPDATE revival_terms SET term_name=?,term_name_en=?,term_data=?,term_data_en=?,term_page=?
                WHERE term_id=?");
                $stmt->execute([
                    $name,
                    $name_en,
                    $term_data,
                    $term_data_en,
                    $term_page,
                    $term_id
                ]);

                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح

                            <?php header('refresh:3,url=main.php?dir=revival_terms&page=report'); ?>


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
