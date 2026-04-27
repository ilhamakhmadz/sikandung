<div class="panel">
    <div class="panel-body no-padder">
<!--        <h4><i class="fa fa-table"></i> --><?php //echo lang('users')  ?><!--Manage</h4>-->
        <table id="datatable_identitas_tangkap" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align:center; width: 20px;">No</th>
                    <th style="text-align:center; width: 100px;">NIK</th>
                    <th style="text-align:center; width: 100px;">Nama</th>
                    <th style="text-align:center; width: 300px;">Alamat</th>
                    <th style="text-align:center; width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody style="text-align:center;">
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('delete-modal'); ?>

<script>
    var the_table;
    $(window).on('load',function () {
        the_table = $("#datatable_identitas_tangkap").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/personal_data/Api_identitas_tangkap/index'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "tangkap_identitas_id",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nik"},
                {"data": "nama"},
                {
                    "data": "alamat_jalan"
                },
                {
                    "data": "tangkap_identitas_id",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-success btn-sm" href="<?php echo site_url('personal_data/personal_data/detail') ?>/' + row.tangkap_identitas_id + '" title="Detail Data" data-button="view"><i class="glyphicon glyphicon-eye-open"></i></a>\n\
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('personal_data/personal_data/edit') ?>/' + row.tangkap_identitas_id + '" title="Ubah Data" data-button="view"><i class="glyphicon glyphicon-edit"></i></a>\n\
                        <button href="" onclick="deleteItem('+ row.tangkap_identitas_id +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\n\
                        </div>';
                    }
                }
            ]
        });
    });

    function deleteItem($id){

		swal({
				title: "Apakah Anda Yakin?",
				text: "Setelah dihapus, Data hanya dapat dipulihkan di database!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Data berhasil dihapus!", {
					icon: "success",
					});

					window.location = site_url + "api/personal_data/Api_identitas_tangkap/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>