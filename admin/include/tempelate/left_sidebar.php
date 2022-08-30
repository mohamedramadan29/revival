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
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item" id="lnk-expenses">
                      <a href="main.php?dir=dashboard&page=dashboard" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              <?php echo $lang['dashboard']; ?>
                          </p>
                      </a>
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