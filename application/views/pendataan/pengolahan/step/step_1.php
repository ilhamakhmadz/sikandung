            <br>
            <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Nama Kelompok</label>
                                            <div class="col-sm-9"><input id="tanggal_kuesioner" name="tanggal_kuesioner" type="hidden" class="form-control" value="<?=$tanggal_kuesioner;?>"></div>
                                            <div class="col-sm-9"><input id="nama_responden" name="nama_responden" type="hidden" class="form-control" value="<?=$nama_responden;?>"></div>
                                            <div class="col-sm-9"><input id="petugas_enumelator" name="petugas_enumelator" type="hidden" class="form-control" value="<?=$petugas_enumelator;?>"></div>
                                            <div class="col-sm-9"><input id="user_id" name="user_id" type="hidden" class="form-control" value="<?=$user_id;?>"></div>
                                            <div class="col-sm-9"><input id="kelompok" name="kelompok" type="text"  class="form-control" value="" required></div>
                                        </div>
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9"><input id="nama" name="nama" type="text"  class="form-control" value="" required ></div>
                                        </div>

                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-9"><input id="nik" name="nik" type="text"  class="form-control" value="" required minlength="16" maxlength="16"></div>
                                            <!-- <div class="col-sm-1"><button type="button" id="check" name="check" class="btn btn-w-m btn-primary">Check Nik</button></div> -->
                                        </div>
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jabatan Dalam Kelompok</label>
                                            <div class="col-sm-9"><input id="jabatan" name="jabatan" type="text"  class="form-control" value="" required ></div>
                                        </div>
                                    
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Umur</label>
                                            <div class="col-sm-9"><input id="umur" name="umur" type="text"  class="form-control" value="" required ></div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="pendidikan" id="pendidikan">
                                                        <option value="">- Pilih Pendidikan -</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                        <option value="D III">D III</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                       
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telepon</label>
                                            <div class="col-sm-9"><input id="telepon" name="telepon" type="text"  class="form-control" value="" required ></div>
                                        </div>

                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9"><input id="email" name="email" type="text"  class="form-control" value="" required ></div>
                                        </div>
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kab/Kota</label>
                                            <div class="col-sm-9"><input id="kabupaten" disabled name="kabupaten" value="<?=$kabupaten->nama_kabupaten?>" type="text" class="form-control"></div>
                                            <div class="col-sm-9"><input id="kd_kabupaten" value="<?=$kabupaten->kd_kabupaten?>" name="kd_kabupaten" type="hidden" class="form-control"></div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                    <?php foreach($kecamatan as $kec):?>
                                                        <option value="<?=$kec->Kd_Kec?>"><?=$kec->Nama_Kecamatan?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Desa</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" name="desa" id="desa">
                                                </select>
                                                </div>
                                        </div>
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">RT/RW</label>
                                            <div class="col-sm-3"><input id="rt" name="rt" type="text"  class="form-control" value="" required ></div>
                                            <div class="col-sm-3"><input id="rw" name="rw" type="text"  class="form-control" value="" required ></div>
                                        </div>
                
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                                          
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin="" ></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script> -->


    <script>
        // $(function() {

        // // Inisiasi Geo Location
        // if (!navigator.geolocation) {
        // console.log("Maaf, Browser Anda tidak Support Geolocation.");
        // } else {
        // navigator.geolocation.getCurrentPosition(success, error);
        // }

        // // START: Notifikasi Sukses Geolocation
        // function success(position) {
        // // Inisiasi Variabel
        // var map, marker,
        // latitude = position.coords.latitude,
        // longitude = position.coords.longitude;

        // // Tampilkan ke Textbox
        // $("#Maps_lat").val(latitude);
        // $("#Maps_lang").val(longitude);

        // var curLocation = [0, 0];
        // if (curLocation[0] == 0 && curLocation[1] == 0) {
        //     curLocation = [latitude, longitude];
        // }

        // //Init Overlays
        // var overlays = {};

        // //Init BaseMaps
        // var basemaps = {
        //     OpenStreetMaps: L.tileLayer(
        //     "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        //     {
        //         minZoom: 2,
        //         maxZoom: 19,
        //         id: "osm.streets"
        //     }
        //     ),
        //     "Google": L.tileLayer(
        //     "https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
        //     {
        //         minZoom: 2,
        //         maxZoom: 19,
        //         id: "google.streets"
        //     }
        //     )
        // };

        // //Map Options
        // var mapOptions = {
        //     zoomControl: true,
        //     attributionControl: true,
        //     center: [latitude,longitude],
        //     zoom: 12,
        //     layers: [basemaps.Google],
        //     drawControl: true
        // };

        // //Render Main Map
        // var map = L.map("maps_picker", mapOptions);

        // L.Control.geocoder().addTo(map);

        // L.circle([latitude,longitude], 100, {
        //     color: 'green',
        //     fillColor: '#2ecc71',
        //     fillOpacity: 0.2
        // }).addTo(map).bindPopup("Lokasi Anda Sekarang");

        // var marker = new L.marker(curLocation, {
        //     draggable: "true"
        // });

        //     // Ketika di Drag
        //     marker.on("dragend", function(event) {
        //     var position = marker.getLatLng();
        //     marker
        //     .setLatLng(position, {
        //         draggable: "true"
        //     })
        //     .bindPopup(position)
        //     .update();
        //     $("#Maps_lat").val(position.lat);
        //     $("#Maps_lang").val(position.lng).keyup();
        //     });


        // // Ketika di Ubah
        // $("#Maps_lat, #Maps_lang").change(function() {
        //     var position = [
        //     parseInt($("#Maps_lat").val()),
        //     parseInt($("#Maps_lang").val())
        //     ];
        //     marker
        //     .setLatLng(position, {
        //     draggable: "true"
        //     })
        //     .bindPopup(position)
        //     .update();
        //     map.panTo(position);
        // });
        // map.addLayer(marker);
        
        // }
        // // END: Notifikasi Sukses Geolocation

        //     // START: Notifikasi Error Geolocation
        //     function error() {
        //     alert('Gagal Mendapatkan Geolocation, Silahkan Refresh Kembali.');
        //     }
        //     // END: Notifikasi Error Geolocation
        // });

    </script>