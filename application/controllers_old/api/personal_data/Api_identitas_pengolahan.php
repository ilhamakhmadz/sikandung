<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_identitas_pengolahan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('personal_data/identitas_pengolahan_model');
    }
     public function index()
    {
        $data = $this->identitas_pengolahan_model->datatables();
        echo $data;
    }

    public function checkNik($nik){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://202.180.16.44/getnik.php?nik=$nik",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        ));

        $data = json_decode(curl_exec($curl));
        $response = json_encode($data->content);
        echo $response;
        
        // $data = array('content' => array([
        //     'Kd_Kec' => 'dasdad',
        //     'Kd_Kabupaten' =>1,
        //     'Nama_Kecamatan' => 200,
        //     ]),'coreq' => 'Di2k');
        // $response = json_encode($data['content']);
        // echo $response;
        // die;
    }

    public function validNik($nik){
        $data = $this->identitas_pengolahan_model->validNik($nik);
        echo json_encode($data);
    }


    public function add()
    {
        $data = $this->identitas_pengolahan_model->add(array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'npwp' => $this->input->post('npwp'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_telp' => $this->input->post('no_telp'),
            'agama' => $this->input->post('agama'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'pendidikan' => $this->input->post('pendidikan'),
            'status_kawin' => $this->input->post('status_kawin'),
            'gol_darah' => $this->input->post('gol_darah'),
            'prov_nama' => $this->input->post('prov_nama'),
            'kab_nama' => $this->input->post('kab_nama'),
            'kec_nama' => $this->input->post('kec_nama'),
            'kel_nama' => $this->input->post('kel_nama'),
            'no_prov' => $this->input->post('no_prov'),
            'no_kab' => $this->input->post('no_kab'),
            'no_kec' => $this->input->post('no_kec'),
            'no_kel' => $this->input->post('no_kel'),
            'no_rw' => $this->input->post('no_rw'),
            'no_rt' => $this->input->post('no_rt'),
            'alamat' => $this->input->post('alamat'),
            'created_at' => $this->session->userdata('id'),
            'visible' => 1
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->identitas_pengolahan_model->delete($id));

        redirect(site_url('personal_data/personal_data'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->identitas_pengolahan_model->edit($id, array(
                'no_kk' => $this->input->post('no_kk'),
                'nik' => $this->input->post('nik'),
                'npwp' => $this->input->post('npwp'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_telp' => $this->input->post('no_telp'),
                'agama' => $this->input->post('agama'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'status_kawin' => $this->input->post('status_kawin'),
                'gol_darah' => $this->input->post('gol_darah'),
                'prov_nama' => $this->input->post('prov_nama'),
                'kab_nama' => $this->input->post('kab_nama'),
                'kec_nama' => $this->input->post('kec_nama'),
                'kel_nama' => $this->input->post('kel_nama'),
                'no_prov' => $this->input->post('no_prov'),
                'no_kab' => $this->input->post('no_kab'),
                'no_kec' => $this->input->post('no_kec'),
                'no_kel' => $this->input->post('no_kel'),
                'no_rw' => $this->input->post('no_rw'),
                'no_rt' => $this->input->post('no_rt'),
                'alamat' => $this->input->post('alamat'),
                'updated_at' => $this->session->userdata('id'),
                'updated_date' => date('Y-m-d'),
                'visible' => 1
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}