<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اختيارات الفورم </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i> النشاطات </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name"> الاسم
                            </label>
                            <textarea name="select_name" class="form-control" placeholder="من فضلك افصل بين  كل مجال والاخر ب (,)"></textarea>
                        </div>
                        <div class="box">
                            <label id="name"> الاسم باللغه الانجليزية
                            </label>
                            <textarea name="select_name_en" class="form-control" placeholder="من فضلك افصل بين  كل مجال والاخر ب (,)"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <label id="name_en"> اختر الفورم <span> * </span></label>
                            <select required class="form-control" name="select_form" id="cat_active6">
                                <option value=""> اختر الفورم </option>
                                <option value="المشاركه في الفعالية"> المشاركه في الفعالية </option>
                                <option value="انضم الي فريق"> انضم الي فريق </option>
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
            $select_name =  $_POST['select_name'];
            $select_name_en = $_POST['select_name_en'];
            $select_form =   $_POST['select_form'];
            /// More Validation To Show Error
            $formerror = [];
            if (empty($select_name)) {
                $formerror[] = 'Please Insert Select Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {

                $stmt = $connect->prepare("INSERT INTO form_selection_event
                 (select_name , select_name_en ,select_form )
                VALUES (:zselect_name,:zselect_name_en,:zselect_form)");
                $stmt->execute([
                    'zselect_name' => $select_name,
                    'zselect_name_en' => $select_name_en,
                    'zselect_form' => $select_form,
                ]);
                if ($stmt) { ?>
                    <div class="alert-success">
                        تم اضافة محتوي جديد بنجاح
                        <?php header('refresh:2;url=main.php?dir=form_selection&page=report'); ?>
                    </div>
</div>
<?php }
            }
        }
    }
