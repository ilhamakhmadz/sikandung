<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Home extends Admin_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('pendataan/budidaya_model');
        $this->load->model('pendataan/pengolahan_model');
        $this->load->model('pendataan/tangkap_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));
    }

	
    public function index()
	{
		$this->load->vars(array(
            'page_title' => '',
            'ui_controller' => 'dashboard/home',
		));
        $data['budidaya_result'] = $this->budidaya_model->get_by_limit(6);
        $data['pengolahan_result'] = $this->pengolahan_model->get_by_limit(6);
        $data['tangkap_result'] = $this->tangkap_model->get_by_limit(6);

        $data['pelaku_pembenihan'] = $this->dashboard_model->pelaku_pembenihan();
        $data['nilai_produksi_pembenihan'] = $this->dashboard_model->nilai_produksi_pembenihan();
        $data['pelaku_pembesaran'] = $this->dashboard_model->pelaku_pembesaran();
        $data['nilai_produksi_pembesaran'] = $this->dashboard_model->nilai_produksi_pembesaran();
        $data['pelaku_ikan_hias'] = $this->dashboard_model->pelaku_ikan_hias();
        $data['nilai_produksi_ikan_hias'] = $this->dashboard_model->nilai_produksi_ikan_hias();
        $data['pelaku_mina_padi'] = $this->dashboard_model->pelaku_mina_padi();
        $data['nilai_produksi_mina_padi'] = $this->dashboard_model->nilai_produksi_mina_padi();

        $data['pelaku_tangkap'] = $this->dashboard_model->pelaku_tangkap();
        $data['alat_tangkap'] = $this->dashboard_model->alat_tangkap();
        $data['nilai_produksi_tangkap'] = $this->dashboard_model->nilai_produksi_tangkap();

        $data['pelaku_pengolahan'] = $this->dashboard_model->pelaku_pengolahan();
        $data['nilai_produksi_pengolahan'] = $this->dashboard_model->nilai_produksi_pengolahan();
		
        
			$this->template
					->set_title('Profil')
					->build('dashboard/index',$data);
	}

}
