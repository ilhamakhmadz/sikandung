<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $template['metas']; ?>


    <style>
        /* Sidebar Submenu Visibility Fix */
        .metismenu .nav-second-level.collapse.in,
        .metismenu .nav-third-level.collapse.in {
            display: block !important;
            height: auto !important;
            visibility: visible !important;
        }
        .metismenu li.active > .nav-second-level.collapse,
        .metismenu li.active > .nav-third-level.collapse {
            display: block !important;
            height: auto !important;
        }
        .metismenu .nav-second-level li a {
            padding: 7px 15px 7px 52px !important;
            color: #a7b1c2 !important;
            display: block !important;
        }
        .metismenu .nav-second-level li.active a, 
        .metismenu .nav-second-level li a:hover {
            color: #ffffff !important;
            background-color: #293846 !important;
        }
        .metismenu .nav-third-level li a {
            padding-left: 62px !important;
        }
    </style>
    <title><?php echo $template['title']; ?></title>

    <link href="<?php echo css_url('bootstrap.min.css') ?>" rel="stylesheet">
    <!-- <link href="-awesome/css/-awesome.css" rel="stylesheet"> -->
    <link href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" async>

    <!-- Toastr style -->
    <link href="<?php echo css_url('plugins/toastr/toastr.min.css')?>" rel="stylesheet">

    <!-- Gritter -->
    <!-- <link href="plugins/gritter/jquery.gritter.css" rel="stylesheet"> -->

     <!-- NProgress -->
    <link href="<?php echo css_url('animate.css') ?>" rel="stylesheet" async>
    <link href="<?php echo css_url('style.css') ?>" rel="stylesheet" async>
    <script src="<?php echo js_url('jquery-3.1.1.min.js')?>"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>'; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
        var id = '<?php echo (isset($id)) ? $id : '' ?>';
    </script>

    <?php echo $template['css']; ?>
    <?php echo $template['js_header']; ?>
    <style>
        .metismenu .nav-second-level li a {
            color: #a7b1c2 !important;
        }
        .metismenu .nav-second-level li.active a {
            color: #ffffff !important;
        }
        .metismenu .nav-second-level li a:hover {
            color: #ffffff !important;
            background-color: #293846 !important;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                    <div class="dropdown profile-element">
                    <!-- <span>
                        <img alt="image" class="img-circle" src="<?php echo assets_url('img/profile_small.jpg'); ?>" />
                    </span> -->
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs">
                            <strong class="-bold"><?php echo $this->session->userdata['fullname'];?></strong>
                        </span>
                        <span class="text-muted text-xs block"><?php echo $this->session->userdata['role_name'];?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?=site_url('auth/user/edit_profile/').$this->session->userdata('id')?>">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                        <div class="logo-element">
                            SK
                        </div>
                    </li>
                    <?php

                    function set_active($menus, $curr_uri, $acl)
                    {
                        foreach ($menus as $index => $menu) {
                            $is_active = false;
                            $is_allowed = false;
                            $has_children = isset($menu['children']) and is_array($menu['children']);
                            if ($has_children) {
                                $menus[$index]['children'] = set_active($menus[$index]['children'], $curr_uri, $acl);
                                foreach ($menus[$index]['children'] as $menu_item) {
                                    if ($menu_item['is_active']) {
                                        $is_active = $is_active || true;
                                    }
                                    if ($menu_item['is_allowed']) {
                                        $is_allowed = $is_allowed || true;
                                    }
                                }
                            } else {
                                $is_active = strpos($curr_uri, $menu['uri']) === 0;
                                $is_allowed = !isset($menu['uri']) || $acl->is_allowed($menu['uri']);
                            }
                            $menus[$index]['is_active'] = $is_active;
                            $menus[$index]['is_allowed'] = $is_allowed;
                        }
                        return $menus;
                    }

                    ?>
                    <?php
                    $curr_uri = $this->uri->uri_string();
                    if (empty($curr_uri)) {
                            $curr_uri = 'home';
                    }
                    $this->load->config('navigation');
                    $navigation = set_active($this->config->item('navigation'), $curr_uri, $this->acl);
                    foreach($navigation as $nav_lvl_1):
                        $is_active = (isset($nav_lvl_1['is_active']) && $nav_lvl_1['is_active']);
                        $is_allowed = (isset($nav_lvl_1['is_allowed']) && $nav_lvl_1['is_allowed']);
                    ?>
                    <?php if ($is_allowed): ?>
                    <li class="<?= ($is_active ? 'active' : '') ?>">
                        <?php $has_children = isset($nav_lvl_1['children']) && is_array($nav_lvl_1['children']); ?>
                            <a href="<?php echo (isset($nav_lvl_1['uri']) ? site_url($nav_lvl_1['uri']) : '#') ?>"<?php if (isset($nav_lvl_1['target'])): ?> target="<?php echo $nav_lvl_1['target'] ?>"<?php endif; ?>>
                                <i class="<?php echo $nav_lvl_1['icon'] ?>"></i>
                                <span class="nav-label"><?php echo $nav_lvl_1['title'] ?></span>
                                <?php if ($has_children): ?><span class="fa arrow"></span><?php endif; ?>
                            </a>

                            <?php if ($has_children): ?>

                            <ul class="nav nav-second-level collapse <?= ($is_active ? 'in' : '') ?>">
                            <?php foreach($nav_lvl_1['children'] as $nav_lvl_2): 
                                $is_active2 = (isset($nav_lvl_2['is_active']) && $nav_lvl_2['is_active']);
                                $is_allowed2 = (isset($nav_lvl_2['is_allowed']) && $nav_lvl_2['is_allowed']);?>
                                <?php if ($is_allowed2): ?>

                                <li class="<?= ($is_active2 ? 'active' : '') ?>">
                                    <?php $has_children_2 = isset($nav_lvl_2['children']) && is_array($nav_lvl_2['children']); ?>
                                    <a href="<?php echo (isset($nav_lvl_2['uri']) ? site_url($nav_lvl_2['uri']) : '#') ?>"<?php if (isset($nav_lvl_2['target'])): ?> target="<?php echo $nav_lvl_2['target'] ?>"<?php endif; ?>>
                                        <?php echo $nav_lvl_2['title'] ?>
                                        <?php if ($has_children_2): ?><span class="fa arrow"></span><?php endif; ?>
                                    </a>
                                        <?php if ($has_children_2): ?>
                                        <ul class="nav nav-third-level collapse <?= ($is_active2 ? 'in' : '') ?>">
                                            <?php foreach ($nav_lvl_2['children'] as $nav_lvl_3): 
                                                $is_active3 = (isset($nav_lvl_3['is_active']) && $nav_lvl_3['is_active']);
                                                $is_allowed3 = (isset($nav_lvl_3['is_allowed']) && $nav_lvl_3['is_allowed']);?>
                                                <?php if ($is_allowed3): ?>
                                                    <li class="<?= ($is_active3 ? 'active' : '') ?>">
                                                        <a href="<?php echo (isset($nav_lvl_3['uri']) ? site_url($nav_lvl_3['uri']) : '#') ?>"<?php if (isset($nav_lvl_3['target'])): ?> target="<?php echo $nav_lvl_3['target'] ?>"<?php endif; ?>>
                                                            <?php echo $nav_lvl_3['title'] ?>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                            <!-- /.nav-third-level -->
                                        <?php endif; ?>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        <!-- /.nav-second-level -->
                        <?php endif; ?>
                    </li>
                    <?php endif ?>
                    <?php endforeach; ?>
                    </ul>


            </div>
        </nav>


        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                 
                </div>
                <ul class="nav navbar-top-links navbar-right">
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Sistem Informasi Perikanan Kabupaten Bandung</span>
                </li>
                <?php 
                    if($this->session->userdata('role_id') == 1): 
                ?>
                <li class="dropdown">
                    <?php 
                        $array = $this->db->get('view_notifikasi')->result_array();
                    ?>
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"><?=array_sum($array[0]) + array_sum($array[1]) + array_sum($array[2])?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php 
                            foreach( $array as $data): 
                        ?>
                        <li>
                            <a href="<?=site_url($data['url'])?>" class="dropdown-item">
                                <div>
                                    <i class="fa <?=$data['icon']?> fa-fw"></i> <?=$data['jumlah']." ".$data['nama']?>
                                    <span class="float-right text-muted small ">Belum Terverifikasi</span>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <?php endif ?>

                <li>
                        <a href="<?php echo site_url('auth/logout') ?>">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                </li>
            </ul>
            </nav>
        </div>
<br>
        
            <?php if($page_title): ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2><?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url('dashboard/home');?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?php echo (isset($site_title) || !empty($site_title)) ? $site_title : '' ?>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong><?php echo (isset($page_title) || !empty($page_title)) ? $page_title : '' ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-3">
                    <div class="pull-right" style="padding: 20px;">
                        <?php echo (isset($page_icon)) ? $page_icon : ''; ?>
                    </div>                
                </div>                
            </div>
            <?php endif; ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <?php echo $template['content']; ?>
                </div>
            </div>



        <div class="footer">
            <div class="pull-right">
                 <!-- <strong>DIDIK MAKARYO</strong>  -->
            </div>
            <div>
                <strong>Copyright</strong> Diskominfo &copy; 2020
            </div>
        </div>


    <!-- Toast notification -->

    <div class="toast toast toast-bootstrap hide" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top:20px; right:20px">
        <div class="toast-header">
            <i class="fa fa-square text-navy"> </i>
            <strong class="mr-auto m-l-sm">Notification</strong>
            <small>1 min ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
           Welcome to <strong>INSPINIA</strong> - Responsive Admin Theme.
        </div>
    </div>
    <?php echo $template['js_footer']; ?>

    <!-- Mainly scripts -->
    <script src="<?php echo js_url('popper.min.js')?>"></script>
    <script src="<?php echo js_url('bootstrap.js')?>"></script>
    <script src="<?php echo js_url('plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo js_url('plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

    <script src="<?php echo bower_url('moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo bower_url('moment/min/moment-with-locales.min.js') ?>"></script>
    <script src="<?php echo bower_url('moment/locale/id.js') ?>"></script>

    <!-- Flot -->
    <script src="<?php echo js_url('plugins/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.spline.js')?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.resize.js')?>"></script>
    <script src="<?php echo js_url('plugins/flot/jquery.flot.pie.js')?>"></script>

    <!-- Peity -->
    <script src="<?php echo js_url('plugins/peity/jquery.peity.min.js')?>"></script>
    <script src="<?php echo js_url('demo/peity-demo.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo js_url('inspinia.js')?>"></script>
    <script src="<?php echo js_url('plugins/pace/pace.min.js')?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo js_url('plugins/jquery-ui/jquery-ui.min.js')?>"></script>

    <!-- GITTER -->
    <script src="<?php echo js_url('plugins/gritter/jquery.gritter.min.js')?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo js_url('plugins/sparkline/jquery.sparkline.min.js')?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo js_url('demo/sparkline-demo.js')?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo js_url('plugins/chartJs/Chart.min.js')?>"></script>

    <!-- Toastr -->
    <script src="<?php echo js_url('plugins/toastr/toastr.min.js')?>"></script>
    <script src="<?php echo bower_url('numeral/min/numeral.min.js') ?>"></script>
 <script type="text/javascript">
      moment().locale('id');
    </script>

    <script>
        $(document).ready(function() {

            let toast = $('.toast');
            // toast.toast('show');

            // setTimeout(function() {
            //     toast.toast({
            //         delay: 5000,
            //         animation: true
            //     });
            //     toast.toast('show');

            // }, 2200);

            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            if ($("#flot-dashboard-chart").length) {
                $.plot($("#flot-dashboard-chart"), [
                    data1, data2
                ],
                        {
                            series: {
                                lines: {
                                    show: false,
                                    fill: true
                                },
                                splines: {
                                    show: true,
                                    tension: 0.4,
                                    lineWidth: 1,
                                    fill: 0.4
                                },
                                points: {
                                    radius: 0,
                                    show: true
                                },
                                shadowSize: 2
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#d5d5d5",
                                borderWidth: 1,
                                color: '#d5d5d5'
                            },
                            colors: ["#1ab394", "#1C84C6"],
                            xaxis:{
                            },
                            yaxis: {
                                ticks: 4
                            },
                            tooltip: false
                        }
                );
            }

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            if ($("#doughnutChart").length) {
                var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
            }

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            if ($("#doughnutChart2").length) {
                var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
                new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
            }

        });

        $(window).bind("scroll", function () {
            let toast = $('.toast');
            toast.css("top", window.pageYOffset + 20);

        });
    </script>
     <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>
</body>
</html>
