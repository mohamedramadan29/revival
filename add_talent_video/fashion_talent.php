<?php
if (isset($_GET['reg_id'])) {
    $reg_id = $_GET['reg_id'];
}
$stmt = $connect->prepare("SELECT * FROM company_register WHERE reg_id=?");
$stmt->execute(array($reg_id));
$count  = $stmt->rowCount();
if ($count >  0) {  ?>
    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="info2">
                            <div class="contact_form">
                                <div class="container">
                                    <div class="data">
                                        <!--------------------END PHP  CODE VALIDATION --------------->
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <div class="info upload_videos">
                                                    <div class="row">
                                                        <div class="alert alert-info"> <?php echo $lang['upload_video_note']; ?></div>
                                                        <div class="alert alert-info"> <?php echo $lang['upload_video_note2']; ?></div>
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <div class="document">
                                                                <div id="list"> </div>
                                                                <button type="button" id="pick"> <?php echo $lang['click_video_one']; ?><i class="fa fa-upload"></i> </button>
                                                                <!--<input type="button" id="pick" value=" اضغط هنا لرفع الفيديو الاول "> -->
                                                            </div>
                                                            <br>
                                                            <div class="document">
                                                                <div id="list2"> </div>
                                                                <button type="button" id="pick2"> <?php echo $lang['click_video_two']; ?><i class="fa fa-upload"></i> </button>
                                                            </div>
                                                            <br>
                                                            <div class="document">
                                                                <div id="list3"> </div>
                                                                <button type="button" id="pick3"><?php echo $lang['click_video_three']; ?><i class="fa fa-upload"></i> </button>

                                                            </div>
                                                        </form>

                                                        <!-- (B) LOAD PLUPLOAD FROM CDN -->
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.5/plupload.full.min.js"></script>
                                                        <script>
                                                            // (C) INITIALIZE UPLOADER
                                                            // (C1) GET HTML FILE LIST
                                                            var list = document.getElementById("list");

                                                            // (C2) INIT PLUPLOAD
                                                            var uploader = new plupload.Uploader({
                                                                runtimes: "html5",
                                                                browse_button: "pick",
                                                                url: "add_talent_video/art_chunk1.php?reg_id=<?= $reg_id;?>",
                                                                chunk_size: "10mb",
                                                                init: {
                                                                    PostInit: () => {
                                                                        list.innerHTML = "";
                                                                    },
                                                                    FilesAdded: (up, files) => {
                                                                        plupload.each(files, (file) => {
                                                                            let row = document.createElement("div");
                                                                            row.id = file.id;
                                                                            row.innerHTML = `${file.name} (${plupload.formatSize(file.size)}) <strong></strong>`;
                                                                            list.appendChild(row);
                                                                        });
                                                                        uploader.start();
                                                                    },
                                                                    UploadProgress: (up, file) => {
                                                                        document.querySelector(`#${file.id} strong`).innerHTML = `${file.percent}%`;
                                                                    },
                                                                    Error: (up, err) => console.error(err)
                                                                }
                                                            });
                                                            uploader.init();
                                                        </script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.5/plupload.full.min.js"></script>
                                                        <script>
                                                            // (C) INITIALIZE UPLOADER
                                                            // (C1) GET HTML FILE LIST
                                                            var list2 = document.getElementById("list2");

                                                            // (C2) INIT PLUPLOAD
                                                            var uploader2 = new plupload.Uploader({
                                                                runtimes: "html5",
                                                                browse_button: "pick2",
                                                                url: "add_talent_video/art_chunk2.php?reg_id=<?= $reg_id;?>",
                                                                chunk_size: "10mb",
                                                                init: {
                                                                    PostInit: () => {
                                                                        list2.innerHTML = "";
                                                                    },
                                                                    FilesAdded: (up, files) => {
                                                                        plupload.each(files, (file) => {
                                                                            let row2 = document.createElement("div");
                                                                            row2.id = file.id;
                                                                            row2.innerHTML = `${file.name} (${plupload.formatSize(file.size)}) <strong></strong>`;
                                                                            list2.appendChild(row2);
                                                                        });
                                                                        uploader2.start();
                                                                    },
                                                                    UploadProgress: (up, file) => {
                                                                        document.querySelector(`#${file.id} strong`).innerHTML = `${file.percent}%`;
                                                                    },
                                                                    Error: (up, err) => console.error(err)
                                                                }
                                                            });
                                                            uploader2.init();
                                                        </script>


                                                        <script>
                                                            // (C) INITIALIZE UPLOADER
                                                            // (C1) GET HTML FILE LIST
                                                            var list3 = document.getElementById("list3");

                                                            // (C2) INIT PLUPLOAD
                                                            var uploader3 = new plupload.Uploader({
                                                                runtimes: "html5",
                                                                browse_button: "pick3",
                                                                url: "add_talent_video/art_chunk3.php?reg_id=<?= $reg_id;?>",
                                                                chunk_size: "10mb",
                                                                init: {
                                                                    PostInit: () => {
                                                                        list3.innerHTML = "";
                                                                    },
                                                                    FilesAdded: (up, files) => {
                                                                        plupload.each(files, (file) => {
                                                                            let row3 = document.createElement("div");
                                                                            row3.id = file.id;
                                                                            row3.innerHTML = `${file.name} (${plupload.formatSize(file.size)}) <strong></strong>`;
                                                                            list3.appendChild(row3);
                                                                        });
                                                                        uploader3.start();
                                                                    },
                                                                    UploadProgress: (up, file) => {
                                                                        document.querySelector(`#${file.id} strong`).innerHTML = `${file.percent}%`;
                                                                    },
                                                                    Error: (up, err) => console.error(err)
                                                                }
                                                            });
                                                            uploader3.init();
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
} else { ?>

    <div class="alert_message alert alert-warning d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>
            <?php echo $lang['not_active_account']; ?>
        </div>
    </div>
    <br>
    <br>
<?php
}
?>