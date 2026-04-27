<?php

class Statistik_mina_padi extends MY_Controller
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
            'page_title' => 'Statistik Ikan Hias',
            'site_title' => 'Data Statistik',
            'ui_controller' => 'dashboard/home',
		));
        $data['pelaku_mina_padi'] = $this->dashboard_model->pelaku_mina_padi();
        $data['nilai_produksi_mina_padi'] = $this->dashboard_model->nilai_produksi_mina_padi();
        
			$this->template
					->set_title('Profil')
                    ->set_js(assets_url('js/chart'))
                    ->set_js(assets_url('js/app/pengolahan_data/budidaya/mina_padi.js'))
                    ->set_layout('admin_front')
					->build('pengolahan_data/statistik_mina_padi',$data);
	}
}