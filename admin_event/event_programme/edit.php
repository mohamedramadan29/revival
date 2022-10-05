<?php

if (isset($_GET['prog_id']) && is_numeric($_GET['prog_id'])) {
    $prog_id = $_GET['prog_id'];
    $stmt = $connect->prepare('SELECT * FROM event_programme WHERE prog_id=?');
    $stmt->execute([$prog_id]);
    $alltype = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <div class="container">
            <!-- start new data -->
            <div class="data">
                <div class="bread">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                            <li class="breadcrumb-item active" aria-current="page"> تعديل البرنامج </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل البرنامج </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $prog_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم
                                    </label>
                                    <input type="text" class="form-control" name="prog_name" value="<?php echo $alltype["prog_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان الحدث
                                    </label>
                                    <input type="text" class="form-control" name="main_head" value="<?php echo $alltype["main_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> عنوان الحدث الانجليزية
                                    </label>
                                    <input type="text" class="form-control" name="main_head_en" value="<?php echo $alltype["main_head_en"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> العنوان الفرعي للحدث
                                    </label>
                                    <input type="text" class="form-control" name="sub_head" value="<?php echo $alltype["sub_head"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> العنوان الفرعي الانجليزية
                                    </label>
                                    <input type="text" class="form-control" name="sub_head_en" value="<?php echo $alltype["sub_head_en"]; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="prog_desc" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"><?php echo $alltype["prog_desc"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="prog_desc_en" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"><?php echo $alltype["prog_desc_en"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name_en"> اختر الحدث <span> * </span></label>
                                    <select required class="form-control" name="event_page" id="cat_active6">
                                        <option value="">
                                            اختر الحدث </option>
                                        <?php
                                        $stmt = $connect->prepare("SELECT * FROM main_events");
                                        $stmt->execute();
                                        $allevent = $stmt->fetchAll();
                                        foreach ($allevent as $event) { ?>
                                            <option value="<?php echo $event["event_name"]; ?>" <?php if ($alltype["event_page"] == $event["event_name"]) echo "selected"; ?>> <?php echo $event["event_name"]; ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="box submit_box">
                                <input class="btn btn-primary" name="add_car" type="submit" value="اضافة محتوي جديد">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end new data -->

        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $prog_name = $_POST["prog_name"];
            $main_head = $_POST["main_head"];
            $main_head_en = $_POST["main_head_en"];
            $sub_head = $_POST["sub_head"];
            $sub_head_en = $_POST["sub_head_en"];
            $prog_desc = $_POST["prog_desc"];
            $prog_desc_en = $_POST["prog_desc_en"];
            $event_page = $_POST["event_page"];

            $formerror = [];



            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE event_programme SET 
                    prog_name=?,main_head=?,main_head_en=?,sub_head=?,sub_head_en=?,
                    prog_desc=?,prog_desc_en=?,event_page=?
                WHERE prog_id =?");
                $stmt->execute([
                    $prog_name,
                    $main_head,
                    $main_head_en,
                    $sub_head,
                    $sub_head_en,
                    $prog_desc,
                    $prog_desc_en,
                    $event_page,
                    $prog_id
                ]);
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح
                            <?php header('refresh:3,url=main.php?dir=event_programme&page=report'); ?>
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
