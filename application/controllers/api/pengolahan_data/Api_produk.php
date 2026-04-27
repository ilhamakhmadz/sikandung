<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_produk extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('pengolahan_data/produk_model');
    }
     public function index()
    {
        $data = $this->produk_model->datatables();
        echo $data;
    }

//     public function delete($id)
//     {
//         echo json_encode($this->produk_model->delete($id));

//         redirect(site_url('pengolahan_data/produk'));
//     }

  
//     public function add()
//     {
      
//             if ($this->input->method('post')) {
//                 // ADD PENDATAAN UMUM
//                 $id_personal = $this->produk_model->add(array(
//                     'id_personal_data' => $this->input->post('id_personal_data'),
//                     'nama_perusahaan' => $this->input->post('nama_perusahaan'),
//                     'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
//                     'telp_perusahaan' => $this->input->post('telp_perusahaan'),
//                     'email' => $this->input->post('email_perusahaan'),
//                     'website' => $this->input->post('website_perusahaan'),
//                     'instagram' => $this->input->post('instagram_perusahaan'),
//                     'facebook' => $this->input->post('facebook_perusahaan'),
//                     'keterangan' => $this->input->post('keterangan'),
//                     'aktiva_lancar' => $this->input->post('aktiva_lancar'),
//                     'investasi' => $this->input->post('investasi'),
//                     'omzet_tahun' => $this->input->post('omzet'),
//                     'laba_bersih' => $this->input->post('laba_bersih'),
//                     'sistem_administrasi' => $this->input->post('sistem_administrasi'),
//                     'laporan_keuangan' => $this->input->post('laporan_keuangan'),
//                     'kapasitas_produksi' => $this->input->post('kapasitas_produksi'),
//                     'lat' => $this->input->post('lat'),
//                     'lang' => $this->input->post('lang'),
//             ));

//             // ADD RELASI PERSONAL DATA DENGAN DATA UMUM
//             $personal_pendataan = $this->produk_model->add_personal_ekonomi(array(
//                 'id_personal_data' => $this->input->post('id_personal_data'),
//                 'id_jenis_pendataan' => $this->input->post('jenis_pendataan'),
//                 'id_data_perekonomian' => $id_personal,
//                 'id_bidang_usaha' => $this->input->post('bidang_usaha'),
//                 'created_date' => date('Y-m-d'),
//                 'created_at' => $this->session->userdata('id'),
//                 'visible' => 1
//             ));
           
//             // ADD PERIJINAN
//             $data = $this->input->post();
//             foreach (json_decode($data['perijinan']) as $perijinan) {
//                 $this->produk_model->add_perijinan(array(
//                         'id_personal_data' => $this->input->post('id_personal_data'),
//                         'id_data_perekonomian' => $id_personal,
//                         'no_perijinan' => $perijinan->noPerijinan,
//                         'tgl_perijinan' => $perijinan->tglPerijinan,
//                         'jenis_perijinan' => $perijinan->jenisPerijinan
//                 ));
    
//             }

//             // ADD PEMASARAN
//             foreach (json_decode($data['pemasaran']) as $pemasaran) {
//                 $this->produk_model->add_pemasaran(array(
//                         'id_data_perekonomian' => $id_personal,
//                         'id_personal_data' => $this->input->post('id_personal_data'),
//                         'nama_produk' => $pemasaran->namaProduk,
//                         'stok_produk' => $pemasaran->stokProduk,
//                         'lokasi' => $pemasaran->lokasiProduk,
//                         'img_produk' => $pemasaran->gambarProduk,
//                         'harga_produk' => $pemasaran->hargaProduk,
//                         'volume_produk' => $pemasaran->volumeProduk
//                 ));
    
//             }

//             // ADD PEMODALAN
//             // foreach (json_decode($data['pemodalan']) as $pemodalan) {
//             //     $this->produk_model->add_pemodalan(array(
//             //             'id_data_perekonomian' => $id_personal,
//             //             'id_personal_data' => $this->input->post('id_personal_data'),
//             //             'jenis_pemodalan' => $pemodalan->jenisPemodalan,
//             //             'sumber_permodalan' => $pemodalan->sumberPemodalan,
//             //             'jumlah_pemodalan' => $pemodalan->jumlahPemodalan,
//             //             'tahun_diperoleh' => $pemodalan->tahunPerolehan
//             //     ));
    
//             // }

//             // ADD BANTUAN
//             foreach (json_decode($data['bantuan']) as $bantuan) {
//                 $this->produk_model->add_bantuan(array(
//                         'id_data_perekonomian' => $id_personal,
//                         'id_personal_data' => $this->input->post('id_personal_data'),
//                         'jenis_bantuan' => $bantuan->jenisBantuan,
//                         'volume_bantuan' => $bantuan->jumlahBantuan,
//                         'sumber_bantuan' => $bantuan->sumberBantuan,
//                         'tahun_bantuan' => $bantuan->tahunPerolehanBantuan
//                 ));
        
//             }

//                // ADD PELATIHAN
//             //    foreach (json_decode($data['pelatihan']) as $pelatihan) {
//             //     $this->produk_model->add_pelatihan(array(
//             //             'id_data_perekonomian' => $id_personal,
//             //             'id_personal_data' => $this->input->post('id_personal_data'),
//             //             'nama_pelatihan' => $pelatihan->namaPelatihan,
//             //             'sumber_palatihan' => $pelatihan->sumberPelatihan,
//             //             'tahun_pelatihan' => $pelatihan->tahunPelatihan
//             //     ));
        
//             // }
            
//             // ADD KARYAWAN
//             $id_karyawan = $this->produk_model->add_karyawan(array(
//                 'id_personal_data' => $this->input->post('id_personal_data'),
//                 'id_data_perekonomian' => $id_personal,
//                 'karyawan_tetap' => $this->input->post('karyawan_tetap'),
//                 'karyawan_harian' => $this->input->post('karyawan_harian'),
//                 'karyawan_paruh_waktu' => $this->input->post('karyawan_paruh_waktu'),
//                 'karyawan_sd' => $this->input->post('karyawan_sd'),
//                 'karyawan_smp' => $this->input->post('karyawan_smp'),
//                 'karyawan_sma' => $this->input->post('karyawan_sma'),
//                 'karyawan_sarjana' => $this->input->post('karyawan_sarjana'),
//                 'karyawan_pendidikan_informal' => $this->input->post('karyawan_pendidikan_informal'),
//                 'karyawan_wanita' => $this->input->post('karyawan_wanita'),
//                 'karyawan_pria' => $this->input->post('karyawan_pria')
//             ));
            


//             } else {
//             throw new Exception('Method not Allowed');
//             }
           
//         echo json_encode($data);
//     }
//     // public function delete($id)
//     // {
//     //     echo json_encode($this->produk_model->delete($id));

//     //     redirect(site_url('personal_data/personal_data'));
//     // }

//     public function edit($id)
//     {
//         if ($this->input->method('post')) {
//             echo json_encode($this->produk_model->edit($id, array(
//                     'id_personal_data' => $this->input->post('id_personal_data'),
//                     'nama_perusahaan' => $this->input->post('nama_perusahaan'),
//                     'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
//                     'telp_perusahaan' => $this->input->post('telp_perusahaan'),
//                     'email' => $this->input->post('email_perusahaan'),
//                     'website' => $this->input->post('website_perusahaan'),
//                     'instagram' => $this->input->post('instagram_perusahaan'),
//                     'facebook' => $this->input->post('facebook_perusahaan'),
//                     'aktiva_lancar' => $this->input->post('aktiva_lancar'),
//                     'investasi' => $this->input->post('investasi'),
//                     'omzet_tahun' => $this->input->post('omzet'),
//                     'laba_bersih' => $this->input->post('laba_bersih'),
//                     'sistem_administrasi' => $this->input->post('sistem_administrasi'),
//                     'laporan_keuangan' => $this->input->post('laporan_keuangan'),
//                     'kapasitas_produksi' => $this->input->post('kapasitas_produksi'),
//                     'lat' => $this->input->post('lat'),
//                     'lang' => $this->input->post('lang'),
//                     'updated_date' => date('Y-m-d'),
//                     'visible' => 1
//          )));
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }
//     // EDIT PRODUK
//     public function edit_produk($id)
//     {
//         if ($this->input->method('post')) {
//             if(!empty($this->input->post('gambar_produk'))){
//                 // 'old_img' => ,
//                 $filename =  realpath(base64_decode($this->input->post('old_img')));
//                 unlink($filename);
//                 echo json_encode($this->produk_model->edit_produk($id, array(
//                     'nama_produk' => $this->input->post('nama_produk'),
//                     'stok_produk' => $this->input->post('stok_produk'),
//                     'lokasi' => $this->input->post('lokasi'),
//                     'volume_produk' => $this->input->post('volume_produk'),
//                     'harga_produk' => $this->input->post('harga_produk'),
//                     'img_produk' => $this->input->post('gambar_produk'),
//                 )));
//                 // echo "ada";
//             }else{
//                 echo json_encode($this->produk_model->edit_produk($id, array(
//                     'nama_produk' => $this->input->post('nama_produk'),
//                     'stok_produk' => $this->input->post('stok_produk'),
//                     'lokasi' => $this->input->post('lokasi'),
//                     'img_produk' => $this->input->post('old_img'),
//                     'volume_produk' => $this->input->post('volume_produk'),
//                     'harga_produk' => $this->input->post('harga_produk'),
//                 )));
//                 // echo "tdk ada";
//             }
            
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }

//     // ADD PRODUK
//     public function add_produk()
//     {
//         if ($this->input->method('post')) {
//             if(!empty($this->input->post('gambar_produk'))){
//                 echo json_encode($this->produk_model->add_produk(array(
//                     'id_data_perekonomian' => $this->input->post('id_perekonomian'),
//                     'id_personal_data' => $this->input->post('id_personal_data'),
//                     'nama_produk' => $this->input->post('nama_produk'),
//                     'stok_produk' => $this->input->post('stok_produk'),
//                     'lokasi' => $this->input->post('lokasi'),
//                     'volume_produk' => $this->input->post('volume_produk'),
//                     'harga_produk' => $this->input->post('harga_produk'),
//                     'img_produk' => $this->input->post('gambar_produk'),
//                 )));
//             }else{
//                 echo json_encode($this->produk_model->add_produk(array(
//                     'id_data_perekonomian' => $this->input->post('id_perekonomian'),
//                     'id_personal_data' => $this->input->post('id_personal_data'),
//                     'nama_produk' => $this->input->post('nama_produk'),
//                     'stok_produk' => $this->input->post('stok_produk'),
//                     'lokasi' => $this->input->post('lokasi'),
//                     'img_produk' => $this->input->post('old_img'),
//                     'volume_produk' => $this->input->post('volume_produk'),
//                     'harga_produk' => $this->input->post('harga_produk'),
//                 )));
//             }
            
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }


//     // EDIT PRODUK
//     public function edit_pegawai($id)
//     {
//         if ($this->input->method('post')) {
//                 echo json_encode($this->produk_model->edit_pegawai($id, array(
//                     'karyawan_tetap' => $this->input->post('karyawan_tetap'),
//                     'karyawan_harian' => $this->input->post('karyawan_harian'),
//                     'karyawan_paruh_waktu' => $this->input->post('karyawan_paruh_waktu'),
//                     'karyawan_sd' => $this->input->post('karyawan_sd'),
//                     'karyawan_smp' => $this->input->post('karyawan_smp'),
//                     'karyawan_sma' => $this->input->post('karyawan_sma'),
//                     'karyawan_sarjana' => $this->input->post('karyawan_sarjana'),
//                     'karyawan_pendidikan_informal' => $this->input->post('karyawan_pendidikan_informal'),
//                     'karyawan_wanita' => $this->input->post('karyawan_wanita'),
//                     'karyawan_pria' => $this->input->post('karyawan_pria'),
//                 )));
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }


    
//     // EDIT PERIJINAN
//     public function edit_perijinan($id)
//     {
//         if ($this->input->method('post')) {
//                 echo json_encode($this->produk_model->edit_perijinan($id, array(
//                     'jenis_perijinan' => $this->input->post('jenis_perijinan'),
//                     'no_perijinan' => $this->input->post('no_perijinan'),
//                     'tgl_perijinan' => $this->input->post('tgl_perijinan'),
//                 )));
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }


//      // ADD PERIJINAN
//      public function add_perijinan()
//      {
//          if ($this->input->method('post')) {
//                  $data = $this->produk_model->add_perijinan(array(
//                      'id_personal_data' => $this->input->post('id_personal_data'),
//                      'id_data_perekonomian' => $this->input->post('id_data_perekonomian'),
//                      'jenis_perijinan' => $this->input->post('jenis_perijinan'),
//                      'no_perijinan' => $this->input->post('no_perijinan'),
//                      'tgl_perijinan' => $this->input->post('tgl_perijinan')
//                  ));
//                  echo json_encode($data);
//          } else {
//             throw new Exception('Method not Allowed');
//          }
//      }


// //     // EDIT PEMODALAN
// //     public function edit_pemodalan($id)
// //     {
// //         if ($this->input->method('post')) {
// //                 echo json_encode($this->produk_model->edit_pemodalan($id, array(
// //                     'sumber_permodalan' => $this->input->post('sumber_permodalan'),
// //                     'jenis_pemodalan' => $this->input->post('jenis_pemodalan'),
// //                     'jumlah_pemodalan' => $this->input->post('jumlah_pemodalan'),
// //                     'tahun_diperoleh' => $this->input->post('tahun_perolehan'),
// //                 )));
// //         } else {
// //            throw new Exception('Method not Allowed');
// //         }
// //     }


// //     //  ADD PEMODALAN
// //      public function add_pemodalan()
// //      {
// //          if ($this->input->method('post')) {
// //                  $data = $this->produk_model->add_pemodalan(array(
// //                     'id_personal_data' => $this->input->post('id_personal_data'),
// //                     'id_data_perekonomian' => $this->input->post('id_data_perekonomian'),
// //                     'jenis_pemodalan' =>$this->input->post('jenis_pemodalan'),
// //                     'sumber_permodalan' => $this->input->post('sumber_permodalan'),
// //                     'jumlah_pemodalan' => $this->input->post('jumlah_pemodalan'),
// //                     'tahun_diperoleh' => $this->input->post('tahun_perolehan')
// //                  ));
// //                  echo json_encode($data);
// //          } else {
// //             throw new Exception('Method not Allowed');
// //          }
// //      }


//      // EDIT BANTUAN
//     public function edit_bantuan($id)
//     {
//         if ($this->input->method('post')) {
//                 echo json_encode($this->produk_model->edit_bantuan($id, array(
//                     'sumber_bantuan' => $this->input->post('sumber_bantuan'),
//                     'jenis_bantuan' => $this->input->post('jenis_bantuan'),
//                     'volume_bantuan' => $this->input->post('jumlah_bantuan'),
//                     'tahun_bantuan' => $this->input->post('tahun_perolehan_bantuan'),
//                 )));
//         } else {
//            throw new Exception('Method not Allowed');
//         }
//     }



// //  ADD BANTUAN
//     public function add_bantuan()
//     {
//     if ($this->input->method('post')) {
//                echo json_encode($this->produk_model->add_bantuan(array(
//                         'id_personal_data' => $this->input->post('id_personal_data'),
//                         'id_data_perekonomian' => $this->input->post('id_data_perekonomian'),
//                         'jenis_bantuan' => $this->input->post('jenis_bantuan'),
//                         'volume_bantuan' => $this->input->post('jumlah_bantuan'),
//                         'sumber_bantuan' => $this->input->post('sumber_bantuan'),
//                         'tahun_bantuan' => $this->input->post('tahun_perolehan_bantuan')
//                 )));
//         } else {
//         throw new Exception('Method not Allowed');
//         }
//     }


//     //   // EDIT PELATIHAN
//     //   public function edit_pelatihan($id)
//     //   {
//     //       if ($this->input->method('post')) {
//     //               echo json_encode($this->produk_model->edit_pelatihan($id, array(
//     //                 'nama_pelatihan' => $this->input->post('nama_pelatihan'),
//     //                 'sumber_palatihan' => $this->input->post('sumber_pelatihan'),
//     //                 'tahun_pelatihan' => $this->input->post('tahun_pelatihan')
//     //               )));
//     //       } else {
//     //          throw new Exception('Method not Allowed');
//     //       }
//     //   }
  
  
  
// //   //  ADD PELATIHAN
// //       public function add_pelatihan()
// //       {
// //       if ($this->input->method('post')) {
// //         echo json_encode($this->produk_model->add_pelatihan(array(
// //             'id_data_perekonomian' => $this->input->post('id_data_perekonomian'),
// //             'id_personal_data' => $this->input->post('id_personal_data'),
// //             'nama_pelatihan' => $this->input->post('nama_pelatihan'),
// //             'sumber_palatihan' => $this->input->post('sumber_pelatihan'),
// //             'tahun_pelatihan' => $this->input->post('tahun_pelatihan')
// //         )));
// //       } else {
// //          throw new Exception('Method not Allowed');
// //       }
// // }


}