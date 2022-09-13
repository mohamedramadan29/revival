<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> ريفايفال </a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> جميع المقالات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> جميع المقالات </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>عنوان المقال </th>
                        <th> محتوي المقال </th>
                        <th> القسم </th>
                        <th> تاريخ المقال </th>

                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM articles');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['article_title']; ?> </td>
                            <td><?php echo $type['article_desc']; ?> </td>
                            <td><?php echo $type['article_category']; ?> </td>
                            <td><?php echo $type['article_date']; ?> </td>

                            <td>
                                <a class=" btn btn-success" href="main.php?dir=articles&page=edit&article_id=<?php echo $type['article_id']; ?> ">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="confirm btn btn-danger" href="main.php?dir=articles&page=delete&article_id=<?php echo $type['article_id']; ?> ">
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