<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_tangkap extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('pendataan/Tangkap_model');
    }
     public function index()
    {
        $data = $this->Tangkap_model->datatables();
        echo $data;
    }

  
    public function add()
    {
                if ($this->input->method('post')) {
                // ADD PENDATAAN UMUM
                    $data = $this->input->post();

                    $tangkap = $this->Tangkap_model->add(array(
                        'petugas_enumerator' => $this->input->post('petugas_enumelator'),
                        'nama_responden' => $this->input->post('nama_responden'),
                        'tahun' => date("Y"),
                        'tanggal_kuesioner' => date('Y-m-d H:i:s'),
                        'user_id' => $this->input->post('user_id'),
                        'submit' => 'Draft'
                    ));

                    $personal = $this->Tangkap_model->add_identitas(array(
                        'tangkap_id' => $tangkap,
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

                    $ket_umum = $this->Tangkap_model->add_ket_umum(array(
                        'tangkap_id' => $tangkap,
                        'tangkap_jenis_perairan' => $this->input->post('tangkap_jenis_perairan'),
                        'luas_pu_m2' => $this->input->post('luas_pu_m2'),
                        'pengelola_pu' => $this->input->post('pengelola_pu'),
                        'jumlah_trip_penangkapan_sebulan' => $this->input->post('jumlah_trip_penangkapan_sebulan'),
                    ));

                    // ADD BAHAN
                    foreach (json_decode($data['bahan']) as $bahan) {
                        $this->Tangkap_model->add_biaya_produksi(array(
                                'tangkap_id' => $tangkap,
                                'tangkap_biaya_produksi_uraian_id' => $bahan->namaProdukBahan,
                                'tangkap_jenis_id' => $bahan->jenisProdukBahan,
                                'tangkap_biaya_produksi_volume' => $bahan->volumeProdukBahan,
                                'tangkap_biaya_produksi_harga' => $bahan->hargaProdukBahan,
                                'tangkap_biaya_produksi_nilai' => $bahan->volumeProdukBahan * $bahan->hargaProdukBahan,
                        ));
                    }

                    foreach (json_decode($data['nilaiProduksi']) as $nilaiProduksi) {
                        $this->Tangkap_model->add_nilai_produksi(array(
                                'tangkap_id' => $tangkap,
                                'tangkap_nilai_produksi_uraian_id' => $nilaiProduksi->namaProduksi,
                                'tangkap_jenis_id' => $nilaiProduksi->jenisProduksi,
                                'tangkap_nilai_produksi_volume' => $nilaiProduksi->volumeProduksi,
                                'tangkap_nilai_produksi_harga' => $nilaiProduksi->hargaProduksi,
                                'tangkap_nilai_produksi_nilai' => $nilaiProduksi->volumeProduksi * $nilaiProduksi->hargaProduksi,
                        ));
                    }

                    foreach (json_decode($data['perijinan']) as $perijinan) {
                        $this->Tangkap_model->add_perijinan(array(
                            'tangkap_id' => $tangkap,
                            'tangkap_perijinan_no' => $perijinan->noPerijinan,
                            'tangkap_perijinan_tgl' => $perijinan->tglPerijinan,
                            'tangkap_perijinan_uraian_id' => $perijinan->jenisPerijinan
                        ));
                    }
                } else {
                    throw new Exception('Method not Allowed');
                }
           
            echo json_encode($tangkap);
    }

    
    public function delete($id)
    {
        echo json_encode($this->Tangkap_model->delete($id));

        redirect(site_url('pendataan/tangkap'));
    }

    public function submit($id)
    {
        echo json_encode($this->Tangkap_model->submit($id));
        redirect(site_url('pendataan/tangkap'));
    }

    public function draft($id)
    {
        echo json_encode($this->Tangkap_model->draft($id));
        redirect(site_url('pendataan/tangkap'));
    }

    public function edit_kuesioner($id)
    {
        if ($this->input->method('post')) {

            $this->Tangkap_model->edit_identitas($id, array(
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

             $this->Tangkap_model->edit_ket_umum($id, array(
                'tangkap_jenis_perairan' => $this->input->post('tangkap_jenis_perairan'),
                'luas_pu_m2' => $this->input->post('luas_pu_m2'),
                'pengelola_pu' => $this->input->post('pengelola_pu'),
                'jumlah_trip_penangkapan_sebulan' => $this->input->post('jumlah_trip_penangkapan_sebulan'),
            ));

            echo json_encode($this->Tangkap_model->edit_kuesioner($id, array(
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
            echo json_encode($this->Tangkap_model->edit_kuesioner($id, array(
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
            echo json_encode($this->Tangkap_model->add_biaya_produksi(array(
                'tangkap_id' => $id,
                'tangkap_biaya_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'tangkap_jenis_id' => $this->input->post('jenis_produk_bahan_master'),
                'tangkap_biaya_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'tangkap_biaya_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'tangkap_biaya_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_biaya_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Tangkap_model->edit_biaya_produksi($id,array(
                'tangkap_biaya_produksi_uraian_id' => $this->input->post('nama_produk_bahan_master'),
                'tangkap_jenis_id' => $this->input->post('jenis_produk_bahan_master'),
                'tangkap_biaya_produksi_volume' =>$this->input->post('volume_produk_bahan_master'),
                'tangkap_biaya_produksi_harga' => $this->input->post('harga_produk_bahan_master'),
                'tangkap_biaya_produksi_nilai' => $this->input->post('volume_produk_bahan_master') * $this->input->post('harga_produk_bahan_master'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function tambah_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Tangkap_model->add_nilai_produksi(array(
                'tangkap_id' => $id,
                'tangkap_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'tangkap_jenis_id' => $this->input->post('jenis_nilai_produksi'),
                'tangkap_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'tangkap_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'tangkap_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_nilai_produksi($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Tangkap_model->edit_nilai_produksi($id,array(
                'tangkap_nilai_produksi_uraian_id' => $this->input->post('nama_nilai_produksi'),
                'tangkap_jenis_id' => $this->input->post('jenis_nilai_produksi'),
                'tangkap_nilai_produksi_volume' =>$this->input->post('volume_nilai_produksi'),
                'tangkap_nilai_produksi_harga' => $this->input->post('harga_nilai_produksi'),
                'tangkap_nilai_produksi_nilai' => $this->input->post('volume_nilai_produksi') * $this->input->post('harga_nilai_produksi'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }


    public function tambah_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Tangkap_model->add_perijinan(array(
                'tangkap_id' => $id,
                'tangkap_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'tangkap_perijinan_no' => $this->input->post('no_perijinan'),
                'tangkap_perijinan_tgl' =>$this->input->post('tgl_perijinan')
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }

    public function edit_perijinan($id){
        if ($this->input->method('post')) {
            echo json_encode($this->Tangkap_model->edit_perijinan($id,array(
                'tangkap_perijinan_uraian_id' => $this->input->post('jenis_perijinan'),
                'tangkap_perijinan_no' => $this->input->post('no_perijinan'),
                'tangkap_perijinan_tgl' =>$this->input->post('tgl_perijinan'),
            )));
        } else {
            throw new Exception('Method not Allowed');
         }
    }
}