<?php

class Statistik_pembesaran extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));
    }

	
    public function index()
	{
		$this->load->vars(array(
            'page_title' => 'Statistik Pembesaran',
            'site_title' => 'Data Statistik',
            'ui_controller' => 'dashboard/home',
		));
        $data['pelaku_pembesaran'] = $this->dashboard_model->pelaku_pembesaran();
        $data['nilai_produksi_pembesaran'] = $this->dashboard_model->nilai_produksi_pembesaran();
        
			$this->template
					->set_title('Profil')
                    ->set_js(assets_url('js/chart'))
                    ->set_js(assets_url('js/app/pengolahan_data/budidaya/pembesaran.js'))
					->build('pengolahan_data/statistik_pembesaran',$data);
	}
}