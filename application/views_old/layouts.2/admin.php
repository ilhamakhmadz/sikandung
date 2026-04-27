<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $template['metas']; ?>

    <title><?php echo $template['title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

     <!-- Font Awesome -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo bower_url('nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo bower_url('select2/dist/css/select2.min.css') ?>" rel="stylesheet">

    <?php echo $template['css']; ?>

    <!-- bootstrap-progressbar -->
    <link href="<?php echo bower_url('bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo bower_url('jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo bower_url('daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo css_url('custom.min.css') ?>" rel="stylesheet">

   <script src="<?php echo js_url('jquery-1.11.2.min.js') ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
     <!-- jQuery -->
     <!-- <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script> -->

	<?php echo $template['js_header']; ?>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url('/') ?>" class="site_title"><i class="fa fa-paw"></i> <?php echo $template['title']; ?></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/img/didik.jpg') ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata['first_name'].' '. $this->session->userdata['last_name'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
						<?php
						$this->load->config('navigation');
						$navigation = $this->config->item('navigation');
						foreach($navigation as $nav_lvl_1):
						?>
                        <li>
							<?php $has_children = isset($nav_lvl_1['children']) && is_array($nav_lvl_1['children']); ?>
                            <a href="<?php echo (isset($nav_lvl_1['uri']) ? site_url($nav_lvl_1['uri']) : '#') ?>"<?php if (isset($nav_lvl_1['target'])): ?> target="<?php echo $nav_lvl_1['target'] ?>"<?php endif; ?>>
								<i class="<?php echo $nav_lvl_1['icon'] ?>"></i>
								<?php echo $nav_lvl_1['title'] ?>
								<?php if ($has_children): ?><span class="fa fa-chevron-down"></span><?php endif; ?>
							</a>

							<?php if ($has_children): ?>
							<ul class="nav child_menu">
								<?php foreach($nav_lvl_1['children'] as $nav_lvl_2): ?>
								<li>
									<?php $has_children_2 = isset($nav_lvl_2['children']) && is_array($nav_lvl_2['children']); ?>
                                    <a href="<?php echo (isset($nav_lvl_2['uri']) ? site_url($nav_lvl_2['uri']) : '#') ?>"<?php if (isset($nav_lvl_2['target'])): ?> target="<?php echo $nav_lvl_2['target'] ?>"<?php endif; ?>>
										<?php echo $nav_lvl_2['title'] ?>
										<?php if ($has_children_2): ?><span class="fa fa-chevron-down"></span><?php endif; ?>
									</a>

									<?php if ($has_children_2): ?>
									<ul class="nav child_menu">
										<?php foreach ($nav_lvl_2['children'] as $nav_lvl_3): ?>
										<li>
											<a href="<?php echo (isset($nav_lvl_3['uri']) ? site_url($nav_lvl_3['uri']) : '#') ?>"<?php if (isset($nav_lvl_3['target'])): ?> target="<?php echo $nav_lvl_3['target'] ?>"<?php endif; ?>>
												<?php echo $nav_lvl_3['title'] ?>
											</a>
										</li>
										<?php endforeach; ?>
									</ul>
                                    <!-- /.nav-third-level -->
									<?php endif; ?>
                                </li>
								<?php endforeach; ?>
							</ul>
                            <!-- /.nav-second-level -->
							<?php endif; ?>
                        </li>
						<?php endforeach; ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <!-- <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <!-- <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li> -->

                    <a class="dropdown-toggle" data-toggle="dropdown">
                     <!-- <img src="<?php echo base_url('assets/img/didik.jpg') ?>" alt="" style="border-radius: 0%;"> -->
                     <span><?php echo $this->session->userdata['first_name'].' '. $this->session->userdata['last_name'];?></span>
                     <i class="caret"></i>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?php echo site_url('auth/user/edit_profile/').$this->session->userdata['id']; ?>"><i class="icon-user-plus"></i> Profile</a></li>
                        <li> <a href="<?php echo site_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <!-- <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span> -->
                    <span class="label bg-green">Online</span>
                  </a>
                  <!-- <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul> -->
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <!-- /top navigation -->
        <?php if (isset($ui_controller)) { ?>
        <div class="right_col" role="main">
            <div class="">
        <?php } else { ?>
                    <div class="right_col" role="main">
            <div class="">
                    <?php } ?>
                        <div class="title_left">
                            <h3><?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?></h3>
                        </div>
                        <div class="title_right">
                            <!-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div> -->
                        </div>
                </div>
                <?php echo $template['content']; ?>

        </div>





			<!-- Footer -->
            <footer>
            <div class="pull-right">
              Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script> -->

    <?php echo $template['js_footer']; ?>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="<?php echo js_url('jquery-1.11.2.min.js') ?>"></script> -->



    <!-- <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script> -->

   <!-- Bootstrap -->
    <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo bower_url('fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo bower_url('nprogress/nprogress.js') ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo bower_url('Chart.js/dist/Chart.min.js') ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo bower_url('gauge.js/dist/gauge.min.js') ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo bower_url('bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo bower_url('iCheck/icheck.min.js') ?>"></script>
    <!-- Skycons -->
    <!-- <script src="<?php echo bower_url('skycons/skycons.js') ?>"></script> -->

     <!-- Metis Menu Plugin JavaScript -->
     <script src="<?php echo bower_url('metisMenu/dist/metisMenu.min.js') ?>"></script>

    <script src="<?php echo bower_url('select2/dist/js/select2.min.js') ?>"></script>

    <!-- Flot -->
    <script src="<?php echo bower_url('Flot/jquery.flot.js') ?>"></script>
    <script src="<?php echo bower_url('Flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo bower_url('Flot/jquery.flot.time.js') ?>"></script>
    <script src="<?php echo bower_url('Flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?php echo bower_url('Flot/jquery.flot.resize.js') ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo bower_url('flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?php echo bower_url('flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
    <script src="<?php echo bower_url('flot.curvedlines/curvedLines.js') ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo bower_url('DateJS/build/date.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo bower_url('jqvmap/dist/jquery.vmap.js') ?>"></script>
    <script src="<?php echo bower_url('jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
    <script src="<?php echo bower_url('jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo bower_url('moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo bower_url('daterangepicker/daterangepicker.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo js_url('custom.min.js') ?>"></script>

  </body>
</html>

