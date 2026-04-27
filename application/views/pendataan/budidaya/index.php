<div class="panel">
    <div class="panel-body no-padder">
        <table id="datatable_personal" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align:center; width: 20px;">No</th>
                    <th style="text-align:center; ">Tanggal</th>
                    <th style="text-align:center; ">NIK</th>
                    <th style="text-align:center; ">Nama Kelompok</th>
                    <th style="text-align:center; ">Alamat</th>
                    <th style="text-align:center; ">Petugas</th>
                    <th style="text-align:center; ">Status</th>
                    <th style="text-align:center; ">User Input</th>
                    <th style="text-align:center; width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody style="text-align:left;">
            </tbody>
        </table>
    </div>
</div>
                            <div class="modal inmodal" id="myModalAdd" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Keterangan Kuesioner</h4>
                                        </div>
                                        <form class="form-horizontal" id="form_add" name="form_add" method="post" action="<?= site_url('pendataan/budidaya/add') ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Tanggal Kuesioner</label> 
                                                <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id="tanggal_kuesioner_hidden" name="tanggal_kuesioner_hidden" disabled>
                                                <input class="form-control" type="hidden" value="<?php echo date('Y-m-d'); ?>" id="tanggal_kuesioner" name="tanggal_kuesioner">
                                            </div>
                                            <div class="form-group">
                                                <label>Petugas Enumerator</label> 
                                                <input class="form-control" type="hidden" value="<?=$this->session->userdata('role_id')?>" id="role_id" name="role_id">
                                                <input class="form-control" type="hidden" value="<?=$this->session->userdata('id')?>" id="user_id" name="user_id">
                                                <input class="form-control" type="hidden" value="<?=$this->session->userdata('fullname')?>"  id="petugas_enumelator" name="petugas_enumelator">
                                                <input class="form-control" type="text" disabled value="<?=$this->session->userdata('fullname')?>"  id="petugas_enumelator_hidden" name="petugas_enumelator_hidden">

                                            </div>
                                            <div class="form-group">
                                                <label>Nama Responden</label> 
                                                <input class="form-control" type="text" value="" id="nama_responden" name="nama_responden">
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                            <button type="submit" class="btn btn-primary">Isi Form</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
<?php $this->load->view('delete-modal'); ?>
<style>
    .select2-container--open {
        z-index: 10002 ; 
    }
</style>
<script>
    var the_table;
    $(window).on('load',function () {
        var verval = "";
        var edit = "";
        var view = "";
        var deleteData = "";
        var pdf = "";
        $('#bidang_usaha').select2({
            dropdownParent: $("#myModalAdd")
        });
        $('#jenis_pendataan').select2({
            dropdownParent: $("#myModalAdd")
        });
        $('#nik').select2({
            dropdownParent: $("#myModalAdd")
        });
        the_table = $("#datatable_personal").DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 25,
            "stateSave": true,
            "language": {
            "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            "ajax": {
                "url": "<?php echo site_url('api/pendataan/Api_budidaya'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "budidaya_id",
                    "searchable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "tanggal_kuesioner",
                    "render": function(data, type, row, meta) {
                        return data + '<br /> <i>' + moment(data).fromNow() + '</i>';
                    }
                },
                {"data": "nik"},
                {"data": "nama_kelompok"},
                {"data": "alamat_jalan"},
                {"data": "petugas_enumerator"},
                {"data": "submit"},
                {"data": "petugas_enumerator"},
                {
                    "data": "budidaya_id",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        <?php if($this->acl->is_allowed('pendataan/budidaya/detail')): ?>
                                edit = '<a class="btn btn-primary btn-sm" href="<?php echo site_url('pendataan/budidaya/detail') ?>/' + row.budidaya_id + '" title="Edit Data" data-button="edit"><i class="glyphicon glyphicon-edit"></i></a> ';
                        <?php endif; ?>
                        <?php if($this->acl->is_allowed('pendataan/budidaya/pdf')): ?>
                                pdf = '<a class="btn btn-danger btn-sm" target="_blank" href="<?php echo site_url('pendataan/budidaya/pdf') ?>/' + row.budidaya_id + '" title="Print Data" data-button="edit"><i class="glyphicon glyphicon-print"></i></a> ';
                        <?php endif; ?>
                        <?php if($this->acl->is_allowed('pendataan/budidaya/view')): ?>
                                view =  '<a class="btn btn-success btn-sm" href="<?php echo site_url('pendataan/budidaya/view') ?>/' + row.budidaya_id + '" title="Detail Data" data-button="view"><i class="glyphicon glyphicon-eye-open"></i></a> ';
                        <?php endif; ?>
                        <?php if($this->acl->is_allowed('pendataan/budidaya/delete')): ?>
                                deleteData = '<button href="" onclick="deleteItem('+ row.budidaya_id +')" title="Hapus Data" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> ';
                        <?php endif; ?>
                        <?php if($this->acl->is_allowed('pendataan/budidaya/verval')): ?>
                            if(row.submit == 'Draft'){
                                verval = '<button href="" onclick="submitData('+ row.budidaya_id +')" title="Submit Data" type="button" class="btn btn-warning btn-sm"><i class="fa fa-check"></i></button> '
                            }else{
                                verval = '<button href="" onclick="draftData('+ row.budidaya_id +')" title="Draft Data" type="button" class="btn btn-default btn-sm"><i class="fa fa-close"></i></button> '
                            }
                        <?php endif; ?>
                        
                            return '<div  style="text-align:center;">'+
                                        verval +
                                        pdf +
                                        view +
                                        edit +
                                        deleteData +
                                        '</div>';
                    }
                }
            ],
            createdRow: (row, data, dataIndex, cells) => {
                if(data.submit == 'Draft' && moment(data.tanggal_kuesioner).toNow(true) == '3 hari'){
                    $(cells).css('background-color', 'rgb(112 193 217)')
                }else if(data.submit == 'Draft' && moment(data.tanggal_kuesioner).toNow(true) == '4 hari'){
                    $(cells).css('background-color', 'rgb(255 185 80)')
                }else if(data.submit == 'Draft' && moment(data.tanggal_kuesioner).toNow(true) == '5 hari'){
                    $(cells).css('background-color', 'rgb(227 131 131)')
                }else if(data.submit == 'Draft'){
                    $(cells).css('background-color', 'rgb(0 255 8 / 35%)')
                }else{
                    $(cells).css('background-color', '#ffffff')
                }
            }
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

					window.location = site_url + "api/pendataan/Api_budidaya/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

    }

    function submitData($id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Verifikasi data untuk di publish",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data berhasil terverifikasi!", {
            icon: "success",
        });

            window.location = site_url + "api/pendataan/Api_budidaya/submit/" + $id;
            } else {
                swal("Perubahan data dibatalkan!");
            }
        });

    }

    function draftData($id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data akan dimasukkan ke dalam Draft",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data berhasil ditanguhkan!", {
            icon: "success",
        });

            window.location = site_url + "api/pendataan/Api_budidaya/draft/" + $id;
            } else {
                swal("Perubahan data dibatalkan!");
            }
        });

    }
  
</script>