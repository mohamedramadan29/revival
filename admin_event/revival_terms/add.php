<div class="container">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page">    فسم الشروط والاحكام     </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-plus"></i>  فسم الشروط والاحكام   </h6>
        </div>
        <div class="myform">
            <form class="form-group insert" method="POST" autocomplete="on" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <label id="name">  الاسم  
                            </label>
                            <input required class="form-control" type="text" name="term_name">
                        </div>
                        
                        <div class="box">
                            <label id="name">  الاسم  الانجليزية
                            </label>
                            <input required class="form-control" type="text" name="term_name_en">
                        </div>
                        
                        <div class="box">
                            <label id="name_en"> اختر الصفحة <span> * </span></label>
                            <select required class="form-control" name="term_page" id="cat_active6">
                                <option value=""> اختر الصفحة </option>
                                <option value="الرئيسية">التسجيل  الرئيسية </option>
                                <option value="مدينة الذكاء الإصطناعي"> مدينة الذكاء الإصطناعي </option>
                                <option value="مواهب العالم الرياضية"> مواهب العالم الرياضية </option>
                                <option value="الأزياء والمجوهرات"> الأزياء والمجوهرات </option>
                            </select>
                        </div>
                        <div class="box">
                            <label id="name"> اضافة   الشروط
                            </label>
                            <textarea required name="term_data" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"></textarea>
                        </div>

                        <div class="box">
                            <label id="name"> اضافة الشروط باللغه الانجليزية
                            </label>
                            <textarea required name="term_data_en" id="" class="form-control"
                                placeholder="من فضلك افصل بين كل نقطة والاخري ب(,)"></textarea>
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

            $name = $_POST['term_name'];
            $name_en = $_POST['term_name_en'];
            $term_page = $_POST['term_page'];
            $term_data = $_POST['term_data'];
            $term_data_en = $_POST['term_data_en'];
          
            /// More Validation To Show Error
            $formerror = [];
            if (empty($name)) {
                $formerror[] = 'Please Insert term Name';
            }
            foreach ($formerror as $errors) {
                echo "<div class='alert alert-danger danger_message'>" .
                    $errors .
                    '</div>';
            }

            if (empty($formerror)) {
                
                $stmt = $connect->prepare("INSERT INTO revival_terms
                 (term_name,term_name_en, term_data, term_data_en , term_page)
                VALUES (:zname,:zname_en:zterm_data,:zterm_data_en, :zterm_page)");
                $stmt->execute([
                    'zname' => $name,
                    'zname_en' => $name_en,
                    'zterm_data' => $term_data,
                    'zterm_data_en' => $term_data_en,
                    'zterm_page' => $term_page, 
                ]);
                if ($stmt) { ?>
    <div class="alert-success">
        تم اضافة محتوي جديد بنجاح
        <?php header('refresh:3;url=main.php?dir=revival_terms&page=report'); ?>
    </div>

</div>

<?php }
            }
        }
    }