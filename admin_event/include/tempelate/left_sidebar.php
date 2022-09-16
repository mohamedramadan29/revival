  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link" target="_blank">
          <span class="brand-text font-weight-light"> <button class="btn btn-outline-primary"> زيارة
                  الموقع <i class="fa fa-globe"></i></button> </span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3" style="line-height:0">
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <li class="nav-item" id="lnk-expenses">
                      <a href="main.php?dir=dashboard&page=dashboard" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              الرئيسية
                          </p>
                      </a>
                  </li>
                  <!-- ///////////////////////// STAT EVENT DASHBOARD ///////////////  -->

                  <li class="nav-item" id="lnk-main-event">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              الاحداث الرئيسية
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-main-event">
                              <a href="main.php?dir=main_event&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-main-event">
                              <a href="main.php?dir=main_event&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الاحداث </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-main-event-page">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              صفحة الاحداث الرئيسية
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-main-event-banner">
                              <a href="main.php?dir=home_event/banner&page=add" class="nav-link">
                                  <i class="fa fa-images color7"></i>
                                  <p> البانرات </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item" id="lnk-add-home-event-banner">
                                      <a href="main.php?dir=home_event/banner&page=add" class="nav-link">
                                          <i class="fa fa-plus color2"></i>
                                          <p> اضافة </p>
                                      </a>
                                  </li>
                                  <li class="nav-item" id="lnk-rep-home-event-banner">
                                      <a href="main.php?dir=home_event/banner&page=report" class="nav-link">
                                          <i class="far fa-eye nav-icon color3"></i>
                                          <p> مشاهدة البانرات </p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-main-event-about">
                              <a href="main.php?dir=main_event&page=add" class="nav-link">
                                  <i class="fa fa-images color7"></i>
                                  <p> قسم من نحن </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item" id="lnk-add-home-event-about">
                                      <a href="main.php?dir=home_event/about&page=add" class="nav-link">
                                          <i class="fa fa-plus color2"></i>
                                          <p> اضافة </p>
                                      </a>
                                  </li>
                                  <li class="nav-item" id="lnk-rep-home-event-about">
                                      <a href="main.php?dir=home_event/about&page=report" class="nav-link">
                                          <i class="far fa-eye nav-icon color3"></i>
                                          <p> مشاهدة المحتوي </p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                         
                      </ul>

                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-main-event-reason">
                              <a href="main.php?dir=main_event&page=add" class="nav-link">
                                  <i class="fa fa-images color7"></i>
                                  <p> اسباب المشاركه </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item" id="lnk-add-home-event-reason">
                                      <a href="main.php?dir=home_event/reason&page=add" class="nav-link">
                                          <i class="fa fa-plus color2"></i>
                                          <p> اضافة </p>
                                      </a>
                                  </li>
                                  <li class="nav-item" id="lnk-rep-home-event-reason">
                                      <a href="main.php?dir=home_event/reason&page=report" class="nav-link">
                                          <i class="far fa-eye nav-icon color3"></i>
                                          <p> مشاهدة المحتوي </p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          
                      </ul>


                  </li>

                  <!-- END EVENT DASHBOARD  -->

                  <li class="nav-item" id="lnk-revival_terms">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              الشروط والاحكام
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-rev-terms">
                              <a href="main.php?dir=revival_terms&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-rev-terms">
                              <a href="main.php?dir=revival_terms&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المحتوي </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-banner">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              البانرات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-banner">
                              <a href="main.php?dir=banner&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة بانر جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-banner">
                              <a href="main.php?dir=banner&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع البانرات </p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item" id="lnk-revival_about">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              قسم من نحن
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-rev-about">
                              <a href="main.php?dir=revival_about&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-rev-about">
                              <a href="main.php?dir=revival_about&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المحتوي </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item" id="lnk-revival_goals">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              قسم الاهداف
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-rev-goals">
                              <a href="main.php?dir=revival_goals&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-rev-goals">
                              <a href="main.php?dir=revival_goals&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الاهداف </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-target-category">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              قسم الفئات المستهدفه
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-target-category">
                              <a href="main.php?dir=target_category&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-target-category">
                              <a href="main.php?dir=target_category&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المحتوي </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-event_speakers">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                            قسم المتحدثين
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-event_speakers">
                              <a href="main.php?dir=event_speakers&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-event_speakers">
                              <a href="main.php?dir=event_speakers&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المتحدثين </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-event_sponser">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                            قسم الرعاه
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-event_sponser">
                              <a href="main.php?dir=event_sponser&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-event_sponser">
                              <a href="main.php?dir=event_sponser&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الرعاه </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-event_add_section">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                            اقسام اضافية
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-event_add_section">
                              <a href="main.php?dir=event_add_section&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-event_add_section">
                              <a href="main.php?dir=event_add_section&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة  المحتوي </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-revival_gallary">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              قسم الصور
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-rev-gallary">
                              <a href="main.php?dir=revival_gallary&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-rev-gallary">
                              <a href="main.php?dir=revival_gallary&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المعرض </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-selection-forms">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              اختيارات الفورم
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-selection">
                              <a href="main.php?dir=form_selection&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-selection">
                              <a href="main.php?dir=form_selection&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الاختيارات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-revival-register">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              تسجيلات ريفايفال
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-revival-register">
                              <a href="main.php?dir=revival_register&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة التسجيلات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-art-register">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              تسجيلات الذكاء الإصطناعي
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-art-register">
                              <a href="main.php?dir=art_register&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة التسجيلات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-sport-register">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              تسجيلات الرياضة
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-sport-register">
                              <a href="main.php?dir=sport_register&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة التسجيلات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-fash-register">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              تسجيلات الازياء
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-fash-register">
                              <a href="main.php?dir=fash_register&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة التسجيلات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-company-talent">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              المواهب المسجلة من وسيط
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-company-talent">
                              <a href="main.php?dir=company_talent&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المواهب </p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item" id="lnk-revival_order">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              طلب الخدمات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-revival_order">
                              <a href="main.php?dir=revival_order_services&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة الطلبات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-revival_add_new_project">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              المشاريع الجديدة
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-revival_add_new_project">
                              <a href="main.php?dir=revival_add_new_project&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة المشاريع </p>
                              </a>
                          </li>
                      </ul>
                  </li>



                  <li class="nav-item" id="lnk-articles">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              المقالات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-article">
                              <a href="main.php?dir=articles&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة مقال جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-article">
                              <a href="main.php?dir=articles&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع المقالات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-news">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              الاخبار
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-news">
                              <a href="main.php?dir=news&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة خبر جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-news">
                              <a href="main.php?dir=news&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع الاخبار </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item" id="lnk-courses">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              الكورسات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-course">
                              <a href="main.php?dir=courses&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة كورس جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-courses">
                              <a href="main.php?dir=courses&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع الكورسات </p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item" id="lnk-course-register">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              تسجيلات الكورسات
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item" id="lnk-rep-course-register">
                              <a href="main.php?dir=course_register&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة التسجيلات </p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item" id="lnk-repair">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-images color2"></i>
                          <p>
                              الاسئلة الشائعه
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-add-repair">
                              <a href="main.php?dir=faqs&page=add" class="nav-link">
                                  <i class="fa fa-plus color2"></i>
                                  <p> اضافة سوال جديد </p>
                              </a>
                          </li>
                          <li class="nav-item" id="lnk-rep-repair">
                              <a href="main.php?dir=faqs&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع الاسئلة </p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item" id="lnk-message">
                      <a href="#" class="nav-link nav-link2">
                          <i class="fa-solid fa-envelope color2"></i>
                          <p>
                              الرسائل
                              <i class="right fas fa-angle-left "></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item" id="lnk-message-watch">
                              <a href="main.php?dir=contact&page=report" class="nav-link">
                                  <i class="far fa-circle nav-icon color3"></i>
                                  <p> مشاهدة جميع الرسائل </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="signout.php" class="nav-link">
                          <i class="fa-solid fa-arrow-right-from-bracket color11"></i>
                          <p>
                              <?php echo $lang['logout']; ?>
                              <i class=""></i>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>