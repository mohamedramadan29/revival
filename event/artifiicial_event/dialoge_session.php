<?php
ob_start();
session_start();
$eventpage = 'event';
include 'init.php';
?>
<!-- START HERO SECTION -->
<div class="cars event_courses">
    <div class="overlay">
        <div class="container data">
            <h2> Dialogue Session </h2>
        </div>
    </div>
</div>
<!-- END HERO SECTION -->

<!-- START CARS SECTION -->
<!-- START EVENT PROGRAME -->
<div class="event_programe dialge_session">
    <div class="container">
        <div class="data">
            <h2> Session One </h2>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <div class="image">
                            <img src="../uploads/event_pro.jpg" alt="">
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante felis, gravida at odio
                            viverra, blandit suscipit leo. Fusce mattis justo at diam laoreet, sed pretium leo semper.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="info">
                        <div class="image">
                            <img src="../uploads/event_pro2.jpg" alt="">
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ante felis, gravida at odio
                            viverra, blandit suscipit leo. Fusce mattis justo at diam laoreet, sed pretium leo semper.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END EVENT PROGRAME -->
<!-- START OUR Team  -->
<div class="our_services our_team session_team">
    <div class="container">
        <div class="data">
            <h2> Session Instructor </h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="info">
                        <img class="" src="../uploads/team1.webp" alt="">
                        <h3> <a href="#"> Diana Richards </a> </h3>
                        <p class="inst_work"> Founder, Marketing director</p>
                        <p class="inst_info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti
                            mollitia dolores minus
                            quas repellendus ducimus nostrum inventore recusandae
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img class="" src="../uploads/person2.webp" alt="">
                        <h3> <a href="#"> Mohamed Ramadan </a> </h3>
                        <p class="inst_work"> Full Stack Developer </p>
                        <p class="inst_info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti
                            mollitia dolores minus
                            quas repellendus ducimus nostrum inventore recusandae
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img class="" src="../uploads/person3.webp" alt="">
                        <h3> <a href="#"> Asmaa Mohamed </a> </h3>
                        <p class="inst_work"> Ceo</p>
                        <p class="inst_info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti
                            mollitia dolores minus
                            quas repellendus ducimus nostrum inventore recusandae
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info">
                        <img class="" src="../uploads/person4.webp" alt="">
                        <h3> <a href="#"> Hamza Gamal </a> </h3>
                        <p class="inst_work"> Founder</p>
                        <p class="inst_info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum corrupti
                            mollitia dolores minus
                            quas repellendus ducimus nostrum inventore recusandae
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OUR Team  -->

<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>