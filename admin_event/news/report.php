<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> جميع الاخبار </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> جميع الاخبار </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>عنوان الخبر </th>
                        <th> محتوي الخبر </th>
                        <th> القسم </th>
                        <th> تاريخ الخبر </th>

                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM news');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['new_title']; ?> </td>
                            <td><?php echo $type['new_desc']; ?> </td>
                            <td><?php echo $type['new_category']; ?> </td>
                            <td><?php echo $type['new_date']; ?> </td>

                            <td>
                                <a class=" btn btn-success" href="main.php?dir=news&page=edit&new_id=<?php echo $type['new_id']; ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="confirm btn btn-danger" href="main.php?dir=news&page=delete&new_id=<?php echo $type['new_id']; ?> ">
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