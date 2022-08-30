<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> قسم من نحن </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> قسم من نحن </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> اسم القسم </th>
                        <th> صفحة القسم </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM revival_about_us ORDER BY about_id DESC');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['about_name']; ?> </td>
                        <td><?php echo $type['about_page']; ?> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=revival_about&page=edit&about_id=<?php echo $type['about_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=revival_about&page=delete&about_id=<?php echo $type['about_id']; ?> ">
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