<?php

class Statistik_ikan_hias extends MY_Controller
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
        $data['pelaku_ikan_hias'] = $this->dashboard_model->pelaku_ikan_hias();
        $data['nilai_produksi_ikan_hias'] = $this->dashboard_model->nilai_produksi_ikan_hias();
        
			$this->template
					->set_title('Profil')
                    ->set_js(assets_url('js/chart'))
                    ->set_js(assets_url('js/app/pengolahan_data/budidaya/ikan_hias.js'))
                    ->set_layout('admin_front')
					->build('pengolahan_data/statistik_ikan_hias',$data);
	}
}