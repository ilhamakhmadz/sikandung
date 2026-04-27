<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('report/pembenihan_model');
         $this->load->model('report/pembesaran_model');
         $this->load->model('report/ikan_hias_model');
         $this->load->model('report/mina_padi_model');
    }

    public function pembenihan($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->pembenihan_model->datatables($a,$b);
        echo $data;
    }

    public function pembesaran($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->pembesaran_model->datatables($a,$b);
        echo $data;
    }

    public function ikan_hias($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->ikan_hias_model->datatables($a,$b);
        echo $data;
    }

    public function mina_padi($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->mina_padi_model->datatables($a,$b);
        echo $data;
    }
}