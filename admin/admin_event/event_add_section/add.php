<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اضافة اقسام اضافية </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i>  اضافة اقسام اضافية  </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <input type="text" class="form-control" name="add_name">
                        </div>
                        <div class="box">
                            <label id="name"> الاسم باللغه الانجليزية
                            </label>
                            <input type="text" class="form-control" name="add_name_en">
                        </div> 
                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="add_desc" class="form-control"></textarea>
                        </div> 
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="add_desc_en" class="form-control"></textarea>
                        </div> 

                    </div>
                    <div class="col-lg-6">
                    <div class="box">
                            <label id="name"> الوصف الفرعي
                            </label>
                            <textarea name="add_sub_desc" class="form-control" placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "></textarea>
                        </div> 
                        <div class="box">
                            <label id="name"> الوصف الفرعي باللغه الانجليزية
                            </label>
                            <textarea name="add_sub_desc_en" class="form-control" placeholder=" من فضلك ادخل بين كل عنصر والاخر  (,) "></textarea>
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

            $add_name = $_POST["add_name"];
            $add_name_en = $_POST["add_name_en"];
            $add_desc = $_POST["add_desc"];
            $add_desc_en = $_POST["add_desc_en"];
            $add_sub_desc = $_POST["add_sub_desc"];
            $add_sub_desc_en = $_POST["add_sub_desc_en"];
            $event_page = $_POST["event_page"];
            
            $stmt = $connect->prepare("INSERT INTO addition_section
                (add_name,add_name_en,add_desc,add_desc_en,add_sub_desc,add_sub_desc_en,event_page)
                VALUES (:zadd_name,:zadd_name_en,:zadd_desc,:zadd_desc_en,:zadd_sub_desc,:zadd_sub_desc_en,:zevent_page)");
            $stmt->execute([
                'zadd_name' => $add_name,
                'zadd_name_en' => $add_name_en,
                'zadd_desc' => $add_desc,
                'zadd_desc_en' => $add_desc_en,
                'zadd_sub_desc' => $add_sub_desc,
                'zadd_sub_desc_en' => $add_sub_desc_en,
                'zevent_page' => $event_page,
            ]);
            if ($stmt) { ?>
                <div class="alert-success">
                    تم اضافة محتوي جديد بنجاح
                    <?php header('refresh:3;url=main.php?dir=event_add_section&page=report'); ?>
                </div>
</div>
<?php }
        }
    }
