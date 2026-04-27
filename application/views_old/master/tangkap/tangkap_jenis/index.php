<div class="panel">
    <div class="panel-body no-padder">
        <table id="dataTable_tangkap_jenis" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 20px;">No</th>
                    <th style="width: 250px;">Katergori</th>
                    <th style="width: 250px;">Jenis</th>
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
        the_table = $("#dataTable_tangkap_jenis").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/master/tangkap/Api_tangkap_jenis'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "tangkap_jenis_id",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "tangkap_kategori_nama"},
                {"data": "tangkap_jenis_nama"},
                {
                    "data": "tangkap_jenis_id",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-primary btn-sm" href="<?php echo site_url('master/tangkap/tangkap_jenis/edit') ?>/' + row.tangkap_jenis_id + '" title="Ubah Data" data-button="view"><i class="glyphicon glyphicon-edit"></i></a>\n\
                        <button href="" onclick="deleteItem('+ row.tangkap_jenis_id +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\n\
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

					window.location = site_url + "api/master/tangkap/Api_tangkap_jenis/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>