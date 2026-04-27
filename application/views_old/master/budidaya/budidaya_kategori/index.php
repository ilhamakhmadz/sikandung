<div class="panel">
    <div class="panel-body no-padder">
<!--        <h4><i class="fa fa-table"></i> --><?php //echo lang('users')  ?><!--Manage</h4>-->
        <table id="dataTable_budidaya_kategori" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 20px;">No</th>
                    <th style="width: 250px;">Nama</th>
                    <th style="text-align:center; width: 20px;">Action</th>
                </tr>
            </thead>
            <tbody style="">
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('delete-modal'); ?>

<script>
    var the_table;
    $(window).on('load',function () {
        the_table = $("#dataTable_budidaya_kategori").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/master/budidaya/Api_budidaya_kategori'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "budidaya_kategori_id",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "budidaya_kategori_nama"},
                {
                    "data": "budidaya_kategori_id",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-primary btn-sm" href="<?php echo site_url('master/budidaya/budidaya_kategori/edit') ?>/' + row.budidaya_kategori_id + '" title="Ubah Data" data-button="view"><i class="glyphicon glyphicon-edit"></i></a>\n\
                        <button href="" onclick="deleteItem('+ row.budidaya_kategori_id +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\n\
                        </div>';
                    }
                }
            ]
        });
    });

    function deleteItem($id){

		swal({
				title: "Apakah Anda Yakin?",
				// text: "Setelah dihapus, Data hanya dapat dipulihkan di database!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Data berhasil dihapus!", {
					icon: "success",
					});

					window.location = site_url + "api/master/budidaya/Api_budidaya_kategori/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>