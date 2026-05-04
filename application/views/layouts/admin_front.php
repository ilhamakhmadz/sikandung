<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $template['metas']; ?>


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
</head>

<body>
    <div id="wrapper">
        


        <div id="page-wrapper" class="gray-bg" style="margin: 0px;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <ul class="nav navbar-top-links navbar-right">
                    <li style="padding: 20px">
                        <span class="m-r-sm text-muted welcome-message">Sistem Informasi Perikanan Kabupaten Bandung</span>
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
