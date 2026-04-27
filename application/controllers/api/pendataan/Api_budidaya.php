<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('pendataan/Budidaya_model');
    }
     public function index()
    {
        $data = $this->Budidaya_model->datatables();
        echo $data;
    }

  
    public function add()
    {
                if ($this->input->method('post')) {
                // ADD PENDATAAN UMUM
                    $data = $this->input->post();

                    $budidaya = $this->Budidaya_model->add(array(
                        'petugas_enumerator' => $this->input->post('petugas_enumelator'),
                        'nama_responden' => $this->input->post('nama_responden'),
                        'tahun' => date("Y"),
                        'tanggal_kuesioner' => date('Y-m-d H:i:s'),
                        'user_id' => $this->input->post('user_id'),
                        'submit' => 'Draft'
                    ));

                    $personal = $this->Budidaya_model->add_identitas(array(
                        'budidaya_id' => $budidaya,
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

                    $ket_umum = $this->Budidaya_model->add_ket_umum(array(
                        'budidaya_id' => $budidaya,
                        'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
                        'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
                        'frekuensi_panen_setahun' => $this->input->post('kapasitas_produksi'),
                        'mulai_budidaya' => $this->input->post('tahun_berdiri'),
                        'luas_kolam_m2' => $this->input->post('luas_tempat'),
                        'status_kolam' => $this->input->post('status_kolam'),
                        'permodalan' => $this->input->post('permodalan'),
                        'perijinan_usaha' => $this->input->post('perijinan_usaha'),
                    ));

                    // ADD BAHAN
                    foreach (json_decode($data['bahan']) as $bahan) {
                        $this->Budidaya_model->add_biaya_produksi(array(
                                'budidaya_id' => $budidaya,
                                'budidaya_biaya_produksi_uraian_id' => $bahan->namaProdukBahan,
                                'budidaya_jenis_id' => $bahan->jenisProdukBahan,
                                'budidaya_biaya_produksi_volume' => $bahan->volumeProdukBahan,
                                'budidaya_biaya_produksi_harga' => $bahan->hargaProdukBahan,
                                'budidaya_biaya_produksi_nilai' => $bahan->volumeProdukBahan * $bahan->hargaProdukBahan,
                        ));
                    }

                    foreach (json_decode($data['bahanLain']) as $bahanLain) {
                        $this->Budidaya_model->add_bahan_lain(array(
                                'budidaya_id' => $budidaya,
                                'budidaya_bahan_lain_uraian_id' => $bahanLain->namaBahanLain,
                                'budidaya_bahan_lain_volume' => $bahanLain->valumeBahanLain,
                                'budidaya_bahan_lain_harga' => $bahanLain->hargaBahanLain,
                                'budidaya_bahan_lain_nilai' => $bahanLain->valumeBahanLain * $bahanLain->hargaBahanLain,
                        ));
                    }

                    foreach (json_decode($data['nilaiProduksi']) as $nilaiProduksi) {
                        $this->Budidaya_model->add_nilai_produksi(array(
                                'budidaya_id' => $budidaya,
                                'budidaya_nilai_produksi_uraian_id' => $nilaiProduksi->namaProduksi,
                                'budidaya_jenis_id' => $nilaiProduksi->jenisProduksi,
                                'budidaya_nilai_produksi_volume' => $nilaiProduksi->volumeProduksi,
                                'budidaya_nilai_produksi_harga' => $nilaiProduksi->hargaProduksi,
                                'budidaya_nilai_produksi_nilai' => $nilaiProduksi->volumeProduksi * $nilaiProduksi->hargaProduksi,
                        ));
                    }

                    foreach (json_decode($data['perijinan']) as $perijinan) {
                        $this->Budidaya_model->add_perijinan(array(
                            'budidaya_id' => $budidaya,
                            'budidaya_perijinan_no' => $perijinan->noPerijinan,
                            'budidaya_perijinan_tgl' => $perijinan->tglPerijinan,
                            'budidaya_perijinan_uraian_id' => $perijinan->jenisPerijinan
                        ));
                    }
                } else {
                    throw new Exception('Method not Allowed');
                }
           
            echo json_encode($budidaya);
    }

    
    public function delete($id)
    {
        echo json_encode($this->Budidaya_model->delete($id));

        redirect(site_url('pendataan/budidaya'));
    }

    public function submit($id)
    {
        echo json_encode($this->Budidaya_model->submit($id));
        redirect(site_url('pendataan/budidaya'));
    }

    public function draft($id)
    {
        echo json_encode($this->Budidaya_model->draft($id));
        redirect(site_url('pendataan/budidaya'));
    }

    public function edit_kuesioner($id)
    {
        if ($this->input->method('post')) {

            $this->Budidaya_model->edit_identitas($id, array(
                'nama_kelompok' => $this->input->post('kelompok'),
                'pendidikan' => $this->input->post('pendidikan'),
                'nama' => $this->input->post('nama'),
                // 'nik' => $this->input->post('nik'),
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

             $this->Budidaya_model->edit_ket_umum($id, array(
                'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
                'kegiatan_usaha' => $this->input->post('kegiatan_usaha'),
                'frekuensi_panen_setahun' => $this->input->post('kapasitas_produksi'),
                'mulai_budidaya' => $this->input->post('tahun_berdiri'),
                'luas_kolam_m2' => $this->input->post('luas_tempat'),
                'status_kolam' => $this->input->post('status_kolam'),
                'permodalan' => $this->input->post('permodalan'),
                'perijinan_usaha' => $this->input->post('perijinan_usaha'),
            ));

            echo json_encode($this->Budidaya_model->edit_kuesioner($id, array(
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
            echo json_encode($this->Budidaya_model->edit_kuesioner($id, array(
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
    public function tambah_biaya_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->add_biaya_produksi(array(
                'budidaya_id' => $id,
                'budidaya_biaya_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'budidaya_jenis_id' => $this->input->post('jenis_produk_bahan_master'),
                'budidaya_biaya_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'budidaya_biaya_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'budidaya_biaya_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_biaya_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->edit_biaya_produksi($id,array(
                'budidaya_biaya_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'budidaya_jenis_id' => $this->input->post('jenis_produk_bahan_master'),
                'budidaya_biaya_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'budidaya_biaya_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'budidaya_biaya_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function tambah_bahan_lain($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->add_bahan_lain(array(
                'budidaya_id' => $this->input->post('budidaya_id'),
                'budidaya_bahan_lain_uraian_id' => $this->input->post('nama_bahan_lain'),
                'budidaya_bahan_lain_volume' => $this->input->post('volume_bahan_lain'),
                'budidaya_bahan_lain_harga' => $this->input->post('harga_bahan_lain'),
                'budidaya_bahan_lain_nilai' => $this->input->post('volume_bahan_lain') * $this->input->post('harga_bahan_lain'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_bahan_lain($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->edit_bahan_lain($id,array(
                'budidaya_bahan_lain_uraian_id' => $this->input->post('nama_bahan_lain'),
                'budidaya_bahan_lain_volume' => $this->input->post('volume_bahan_lain'),
                'budidaya_bahan_lain_harga' => $this->input->post('harga_bahan_lain'),
                'budidaya_bahan_lain_nilai' => $this->input->post('volume_bahan_lain') * $this->input->post('harga_bahan_lain'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function tambah_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->add_nilai_produksi(array(
                'budidaya_id' => $id,
                'budidaya_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'budidaya_jenis_id' => $this->input->post('jenis_nilai_produksi'),
                'budidaya_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'budidaya_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'budidaya_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->edit_nilai_produksi($id,array(
                'budidaya_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'budidaya_jenis_id' => $this->input->post('jenis_nilai_produksi'),
                'budidaya_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'budidaya_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'budidaya_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }


    public function tambah_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->add_perijinan(array(
                'budidaya_id' => $id,
                'budidaya_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'budidaya_perijinan_no' => $this->input->post('no_perijinan'),
                'budidaya_perijinan_tgl' =>$this->input->post('tgl_perijinan')
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Budidaya_model->edit_perijinan($id,array(
                'budidaya_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'budidaya_perijinan_no' => $this->input->post('no_perijinan'),
                'budidaya_perijinan_tgl' =>$this->input->post('tgl_perijinan'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

}