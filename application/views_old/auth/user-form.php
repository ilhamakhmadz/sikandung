<style>
	.select2-container--default .select2-selection--single .select2-selection__rendered {
   		color: #444;
		line-height: 22px;
	}
	.select2-container .select2-selection--single {
		box-sizing: border-box;
		cursor: pointer;
		display: block;
		height: 37px;
		user-select: none;
		-webkit-user-select: none;
	}

</style>



<div class="panel">
    <div class="panel-body no-padder">
		<form class="form-horizontal box" method="post">
			<fieldset>
				<br>
				<?php echo $form->fields(); ?>
			</fieldset>
			<?php
			echo form_actions(array(
				array(
					'id' => 'save-button',
					'value' => lang('save'),
					'class' => 'btn-primary'
				),
				array(
					'id' => 'cancel-button',
					'value' => lang('cancel')
				)
			));
			?>
		</form>
	</div>
</div>


<script>
	$( document ).ready(function() {
		// $('#kec_id').select2();
		$('#kec_id').prop( "disabled", true );
		$('#desa_id').prop( "disabled", true );
		$('#level_id').change(function() {
			if($('#level_id').val() == "1"){
				$('#kec_id').prop( "disabled", true );
				$('#desa_id').prop( "disabled", true );
			}else if($('#level_id').val() == "2"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", true );
			}else if($('#level_id').val() == "3"){
				$('#kec_id').prop( "disabled", false );
				$('#desa_id').prop( "disabled", false );
			}
		});

	});

	$('select[name=kec_id]').on('change', function() {
		$('select[name=desa_id]').empty();
		$('select[name=desa_id]').select2({
		ajax: {
			url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kec_id]').val(),
			dataType: 'json',
			data: function(param) {
			return {
				delay: 0.3,
				q: param.term
			}
			},
			processResults: function(data) {
			return {
				results: $.map(data.items || data, function(obj) {
				return {
					id: obj.Kd_Desa,
					text: obj.text,
				}
				})
			}
			},
			cache: false,
			minimumInputLength: 3,

		}
		});
	});


</script>