<div class="container customer_report">
    <div class="data">
        <div class="bread">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <i class="fa fa-heart"></i> <a
                            href="main.php?dir=dashboard&page=dashboard"> الاحداث </a> <i
                            class="fa fa-chevron-left"></i> </li>
                    <li class="breadcrumb-item active" aria-current="page"> الايميلات </li>
                </ol>
            </nav>
        </div>
        <div class="title text-right">
            <h6> <i class="fa fa-search"></i>  الايميلات  </h6>
        </div>
        <!-- Content Row -->
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>البريد الالكتروني </th>
                        <th> قسم االايميل </th>

                        <th> </th>
                    </tr>
                </thead>
                <tbody> <?php
                        $stmt = $connect->prepare('SELECT * FROM email_message_event');
                        $stmt->execute();
                        $alltype = $stmt->fetchAll();
                        foreach ($alltype as $type) { ?> <tr>
                        <td><?php echo $type['email_text']; ?> </td>
                        <td><?php echo $type['email_section']; ?> </td>

                        <td>
                            <a class=" btn btn-success btn-sm"
                                href="main.php?dir=emails_section&page=edit&email_id=<?php echo $type['email_id']; ?> ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="confirm btn btn-danger btn-sm"
                                href="main.php?dir=emails_section&page=delete&email_id=<?php echo $type['email_id']; ?> ">
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