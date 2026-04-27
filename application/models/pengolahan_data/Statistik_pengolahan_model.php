<?php

class Statistik_pengolahan_model extends MY_Model {

  protected $table_pengolahan = 'pengolahan';
  protected $table_pengolahan_identitas = 'pengolahan_identitas';
  protected $table_pengolahan_ket_umum = 'pengolahan_ket_umum';
  protected $table_pengolahan_alat_produksi = 'pengolahan_alat_produksi';
  protected $table_pengolahan_nilai_produksi = 'pengolahan_nilai_produksi';
  protected $table_pengolahan_bahan_lain = 'pengolahan_bahan_lain';
  protected $table_pengolahan_bahan_utama = 'pengolahan_bahan_utama';
  protected $table_master_kecamatan = 'master_kecamatan';

    private $ci;

  function __construct()
  {
    parent::__construct();
  }

    public function pelaku_pengolahan(){
        $this->db->select("Nama_Kecamatan as kecamatan, COUNT(Nama_Kecamatan) as jumlah_pelaku");
        $this->db->from($this->table_pengolahan_identitas);
        $this->db->join($this->table_master_kecamatan, "pengolahan_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->join($this->table_pengolahan_ket_umum, "pengolahan_identitas.pengolahan_id = pengolahan_ket_umum.pengolahan_id");
        $this->db->join($this->table_pengolahan, "pengolahan_identitas.pengolahan_id = pengolahan.pengolahan_id");
        $this->db->where($this->table_pengolahan.'.visible',1);
        $this->db->group_by('Nama_Kecamatan');
        $this->db->order_by('jumlah_pelaku','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }

    public function luas_pengolahan(){
      $this->db->select("Nama_Kecamatan as kecamatan, SUM(luas_bangunan_produksi) as luas_lahan");
      $this->db->from($this->table_pengolahan_identitas);
      $this->db->join($this->table_master_kecamatan, "pengolahan_identitas.kd_kec = master_kecamatan.Kd_Kec");
      $this->db->join($this->table_pengolahan_ket_umum, "pengolahan_identitas.pengolahan_id = pengolahan_ket_umum.pengolahan_id");
      $this->db->join($this->table_pengolahan, "pengolahan_identitas.pengolahan_id = pengolahan.pengolahan_id");
      $this->db->where($this->table_pengolahan.'.visible',1);
      $this->db->group_by('kecamatan');
      // $this->db->order_by('luas_lahan','ASC');
      $data = $this->db->get()->result();
      return json_encode($data);
  }

    public function nilai_pengolahan(){
        $this->db->select("Nama_Kecamatan as kecamatan, SUM(pengolahan_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_pengolahan);
        $this->db->join($this->table_pengolahan_ket_umum, "pengolahan_ket_umum.pengolahan_id = pengolahan.pengolahan_id");
        $this->db->join($this->table_pengolahan_nilai_produksi, "pengolahan_nilai_produksi.pengolahan_id = pengolahan_ket_umum.pengolahan_id");
        $this->db->join($this->table_pengolahan_identitas, "pengolahan_identitas.pengolahan_id = pengolahan_ket_umum.pengolahan_id");
        $this->db->join($this->table_master_kecamatan, "pengolahan_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->where($this->table_pengolahan.'.visible',1);
        $this->db->group_by('kecamatan');
        $this->db->order_by('nilai_produksi','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }



}
