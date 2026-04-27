<?php

class Statistik_pembenihan_model extends MY_Model {

    protected $table_budidaya = 'budidaya';
    protected $table_budidaya_identitas = 'budidaya_identitas';
    protected $table_budidaya_ket_umum = 'budidaya_ket_umum';
    protected $table_budidaya_biaya_produksi = 'budidaya_biaya_produksi';
    protected $table_budidaya_nilai_produksi = 'budidaya_nilai_produksi';
    protected $table_budidaya_bahan_lain = 'budidaya_bahan_lain';
    protected $table_master_kecamatan = 'master_kecamatan';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

    public function pelaku_pembenihan(){
        $this->db->select("Nama_Kecamatan as kecamatan, COUNT(Nama_Kecamatan) as jumlah_pelaku");
        $this->db->from($this->table_budidaya_identitas);
        $this->db->join($this->table_master_kecamatan, "budidaya_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_identitas.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->join($this->table_budidaya, "budidaya_identitas.budidaya_id = budidaya.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
        $this->db->where($this->table_budidaya.'.visible',1);
        $this->db->group_by('Nama_Kecamatan');
        $this->db->order_by('jumlah_pelaku','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }

    public function luas_pembenihan(){
      $this->db->select("Nama_Kecamatan as kecamatan, SUM(luas_kolam_m2) as luas_lahan");
      $this->db->from($this->table_budidaya_identitas);
      $this->db->join($this->table_master_kecamatan, "budidaya_identitas.kd_kec = master_kecamatan.Kd_Kec");
      $this->db->join($this->table_budidaya_ket_umum, "budidaya_identitas.budidaya_id = budidaya_ket_umum.budidaya_id");
      $this->db->join($this->table_budidaya, "budidaya_identitas.budidaya_id = budidaya.budidaya_id");
      $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
      $this->db->where($this->table_budidaya.'.visible',1);
      $this->db->group_by('kecamatan');
      // $this->db->order_by('luas_lahan','ASC');
      $data = $this->db->get()->result();
      return json_encode($data);
  }

    public function nilai_pembenihan(){
        $this->db->select("Nama_Kecamatan as kecamatan, SUM(budidaya_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->join($this->table_budidaya_identitas, "budidaya_identitas.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->join($this->table_master_kecamatan, "budidaya_identitas.kd_kec = master_kecamatan.Kd_Kec");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
        $this->db->where($this->table_budidaya.'.visible',1);
        $this->db->group_by('kecamatan');
        $this->db->order_by('nilai_produksi','DESC');
        $data = $this->db->get()->result();
        return json_encode($data);
    }

    public function total_pembenihan(){
      $this->db->select("Nama_Kecamatan as kecamatan, SUM(budidaya_nilai_produksi_volume) as total_produksi");
      $this->db->from($this->table_budidaya);
      $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
      $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id");
      $this->db->join($this->table_budidaya_identitas, "budidaya_identitas.budidaya_id = budidaya_ket_umum.budidaya_id");
      $this->db->join($this->table_master_kecamatan, "budidaya_identitas.kd_kec = master_kecamatan.Kd_Kec");
      $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
      $this->db->where($this->table_budidaya.'.visible',1);
      $this->db->group_by('kecamatan');
      $this->db->order_by('nilai_produksi','DESC');
      $data = $this->db->get()->result();
      return json_encode($data);
  }



}
