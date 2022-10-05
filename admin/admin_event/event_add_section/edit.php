<?php

if (isset($_GET['add_id']) && is_numeric($_GET['add_id'])) {
    $add_id = $_GET['add_id'];
    $stmt = $connect->prepare('SELECT * FROM addition_section WHERE add_id=?');
    $stmt->execute([$add_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل الفئات المستهدفة </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i>تعديل المحتوي </h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $add_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاسم
                                    </label>
                                    <input type="text" class="form-control" name="add_name" value="<?php echo $alltype["add_name"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الاسم باللغه الانجليزية
                                    </label>
                                    <input type="text" class="form-control" name="add_name_en" value="<?php echo $alltype["add_name_en"]; ?>">
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف
                                    </label>
                                    <textarea name="add_desc" class="form-control"><?php echo $alltype["add_desc"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف باللغه الانجليزية
                                    </label>
                                    <textarea name="add_desc_en" class="form-control"><?php echo $alltype["add_desc_en"]; ?></textarea>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الوصف الفرعي
                                    </label>
                                    <textarea name="add_sub_desc" class="form-control" placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["add_sub_desc"]; ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الوصف الفرعي باللغه الانجليزية
                                    </label>
                                    <textarea name="add_sub_desc_en" class="form-control" placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "><?php echo $alltype["add_sub_desc_en"]; ?></textarea>
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
                                foreach($allevent as $event){?>
                                <option value="<?php echo $event["event_name"]; ?>" <?php if ($alltype["event_page"] == $event["event_name"]) echo "selected"; ?>> <?php echo $event["event_name"]; ?> </option>
                                <?php
                                }
                                ?>
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
            // START IMAGE car_imageside
            $add_name = $_POST["add_name"];
            $add_name_en = $_POST["add_name_en"];
            $add_desc = $_POST["add_desc"];
            $add_desc_en = $_POST["add_desc_en"];
            $add_sub_desc = $_POST["add_sub_desc"];
            $add_sub_desc_en = $_POST["add_sub_desc_en"];
            $event_page = $_POST["event_page"];

            $formerror = [];

    

            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE addition_section SET 
                    add_name=?,add_name_en=?,add_desc=?,add_desc_en=?,add_sub_desc=?,
                    add_sub_desc_en=?,event_page=?
                WHERE add_id =?");
                $stmt->execute([
                    $add_name,
                    $add_name_en,
                    $add_desc,
                    $add_desc_en,
                    $add_sub_desc,
                    $add_sub_desc_en,
                    $event_page,
                    $add_id
                ]); 
                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح
                            <?php header('refresh:3,url=main.php?dir=event_add_section&page=report'); ?>
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
