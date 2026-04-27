<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Data Social Media</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-wrench"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#">Config option 1</a>
						</li>
						<li><a href="#">Config option 2</a>
						</li>
					</ul>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="table-responsive">
						<table id="dataTable" class="table table-striped" >
							<thead>
								<tr>
									<th>Social Media</th>
									<th>Nama Pengguna </th>
									<th>Aksi </th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ============ MODAL EDIT BARANG =============== -->
<?php
        foreach($all as $i):
			$id=$i->id;
            $account=$i->name;
            $social_media=$i->link;
            // $barang_harga=$i['barang_harga'];
        ?>
         <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		 <div class="modal-dialog">
		 <div class="modal-content">
		 <div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			 <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
		 </div>
		 <div class="ibox-content">
		 <div class="row">
			 <form role="form" id="form_add" name="form_add" method="post" action="">
				 <div class="col-sm-6 b-r">
					 <div class="form-group">
						 <label>Pilih Social Media</label>
						 <select class="form-control m-b" name="account" id="account" required>
						 		 <option value="<?=$account?>" selected ><?=$account?></option>
						 </select>
					 </div>


				 </div>

				 <div class="col-sm-6">
					 <div class="form-group">
						 <label>Url Sosial Media</label>
						 <input class="form-control" name="social_media" id="social_media" value="<?=$social_media?>" required>
					 </div>

					 <div class="form-group">
						 <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit"><strong><i class="fa fa-plus-square"></i> Tambahkan</strong></button>
					 </div>

				 </div>

			 </form>

		 </div>
	 </div>

		 </div>
		 </div>
	 </div>

    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->



<script>
    var the_table;
    $(window).on('load',function () {
        the_table = $("#dataTable").DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "stateDuration": 0,
            "ajax": {
                "url": "<?php echo site_url('api/Api_socialmedia/index'); ?>",
                "type": "POST"
            },
            "columns": [
                {"data": "name"},
                {"data": "link"},
                {
                    "data": "id",
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return '<div  style="text-align:center;"><a class="btn btn-primary btn-sm"data-toggle="modal" data-target="#modal_edit'+ row.id +'"><i class="glyphicon glyphicon-edit"></i></a>\n\
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
					swal("Data berhasil dihapus!", {
					icon: "success",
					});

					window.location = site_url + "api/api_socialmedia/delete/" + $id;
				} else {
					swal("Data tidak berhasil dihapus!");
				}
			});

	}

</script>