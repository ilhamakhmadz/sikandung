<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengolahan_data/statistik_pembenihan_model');
        $this->load->model('pengolahan_data/statistik_pembesaran_model');
        $this->load->model('pengolahan_data/statistik_ikan_hias_model');
        $this->load->model('pengolahan_data/statistik_mina_padi_model');
        $this->load->model('pengolahan_data/statistik_nelayan_tangkap_model');
        $this->load->model('pengolahan_data/statistik_pengolahan_model');

    }
     public function pelaku_pembenihan()
    {
        $data = $this->statistik_pembenihan_model->pelaku_pembenihan();
        echo $data;
    }

    public function luas_pembenihan()
    {
        $data = $this->statistik_pembenihan_model->luas_pembenihan();
        echo $data;
    }

    public function nilai_pembenihan()
    {
        $data = $this->statistik_pembenihan_model->nilai_pembenihan();
        echo $data;
    }

    public function pelaku_pembesaran()
    {
        $data = $this->statistik_pembesaran_model->pelaku_pembesaran();
        echo $data;
    }

    public function luas_pembesaran()
    {
        $data = $this->statistik_pembesaran_model->luas_pembesaran();
        echo $data;
    }

    public function nilai_pembesaran()
    {
        $data = $this->statistik_pembesaran_model->nilai_pembesaran();
        echo $data;
    }


    public function pelaku_ikan_hias()
    {
        $data = $this->statistik_ikan_hias_model->pelaku_ikan_hias();
        echo $data;
    }

    public function luas_ikan_hias()
    {
        $data = $this->statistik_ikan_hias_model->luas_ikan_hias();
        echo $data;
    }

    public function nilai_ikan_hias()
    {
        $data = $this->statistik_ikan_hias_model->nilai_ikan_hias();
        echo $data;
    }

    public function pelaku_mina_padi()
    {
        $data = $this->statistik_mina_padi_model->pelaku_mina_padi();
        echo $data;
    }

    public function luas_mina_padi()
    {
        $data = $this->statistik_mina_padi_model->luas_mina_padi();
        echo $data;
    }

    public function nilai_mina_padi()
    {
        $data = $this->statistik_mina_padi_model->nilai_mina_padi();
        echo $data;
    }

    public function pelaku_nelayan_tangkap()
    {
        $data = $this->statistik_nelayan_tangkap_model->pelaku_nelayan_tangkap();
        echo $data;
    }

    public function alat_nelayan_tangkap()
    {
        $data = $this->statistik_nelayan_tangkap_model->alat_nelayan_tangkap();
        echo $data;
    }

    public function nilai_nelayan_tangkap()
    {
        $data = $this->statistik_nelayan_tangkap_model->nilai_nelayan_tangkap();
        echo $data;
    }

    public function pelaku_pengolahan()
    {
        $data = $this->statistik_pengolahan_model->pelaku_pengolahan();
        echo $data;
    }

    public function luas_pengolahan()
    {
        $data = $this->statistik_pengolahan_model->luas_pengolahan();
        echo $data;
    }

    public function nilai_pengolahan()
    {
        $data = $this->statistik_pengolahan_model->nilai_pengolahan();
        echo $data;
    }

}