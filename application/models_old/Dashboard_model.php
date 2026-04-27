<?php

class Dashboard_model extends MY_Model {

    protected $table_budidaya = 'budidaya';
    protected $table_budidaya_identitas = 'budidaya_identitas';
    protected $table_budidaya_ket_umum = 'budidaya_ket_umum';
    protected $table_budidaya_biaya_produksi = 'budidaya_biaya_produksi';
    protected $table_budidaya_nilai_produksi = 'budidaya_nilai_produksi';
    protected $table_budidaya_bahan_lain = 'budidaya_bahan_lain';

    protected $table_pengolahan = 'pengolahan';
    protected $table_pengolahan_identitas = 'pengolahan_identitas';
    protected $table_pengolahan_ket_umum = 'pengolahan_ket_umum';
    protected $table_pengolahan_alat_produksi = 'pengolahan_alat_produksi';
    protected $table_pengolahan_nilai_produksi = 'pengolahan_nilai_produksi';
    protected $table_pengolahan_bahan_lain = 'pengolahan_bahan_lain';
    protected $table_pengolahan_bahan_utama = 'pengolahan_bahan_utama';

    protected $table_tangkap = 'tangkap';
    protected $table_tangkap_identitas = 'tangkap_identitas';
    protected $table_tangkap_ket_umum = 'tangkap_ket_umum';
    protected $table_tangkap_biaya_produksi = 'tangkap_biaya_produksi';
    protected $table_tangkap_nilai_produksi = 'tangkap_nilai_produksi';
    protected $table_tangkap_bahan_lain = 'tangkap_bahan_lain';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

    public function pelaku_pembenihan(){
        $this->db->select("COUNT(budidaya.budidaya_id) as pelaku, SUM(luas_kolam_m2) as luas_lahan");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }
    public function nilai_produksi_pembenihan(){
        $this->db->select("SUM(budidaya_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembenihan");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }


    public function pelaku_pembesaran(){
        $this->db->select("COUNT(budidaya.budidaya_id) as pelaku, SUM(luas_kolam_m2) as luas_lahan");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembesaran");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }

    public function nilai_produksi_pembesaran(){
        $this->db->select("SUM(budidaya_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id", 'left');
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"pembesaran");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }


    public function pelaku_ikan_hias(){
        $this->db->select("COUNT(budidaya.budidaya_id) as pelaku, SUM(luas_kolam_m2) as luas_lahan");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"Ikan Hias");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }

    public function nilai_produksi_ikan_hias(){
        $this->db->select("SUM(budidaya_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"Ikan Hias");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }

    public function pelaku_mina_padi(){
        $this->db->select("COUNT(budidaya.budidaya_id) as pelaku, SUM(luas_kolam_m2) as luas_lahan");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"Mina Padi");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }

    public function nilai_produksi_mina_padi(){
        $this->db->select("SUM(budidaya_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_budidaya);
        $this->db->join($this->table_budidaya_ket_umum, "budidaya_ket_umum.budidaya_id = budidaya.budidaya_id");
        $this->db->join($this->table_budidaya_nilai_produksi, "budidaya_nilai_produksi.budidaya_id = budidaya_ket_umum.budidaya_id");
        $this->db->where($this->table_budidaya_ket_umum.'.kegiatan_usaha',"Mina Padi");
        $this->db->where($this->table_budidaya.'.visible',1);
        return $this->db->get()->row();
    }


    public function pelaku_tangkap(){
        $this->db->select("COUNT(tangkap.tangkap_id) as pelaku");
        $this->db->from($this->table_tangkap);
        $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
        $this->db->where($this->table_tangkap.'.visible',1);
        return $this->db->get()->row();
    }

    public function alat_tangkap(){
        $this->db->select("SUM(tangkap_biaya_produksi_volume) as biaya_produksi");
        $this->db->from($this->table_tangkap);
        $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
        $this->db->join($this->table_tangkap_biaya_produksi, "tangkap_biaya_produksi.tangkap_id = tangkap_ket_umum.tangkap_id");
        $this->db->where($this->table_tangkap.'.visible',1);
        return $this->db->get()->row();
    }

    public function nilai_produksi_tangkap(){
        $this->db->select("SUM(tangkap_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_tangkap);
        $this->db->join($this->table_tangkap_ket_umum, "tangkap_ket_umum.tangkap_id = tangkap.tangkap_id");
        $this->db->join($this->table_tangkap_nilai_produksi, "tangkap_nilai_produksi.tangkap_id = tangkap_ket_umum.tangkap_id");
        $this->db->where($this->table_tangkap.'.visible',1);
        return $this->db->get()->row();
    }


    public function pelaku_pengolahan(){
        $this->db->select("COUNT(pengolahan.pengolahan_id) as pelaku, SUM(luas_bangunan_keseluruhan) as luas_lahan, SUM(luas_bangunan_produksi) as luas_lahan_produksi");
        $this->db->from($this->table_pengolahan);
        $this->db->join($this->table_pengolahan_ket_umum, "pengolahan_ket_umum.pengolahan_id = pengolahan.pengolahan_id");
        $this->db->where($this->table_pengolahan.'.visible',1);
        return $this->db->get()->row();
    }

    public function nilai_produksi_pengolahan(){
        $this->db->select("SUM(pengolahan_nilai_produksi_nilai) as nilai_produksi");
        $this->db->from($this->table_pengolahan);
        $this->db->join($this->table_pengolahan_ket_umum, "pengolahan_ket_umum.pengolahan_id = pengolahan.pengolahan_id");
        $this->db->join($this->table_pengolahan_nilai_produksi, "pengolahan_nilai_produksi.pengolahan_id = pengolahan_ket_umum.pengolahan_id");
        $this->db->where($this->table_pengolahan.'.visible',1);
        return $this->db->get()->row();
    }

}
