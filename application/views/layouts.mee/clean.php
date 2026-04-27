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
    <link href="<?php echo css_url('animate.css') ?>" rel="stylesheet">
    <link href="<?php echo css_url('style.css') ?>" rel="stylesheet">
</head>
<body  class="gray-bg">


<?php echo $template['content']; ?>



<!-- Mainly scripts -->
   <script src="<?php echo js_url('jquery-3.1.1.min.js') ?>"></script>
   <script src="<?php echo js_url('bootstrap.min.js') ?>"></script>


</body>
</html>

