<?php

class Pengolahan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendataan/pengolahan_model');
        $this->load->model('personal_data/identitas_pengolahan_model');
        $this->load->model('master/kabupaten_model');
        $this->load->model('master/kecamatan_model');
        $this->load->model('master/pengolahan/Pengolahan_bahan_utama_model');
        $this->load->model('master/pengolahan/Pengolahan_bahan_model');
        $this->load->model('master/pengolahan/Pengolahan_alat_produksi_model');
        $this->load->model('master/pengolahan/Pengolahan_nilai_produksi_model');
        $this->load->model('master/pengolahan/Pengolahan_perijinan_model');
        $this->load->model('master/desa_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));
    }

    // DONE
    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Data Kelompok Pengolahan Ikan',
            'site_title' => 'Pendataan',
            'ui_controller' => 'pendataan/pengolahan',
        ));
        if($this->acl->is_allowed('pendataan/pengolahan/add')):
            $this->load->vars(array(
            'page_icon' => '<button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd"><i class=""></i> Tambah</button>',
        ));
        endif;
        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                    ->set_js(assets_url('datatables_responsive/datatables.bundle', true)) 
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('select2/dist/js/select2.min'))
                    ->build('pendataan/pengolahan/index');
    }


    public function add()
    {
            $this->load->vars(array(
                'page_title' => 'Tambah Kuisioner Data Pengolahan',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
            ));
            
            $data['tanggal_kuesioner'] = $this->input->post('tanggal_kuesioner');
            $data['nama_responden'] = $this->input->post('nama_responden');
            $data['petugas_enumelator'] = $this->input->post('petugas_enumelator');
            $data['user_id'] = $this->input->post('user_id');
            $data['kecamatan'] = $this->kecamatan_model->get_all();
            $data['kabupaten'] = $this->kabupaten_model->get_data();
            $data['desa'] = $this->desa_model->get_all();
            $data['alat_produksi'] = $this->Pengolahan_alat_produksi_model->get_all();
            $data['bahan_lainnya'] = $this->Pengolahan_bahan_model->get_all();
            $data['bahan_utama'] = $this->Pengolahan_bahan_utama_model->get_all();
            $data['nilai_produksi'] = $this->Pengolahan_nilai_produksi_model->get_all();
            $data['perijinan'] = $this->Pengolahan_perijinan_model->get_all();

            $this->template 
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_arrows'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_circles'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_dots'))
                        ->set_js(bower_url('smartwizard/dist/js/jquery.smartWizard.min'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/add.js?v=' . time()))
                        ->build('pendataan/pengolahan/add',$data);
    }
    public function view($id)
        {
            $this->load->vars(array(
                'page_title' => 'Detail Data Pengolahan',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
                'ui_controller' => 'pendataan/pengolahan/datail',
            ));
            $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
            $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
            $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
            $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
            $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
            $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
            $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
            $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 

            $this->template
                            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                            ->build('pendataan/pengolahan/show',$data);
        }
    public function detail($id)
    {
        $this->load->vars(array(
            'page_title' => 'Detail Data Pengolahan',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $data['desa'] = $this->desa_model->get_all();
        $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
        $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
        $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
        $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 

        $data['alat_produksi_master'] = $this->Pengolahan_alat_produksi_model->get_all();
        $data['bahan_lainnya_master'] = $this->Pengolahan_bahan_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $data['nilai_produksi_master'] = $this->Pengolahan_nilai_produksi_model->get_all();
        $data['jenis_perijinan'] = $this->Pengolahan_perijinan_model->get_all();

        
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js?v=' . time()))
                        ->build('pendataan/pengolahan/detail',$data);
    }

    public function edit_alat_produksi($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Biaya Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat($id);
        $data['alat_produksi_master'] = $this->Pengolahan_alat_produksi_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_alat_produksi',$data);
    }


    public function edit_bahan_utama($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Bahan Utama',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama($id);
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_bahan_utama',$data);
    }

    public function edit_bahan_lain($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Bahan Lain',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['bahan_lain'] = $this->pengolahan_model->get_by_bahan($id);
        $data['bahan_lainnya_master'] = $this->Pengolahan_bahan_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_bahan_lain',$data);
    }

    public function edit_nilai_produksi($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Nilai Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai($id);
        $data['nilai_produksi_master'] = $this->Pengolahan_nilai_produksi_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();

        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_nilai_produksi',$data);
    }

    public function edit_perijinan($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Perijinan',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan($id);
        $data['jenis_perijinan'] = $this->Pengolahan_perijinan_model->get_all();
        // var_dump($data['perijinan']) or die;
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_perijinan',$data);
    }

    public function pdf($id){

        $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
        $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
        $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
        $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
        $filename = $data['pengolahan_identitas']->nik.'_'.$data['pengolahan_identitas']->nama;
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 
        
        $html = $this->load->view('documents/kuesioner_pengolahan',$data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle($filename);
        $mpdf->SetFooter('Sikandung|'.date("d F Y").'|{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename.'.pdf', 'I');
        
    }

     function delete_alat_produksi($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_alat_produksi($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_bahan_utama($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_bahan_utama($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_bahan_lain($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_bahan_lain($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_nilai_produksi($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_nilai_produksi($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }
    function delete_perijinan($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_perijinan($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

}