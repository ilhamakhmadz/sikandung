<?php

class Pengolahan_model extends MY_Model {

    protected $table = 'pengolahan';
    protected $table_identitas = 'pengolahan_identitas';
    protected $table_ket_umum = 'pengolahan_ket_umum';
    protected $table_alat_produksi = 'pengolahan_alat_produksi';
    protected $table_nilai_produksi = 'pengolahan_nilai_produksi';
    protected $table_bahan_lain = 'pengolahan_bahan_lain';
    protected $table_bahan_utama = 'pengolahan_bahan_utama';
    protected $table_perijinan = 'pengolahan_perijinan';

    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".pengolahan_id, ";
    $select .= $this->table.".tahun, ";
    $select .= $this->table.".tanggal_kuesioner, ";
    $select .= $this->table.".nama_responden, ";
    $select .= $this->table.".petugas_enumerator, ";
    $select .= $this->table.".user_id, ";
    $select .= $this->table.".submit, ";
    $select .= $this->table.".visible, ";
    $select .= $this->table_identitas.".nama_kelompok, ";
    $select .= $this->table_identitas.".alamat_jalan, ";
    $select .= $this->table_identitas.".nik, ";
    return $select;
  }

    // MENAMPILKAN DATA
    function datatables()
    {
      $this->datatables->select($this->_get_select());
      $this->datatables->from($this->table);
      $this->datatables->join('pengolahan_identitas', "pengolahan_identitas.pengolahan_id = pengolahan.pengolahan_id");
      $this->datatables->where($this->table.'.visible',1);
      if($this->session->userdata('role_id') == 5 || $this->session->userdata('role_id') == 9):
        $this->datatables->where($this->table.'.user_id',$this->session->userdata('id'));
      endif;
      if($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 10){
        $this->db->order_by("pengolahan.submit","asc");
      }else{
        $this->db->order_by("pengolahan.tanggal_kuesioner","desc");
      }
      return $this->datatables->generate();
    }

    // FUNGSI UNTUK MENAMBAKAN DATA

    public function add($data)
    {
      $this->db->insert($this->table,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    
    public function add_identitas($data)
    {
      $this->db->insert($this->table_identitas,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    
    public function add_ket_umum($data)
    {
      $this->db->insert($this->table_ket_umum,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_alat_produksi($data)
    {
      $this->db->insert($this->table_alat_produksi,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_bahan_utama($data)
    {
      $this->db->insert($this->table_bahan_utama,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_bahan_lain($data)
    {
      $this->db->insert($this->table_bahan_lain,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    public function add_perijinan($data)
    {
      $this->db->insert($this->table_perijinan,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    public function add_nilai_produksi($data)
    {
      $this->db->insert($this->table_nilai_produksi,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    
    public function delete($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('visible' => 0), array('pengolahan_id' => $idString));
      $this->db->update($this->table_identitas, array('visible' => 0), array('pengolahan_id' => $idString));
      $updated = $this->db->get_where($this->table, array('pengolahan_id' =>  $idString))->row();
      return $updated;
    }

    public function submit($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Publish'), array('pengolahan_id' => $idString));
      $updated = $this->db->get_where($this->table, array('pengolahan_id' =>  $idString))->row();
      return $updated;
    }

    public function draft($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Draft'), array('pengolahan_id' => $idString));
      $updated = $this->db->get_where($this->table, array('pengolahan_id' =>  $idString))->row();
      return $updated;
    }


    // FUNGSI UNTUK MENAMPILKAN DATA BY ID
  function get_by_id($id_pengolahan)
    {
      $this->db->select("*");
      $this->db->from($this->table);
      $this->db->where($this->table.".pengolahan_id",$id_pengolahan);
      return $this->db->get()->row();
    }

    function get_by_ket_id($id_pengolahan)
    {
      $this->db->select("*");
      $this->db->from($this->table_ket_umum);
      $this->db->where($this->table_ket_umum.".pengolahan_id",$id_pengolahan);
      return $this->db->get()->row();
    }
    function get_by_limit($limit)
    {
      $this->db->select("*");
      $this->db->from($this->table);
      $this->db->where('visible',1);
      $this->db->order_by('tanggal_kuesioner','desc');
      $this->db->limit($limit);
      return $this->db->get()->result();
    }
    public function get_by_alat_id($id){
      $this->db->select('*');
      $this->db->where($this->table_alat_produksi.'.pengolahan_id',$id);
      $this->db->join('pengolahan_alat_produksi_uraian',$this->table_alat_produksi.'.pengolahan_alat_produksi_uraian_id = pengolahan_alat_produksi_uraian.pengolahan_alat_produksi_uraian_id');
      $query = $this->db->get($this->table_alat_produksi)->result();

      return $query;
    }
    public function get_by_alat($id){
      $this->db->select('*');
      $this->db->where($this->table_alat_produksi.'.pengolahan_alat_produksi_id',$id);
      $this->db->join('pengolahan_alat_produksi_uraian',$this->table_alat_produksi.'.pengolahan_alat_produksi_uraian_id = pengolahan_alat_produksi_uraian.pengolahan_alat_produksi_uraian_id');
      $query = $this->db->get($this->table_alat_produksi)->row();

      return $query;
    }

    public function get_by_bahan_utama_id($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_utama.'.pengolahan_id',$id);
      $this->db->join('pengolahan_bahan_utama_uraian',$this->table_bahan_utama.'.pengolahan_bahan_utama_uraian_id = pengolahan_bahan_utama_uraian.pengolahan_bahan_utama_uraian_id');
      $query = $this->db->get($this->table_bahan_utama)->result();

      return $query;
    }
    public function get_by_bahan_utama($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_utama.'.pengolahan_bahan_utama_id',$id);
      $this->db->join('pengolahan_bahan_utama_uraian',$this->table_bahan_utama.'.pengolahan_bahan_utama_uraian_id = pengolahan_bahan_utama_uraian.pengolahan_bahan_utama_uraian_id');
      $query = $this->db->get($this->table_bahan_utama)->row();

      return $query;
    }

    public function get_by_bahan_lain_id($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.pengolahan_id',$id);
      $this->db->join('pengolahan_bahan_lain_uraian',$this->table_bahan_lain.'.pengolahan_bahan_lain_uraian_id = pengolahan_bahan_lain_uraian.pengolahan_bahan_lain_uraian_id');
      $query = $this->db->get($this->table_bahan_lain)->result();

      return $query;
    }

    public function get_by_bahan($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.pengolahan_bahan_lain_id',$id);
      $this->db->join('pengolahan_bahan_lain_uraian',$this->table_bahan_lain.'.pengolahan_bahan_lain_uraian_id = pengolahan_bahan_lain_uraian.pengolahan_bahan_lain_uraian_id');
      $query = $this->db->get($this->table_bahan_lain)->row();

      return $query;
    }

    public function get_by_nilai_produksi_id($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.pengolahan_id',$id);
      $this->db->join('pengolahan_nilai_produksi_uraian',$this->table_nilai_produksi.'.pengolahan_nilai_produksi_uraian_id = pengolahan_nilai_produksi_uraian.pengolahan_nilai_produksi_uraian_id');
      $query = $this->db->get($this->table_nilai_produksi)->result();

      return $query;
    }

    public function get_by_nilai($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.pengolahan_nilai_produksi_id',$id);
      $this->db->join('pengolahan_nilai_produksi_uraian',$this->table_nilai_produksi.'.pengolahan_nilai_produksi_uraian_id = pengolahan_nilai_produksi_uraian.pengolahan_nilai_produksi_uraian_id');
      $query = $this->db->get($this->table_nilai_produksi)->row();

      return $query;
    }

    // public function get_by_perijinan_id($id){
    //   $this->db->select('*');
    //   $this->db->where($this->table_perijinan.'.pengolahan_id',$id);
    //   $this->db->join('pengolahan_perijinan_uraian',$this->table_perijinan.'.pengolahan_perijinan_uraian_id = pengolahan_perijinan_uraian.pengolahan_perijinan_uraian_id');
    //   $this->db->order_by($this->table_perijinan.".pengolahan_perijinan_uraian_id",'desc');

    //   $query = $this->db->get($this->table_perijinan)->result();

    //   return $query;
    // }

    
    public function get_by_perijinan_id($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.pengolahan_id',$id);
      $this->db->join('pengolahan_perijinan_uraian',$this->table_perijinan.'.pengolahan_perijinan_uraian_id = pengolahan_perijinan_uraian.pengolahan_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".pengolahan_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->result();

      return $query;
    }

    public function get_by_perijinan($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.pengolahan_perijinan_id',$id);
      $this->db->join('pengolahan_perijinan_uraian',$this->table_perijinan.'.pengolahan_perijinan_uraian_id = pengolahan_perijinan_uraian.pengolahan_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".pengolahan_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->row();

      return $query;
    }
    // FUNGSI UNTUK EDIT DATA
    public function edit_kuesioner($id, $data){
        $this->db->update($this->table, $data, array('pengolahan_id' => $id));
        $updated = $this->db->get_where($this->table, array('pengolahan_id' => $id))->row();
        return $updated;
    }

    public function edit_identitas($id, $data){
      $this->db->update($this->table_identitas, $data, array('pengolahan_id' => $id));
      $updated = $this->db->get_where($this->table_identitas, array('pengolahan_id' => $id))->row();
      return $updated;
  }

  public function edit_ket_umum($id, $data){
    $this->db->update($this->table_ket_umum, $data, array('pengolahan_id' => $id));
    $updated = $this->db->get_where($this->table_ket_umum, array('pengolahan_id' => $id))->row();
    return $updated;
  }
  public function edit_alat_produksi($id, $data){
    $this->db->update($this->table_alat_produksi, $data, array('pengolahan_alat_produksi_id' => $id));
    $updated = $this->db->get_where($this->table_alat_produksi, array('pengolahan_alat_produksi_id' => $id))->row();
    return $updated;
  }

  public function edit_bahan_utama($id, $data){
    $this->db->update($this->table_bahan_utama, $data, array('pengolahan_bahan_utama_id' => $id));
    $updated = $this->db->get_where($this->table_bahan_utama, array('pengolahan_bahan_utama_id' => $id))->row();
    return $updated;
  }

  public function edit_bahan_lain($id, $data){
    $this->db->update($this->table_bahan_lain, $data, array('pengolahan_bahan_lain_id' => $id));
    $updated = $this->db->get_where($this->table_bahan_lain, array('pengolahan_bahan_lain_id' => $id))->row();
    return $updated;
  }

  public function edit_nilai_produksi($id, $data){
    $this->db->update($this->table_nilai_produksi, $data, array('pengolahan_nilai_produksi_id' => $id));
    $updated = $this->db->get_where($this->table_nilai_produksi, array('pengolahan_nilai_produksi_id' => $id))->row();
    return $updated;
  }
  public function edit_perijinan($id, $data){
    $this->db->update($this->table_perijinan, $data, array('pengolahan_perijinan_id' => $id));
    $updated = $this->db->get_where($this->table_perijinan, array('pengolahan_perijinan_id' => $id))->row();
    return $updated;
  }
  // FUNGSI UNTUK HAPUS DATA
    public function delete_alat_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_alat_produksi_id', $idString);
      $updated = $this->db->delete($this->table_alat_produksi);
      
      return $updated;
    }

    public function delete_bahan_utama($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_bahan_utama_id', $idString);
      $updated = $this->db->delete($this->table_bahan_utama);
      
      return $updated;
    }

    public function delete_bahan_lain($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_bahan_lain_id', $idString);
      $updated = $this->db->delete($this->table_bahan_lain);
      
      return $updated;
    }

    public function delete_nilai_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_nilai_produksi_id', $idString);
      $updated = $this->db->delete($this->table_nilai_produksi);
      
      return $updated;
    }
    public function delete_perijinan($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_perijinan_id', $idString);
      $updated = $this->db->delete($this->table_perijinan);
      
      return $updated;
    }
   
}
