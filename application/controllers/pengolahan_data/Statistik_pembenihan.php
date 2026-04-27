<?php

class Statistik_pembenihan extends Admin_Controller
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
            'page_title' => 'Statistik Pembenihan',
            'site_title' => 'Data Statistik',
            'ui_controller' => 'dashboard/home',
		));
        $data['pelaku_pembenihan'] = $this->dashboard_model->pelaku_pembenihan();
        $data['nilai_produksi_pembenihan'] = $this->dashboard_model->nilai_produksi_pembenihan();
        $data['total_produksi_pembenihan'] = $this->dashboard_model->total_produksi_pembenihan();
			$this->template
					->set_title('Profil')
                    ->set_js(assets_url('js/chart'))
                    ->set_js(assets_url('js/app/pengolahan_data/budidaya/pembenihan.js'))
					->build('pengolahan_data/statistik_pembenihan',$data);
	}
}