<?php
if (isset($_GET['select_id']) && is_numeric($_GET['select_id'])) {
    $select_id = $_GET['select_id'];
    $stmt = $connect->prepare('SELECT * FROM  form_selection_event WHERE select_id=?');
    $stmt->execute([$select_id]);
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
                            <li class="breadcrumb-item active" aria-current="page"> تعديل محتوي المجالات الاساسية </li>
                        </ol>
                    </nav>
                </div>
                <div class="title text-right">
                    <h6> <i class="fa fa-edit"></i> تعديل الاختيارات</h6>
                </div>
                <div class="myform">
                    <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <input type="hidden" name="typ_id" value="<?php echo $select_id; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name"> الاختيارات
                                    </label>
                                    <textarea name="select_name" class="form-control" placeholder="من فضلك افصل بين  كل مجال والاخر ب (,)"><?php echo $alltype["select_name"] ?></textarea>
                                </div>
                                <div class="box">
                                    <label id="name"> الاختيارات باللغه الانجليزية
                                    </label>
                                    <textarea name="select_name_en" class="form-control" placeholder="من فضلك افصل بين  كل مجال والاخر ب (,)"><?php echo $alltype["select_name_en"] ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box">
                                    <label id="name_en"> اختر الفورم <span> * </span></label>
                                    <select required class="form-control" name="select_form" id="cat_active6">
                                        <option value=""> اختر الفورم </option>
                                        <option <?php if ($alltype["select_form"] == "المشاركه في الفعالية") echo "selected"; ?> value="المشاركه في الفعالية"> المشاركه في الفعالية </option>
                                        <option <?php if ($alltype["select_form"] == "انضم الي فريق") echo "selected"; ?> value="انضم الي فريق">انضم الي فريق </option>
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
            $select_name =  $_POST['select_name']; 
            $select_name_en = $_POST['select_name_en']; 
            $select_form =   $_POST['select_form'];


            $formerror = [];
            if (empty($select_name)) {
                $formerror[] = 'Please Insert Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                $stmt = $connect->prepare("UPDATE form_selection_event SET 
                    select_name=?,select_name_en=?,select_form=?
                WHERE select_id=?");
                $stmt->execute([
                    $select_name, 
                    $select_name_en, 
                    $select_form,
                    $select_id,
                ]);

                if ($stmt) { ?>
                    <div class="container">
                        <div class="alert-success">
                            تم تعديل المحتوي بنجاح

                            <?php header('refresh:3,url=main.php?dir=form_selection&page=report'); ?>


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
