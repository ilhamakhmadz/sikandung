
<div id="delete-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Konfirmasi ?</h3>
			</div>
			<div class="modal-body">
				<p>Anda yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<a id="delete-modal-cancel" href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
				<a id="delete-modal-continue" href="#" class="btn btn-danger">Lanjutkan</a>
			</div>
		</div>
	</div>
</div>
<script>
$('body').on('click', '[data-button=delete]', function(e) {
	$('#delete-modal-continue').attr('href', $(this).attr('href'));
	$('#delete-modal').modal('show');
	e.preventDefault();
});
</script>