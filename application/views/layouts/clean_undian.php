
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
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/libs/bootstrap/css/bootstrap.min.css" media="all"/>

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

    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="<?php echo base_url()?>assets/emeet/assets/css/style-default.min.css" media="all"/>

    <script src="<?php echo base_url()?>assets/emeet/assets/js/vendor/jquery-1.12.4.min.js"></script>

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
<body  class="orange-bg">
<?php echo $template['content']; ?>
<?php echo $template['js_footer']; ?>


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

<script src="<?php echo base_url()?>assets/emeet/assets/libs/instafeed.min.js"></script>

<!-- CUSTOM SCRIPT  -->
<script src="<?php echo base_url()?>assets/emeet/assets/js/custom.script.js"></script>

<!-- <div class="lgx-switcher-loader"></div> -->
<!-- For Demo Purpose Only// Remove From Live -->
<script src="<?php echo base_url()?>assets/emeet/switcher/js/switcher.js?"></script>
<!-- For Demo Purpose Only //Remove From Live-->


</body>
</html>
