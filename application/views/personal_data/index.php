<div class="panel">
    <div class="panel-body no-padder">
<!--        <h4><i class="fa fa-table"></i> --><?php //echo lang('users')  ?><!--Manage</h4>-->
        <table id="datatable_personal" class="table table-bordered table-striped">
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
        the_table = $("#datatable_personal").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/personal_data/Api_personal_data'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "id_personal_data",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "nik"},
                {"data": "nama_lengkap"},
                {
                    "data": "alamat",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return data + ' ' + 'RT ' + row.no_rt + ' RW ' + row.no_rw + ' ,KELURAHAN ' + row.kel_nama + ' KECAMATAN ' + row.kec_nama + ' ' + row.kab_nama + ' ' + row.prov_nama;
                    }
                },
                {
                    "data": "id_personal_data",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-success btn-sm" href="<?php echo site_url('personal_data/personal_data/detail') ?>/' + row.id_personal_data + '" title="Detail Data" data-button="view"><i class="glyphicon glyphicon-eye-open"></i></a>\n\
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('personal_data/personal_data/edit') ?>/' + row.id_personal_data + '" title="Ubah Data" data-button="view"><i class="glyphicon glyphicon-edit"></i></a>\n\
                        <button href="" onclick="deleteItem('+ row.id_personal_data +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\n\
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

					window.location = site_url + "api/personal_data/Api_personal_data/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>