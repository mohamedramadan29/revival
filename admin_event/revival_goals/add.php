<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> قسم الاهداف </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> قسم الاهداف </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> عنوان الاهداف
                            </label>
                            <input required class="form-control" type="text" name="goal_head">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان الاهداف الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="goal_head_en">
                        </div>
                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="goal_desc" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="goal_desc_en" id="" class="form-control"></textarea>

                        </div>

                        <div class="box">
                            <label id="name"> عنوان رويتنا
                            </label>
                            <input required class="form-control" type="text" name="vision_head">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان رويتنا الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="vision_head_en">
                        </div>

                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="vision_desc" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="vision_desc_en" id="" class="form-control"></textarea>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> عنوان رسالتنا
                            </label>
                            <input required class="form-control" type="text" name="message_head">
                        </div>
                        <div class="box">
                            <label id="name"> عنوان رسالتنا الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="message_head_en">
                        </div>

                        <div class="box">
                            <label id="name"> الوصف
                            </label>
                            <textarea name="message_desc" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name"> الوصف باللغه الانجليزية
                            </label>
                            <textarea name="message_desc_en" id="" class="form-control"></textarea>

                        </div>
                        <div class="box">
                            <label id="name_en"> اختر الحدث <span> * </span></label>
                            <select required class="form-control" name="goal_page" id="cat_active6">
                                <option value=""> اختر الحدث </option>
                                <?php
                                $stmt = $connect->prepare("SELECT * FROM main_events WHERE event_active='فعال'");
                                $stmt->execute();
                                $allevent = $stmt->fetchAll();
                                foreach($allevent as $event){?>
                                <option value="<?php echo $event ["event_name"] ?>"> <?php echo $event ["event_name"] ?></option>
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

            /// More Validation To Show Error
            $formerror = [];
            if (empty($goal_head)) {
                $formerror[] = 'Please Insert Goal Head';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                $stmt = $connect->prepare("INSERT INTO event_goals
                 (goal_head, goal_head_en, goal_desc , goal_desc_en , vision_head , vision_head_en , vision_desc , vision_desc_en, message_head , message_head_en,message_desc,message_desc_en,goal_page)
                VALUES (:zgoal_head,:zgoal_head_en,:zgoal_desc,:zgoal_desc_en,:zvision_head,:zvision_head_en,:zvision_dec, :zvision_desc_en, :zmessage_head, :zmessage_head_en,:zmessage_desc,:zmessage_desc_en,:zgoal_page)");
                $stmt->execute([
                    'zgoal_head' => $goal_head,
                    'zgoal_head_en' => $goal_head_en,
                    'zgoal_desc' => $goal_desc,
                    'zgoal_desc_en' => $goal_desc_en,
                    'zvision_head' => $vision_head,
                    'zvision_head_en' =>  $vision_head_en,
                    'zvision_dec' => $vision_desc,
                    'zvision_desc_en' => $vision_desc_en,
                    'zmessage_head' => $message_head,
                    'zmessage_head_en' => $message_head_en,
                    'zmessage_desc' => $message_desc,
                    'zmessage_desc_en' => $message_desc_en,
                    'zgoal_page' => $goal_page,

                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة محتوي جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=revival_goals&page=report'); ?>
    </div>
</div>
<?php }
            }
        }
    }