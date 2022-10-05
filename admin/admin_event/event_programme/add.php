<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة برنامج للحدث </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> اضافة برنامج للحدث </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input type="text" class="form-control" name="prog_name">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان الحدث
                            </label>
                            <input type="text" class="form-control" name="main_head">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان الحدث الانجليزية
                            </label>
                            <input type="text" class="form-control" name="main_head_en">
                        </div>
                        <div class="box">
                            <label id="name"> العنوان الفرعي للحدث
                            </label>
                            <input type="text" class="form-control" name="sub_head">
                        </div>
                        <div class="box">
                            <label id="name"> العنوان الفرعي الانجليزية
                            </label>
                            <input type="text" class="form-control" name="sub_head_en">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="prog_desc" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="prog_desc_en" class="form-control" placeholder="اذا كان الوصف عبارة عن عناصر ادخل بين كل عنصر والاخر ب (,)"></textarea>
                        </div>
                        <div class="box">
                            <label id="name_en"> اختر الحدث <span> * </span></label>
                            <select required class="form-control" name="event_page" id="cat_active6">
                                <option value=""> اختر الحدث </option>
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_active='فعال'");
                                $stmt->execute();
                                $allevent = $stmt->fetchAll();
                                foreach ($allevent as $event) { ?>
                                    <option value="<?php echo $event["event_name"] ?>"> <?php echo $event["event_name"] ?></option>
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
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add_car'])) {
            $prog_name = $_POST["prog_name"];
            $main_head = $_POST["main_head"];
            $main_head_en = $_POST["main_head_en"];
            $sub_head = $_POST["sub_head"];
            $sub_head_en = $_POST["sub_head_en"];
            $prog_desc = $_POST["prog_desc"];
            $prog_desc_en = $_POST["prog_desc_en"];
            $event_page = $_POST["event_page"];
            $stmt = $connect->prepare("INSERT INTO event_programme
                (prog_name,main_head,main_head_en,sub_head,sub_head_en,prog_desc,prog_desc_en,event_page)
                VALUES (:zprog_name,:zmain_head,:zmain_head_en,:zsub_head,:zsub_head_en,:zprog_desc,:zprog_desc_en,:zevent_page)");
            $stmt->execute([
                'zprog_name' => $prog_name,
                'zmain_head' => $main_head,
                'zmain_head_en' => $main_head_en,
                'zsub_head' => $sub_head,
                'zsub_head_en' => $sub_head_en,
                'zprog_desc' => $prog_desc,
                'zprog_desc_en' => $prog_desc_en,
                'zevent_page' => $event_page,
            ]);
            if ($stmt) { ?>
                <div class="alert-success">
                    تم اضافة محتوي جديد بنجاح
                    <?php header('refresh:3;url=main.php?dir=event_programme&page=report'); ?>
                </div>
</div>
<?php }
        }
    }
