<?php
if (isset($_GET['goal_id']) && is_numeric($_GET['goal_id'])) {
    $goal_id = $_GET['goal_id'];
    $stmt = $connect->prepare('SELECT * FROM revival_goals WHERE goal_id=?');
    $stmt->execute([$goal_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل محتوي الاهداف </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل محتوي الاهداف</h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $goal_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> عنوان الاهداف
                                    </label>
                                    <input required class="form-control" type="text" name="goal_head" value="<?php echo $alltype["goal_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان الاهداف الانجليزية
                                    </label>
                                    <input required class="form-control" type="text" name="goal_head_en" value="<?php echo $alltype["goal_head_en"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="goal_desc" id="" class="form-control"><?php echo $alltype["goal_desc"]; ?></textarea>

                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="goal_desc_en" id="" class="form-control"><?php echo $alltype["goal_desc_en"]; ?></textarea>

                                </div>

                                <div class="box">
                                    <label id="name"> عنوان رويتنا
                                    </label>
                                    <input required class="form-control" type="text" name="vision_head" value="<?php echo $alltype["vision_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان رويتنا الانجليزية
                                    </label>
                                    <input required class="form-control" type="text" name="vision_head_en" value="<?php echo $alltype["vision_head_en"]; ?>">
                                </div>

                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="vision_desc" id="" class="form-control"><?php echo $alltype["vision_desc"]; ?></textarea>

                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="vision_desc_en" id="" class="form-control"><?php echo $alltype["vision_desc_en"]; ?></textarea>

                                </div>




                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> عنوان رسالتنا
                                    </label>
                                    <input required class="form-control" type="text" name="message_head" value="<?php echo $alltype["message_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان رسالتنا الانجليزية
                                    </label>
                                    <input required class="form-control" type="text" name="message_head_en" value="<?php echo $alltype["message_head_en"]; ?>">
                                </div>

                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="message_desc" id="" class="form-control"><?php echo $alltype["message_desc"]; ?></textarea>

                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="message_desc_en" id="" class="form-control"><?php echo $alltype["message_desc_en"]; ?></textarea>

                                </div>

                                <div class="box">
                                    <label id="name_en"> اختر الصفحة <span> * </span></label>
                                    <select class="form-control" name="goal_page" id="cat_active6">
                                        <option value="">
                                            اختر الصفحة </option>
                                        <option <?php if ($alltype["goal_page"] == "الرئيسية") echo "selected"; ?> value="الرئيسية"> الرئيسية </option>
                                        <option <?php if ($alltype["goal_page"] == "مدينة الذكاء الإصطناعي") echo "selected"; ?> value="مدينة الذكاء الإصطناعي"> مدينة الذكاء الإصطناعي </option>
                                        <option <?php if ($alltype["goal_page"] == "مواهب العالم الرياضية") echo "selected"; ?> value="مواهب العالم الرياضية"> مواهب العالم الرياضية </option>
                                        <option <?php if ($alltype["goal_page"] == "الأزياء والمجوهرات") echo "selected"; ?> value="الأزياء والمجوهرات"> الأزياء والمجوهرات </option>
                                        <option <?php if ($alltype["goal_page"] == "الوكالة") echo "selected"; ?> value="الوكالة">الوكالة</option>
                                    </select>
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

            $goal_head =  $_POST['goal_head'];
            $goal_head_en = $_POST['goal_head_en'];
            $goal_desc =   $_POST['goal_desc'];
            $goal_desc_en =   $_POST['goal_desc_en'];
            $vision_head =   $_POST['vision_head'];
            $vision_head_en =   $_POST['vision_head_en'];
            $vision_desc =   $_POST['vision_desc'];
            $vision_desc_en =   $_POST['vision_desc_en'];
            $message_head =   $_POST['message_head'];
            $message_head_en =   $_POST['message_head_en'];
            $message_desc =   $_POST['message_desc'];
            $message_desc_en =   $_POST['message_desc_en'];
            $goal_page =   $_POST['goal_page'];


            $formerror = [];
            if (empty($goal_head)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE revival_goals SET 
                    goal_head=?,goal_head_en=?,goal_desc=?,
                    goal_desc_en=?,vision_head=?,vision_head_en=?,vision_desc=?,vision_desc_en=?,message_head=?,message_head_en=?,message_desc=?,message_desc_en=?,goal_page=?
                WHERE goal_id=?");
                $stmt->execute([
                    $goal_head,
                    $goal_head_en,
                    $goal_desc,
                    $goal_desc_en,
                    $vision_head,
                    $vision_head_en,
                    $vision_desc,
                    $vision_desc_en,
                    $message_head,
                    $message_head_en,
                    $message_desc,
                    $message_desc_en,
                    $goal_page,
                    $goal_id,
                ]);

                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح

                            <?php header('refresh:3,url=main.php?dir=revival_goals&page=report'); ?>


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
