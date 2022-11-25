<?php
$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));

$userdata = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
?>
    <div class="profile_data update_profile">
        <div class="container">
            <div class="data">

                <form id="update_2" class="message_form ajax_form" action="upload_data/fash_register.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="info">
                                <?php
                                if (!empty($userdata['talent_image'])) { ?>
                                    <div class="personal_image">
                                        <img src="admin/upload/<?php echo $userdata['talent_image']; ?>" alt="">
                                    </div>
                                <?php
                                } else { ?>
                                    <div class="personal_image">
                                        <img src="uploads/avatar.png" alt="">

                                    </div>

                                <?php
                                }
                                ?>
                                <h2> <?php echo $userdata["first_name"];  ?> <?php echo $userdata["last_name"];  ?> </h2>
                                <p> <?php echo $userdata["email"];  ?></p>

                            </div>
                        </div>
                        <div class="col-lg-8">
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
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <div class="document">
                                                                <div id="list"> </div>
                                                                <button type="button" id="pick"> اضغط هنا لرفع الفيديو الاول <i class="fa fa-upload"></i> </button>
                                                                <!--<input type="button" id="pick" value=" اضغط هنا لرفع الفيديو الاول "> -->
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="document">
                                                                <div id="list2"> </div>
                                                                <button type="button" id="pick2"> اضغط هنا لرفع الفيديو الثاني <i class="fa fa-upload"></i> </button>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="document">
                                                                <div id="list3"> </div>
                                                                <button type="button" id="pick3"> اضغط هنا لرفع الفيديو الثالث <i class="fa fa-upload"></i> </button>

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
                                                                url: "update_profile_video/art_chunk1.php",
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
                                                                url: "update_profile_video/art_chunk2.php",
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
                                                                url: "update_profile_video/art_chunk3.php",
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
    </div>
    </div>

    </form>


<?php
}
?>