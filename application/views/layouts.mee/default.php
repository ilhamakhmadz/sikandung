<!DOCTYPE html>
<html lang="<?php echo $this->session->userdata('lang') ?>">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

<?php echo $template['metas']; ?>

<title><?php echo $template['title']; ?></title>
<link rel="shortcut icon" href="<?php echo assets_url('images/logo.png');?>">

<!-- Google Font-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,900,900italic,700italic%7COswald:400,300,700' rel='stylesheet' type='text/css'>

<!-- Design Style -->
<link rel="stylesheet" type="text/css" href="<?php echo css_url('scroll.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url('meestyle.css') ?>" />
<!-- Icon -->
<link rel="stylesheet" type="text/css" href="<?php echo css_url('font-awesome.css') ?>" />
<!-- Portfolio Thumbnail / Slider -->
<link rel="stylesheet" type="text/css" href="<?php echo css_url('portfolio.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url('carousel.css') ?>">
<!-- Responsive -->
<link rel="stylesheet" type="text/css" href="<?php echo css_url('responsive.css') ?>" />
<!-- Pie Chart / Skills -->
<script type="text/javascript" src="<?php echo js_url('jquery-2.0.3.min.js') ?>"></script>
<!-- Send Email -->
<script type="text/javascript" src="<?php echo js_url('sendemail.js') ?>"></script>
<!-- Progressbar / Skills-->
<script type="text/javascript" src="<?php echo js_url('progressbar.js') ?>"></script>
<!-- Portfolio-->
<script src="<?php echo js_url('modernizr.custom.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo css_url('mee_custom.css') ?>" />
<?php echo $template['css']; ?>
<?php echo $template['js_header']; ?>
</head>
<body>
<div id="container" class="container">
  <!-- Left Menu / Logo-->
  <aside class="menu" id="menu">
    <div class="logo">
      <!-- Logo image-->
      <img src="<?php echo assets_url('images/logo.png'); ?>" width="140" height="140" alt=""/>
      <!-- Logo name-->
      <span>Andrew Smith</span></div>
    <!-- Mobile Navigation-->
    <a href="#menu1" class="menu-link"></a>
    <!-- Left Navigation-->
    <nav id="menu1" role="navigation">
        <a href="#chapterintroduction">
            <span id="link_introduction" class="active">Home</span>
        </a>
        <a href="#chapterabout">
            <span id="link_about">About</span>
        </a>
        <a href="#chapterskills">
            <span id="link_skills">Skills</span>
        </a>
        <a href="#chapterexperience">
            <span id="link_experience">Experience</span>
        </a>
        <a href="#chaptereducation">
            <span id="link_education">Education</span>
        </a>
        <a href="#chapterportfolio">
            <span id="link_portfolio">Portfolio</span>
        </a>
        <a href="#chaptercontact">
            <span id="link_contact">Contact</span>
        </a>
        <a href="blog.html">
            <span id="link_blog">Blog</span>
        </a>
    </nav>
    <div class="social"> <a href="https://www.facebook.com" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a> <a href="https://plus.google.com" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a> </div>
    <!-- <div class="copyright"> © Andrew Smith.<br>
      All Rights Reserved. </div> -->
  </aside>


<?php echo $template['content']; ?>

<?php echo $template['js_footer']; ?>

<script type="text/javascript" src="<?php echo js_url('jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('head.min.js');?>"></script>
<!-- Portfolio Thumbnail -->
<script type="text/javascript" src="<?php echo js_url('imagesloaded.min.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('masonry.min.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('class_helper.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('grid_gallery.js');?>"></script>
<!-- Portfolio Grid -->
<script>
    new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
</script>
<!-- Portfolio Slider-->
<script type="text/javascript"  src="<?php echo js_url('carousel.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('jquery.easypiechart.js');?>"></script>
<script type="text/javascript" src="<?php echo js_url('text.rotator.js');?>"></script>
<!-- Page Scrolling -->
<script>
head.js(
		{ mousewheel : "<?php echo js_url('jquery.mousewheel.js');?>" },
		{ mwheelIntent : "<?php echo js_url('mwheelIntent.js');?>" },
		{ jScrollPane : "<?php echo js_url('jquery.jscrollpane.min.js');?>" },
		{ history : "<?php echo js_url('jquery.history.js');?>" },
		{ stringLib : "<?php echo js_url('core.string.js');?>" },
		{ easing : "<?php echo js_url('jquery.easing.1.3.js');?>" },
		{ smartresize : "<?php echo js_url('jquery.smartresize.js');?>" },
		{ page : "<?php echo js_url('jquery.page.js');?>" }
		);
</script>
<!-- Fit Video -->
<script type="text/javascript"  src="<?php echo js_url('jquery.fitvids.js');?>"></script>
<!-- All Javascript Component-->
<script src="<?php echo js_url('settings.js');?>"></script>
</body>
</html>