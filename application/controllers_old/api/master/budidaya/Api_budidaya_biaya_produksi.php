<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya_biaya_produksi extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/budidaya/budidaya_biaya_produksi_model');
    }
     public function index()
    {
        $data = $this->budidaya_biaya_produksi_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->budidaya_biaya_produksi_model->add(array(
            'budidaya_biaya_produksi_uraian_ket' => $this->input->post('budidaya_biaya_produksi_uraian_ket'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->budidaya_biaya_produksi_model->delete($id));

        redirect(site_url('master/budidaya/budidaya_biaya_produksi'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->budidaya_biaya_produksi_model->edit($id, array(
                'budidaya_biaya_produksi_uraian_ket' => $this->input->post('budidaya_biaya_produksi_uraian_ket'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}