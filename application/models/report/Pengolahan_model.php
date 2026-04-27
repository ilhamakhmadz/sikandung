<?php

class Pengolahan_model extends MY_Model {


  private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
 
  }

  function datatables($kelompok,$kecamatan)
  {
        $this->datatables->select('*');
        $this->datatables->from('view_pengolahan');
        if($kelompok != "0"){
          $this->datatables->where('nama_kelompok',$kelompok);
        }
        if($kecamatan != "0"){
          $this->datatables->where('Nama_Kecamatan',$kecamatan);
        }
        return $this->datatables->generate();
  }  
  function pengolahan_all(){
    $this->db->select('*');
    $this->db->from('view_pengolahan');
    $this->db->order_by('Nama_Kecamatan','asc');
    return $this->db->get()->result_array();
}
  function cetak_pdf($kelompok,$kecamatan)
  {
        $this->db->select('*');
        $this->db->from('view_pengolahan');
        if($kelompok != "0"){
          $this->db->where('nama_kelompok',$kelompok);
        }
        if($kecamatan != "0"){
          $this->db->where('Nama_Kecamatan',$kecamatan);
        }
        return $this->db->get()->result();
  }  
  
  function get_kelompok_pengolahan()
  {
        $this->db->select('nama_kelompok');
        $this->db->from('pengolahan_ket_umum');
        $this->db->join('pengolahan_identitas','pengolahan_ket_umum.pengolahan_id = pengolahan_identitas.pengolahan_id');
        $this->db->group_by('nama_kelompok');
        return $this->db->get()->result();
  }  

  function get_kecamatan_pengolahan()
  {
        $this->db->select('nama_kecamatan');
        $this->db->from('pengolahan_identitas');
        $this->db->join('pengolahan_ket_umum','pengolahan_ket_umum.pengolahan_id = pengolahan_identitas.pengolahan_id');
        $this->db->join('master_kecamatan','master_kecamatan.Kd_Kec = pengolahan_identitas.Kd_Kec');
        $this->db->group_by('nama_kecamatan');
        return $this->db->get()->result();
  }  

}
