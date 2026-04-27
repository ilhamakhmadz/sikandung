<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Perbarui Data diri anda</h5>
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
				<!-- digunakan untuk upload -->
					<form role="form" method="post" action="<?php echo base_url().'index.php/api/user/upload_image/'.$basic_informations->id;?>" enctype="multipart/form-data">
                    <div class="col-md-12">
                    <div class="contact-box center-version">
                    <a href="profile.html">
                        <img alt="image" class="img-circle" src="<?= assets_url('images/'.$basic_informations->caption)?>">
                        <h3 class="m-b-xs"><strong><?=$basic_informations->full_name;?></strong></h3>
                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
							<input type="file" name="filefoto" id="filefoto" class="form-control" >
                        </div>

						<div class="form-group" style="margin:14px auto">
							<button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong> Upload Foto</strong></button>
                        </div>

                    </div>
					</form>


					<!-- digunakan untuk update field -->
				<form role="form" id="form_edit" name="form_edit" method="post" action="<?php echo base_url().'index.php/api/user/upload_image/'.$basic_informations->id;?>" enctype="multipart/form-data">

                </div>
                    </div>
						<div class="col-sm-6 b-r">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input class="form-control" type="hidden" name="id" id="id" value="<?=$basic_informations->id;?>">
								<input class="form-control" name="full_name" id="full_name" value="<?=$basic_informations->full_name;?>">
							</div>
							<div class="form-group">
                                <label>No Telpon</label>
                                <input class="form-control" type="text" name="contact_person" id="contact_person" value="<?=$basic_informations->contact_person;?>">
							</div>
							<div class="form-group">
								<label>Website</label>
								<input class="form-control" name="website" id="website" value="<?=$basic_informations->website;?>">
                            </div>
                            <div class="form-group">
								<label>Tanggal Kelahiran</label>
								<div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="date_birth" name="date_birth" type="date" class="form-control" value="<?=$basic_informations->date_birth;?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Alamat 1</label>
								<textarea class="form-control" placeholder="Enter text" name="address_line_1" id="address_line_1"><?=$basic_informations->address_line_1;?></textarea>
                            </div>
                            <div class="form-group">
								<label>Alamat 2</label>
								<textarea class="form-control" placeholder="Enter text" name="address_line_2" id="address_line_2"><?=$basic_informations->address_line_2;?></textarea>
                            </div>
                            <div class="form-group">
								<label>Alamat 3</label>
								<textarea class="form-control" placeholder="Enter text" name="address_line_3" id="address_line_3"><?=$basic_informations->address_line_3;?></textarea>
                            </div>
							<div class="form-group">
								<button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit"><strong> Simpan</strong></button>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
