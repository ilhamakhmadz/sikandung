                                    <br>
                                    <div class="col-md-12">
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Kelompok</label>
                                                <div class="col-sm-8">
                                                    <div class="radio"><label><input type="radio" id="jenis_perusahaan" name="jenis_perusahaan" value="Perseorangan" checked="checked">1. Perseorangan</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_perusahaan" name="jenis_perusahaan" value="Kelompok"> 2. Kelompok</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_perusahaan" name="jenis_perusahaan" value="Koperasi"> 3. Koperasi</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_perusahaan" name="jenis_perusahaan" value="CV/Firma/PT"> 4. CV/Firma/PT</label></div>
                                                </div>
                                            </div>
                                                

                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Kegiatan Usaha</label>
                                                <div class="col-sm-8">
                                                    <div class="radio"><label><input type="radio" id="kegiatan_usaha" name="kegiatan_usaha" value="Pengolahan/Produksi" checked="checked">1. Pengolahan/Produksi</label></div>
                                                    <div class="radio"><label><input type="radio" id="kegiatan_usaha" name="kegiatan_usaha" value="Perdagangan"> 2. Perdagangan</label></div>
                                                    <div class="radio"><label><input type="radio" id="kegiatan_usaha" name="kegiatan_usaha" value="Keduanya"> 3. Keduanya</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Jenis Olahan</label>
                                                <div class="col-sm-8">
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Pindang" checked="checked">1. Pindang</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Abon"> 2.	Abon</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Baby Fish"> 3.	Baby Fish</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Nugget"> 4.	Nugget</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Bakso"> 5.	Bakso</label></div>
                                                    <div class="radio"><label><input type="radio" id="jenis_olahan" name="jenis_olahan" value="Lainnya"> 6.	Lainnya</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Frekwensi Produksi per minggu</label>
                                                    <div class="col-sm-3">
                                                        <input id="frekuensi_produksi_peminggu" name="frekuensi_produksi_peminggu" type="number" class="form-control" required>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Mulai Berproduksi</label>
                                                    <div class="col-sm-3">
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
                                                <label class="col-sm-2 col-form-label">Luas Bangunan Keseluruhan</label>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <input id="luas_bangunan_keseluruhan" name="luas_bangunan_keseluruhan" type="number" class="form-control" required>
                                                            <span class="input-group-addon">m<sup>2</sup></span> 
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Luas Bangunan Produksi</label>
                                                    <div class="col-sm-3">
                                                        <input id="luas_bangunan_produksi" name="luas_bangunan_produksi" type="number" class="form-control" required>
                                                    </div>
                                            </div>
                                        
                                       
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pemodalan</label>
                                                <div class="col-sm-9">
                                                    <div class="radio"><label><input type="radio" id="permodalan" name="permodalan" value="Modal Sendiri" checked="checked"> 1.	Modal Sendiri</label></div>
                                                    <div class="radio"><label><input type="radio" id="permodalan" name="permodalan" value="Modal Bersama"> 2.	Modal Bersama</label></div>
                                                    <div class="radio"><label><input type="radio" id="permodalan" name="permodalan" value="Modal Orang Lain"> 3.	Modal Orang Lain</label></div>
                                                    <div class="radio"><label><input type="radio" id="permodalan" name="permodalan" value="Modal Asing"> 4.	Modal Asing</label></div>
                                                </div>
                                        </div>

                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama Penyuluh Perikanan</label>
                                            <div class="col-sm-9">
                                                <div class="radio"><label><input type="radio" id="perijinan_usaha" name="perijinan_usaha" value="SIUP" checked="checked"> 1.	SIUP</label></div>
                                                <div class="radio"><label><input type="radio" id="perijinan_usaha" name="perijinan_usaha" value="CBIB"> 2.	CBIB</label></div>
                                                <div class="radio"><label><input type="radio" id="perijinan_usaha" name="perijinan_usaha" value="CPIB"> 3.	CPIB</label></div>
                                                <div class="radio"><label><input type="radio" id="perijinan_usaha" name="perijinan_usaha" value="Lainnya"> 4.	Lainnya</label></div>
                                            </div>
                                        </div>
                                    </div>