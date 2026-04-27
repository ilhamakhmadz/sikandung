
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title><?php echo $template['title']; ?></title>

    <meta name="description" content="Responsive EventHunt HTML Template"/>
    <meta name="keywords" content="Bootstrap3, Event,  Conference, Meetup, Template, Responsive, HTML5"/>
    <meta name="author" content="themearth.com"/>

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@yourtwitterusername"/>
    <meta name="twitter:creator" content="@yourtwitterusername"/>
    <meta name="twitter:url" content="http://yourdomain.com"/>
    <meta name="twitter:title" content="Your home page title, max 140 char"/>
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="Your site description, maximum 140 char "/>
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="<?php echo base_url()?>assets/emeet/assets/img/twittercardimg/twittercard-280-150.jpg"/>
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Your home page title"/>
    <meta property="og:url" content="http://your domain here.com"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="Your site name here"/>
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="<?php echo base_url()?>assets/emeet/assets/img/opengraph/fbphoto.jpg"/>
    <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends from here -->

    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/emeet/assets/img/favicon.png"/>
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/emeet/assets/img/favicon.png"/>
    <!-- this icon shows in browser toolbar -->
    <!-- <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url()?>assets/emeet/assets/img/favicon/manifest.json"> -->
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/bootstrap/css/bootstrap.min.css" media="all"/>
    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/css/style-default.min.css" media="all"/>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/fontawesome/css/font-awesome.min.css" media="all"/>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/maginificpopup/magnific-popup.css" media="all"/>

    <!-- Time Circle -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/timer/TimeCircles.css" media="all"/>

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/owlcarousel/owl.carousel.min.css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/owlcarousel/owl.theme.default.min.css" media="all" />

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:400,700%7cRaleway:300,400,400i,500,600,700,900"/>


    <script src="<?php echo base_url()?>assets/emeet/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--jquery validation-->
    <script src="<?php echo bower_url('jquery-validation/dist/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo bower_url('jquery-validation/src/localization/messages_id.js') ?>"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">


    <!-- MODERNIZER CSS  -->
    <script src="<?php echo base_url()?>assets/emeet/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <script>
        var base_url = '<?php echo base_url(); ?>' + "/"; // get base url without index.php
        var site_url = '<?php echo site_url(); ?>' + "/"; // get site url with index.php
    </script>

    <?php echo $template['css']; ?>
    <?php echo $template['js_header']; ?>
</head>

<body class="home">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="lgx-container ">
<!-- ***  ADD YOUR SITE CONTENT HERE *** -->


<!--HEADER-->
<header>
    <div id="lgx-header" class="lgx-header">
        <div class="lgx-header-position lgx-header-position-white lgx-header-position-fixed "> <!--lgx-header-position-fixed lgx-header-position-white lgx-header-fixed-container lgx-header-fixed-container-gap lgx-header-position-white-->
            <div class="lgx-container-fluid"> <!--lgx-container-fluid-->
                <nav class="navbar navbar-default lgx-navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="lgx-logo">
                            <a href="#" class="lgx-scroll">
                            <img src="<?php echo base_url()?>assets/emeet/assets/img/logo.png" alt="Eventhunt Logo"/>
                            </a>
                        </div>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <div class="lgx-nav-right navbar-right">
                            <div class="lgx-cart-area">
                                <a class="lgx-btn lgx-btn-red lgx-scroll" href="<?php echo base_url()?>#lgx-registration">Buy Ticket</a>
                            </div>
                        </div>
                        <ul class="nav navbar-nav lgx-nav navbar-right">
                        <li><a href="<?php echo base_url()?>#lgx-parallax-banner" class="lgx-scroll" >Beranda </a></li>
                        <li><a href="<?php echo base_url()?>#lgx-about" class="lgx-scroll" >Tentang </a></li>
                        <li><a class="lgx-scroll" href="<?php echo base_url()?>#lgx-speakers">Bintang Tamu</a></li>
                        <li><a class="lgx-scroll" href="<?php echo base_url()?>#lgx-schedule">Acara</a></li>
                        <li><a class="lgx-scroll" href="<?php echo base_url()?>#lgx-travelinfo">Sponsor</a></li>
                        <li><a class="lgx-scroll" href="<?php echo base_url()?>#lgx-photo-gallery">Info</a></li>
                        <li><a class="lgx-scroll" href="<?php echo base_url()?>#lgx-footer">Kontak</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </nav>
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</header>
<!--HEADER END-->




<?php echo $template['content']; ?>

<?php echo $template['js_footer']; ?>




<!--FOOTER-->
<footer>
    <div id="lgx-footer" class="lgx-footer"> <!--lgx-footer-white-->
        <div class="lgx-inner-footer">
            <div class="container">
                <div class="lgx-footer-area">
                    <div class="lgx-footer-single">
                    <a class="logo" href="#"><img src="<?php echo base_url()?>assets/emeet/assets/img/footer-logo.png" alt="Logo"></a>

                    </div> <!--//footer-area-->
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">Lokasi Acara</h3>
                        <h4 class="date">
                            24 - 25 Agustus, 2019
                        </h4>
                        <address>
                            Gedung Budaya Sabilulungan <br>
                            Jl. Raya Soreang No.104, Pamekaran, Kec. Soreang, Bandung, Jawa Barat 40912
                        </address>
                        <a id="myModalLabel2" data-toggle="modal"  class="map-link" href="https://www.google.com/maps/place/Gedung+Budaya+Sabilulungan/@-7.0208214,107.5306154,15z/data=!4m5!3m4!1s0x0:0x67a5f639a74fa907!8m2!3d-7.0208214!4d107.5306154" target="blank"><i class="fa fa-map-marker" aria-hidden="true"></i> View Map location</a>
                    </div>
                    <div class="lgx-footer-single">
                        <h3 class="footer-title">Follow Us</h3>
                        <p class="text">
                            Kamu dapat mengikuti sosial media kami <br> untuk berita terupdate
                        </p>
                        <ul class="list-inline lgx-social-footer">
                            <li><a href="https://www.facebook.com/sabilulumpatofficial" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/sabilulumpatofficial" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!--<div class="lgx-footer-single">
                        <h2 class="footer-title">Instagram Feed</h2>
                        <div id="instafeed">
                        </div>
                    </div>-->
                </div>
                <!-- Modal-->
                <div id="lgx-modal-map" class="modal fade lgx-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="lgxmapcanvas map-canvas-default" id="map_canvas"> </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- //.Modal-->

                <div class="lgx-footer-bottom">
                    <div class="lgx-copyright">
                        <p> <span>©</span> 2019 powered by <a href="http://diskominfo.bandungkab.go.id/" target="_blank">Diskominfo Kab Bandung.</a></p>
                    </div>
                </div>

            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.footer Middle -->
    </div>
</footer>
<!--FOOTER END-->


</div>
<!--//.LGX SITE CONTAINER-->
<!-- *** ADD YOUR SITE SCRIPT HERE *** -->
<!-- JQUERY  -->

<!-- BOOTSTRAP JS  -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/bootstrap/js/bootstrap.min.js"></script>

<!-- Smooth Scroll  -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/jquery.smooth-scroll.js"></script>

<!-- SKILLS SCRIPT  -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/jquery.validate.js"></script>

<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="<?php echo base_url()?>assets/emeet/assets/libs/gmap/jquery.googlemap.js"></script>

<!-- adding magnific popup js library -->
<script type="text/javascript" src="<?php echo base_url()?>assets/emeet/assets/libs/maginificpopup/jquery.magnific-popup.min.js"></script>

<!-- Owl Carousel  -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/owlcarousel/owl.carousel.min.js"></script>

<!-- COUNTDOWN   -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/countdown.js"></script>
<script src="<?php echo base_url()?>assets/emeet/assets/libs/timer/TimeCircles.js"></script>

<!-- Counter JS -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/waypoints.min.js"></script>
<script src="<?php echo base_url()?>assets/emeet/assets/libs/counterup/jquery.counterup.min.js"></script>

<!-- SMOTH SCROLL -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="<?php echo base_url()?>assets/emeet/assets/libs/jquery.easing.min.js"></script>

<!-- type js -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/typed/typed.min.js"></script>

<!-- header parallax js -->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/header-parallax.js"></script>

<!-- instafeed js -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>-->
<script src="<?php echo base_url()?>assets/emeet/assets/libs/instafeed.min.js"></script>

<!-- CUSTOM SCRIPT  -->
<script src="<?php echo base_url()?>assets/emeet/assets/js/custom.script.js"></script>

<!-- <div class="lgx-switcher-loader"></div> -->
<!-- For Demo Purpose Only// Remove From Live -->
<script src="<?php echo base_url()?>assets/emeet/switcher/js/switcher.js?"></script>
<!-- For Demo Purpose Only //Remove From Live-->

<script src="<?php echo js_url('utils/upload')?>" type="text/javascript"></script>

<script src="<?php echo bower_url('moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo bower_url('moment/min/moment-with-locales.min.js') ?>"></script>
    <script src="<?php echo bower_url('moment/locale/id.js') ?>"></script>
    <script src="<?php echo bower_url('sweetalert/dist/sweetalert.min.js')?>"></script>
<script>
jQuery.extend(jQuery.validator.messages, {
    required: "Kolom ini tidak boleh kosong.",
    remote: "Mohon memasukkan data yang sesuai.",
    email: "Mohon masukkan email yang sesuai.",
    url: "Mohon masukkan URL yang calid",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Data yang anda masukkan tidak boleh lebih {0} karakter."),
    minlength: jQuery.validator.format("Data yang anda masukkan tidak boleh kurang {0} karakter."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Mohon maukkan angka lebih dari {0} karakter."),
    min: jQuery.validator.format("Mohon maukkan angka kurang dari {0} karakter")
});
</script>
</body>
</html>
