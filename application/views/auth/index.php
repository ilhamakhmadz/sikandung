
<div class="panel">
    <div class="panel-body no-padder">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><?php echo lang('first_name'); ?></th>
					<th><?php echo lang('last_name'); ?></th>
					<th><?php echo lang('username'); ?></th>
					<th><?php echo lang('email'); ?></th>
					<th>Role</th>
					<th><?php echo lang('registered'); ?></th>
					<th style="width: 15px;">Aksi</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<?php $this->load->view('delete-modal'); ?>

<script>
var the_table;

$(document).ready(function(){
	the_table = $("#example1").DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/user/index'); ?>",
                "type": "POST"
            },
			"columns": [
				{ "data": "first_name" },
				{ "data": "last_name" },
				{
					"data": "username",
					"render": function(data, type, row, meta) {
						return '<a href="<?php echo site_url('auth/user/edit/') ?>/' + row.id + '">' + data + '</a>';
					}
				},
				{ "data": "email" },
				{ "data": "role" },
				{ "data": "registered" },
				{
					"data": "id",
					"orderable": false,
					"render": function(data, type, row, meta) {

						return '<a Onclick="return ConfirmDelete();"  class="btn btn-danger" href="<?php echo site_url('auth/user/delete/') ?>/' + row.id + '" >Hapus</a>';
					}
				}
			]
        });

});
</script>


<script>
    function ConfirmDelete()
    {
      var x = confirm("Benar akan dihapus?");
      if (x)
          return true;
      else
        return false;
    }
</script>    
