<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_dispakan extends Api_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('report/pembenihan_model');
        $this->load->model('report/pembesaran_model');
        $this->load->model('report/ikan_hias_model');
        $this->load->model('report/pengolahan_model');
        $this->load->model('report/mina_padi_model');
        $this->load->model('report/nelayan_tangkap_model');
        $this->load->model('dashboard_model');

        
    }


    public function checkToken($tokenid){
        if($tokenid == 'bappedaBedas'){
            return true;
        }else{
            $response = array(
                'code'=>500, 
                'message' =>"Access Denied",
                "data" => NULL
            );
            echo json_encode($response);
            die;
         }
        
    }

    public function dataChart(){
        $pelaku_pembenihan = $this->dashboard_model->pelaku_pembenihan();
        $nilai_produksi_pembenihan = $this->dashboard_model->nilai_produksi_pembenihan();

        $pelaku_pembesaran = $this->dashboard_model->pelaku_pembesaran();
        $nilai_produksi_pembesaran = $this->dashboard_model->nilai_produksi_pembesaran();

        $pelaku_ikan_hias = $this->dashboard_model->pelaku_ikan_hias();
        $nilai_produksi_ikan_hias = $this->dashboard_model->nilai_produksi_ikan_hias();

        $pelaku_mina_padi = $this->dashboard_model->pelaku_mina_padi();
        $nilai_produksi_mina_padi = $this->dashboard_model->nilai_produksi_mina_padi();

        $pelaku_tangkap = $this->dashboard_model->pelaku_tangkap();
        $alat_tangkap = $this->dashboard_model->alat_tangkap();
        $nilai_produksi_tangkap = $this->dashboard_model->nilai_produksi_tangkap();

        $pelaku_pengolahan = $this->dashboard_model->pelaku_pengolahan();
        $nilai_produksi_pengolahan = $this->dashboard_model->nilai_produksi_pengolahan();

        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->pembenihan_model->pembenihan_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"STATISTIK DATA SIKANDUNG",
                "data" => array(
                            'pembenihan'=> array(
                                            'jumlah_pelaku_pembenihan' => $pelaku_pembenihan,
                                            'nilai_produksi_pembenihan' => $nilai_produksi_pembenihan,
                                            )
                            ,
                            'pembesaran'=> array(
                                'jumlah_pelaku_pembesaran' => $pelaku_pembesaran,
                                'nilai_produksi_pembesaran' => $nilai_produksi_pembesaran,
                                )
                            ,
                            'ikan_hias'=> array(
                                'jumlah_pelaku_ikan_hias' => $pelaku_ikan_hias,
                                'nilai_produksi_ikan_hias' => $nilai_produksi_ikan_hias,
                                )
                            ,
                            'nelayan_tangkap'=> array(
                                'jumlah_pelaku_nelayan_tangkap' => $pelaku_tangkap,
                                'alat_nelayan_tangkap' => $alat_tangkap,
                                'nilai_produksi_nelayan_tangkap' => $nilai_produksi_tangkap,
                                )
                            ,
                            'pengolahan'=> array(
                                'jumlah_pelaku_pengolahan' => $pelaku_pengolahan,
                                'nilai_produksi_pengolahan' => $nilai_produksi_pengolahan,
                                )
                            )
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
    }

    public function pembenihan()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->pembenihan_model->pembenihan_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA BUDIDAYA PEMBENIHAN",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }
    public function pembesaran()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->pembesaran_model->pembesaran_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA BUDIDAYA PEMBESARAN",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }
    public function mina_padi()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->mina_padi_model->mina_padi_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA BUDIDAYA MINA PADI",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }
    public function ikan_hias()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->ikan_hias_model->ikan_hias_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA BUDIDAYA IKAN HIAS",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }
    public function pengolahan()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->pengolahan_model->pengolahan_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA PENGOLAHAN HASIL PERIKANAN",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }
    public function nelayan_tangkap()
    {
        $this->log_request();
		$get = $this->input->get();
		$token = $get['token'];
        $this->checkToken($token);
        $data = $this->nelayan_tangkap_model->nelayan_tangkap_all();
        if (isset($data)) {
            $response = array(
                'code'=>200, 
                'message' =>"API success",
                'title' =>"DATA PERIKANAN TANGKAP",
                "data" => $data
            );
        } else {
            $response = array(
                'code'=>403, 
                'message' =>"API forbidden",
                "data" => NULL
            );
         }
         echo json_encode($response);
        
    }

    
}