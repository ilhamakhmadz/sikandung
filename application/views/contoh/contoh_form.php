<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Contoh <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">H <?php echo form_error('h') ?></label>
            <input type="text" class="form-control" name="h" id="h" placeholder="H" value="<?php echo $h; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">J <?php echo form_error('j') ?></label>
            <input type="text" class="form-control" name="j" id="j" placeholder="J" value="<?php echo $j; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('contoh') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>