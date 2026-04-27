                                    <br>
                                    <div class="col-md-12">
                                        <!-- <div class="hr-line-dashed"></div> -->
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Kelompok</label>
                                                <div class="col-sm-8">
                                                    <div class="radio"><label><input type="radio" name="jenis_perusahaan" id="jenis_perusahaan" value="Perseorangan" checked="checked">1.	Perseorangan</label></div>
                                                    <div class="radio"><label><input type="radio" name="jenis_perusahaan" id="jenis_perusahaan" value="Kelompok"> 2.	Kelompok</label></div>
                                                    <div class="radio"><label><input type="radio" name="jenis_perusahaan" id="jenis_perusahaan" value="Koperasi"> 3.	Koperasi</label></div>
                                                    <div class="radio"><label><input type="radio" name="jenis_perusahaan" id="jenis_perusahaan" value="CV/Firma/PT"> 4.	CV/Firma/PT</label></div>
                                                </div>
                                            </div>
                                                

                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Kegiatan Usaha</label>
                                                        <div class="col-sm-8">
                                                            <div class="radio"><label><input type="radio" name="kegiatan_usaha" id="kegiatan_usaha" value="Pembenihan" checked="checked">1.	Pembenihan</label></div>
                                                            <div class="radio"><label><input type="radio" name="kegiatan_usaha" id="kegiatan_usaha" value="Pembesaran"> 2.	Pembesaran</label></div>
                                                            <div class="radio"><label><input type="radio" name="kegiatan_usaha" id="kegiatan_usaha" value="Ikan Hias"> 3.	Ikan Hias</label></div>
                                                            <div class="radio"><label><input type="radio" name="kegiatan_usaha" id="kegiatan_usaha" value="Mina Padi"> 4.	Mina Padi</label></div>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Frekwensi Produksi dalam 1 Tahun</label>
                                                        <div class="col-sm-5">
                                                            <div class="input-group">
                                                                <input id="kapasitas_produksi" name="kapasitas_produksi" type="number" class="form-control" required>
                                                                <span class="input-group-addon">Kali</span> 
                                                            </div>
                                                        </div>
                                                </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Mulai Budidaya</label>
                                                    <div class="col-sm-5">
                                                        <select name="tahun_berdiri" id="tahun_berdiri" class="form-control">
                                                            <?php
                                                                for($i=date('Y');$i>=date('Y')-100;$i--){
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }

                                                            ?>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Luas Tempat</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input id="luas_tempat" name="luas_tempat" type="number" class="form-control" required>
                                                        <span class="input-group-addon">m<sup>2</sup></span> 
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Tempat</label>
                                            <div class="col-sm-5">
                                                <div class="radio"><label><input type="radio" name="status_kolam" id="status_kolam" value="Milik Sendiri" checked="checked"> 1.	Milik Sendiri</label></div>
                                                <div class="radio"><label><input type="radio" name="status_kolam" id="status_kolam" value="Sewa"> 2.	Sewa</label></div>
                                                <div class="radio"><label><input type="radio" name="status_kolam" id="status_kolam" value="Lainnya"> 3.	Lainnya</label></div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pemodalan</label>
                                                <div class="col-sm-9">
                                                    <div class="radio"><label><input type="radio" name="permodalan" id="permodalan" value="Modal Sendiri" checked="checked"> 1.	Modal Sendiri</label></div>
                                                    <div class="radio"><label><input type="radio" name="permodalan" id="permodalan" value="Modal Bersama"> 2.	Modal Bersama</label></div>
                                                    <div class="radio"><label><input type="radio" name="permodalan" id="permodalan" value="Modal Orang Lain"> 3.	Modal Orang Lain</label></div>
                                                    <div class="radio"><label><input type="radio" name="permodalan" id="permodalan" value="Modal Asing"> 4.	Modal Asing</label></div>
                                                </div>
                                        </div>

                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Penyuluh Perikanan</label>
                                            <div class="col-sm-9">
                                                <div class="radio"><label><input type="radio" name="perijinan_usaha" id="perijinan_usaha" value="SIUP" checked="checked"> 1.	SIUP</label></div>
                                                <div class="radio"><label><input type="radio" name="perijinan_usaha" id="perijinan_usaha" value="CBIB"> 2.	CBIB</label></div>
                                                <div class="radio"><label><input type="radio" name="perijinan_usaha" id="perijinan_usaha" value="CPIB"> 3.	CPIB</label></div>
                                                <div class="radio"><label><input type="radio" name="perijinan_usaha" id="perijinan_usaha" value="Lainnya"> 4.	Lainnya</label></div>
                                            </div>
                                        </div>
                                    </div>