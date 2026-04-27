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
    <!-- jQuery -->
    <script src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
     <!-- Font Awesome -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <link href="<?php echo css_url('plugins/datapicker/datepicker3')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo css_url('animate.css') ?>" rel="stylesheet">
    <link href="<?php echo css_url('style.css') ?>" rel="stylesheet">
    <script>
        var base_url = '<?php echo site_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
    </script>

    <?php echo $template['css']; ?>
    <?php echo $template['js_header']; ?>

</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="<?php echo assets_url('img/profile_small.jpg'); ?>" />
                    </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                            <strong class="font-bold"><?php echo $this->session->userdata['first_name'].' '. $this->session->userdata['last_name'];?></strong>
                        </span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?=site_url('dashboard/home')?>">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <?php
			$this->load->config('navigation');
			$navigation = $this->config->item('navigation');
			foreach($navigation as $nav_lvl_1):
			?>
            <li>
				<?php $has_children = isset($nav_lvl_1['children']) && is_array($nav_lvl_1['children']); ?>
                   <a href="<?php echo (isset($nav_lvl_1['uri']) ? site_url($nav_lvl_1['uri']) : '#') ?>"<?php if (isset($nav_lvl_1['target'])): ?> target="<?php echo $nav_lvl_1['target'] ?>"<?php endif; ?>>
				    	<i class="<?php echo $nav_lvl_1['icon'] ?>"></i>
						<span class="nav-label"><?php echo $nav_lvl_1['title'] ?></span>
						<?php if ($has_children): ?><span class="fa arrow"></span><?php endif; ?>
					</a>

					<?php if ($has_children): ?>
                    <ul class="nav nav-second-level collapse">
					<?php foreach($nav_lvl_1['children'] as $nav_lvl_2): ?>
						<li>
							<?php $has_children_2 = isset($nav_lvl_2['children']) && is_array($nav_lvl_2['children']); ?>
                            <a href="<?php echo (isset($nav_lvl_2['uri']) ? site_url($nav_lvl_2['uri']) : '#') ?>"<?php if (isset($nav_lvl_2['target'])): ?> target="<?php echo $nav_lvl_2['target'] ?>"<?php endif; ?>>
                                <?php echo $nav_lvl_2['title'] ?>
								<?php if ($has_children_2): ?><span class="fa arrow"></span><?php endif; ?>
							</a>
								<?php if ($has_children_2): ?>
								<ul class="nav nav-third-level">
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
    </nav>


<div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo assets_url('img/a7.jpg'); ?>">
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo assets_url('img/a4.jpg'); ?>">
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo assets_url('img/profile.jpg'); ?>">
                                </a>
                                <div>
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="<?php echo site_url('auth/logout') ?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

            </nav>
        </div>


        <?php echo $template['content']; ?>



        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script> -->

    <?php echo $template['js_footer']; ?>


 <!-- Mainly scripts -->
    <script src="<?php echo js_url('bootstrap.min.js') ?>"></script>
    <script src="<?php echo js_url('plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?php echo js_url('plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <!-- Flot -->
    <script src="<?php echo js_url('plugins/flot/jquery.flot.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.tooltip.min.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.spline.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.resize.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.symbol.js') ?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.time.js') ?>"></script>

    <!-- datapicker -->

    <script src="<?php echo js_url('plugins/datapicker/bootstrap-datepicker.js') ?>"></script>

    <!-- Peity -->
    <script src="<?php echo js_url('plugins/peity/jquery.peity.min.js') ?>"></script>
    <script src="<?php echo js_url('demo/peity-demo.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo js_url('inspinia.js') ?>"></script>
    <script src="<?php echo js_url('plugins/pace/pace.min.js') ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo js_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

    <!-- Jvectormap -->
    <script src="<?php echo js_url('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') ?>"></script>
    <script src="<?php echo js_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>

    <!-- EayPIE -->
    <script src="<?php echo js_url('plugins/easypiechart/jquery.easypiechart.js') ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo js_url('plugins/sparkline/jquery.sparkline.min.js') ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo js_url('demo/sparkline-demo.js') ?>"></script>
    <!-- <script src="<?php echo js_url('custom.min.js') ?>"></script> -->

    <script>

        $(document).ready(function () {

            var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
            $('.sidebar-collapse ul li').find('a').filter(function () {
                return this.href == CURRENT_URL;
            }).parent('.sidebar-collapse ul li').addClass('active');
        });
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
</script>
<script>
        $(document).ready(function() {


            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            });
    </script>
</body>
</html>

