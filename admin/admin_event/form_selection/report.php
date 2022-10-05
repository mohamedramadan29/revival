<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> اختيارات الفورم </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> اختيارات الفورم </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> الاسم </th>
                        <th> اسم الفورم </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM form_selection_event ORDER BY select_id DESC');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['select_name']; ?> </td>
                        <td><?php echo $type['select_form']; ?> </td>
                        <td>
                            <a class=" btn btn-success btn-sm"
                                href="main.php?dir=form_selection&page=edit&select_id=<?php echo $type['select_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger btn-sm"
                                href="main.php?dir=form_selection&page=delete&select_id=<?php echo $type['select_id']; ?> ">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>