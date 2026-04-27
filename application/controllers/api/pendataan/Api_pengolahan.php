<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pengolahan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('pendataan/Pengolahan_model');
    }
     public function index()
    {
        $data = $this->Pengolahan_model->datatables();
        echo $data;
    }

  
    public function add()
    {
                if ($this->input->method('post')) {
                // ADD PENDATAAN UMUM
                    $data = $this->input->post();

                    $pengolahan = $this->Pengolahan_model->add(array(
                        'petugas_enumerator' => $this->input->post('petugas_enumelator'),
                        'nama_responden' => $this->input->post('nama_responden'),
                        'tahun' => date("Y"),
                        'tanggal_kuesioner' => date('Y-m-d H:i:s'),
                        'user_id' => $this->input->post('user_id'),
                        'submit' => 'Draft'
                    ));

                    $personal = $this->Pengolahan_model->add_identitas(array(
                        'pengolahan_id' => $pengolahan,
                        'nama_kelompok' => $this->input->post('kelompok'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'nama' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'jabatan' => $this->input->post('jabatan'),
                        'umur' => $this->input->post('umur'),
                        'telepon' => $this->input->post('telepon'),
                        'email' => $this->input->post('email'),
                        'kd_prov' => $this->input->post('kd_kabupaten'),
                        'kd_kab' => $this->input->post('kd_kabupaten'),
                        'kd_kec' => $this->input->post('kecamatan'),
                        'kd_desa' => $this->input->post('desa'),
                        'rt' => $this->input->post('rt'),
                        'rw' => $this->input->post('rw'),
                        'alamat_jalan' => $this->input->post('alamat'),
                        'created_at' => $this->input->post('user_id'),
                        'created_date' => date('Y-m-d H:i:s'),
                    ));

                    $ket_umum = $this->Pengolahan_model->add_ket_umum(array(
                        'pengolahan_id' => $pengolahan,
                        'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
                        'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
                        'jenis_olahan' => $this->input->post('jenis_olahan'),
                        'frekuensi_produksi_peminggu' => $this->input->post('frekuensi_produksi_peminggu'),
                        'mulai_berproduksi' => $this->input->post('tahun_berdiri'),
                        'luas_bangunan_keseluruhan' => $this->input->post('luas_bangunan_keseluruhan'),
                        'luas_bangunan_produksi' => $this->input->post('luas_bangunan_produksi'),
                        'permodalan' => $this->input->post('permodalan'),
                        'perijinan_usaha' => $this->input->post('perijinan_usaha'),
                    ));

                    // ADD BAHAN UTAMA
                    foreach (json_decode($data['bahanUtama']) as $bahanUtama) {
                        $this->Pengolahan_model->add_bahan_utama(array(
                                'pengolahan_id' => $pengolahan,
                                'pengolahan_bahan_utama_uraian_id' => $bahanUtama->namaBahanUtama,
                                'pengolahan_bahan_utama_asal' => $bahanUtama->asalBahanUtama,
                                'pengolahan_bahan_utama_volume' => $bahanUtama->valumeBahanUtama,
                                'pengolahan_bahan_utama_harga' => $bahanUtama->hargaBahanUtama,
                                'pengolahan_bahan_utama_nilai' => $bahanUtama->valumeBahanUtama * $bahanUtama->hargaBahanUtama,
                        ));
                    }

                    // ADD BAHAN
                    foreach (json_decode($data['alat']) as $alat) {
                        $this->Pengolahan_model->add_alat_produksi(array(
                                'pengolahan_id' => $pengolahan,
                                'pengolahan_alat_produksi_uraian_id' => $alat->namaProdukAlat,
                                'pengolahan_alat_produksi_volume' => $alat->volumeProdukAlat,
                                'pengolahan_alat_produksi_harga' => $alat->hargaProdukAlat,
                                'pengolahan_alat_produksi_nilai' => $alat->volumeProdukAlat * $alat->hargaProdukAlat,
                        ));
                    }

                    foreach (json_decode($data['bahanLain']) as $bahanLain) {
                        $this->Pengolahan_model->add_bahan_lain(array(
                                'pengolahan_id' => $pengolahan,
                                'pengolahan_bahan_lain_uraian_id' => $bahanLain->namaBahanLain,
                                'pengolahan_bahan_lain_volume' => $bahanLain->valumeBahanLain,
                                'pengolahan_bahan_lain_harga' => $bahanLain->hargaBahanLain,
                                'pengolahan_bahan_lain_nilai' => $bahanLain->valumeBahanLain * $bahanLain->hargaBahanLain,
                        ));
                    }

                    foreach (json_decode($data['nilaiProduksi']) as $nilaiProduksi) {
                        $this->Pengolahan_model->add_nilai_produksi(array(
                                'pengolahan_id' => $pengolahan,
                                'pengolahan_nilai_produksi_uraian_id' => $nilaiProduksi->namaProduksi,
                                'pengolahan_nilai_lokasi_pemasaran' => $nilaiProduksi->lokasiPemasaran,
                                'pengolahan_nilai_produksi_volume' => $nilaiProduksi->volumeProduksi,
                                'pengolahan_nilai_produksi_harga' => $nilaiProduksi->hargaProduksi,
                                'pengolahan_nilai_produksi_nilai' => $nilaiProduksi->volumeProduksi * $nilaiProduksi->hargaProduksi,
                        ));
                    }
                    foreach (json_decode($data['perijinan']) as $perijinan) {
                        $this->Pengolahan_model->add_perijinan(array(
                            'pengolahan_id' => $pengolahan,
                            'pengolahan_perijinan_no' => $perijinan->noPerijinan,
                            'pengolahan_perijinan_tgl' => $perijinan->tglPerijinan,
                            'pengolahan_perijinan_uraian_id' => $perijinan->jenisPerijinan
                        ));
                    }
                } else {
                    throw new Exception('Method not Allowed');
                }
           
            echo json_encode($pengolahan);
    }

    
    public function delete($id)
    {
        echo json_encode($this->Pengolahan_model->delete($id));

        redirect(site_url('pendataan/pengolahan'));
    }

    public function submit($id)
    {
        echo json_encode($this->Pengolahan_model->submit($id));
        redirect(site_url('pendataan/pengolahan'));
    }

    public function draft($id)
    {
        echo json_encode($this->Pengolahan_model->draft($id));
        redirect(site_url('pendataan/pengolahan'));
    }

    public function edit_kuesioner($id)
    {
        if ($this->input->method('post')) {

            $this->Pengolahan_model->edit_identitas($id, array(
                'nama_kelompok' => $this->input->post('kelompok'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'umur' => $this->input->post('umur'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'kd_prov' => $this->input->post('kd_kabupaten'),
                'kd_kab' => $this->input->post('kd_kabupaten'),
                'kd_kec' => $this->input->post('kecamatan'),
                'kd_desa' => $this->input->post('desa'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'alamat_jalan' => $this->input->post('alamat'),
                'updated_at' => $this->input->post('user_id'),
                'updated_date' => date('Y-m-d H:i:s'),
            ));

             $this->Pengolahan_model->edit_ket_umum($id, array(
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
                'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
                'jenis_olahan' => $this->input->post('jenis_olahan'),
                'frekuensi_produksi_peminggu' => $this->input->post('frekuensi_produksi_peminggu'),
                'mulai_berproduksi' => $this->input->post('tahun_berdiri'),
                'luas_bangunan_keseluruhan' => $this->input->post('luas_bangunan_keseluruhan'),
                'luas_bangunan_produksi' => $this->input->post('luas_bangunan_produksi'),
                'permodalan' => $this->input->post('permodalan'),
                'perijinan_usaha' => $this->input->post('perijinan_usaha'),
            ));

            echo json_encode($this->Pengolahan_model->edit_kuesioner($id, array(
                'petugas_enumerator' => $this->input->post('petugas_enumerator'),
                'nama_responden' => $this->input->post('nama_responden'),
                'tahun' => date("Y"),
                'tanggal_kuesioner' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('id')
            )));
            
        } else {
           throw new Exception('Method not Allowed');
        }
    }

    public function edit_identitas($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_kuesioner($id, array(
                'petugas_enumerator' => $this->input->post('petugas_enumerator'),
                'nama_responden' => $this->input->post('nama_responden'),
                'tahun' => date("Y"),
                'tanggal_kuesioner' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('id')
            )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }

    // MENAMBAHKAN KOMPONEN HARGA PRODUKSI, NILAI PRODUKSI, BAHAN LAINNYA
    public function tambah_alat_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->add_alat_produksi(array(
                'pengolahan_id' => $id,
                'pengolahan_alat_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'pengolahan_alat_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'pengolahan_alat_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'pengolahan_alat_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_alat_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_alat_produksi($id,array(
                'pengolahan_alat_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'pengolahan_alat_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'pengolahan_alat_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'pengolahan_alat_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }


    public function tambah_bahan_utama($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->add_bahan_utama(array(
                'pengolahan_id' => $this->input->post('pengolahan_id'),
                'pengolahan_bahan_utama_uraian_id' => $this->input->post('nama_bahan_utama'),
                'pengolahan_bahan_utama_volume' => $this->input->post('volume_bahan_utama'),
                'pengolahan_bahan_utama_asal' => $this->input->post('asal_bahan_utama'),
                'pengolahan_bahan_utama_harga' => $this->input->post('harga_bahan_utama'),
                'pengolahan_bahan_utama_nilai' => $this->input->post('volume_bahan_utama') * $this->input->post('harga_bahan_utama'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_bahan_utama($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_bahan_utama($id,array(
                'pengolahan_bahan_utama_uraian_id' => $this->input->post('nama_bahan_utama'),
                'pengolahan_bahan_utama_volume' => $this->input->post('volume_bahan_utama'),
                'pengolahan_bahan_utama_asal' => $this->input->post('asal_bahan_utama'),
                'pengolahan_bahan_utama_harga' => $this->input->post('harga_bahan_utama'),
                'pengolahan_bahan_utama_nilai' => $this->input->post('volume_bahan_utama') * $this->input->post('harga_bahan_utama'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }


    public function tambah_bahan_lain($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->add_bahan_lain(array(
                'pengolahan_id' => $this->input->post('pengolahan_id'),
                'pengolahan_bahan_lain_uraian_id' => $this->input->post('nama_bahan_lain'),
                'pengolahan_bahan_lain_volume' => $this->input->post('volume_bahan_lain'),
                'pengolahan_bahan_lain_harga' => $this->input->post('harga_bahan_lain'),
                'pengolahan_bahan_lain_nilai' => $this->input->post('volume_bahan_lain') * $this->input->post('harga_bahan_lain'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_bahan_lain($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_bahan_lain($id,array(
                'pengolahan_bahan_lain_uraian_id' => $this->input->post('nama_bahan_lain'),
                'pengolahan_bahan_lain_volume' => $this->input->post('volume_bahan_lain'),
                'pengolahan_bahan_lain_harga' => $this->input->post('harga_bahan_lain'),
                'pengolahan_bahan_lain_nilai' => $this->input->post('volume_bahan_lain') * $this->input->post('harga_bahan_lain'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function tambah_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->add_nilai_produksi(array(
                'pengolahan_id' => $id,
                'pengolahan_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'pengolahan_nilai_lokasi_pemasaran' => $this->input->post('lokasi_pemasaran'),
                'pengolahan_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'pengolahan_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'pengolahan_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_nilai_produksi($id,array(
                'pengolahan_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'pengolahan_nilai_lokasi_pemasaran' => $this->input->post('lokasi_nilai_produksi'),
                'pengolahan_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'pengolahan_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'pengolahan_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    

    public function tambah_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->add_perijinan(array(
                'pengolahan_id' => $id,
                'pengolahan_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'pengolahan_perijinan_no' => $this->input->post('no_perijinan'),
                'pengolahan_perijinan_tgl' =>$this->input->post('tgl_perijinan')
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Pengolahan_model->edit_perijinan($id,array(
                'pengolahan_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'pengolahan_perijinan_no' => $this->input->post('no_perijinan'),
                'pengolahan_perijinan_tgl' =>$this->input->post('tgl_perijinan'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }


}