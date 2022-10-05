<?php
ob_start();
$pagetitle = 'Main';
session_start();
include 'init.php';
include $tem . 'top_navbar.php';
include $tem . 'left_sidebar.php';
?>
<div class="content-wrapper">
    <div class="category">
        <?php
        $page = '';
        if (isset($_GET['page']) && isset($_GET['dir'])) {
            $page = $_GET['page'];
            $dir = $_GET['dir'];
        } else {
            $page = 'manage';
        }


        // START REVIVALS SITE 
        // START FAQS
        if ($dir == 'faqs' && $page == 'add') {
            include 'faqs/add_faq.php';
        } elseif ($dir == 'faqs' && $page == 'edit') {
            include 'faqs/edit_faq.php';
        } elseif ($dir == 'faqs' && $page == 'delete') {
            include 'faqs/delete_faq.php';
        } elseif ($dir == 'faqs' && $page == 'report') {
            include 'faqs/report.php';
        }
        // START ATICLES
        if ($dir == 'articles' && $page == 'add') {
            include 'articles/add_article.php';
        } elseif ($dir == 'articles' && $page == 'edit') {
            include 'articles/edit_article.php';
        } elseif ($dir == 'articles' && $page == 'delete') {
            include 'articles/delete_article.php';
        } elseif ($dir == 'articles' && $page == 'report') {
            include 'articles/report.php';
        }
        // END ARTICLES
        // START NEWS
        if ($dir == 'news' && $page == 'add') {
            include 'news/add_new.php';
        } elseif ($dir == 'news' && $page == 'edit') {
            include 'news/edit_new.php';
        } elseif ($dir == 'news' && $page == 'delete') {
            include 'news/delete_new.php';
        } elseif ($dir == 'news' && $page == 'report') {
            include 'news/report.php';
        }
        // END NEWS

        // START ART REGISTER
        if ($dir == 'art_register' && $page == 'add') {
            include 'art_register/add.php';
        } elseif ($dir == 'art_register' && $page == 'edit') {
            include 'art_register/edit.php';
        } elseif ($dir == 'art_register' && $page == 'delete') {
            include 'art_register/delete.php';
        } elseif ($dir == 'art_register' && $page == 'report') {
            include 'art_register/report.php';
        }
        // END ART REGISTER
        // START ART REGISTER
        if ($dir == 'fash_register' && $page == 'add') {
            include 'fash_register/add.php';
        } elseif ($dir == 'fash_register' && $page == 'edit') {
            include 'fash_register/edit.php';
        } elseif ($dir == 'fash_register' && $page == 'delete') {
            include 'fash_register/delete.php';
        } elseif ($dir == 'fash_register' && $page == 'report') {
            include 'fash_register/report.php';
        }
        // END ART REGISTER
        // START ART REGISTER
        if ($dir == 'sport_register' && $page == 'add') {
            include 'sport_register/add.php';
        } elseif ($dir == 'sport_register' && $page == 'edit') {
            include 'sport_register/edit.php';
        } elseif ($dir == 'sport_register' && $page == 'delete') {
            include 'sport_register/delete.php';
        } elseif ($dir == 'sport_register' && $page == 'report') {
            include 'sport_register/report.php';
        }
        // END ART REGISTER
        // START Revival REGISTER
        if ($dir == 'revival_register' && $page == 'add') {
            include 'revival_register/add.php';
        } elseif ($dir == 'revival_register' && $page == 'edit') {
            include 'revival_register/edit.php';
        } elseif ($dir == 'revival_register' && $page == 'delete') {
            include 'revival_register/delete.php';
        } elseif ($dir == 'revival_register' && $page == 'report') {
            include 'revival_register/report.php';
        }
        // END Revival REGISTER

        // START Revival Order Services 
        if ($dir == 'revival_order_services' && $page == 'add') {
            include 'revival_order_services/add.php';
        } elseif ($dir == 'revival_order_services' && $page == 'edit') {
            include 'revival_order_services/edit.php';
        } elseif ($dir == 'revival_order_services' && $page == 'delete') {
            include 'revival_order_services/delete.php';
        } elseif ($dir == 'revival_order_services' && $page == 'report') {
            include 'revival_order_services/report.php';
        }
        // END Order Services 

        // START Revival Add New Project
        if ($dir == 'revival_add_new_project' && $page == 'add') {
            include 'revival_add_new_project/add.php';
        } elseif ($dir == 'revival_add_new_project' && $page == 'edit') {
            include 'revival_add_new_project/edit.php';
        } elseif ($dir == 'revival_add_new_project' && $page == 'delete') {
            include 'revival_add_new_project/delete.php';
        } elseif ($dir == 'revival_add_new_project' && $page == 'report') {
            include 'revival_add_new_project/report.php';
        }
        // END Revival Add New Project
        // START Courses
        if ($dir == 'courses' && $page == 'add') {
            include 'courses/add.php';
        } elseif ($dir == 'courses' && $page == 'edit') {
            include 'courses/edit.php';
        } elseif ($dir == 'courses' && $page == 'delete') {
            include 'courses/delete.php';
        } elseif ($dir == 'courses' && $page == 'report') {
            include 'courses/report.php';
        }
        // END Courses
        // START MESSAGE
        if ($dir == 'contact' && $page == 'delete') {
            include 'contact/delete.php';
        } elseif ($dir == 'contact' && $page == 'report') {
            // echo 'test test';
            include 'contact/report.php';
        }
        elseif ($dir == 'contact' && $page == 'edit') {
            // echo 'test test';
            include 'contact/edit.php';
        }
        // START BANNERS
        if ($dir == 'banner' && $page == 'add') {
            include 'banner/add.php';
        } elseif ($dir == 'banner' && $page == 'edit') {
            include 'banner/edit.php';
        } elseif ($dir == 'banner' && $page == 'delete') {
            include 'banner/delete.php';
        } elseif ($dir == 'banner' && $page == 'report') {
            include 'banner/report.php';
        }
        // START About Us
        if ($dir == 'revival_about' && $page == 'add') {
            include 'revival_about/add.php';
        } elseif ($dir == 'revival_about' && $page == 'edit') {
            include 'revival_about/edit.php';
        } elseif ($dir == 'revival_about' && $page == 'delete') {
            include 'revival_about/delete.php';
        } elseif ($dir == 'revival_about' && $page == 'report') {
            include 'revival_about/report.php';
        }

         // START Form Selection
         if ($dir == 'form_selection' && $page == 'add') {
            include 'form_selection/add.php';
        } elseif ($dir == 'form_selection' && $page == 'edit') {
            include 'form_selection/edit.php';
        } elseif ($dir == 'form_selection' && $page == 'delete') {
            include 'form_selection/delete.php';
        } elseif ($dir == 'form_selection' && $page == 'report') {
            include 'form_selection/report.php';
        }

           // START REVIVAL TERMS
           if ($dir == 'revival_terms' && $page == 'add') {
            include 'revival_terms/add.php';
        } elseif ($dir == 'revival_terms' && $page == 'edit') {
            include 'revival_terms/edit.php';
        } elseif ($dir == 'revival_terms' && $page == 'delete') {
            include 'revival_terms/delete.php';
        } elseif ($dir == 'revival_terms' && $page == 'report') {
            include 'revival_terms/report.php';
        }

        // START Revival Goals
        if ($dir == 'revival_goals' && $page == 'add') {
            include 'revival_goals/add.php';
        } elseif ($dir == 'revival_goals' && $page == 'edit') {
            include 'revival_goals/edit.php';
        } elseif ($dir == 'revival_goals' && $page == 'delete') {
            include 'revival_goals/delete.php';
        } elseif ($dir == 'revival_goals' && $page == 'report') {
            include 'revival_goals/report.php';
        }
          // START Revival Gallary
          if ($dir == 'revival_gallary' && $page == 'add') {
            include 'revival_gallary/add.php';
        } elseif ($dir == 'revival_gallary' && $page == 'edit') {
            include 'revival_gallary/edit.php';
        } elseif ($dir == 'revival_gallary' && $page == 'delete') {
            include 'revival_gallary/delete.php';
        } elseif ($dir == 'revival_gallary' && $page == 'report') {
            include 'revival_gallary/report.php';
        }

           // START Revival Gallary
           if ($dir == 'course_register' && $page == 'add') {
            include 'course_register/add.php';
        } elseif ($dir == 'course_register' && $page == 'edit') {
            include 'course_register/edit.php';
        } elseif ($dir == 'course_register' && $page == 'delete') {
            include 'course_register/delete.php';
        } elseif ($dir == 'course_register' && $page == 'report') {
            include 'course_register/report.php';
        }

           // START Company Talent
           if ($dir == 'company_talent' && $page == 'add') {
            include 'company_talent/add.php';
        } elseif ($dir == 'company_talent' && $page == 'edit') {
            include 'company_talent/edit.php';
        } elseif ($dir == 'company_talent' && $page == 'delete') {
            include 'company_talent/delete.php';
        } elseif ($dir == 'company_talent' && $page == 'report') {
            include 'company_talent/report.php';
        }
        ///////////////////////////////// START EVENT DASHBOARD ////

        if ($dir == 'main_event' && $page == 'add') {
            include 'main_event/add.php';
        } elseif ($dir == 'main_event' && $page == 'edit') {
            include 'main_event/edit.php';
        } elseif ($dir == 'main_event' && $page == 'delete') {
            include 'main_event/delete.php';
        } elseif ($dir == 'main_event' && $page == 'report') {
            include 'main_event/report.php';
        }

        ///////////// START EVENT HOME PAGE

        /// START BANNER 

        if ($dir == 'home_event/banner' && $page == 'add') {
            include 'home_event/banner/add.php';
        } elseif ($dir == 'home_event/banner' && $page == 'edit') {
            include 'home_event/banner/edit.php';
        } elseif ($dir == 'home_event/banner' && $page == 'delete') {
            include 'home_event/banner/delete.php';
        } elseif ($dir == 'home_event/banner' && $page == 'report') {
            include 'home_event/banner/report.php';
        }

        /// START ABOUT 

        if ($dir == 'home_event/about' && $page == 'add') {
            include 'home_event/about/add.php';
        } elseif ($dir == 'home_event/about' && $page == 'edit') {
            include 'home_event/about/edit.php';
        } elseif ($dir == 'home_event/about' && $page == 'delete') {
            include 'home_event/about/delete.php';
        } elseif ($dir == 'home_event/about' && $page == 'report') {
            include 'home_event/about/report.php';
        }
           // START Emails Section
           if ($dir == 'emails_section' && $page == 'add') {
            include 'emails_section/add.php';
        } elseif ($dir == 'emails_section' && $page == 'edit') {
            include 'emails_section/edit.php';
        } elseif ($dir == 'emails_section' && $page == 'delete') {
            include 'emails_section/delete.php';
        } elseif ($dir == 'emails_section' && $page == 'report') {
            include 'emails_section/report.php';
        }


         /// START REASON 

         if ($dir == 'home_event/reason' && $page == 'add') {
            include 'home_event/reason/add.php';
        } elseif ($dir == 'home_event/reason' && $page == 'edit') {
            include 'home_event/reason/edit.php';
        } elseif ($dir == 'home_event/reason' && $page == 'delete') {
            include 'home_event/reason/delete.php';
        } elseif ($dir == 'home_event/reason' && $page == 'report') {
            include 'home_event/reason/report.php';
        }

        if ($dir == 'target_category' && $page == 'add') {
            include 'target_category/add.php';
        } elseif ($dir == 'target_category' && $page == 'edit') {
            include 'target_category/edit.php';
        } elseif ($dir == 'target_category' && $page == 'delete') {
            include 'target_category/delete.php';
        } elseif ($dir == 'target_category' && $page == 'report') {
            include 'target_category/report.php';
        }

        if ($dir == 'event_speakers' && $page == 'add') {
            include 'event_speakers/add.php';
        } elseif ($dir == 'event_speakers' && $page == 'edit') {
            include 'event_speakers/edit.php';
        } elseif ($dir == 'event_speakers' && $page == 'delete') {
            include 'event_speakers/delete.php';
        } elseif ($dir == 'event_speakers' && $page == 'report') {
            include 'event_speakers/report.php';
        }

        if ($dir == 'event_sponser' && $page == 'add') {
            include 'event_sponser/add.php';
        } elseif ($dir == 'event_sponser' && $page == 'edit') {
            include 'event_sponser/edit.php';
        } elseif ($dir == 'event_sponser' && $page == 'delete') {
            include 'event_sponser/delete.php';
        } elseif ($dir == 'event_sponser' && $page == 'report') {
            include 'event_sponser/report.php';
        }

        if ($dir == 'event_add_section' && $page == 'add') {
            include 'event_add_section/add.php';
        } elseif ($dir == 'event_add_section' && $page == 'edit') {
            include 'event_add_section/edit.php';
        } elseif ($dir == 'event_add_section' && $page == 'delete') {
            include 'event_add_section/delete.php';
        } elseif ($dir == 'event_add_section' && $page == 'report') {
            include 'event_add_section/report.php';
        }

        if ($dir == 'event_programme' && $page == 'add') {
            include 'event_programme/add.php';
        } elseif ($dir == 'event_programme' && $page == 'edit') {
            include 'event_programme/edit.php';
        } elseif ($dir == 'event_programme' && $page == 'delete') {
            include 'event_programme/delete.php';
        } elseif ($dir == 'event_programme' && $page == 'report') {
            include 'event_programme/report.php';
        }
        
        ////////////////////////////////////////// END EVENT DASHBOARD ///

        // START DASHBOARD
        if ($dir == 'dashboard' && $page == 'dashboard') {
            include 'dashboard.php';
        }
        // END DASHBOARD
        // END NEW WEBSITE

        //if ($page != 'report') {
        ?>
    </div>
</div>
</div>
<?php
include $tem . 'footer.php';

ob_end_flush();
?>
<script type="text/javascript">
// customer script


var dev = $("#logo").dropify({});
dev = dev.data("dropify")
var dev2 = $("#logo2").dropify({});
dev2 = dev2.data("dropify")
var dev3 = $("#logo3").dropify({});
dev2 = dev3.data("dropify")
var dev4 = $("#logo4").dropify({});
dev4 = dev4.data("dropify")
</script>