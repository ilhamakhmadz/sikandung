<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_kabupaten extends CI_Controller
{
    public function __construct()
    {   
        parent::__construct();
         $this->load->model('master/kabupaten_model');
    }
    public function index(){
        $data = $this->kabupaten_model->datatables();
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
                        'content' => $this->kabupaten_model->add(array(
                                    'kd_kabupaten' => $this->input->post('kd_kabupaten'),
                                    'nama_kabupaten' => $this->input->post('nama_kabupaten'),
                                    'created_by' => $this->session->userdata('id')
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
                        'content' => $this->kabupaten_model->edit($this->input->post('id'), array(
                                    'kd_kabupaten' => $this->input->post('kd_kabupaten'),
                                    'nama_kabupaten' => $this->input->post('nama_kabupaten'),
                                    'updated_by' => $this->session->userdata('id'),
                                    'updated_date' => date('Y-m-d h:i:s')
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
    public function delete($id)
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

        if ($login_api === true ) {
            echo json_encode($this->visi_model->delete($id));

            redirect(site_url('perencanaan/renstra/visi'));
        } else {
           throw new Exception('Method not Allowed');
        }
       
    }


}