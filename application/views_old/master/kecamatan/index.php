<div class="panel">
    <div class="panel-body no-padder">
<!--        <h4><i class="fa fa-table"></i> --><?php //echo lang('users')  ?><!--Manage</h4>-->
        <table id="dataTable_keluarga" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align:center; width: 20px;">No</th>
                    <th style="text-align:center; width: 250px;">Kode Kecamatan</th>
                    <th style="text-align:center; width: 250px;">Nama Kecamatan</th>
                    <th style="text-align:center; width: 20px;">Action</th>
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
        the_table = $("#dataTable_keluarga").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/master/Api_kecamatan'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "Kd_Kec",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {"data": "Kd_Kec"},
                {"data": "Nama_Kecamatan"},
                {
                    "data": "Kd_Kec",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-primary btn-sm" href="<?php echo site_url('master/kecamatan/edit') ?>/' + row.id + '" title="Ubah Data" data-button="view"><i class="glyphicon glyphicon-edit"></i></a>\n\
                        <button href="" onclick="deleteItem('+ row.id +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\n\
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
                    var formInput = new FormData();
                    formInput.append('id',  $id);
                    $.ajax({
                        url: site_url + "api/master/Api_kecamatan/delete",
                        method: 'post',
                        dataType: 'json',
                        data: formInput,
                        contentType: false,
                        processData: false,
                        success: function(){
                                swal({
                                    title: 'Sukses!',
                                    text: 'Data berhasil dihapus!',
                                    type: 'success'
                                });
                                setTimeout(function(){
                                    window.location.href = site_url + "master/kecamatan";
                                }, 2000)
                        },
                        error: function(err){
                            swal({
                                title: 'Gagal!',
                                text: 'Tidak Dapat Menyimpan',
                                type: 'warning'
                            });
                            console.log('error',err);
                        },
					});
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>