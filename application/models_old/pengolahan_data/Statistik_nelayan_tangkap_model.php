<?php

class Statistik_nelayan_tangkap_model extends MY_Model {

    protected $table_tangkap = 'tangkap';
    protected $table_tangkap_identitas = 'tangkap_identitas';
    protected $table_tangkap_ket_umum = 'tangkap_ket_umum';
    protected $table_tangkap_biaya_produksi = 'tangkap_biaya_produksi';
    protected $table_tangkap_nilai_produksi = 'tangkap_nilai_produksi';
    protected $table_tangkap_bahan_lain = 'tangkap_bahan_lain';
    protected $table_master_kecamatan = 'master_kecamatan';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

    public function pelaku_nelayan_tangkap(){
        $this->db->select("Nama_Kecamatan as kecamatan, COUNT(tangkap.tangkap_id) as pelaku");
        $this->db->from($this->table_tangkap);
        $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
        $this->db->join($this->table_tangkap_identitas, "tangkap_identitas.tangkap_id = tangkap.tangkap_id");
        $this->db->join($this->table_master_kecamatan, "tangkap_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->where($this->table_tangkap.'.visible',1);
        $this->db->group_by('Nama_Kecamatan');
        $this->db->order_by('pelaku','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }

    public function alat_nelayan_tangkap(){
      $this->db->select("Nama_Kecamatan as kecamatan, SUM(tangkap_biaya_produksi_volume) as biaya_produksi");
      $this->db->from($this->table_tangkap);
      $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
      $this->db->join($this->table_tangkap_biaya_produksi, "tangkap_biaya_produksi.tangkap_id = tangkap_ket_umum.tangkap_id");
      $this->db->join($this->table_tangkap_identitas, "tangkap_identitas.tangkap_id = tangkap.tangkap_id");
      $this->db->join($this->table_master_kecamatan, "tangkap_identitas.kd_kec = master_kecamatan.Kd_Kec");;
      $this->db->group_by('kecamatan');
      $data = $this->db->get()->result();
      return json_encode($data);
  }

    public function nilai_nelayan_tangkap(){
        $this->db->select("Nama_Kecamatan as kecamatan, SUM(tangkap_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_tangkap);
        $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
        $this->db->join($this->table_tangkap_nilai_produksi, "tangkap_nilai_produksi.tangkap_id = tangkap_ket_umum.tangkap_id");
        $this->db->join($this->table_tangkap_identitas, "tangkap_identitas.tangkap_id = tangkap_ket_umum.tangkap_id");
        $this->db->join($this->table_master_kecamatan, "tangkap_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->where($this->table_tangkap.'.visible',1);
        $this->db->group_by('kecamatan');
        $this->db->order_by('nilai_produksi','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }



}
