<?php

class Mina_padi_model extends MY_Model {

  protected $table_budidaya = 'budidaya';
  protected $table_budidaya_identitas = 'budidaya_identitas';
  protected $table_budidaya_ket_umum = 'budidaya_ket_umum';
  protected $table_budidaya_biaya_produksi = 'budidaya_biaya_produksi';
  protected $table_budidaya_nilai_produksi = 'budidaya_nilai_produksi';
  protected $table_budidaya_bahan_lain = 'budidaya_bahan_lain';
  protected $table_master_kecamatan = 'master_kecamatan';
  protected $table_master_desa = 'master_desa';
  private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table_budidaya_identitas.".nik, ";
    $select .= $this->table_budidaya_identitas.".nama, ";
    $select .= $this->table_budidaya_identitas.".kd_desa, ";
    $select .= $this->table_budidaya_identitas.".nama_kelompok, ";
    $select .= $this->table_master_kecamatan.".Nama_Kecamatan, ";
    $select .= $this->table_master_desa.".Nama_Desa, ";
    $select .= $this->table_budidaya_ket_umum.".luas_kolam_m2, ";
    $select .= $this->table_budidaya_nilai_produksi.".budidaya_id, ";
    $select .= "SUM(budidaya_nilai_produksi_volume) as volume_produksi, ";
    $select .= "SUM(budidaya_nilai_produksi_harga) as harga_produksi,";
    $select .= "SUM(budidaya_nilai_produksi_nilai) as nilai_produksi,";
    return $select;
  }

  function datatables($kelompok,$kecamatan)
  {
        $this->datatables->select('*');
        $this->datatables->from('budidaya_mina_padi');
        if($kelompok != "0"){
          $this->datatables->where('nama_kelompok',$kelompok);
        }
        if($kecamatan != "0"){
          $this->datatables->where('Nama_Kecamatan',$kecamatan);
        }
        return $this->datatables->generate();
  }  
  function mina_padi_all(){
    $this->db->select('*');
    $this->db->from('budidaya_mina_padi');
    $this->db->order_by('Nama_Kecamatan','asc');
    return $this->db->get()->result_array();
}

  function cetak_pdf($kelompok,$kecamatan)
  {
        $this->db->select('*');
        $this->db->from('budidaya_mina_padi');
        if($kelompok != "0"){
          $this->db->where('nama_kelompok',$kelompok);
        }
        if($kecamatan != "0"){
          $this->db->where('Nama_Kecamatan',$kecamatan);
        }
        return $this->db->get()->result();
  }  
  
  function get_kelompok_mina_padi()
  {
        $this->db->select('nama_kelompok');
        $this->db->from('budidaya_ket_umum');
        $this->db->join('budidaya_identitas','budidaya_ket_umum.budidaya_id = budidaya_identitas.budidaya_id');
        $this->db->where('kegiatan_usaha','mina padi');
        $this->db->group_by('nama_kelompok');
        return $this->db->get()->result();
  }  

  function get_kecamatan_mina_padi()
  {
        $this->db->select('nama_kecamatan');
        $this->db->from('budidaya_identitas');
        $this->db->join('budidaya_ket_umum','budidaya_ket_umum.budidaya_id = budidaya_identitas.budidaya_id');
        $this->db->join('master_kecamatan','master_kecamatan.Kd_Kec = budidaya_identitas.Kd_Kec');
        $this->db->where('kegiatan_usaha','mina padi');
        $this->db->group_by('nama_kecamatan');
        return $this->db->get()->result();
  }  

}
