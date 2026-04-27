<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_desa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/desa_model');
    }
     public function index()
    {
        $data = $this->desa_model->datatables();
        echo $data;
    }
    public function add()
    {
        if($this->input->post('key_api') == ""){
            if($this->session->userdata('api_password') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }else{
            if($this->input->post('key_api') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }

        if ($this->input->method('post') == 'POST') {
            if($login_api === true) {
                echo json_encode(
                    array(
                        'content' => $this->desa_model->add(array(
                                    'Kd_Kec' => $this->input->post('Kd_Kec'),
                                    'Kd_Desa' => $this->input->post('Kd_Kec').''.$this->input->post('Kd_Desa'),
                                    'Nama_Desa' => $this->input->post('Nama_Desa')
                                    )),
                        'status' => 'success',
                        'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                        )
                );
                   
            }else{
                echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Password yang dimasukkan salah",
                                        'responseStatus' => 100,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                    );
            }
        }else{
             echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Tidak dapat menjalankan fungsi - Mohon perhatikan dokumentasi",
                                        'responseStatus' => 200,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                );
        }


    }
    public function delete()
    {
        if($this->input->post('key_api') == ""){
            if($this->session->userdata('api_password') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }else{
            if($this->input->post('key_api') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }

        if ($this->input->method('post') == 'POST') {
            if($login_api === true) {
                echo json_encode(
                    array(
                        'content' => $this->desa_model->delete($this->input->post('id')),
                        'status' => 'success',
                        'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                        )
                );
                   
            }else{
                echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Password yang dimasukkan salah",
                                        'responseStatus' => 100,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                    );
            }
        }else{
             echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Tidak dapat menjalankan fungsi - Mohon perhatikan dokumentasi",
                                        'responseStatus' => 200,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                );
        }
    }

    public function edit()
    {
        if($this->input->post('key_api') == ""){
            if($this->session->userdata('api_password') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }else{
            if($this->input->post('key_api') == $this->config->item('api_password')){
                $login_api = true;
            }else{
                $login_api = false;
            }
        }
        if ($this->input->method('post') == 'POST') {
            if($login_api === true) {
                echo json_encode(
                    array(
                        'content' => $this->desa_model->edit($this->input->post('id'), array(
                                        'Kd_Kec' => $this->input->post('Kd_Kec'),
                                        'Kd_Desa' => $this->input->post('Kd_Kec').''.$this->input->post('Kd_Desa'),
                                        'Nama_Desa' => $this->input->post('Nama_Desa'),
                                    )),
                        'status' => 'success',
                        'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                        )
                );
                   
            }else{
                echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Password yang dimasukkan salah",
                                        'responseStatus' => 100,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                    );
            }
        }else{
             echo json_encode(
                    array(
                    'content' => array(
                                        'responseDesc' => "Tidak dapat menjalankan fungsi - Mohon perhatikan dokumentasi",
                                        'responseStatus' => 200,
                                    ),
                    'status' => 'error',
                    'copyright' => 'Dinas Komunikasi Statistik dan Informatika - Kabupaten Bandung'
                    )
                );
        }
        
    }


}