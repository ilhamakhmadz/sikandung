<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h5 class="logo-name">CV</h5>

            </div>
			<fieldset>
				<!-- <legend><?php echo lang('account'); ?></legend>
				<?php echo $form->fields(); ?> -->
			</fieldset>
            <h3>Register to Design CV</h3>
            <p>Create account to see it in action.</p>
            <form role="form" method="post">
				<?php echo $form->fields(); ?>
				<button type="submit" class="btn btn-primary block full-width m-b">Register</button>

				<p class="text-muted text-center"><small>Already have an account?</small></p>
				<a class="btn btn-sm btn-white btn-block" href="<?php echo site_url('auth/login') ?>">Login</a>
			</form>
			<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$( document ).ready(function() {
		$('label').remove();
		$('div').removeClass('col-sm-8');
	});
	</script>
