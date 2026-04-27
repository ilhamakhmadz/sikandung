<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/kecamatan_model');
    }
     public function index()
    {
        $data = $this->kecamatan_model->datatables();
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
                        'content' => $this->kecamatan_model->add(array(
                                    'Kd_Kec' => $this->input->post('Kd_Kec'),
                                    'Kd_Kabupaten' => $this->input->post('Kd_Kabupaten'),
                                    'Nama_Kecamatan' => $this->input->post('Nama_Kecamatan')
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
                        'content' => $this->kecamatan_model->delete($this->input->post('id')),
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
        // echo ($this->input->post('id')); 
        // json_encode($this->kecamatan_model->delete($id));

        // redirect(site_url('master/kecamatan'));
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
                        'content' => $this->kecamatan_model->edit($this->input->post('id'), array(
                                    'Kd_Kec' => $this->input->post('Kd_Kec'),
                                    'Kd_Kabupaten' => $this->input->post('Kd_Kabupaten'),
                                    'Nama_Kecamatan' => $this->input->post('Nama_Kecamatan')
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