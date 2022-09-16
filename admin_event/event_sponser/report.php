<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الرعاه </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i> الرعاه </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th> الاسم </th>
                        <th> الرابط </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM event_sponser ORDER BY sponser_id  DESC');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['sponser_name']; ?> </td>
                        <td><?php echo $type['sponser_link']; ?> </td>
                        <td>
                            <a class=" btn btn-success"
                                href="main.php?dir=event_sponser&page=edit&sponser_id=<?php echo $type['sponser_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger"
                                href="main.php?dir=event_sponser&page=delete&sponser_id=<?php echo $type['sponser_id']; ?> ">
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