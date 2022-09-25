<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a href="main.php?dir=dashboard&page=dashboard"> <?php echo $lang['website_title']; ?></a> <i class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> القائمة البريدية </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> القائمة البريدية </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="tableone" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> البريد الالكتروني </th>
                        <th> التاريخ </th>

                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM subscribe');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                            <td><?php echo $type['sub_email']; ?> </td>
                            <td><?php echo $type['sub_date']; ?> </td>

                        </tr> <?php }
                                ?> </tbody>
            </table>
        </div>
    </div>
</div>
</div>