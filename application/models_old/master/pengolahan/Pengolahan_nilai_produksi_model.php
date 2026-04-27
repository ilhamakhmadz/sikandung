<?php

class Pengolahan_nilai_produksi_model extends MY_Model {

    protected $table = 'pengolahan_nilai_produksi_uraian';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".pengolahan_nilai_produksi_uraian_id, ";
    $select .= $this->table.".pengolahan_nilai_produksi_uraian_ket, ";
    return $select;
}

  function datatables()
  {
    $this->datatables->select($this->_get_select());
    $this->datatables->from($this->table);
    return $this->datatables->generate();
  }


    public function add($data)
    {
      $inserted = $this->db->insert($this->table, $data);
      // $inserted = $this->db->get_where($this->table, array('nama_jenis_bantuan' => $data['nama_jenis_bantuan']))->row();

      return $inserted;
    }

    public function delete($id)
    {
      $idString = (int)$id;
      $this->db->where('pengolahan_nilai_produksi_uraian_id', $idString);
      $updated = $this->db->delete($this->table);

      return $updated;
    }

    public function get_by_id($id){
      $this->db->select('*');
      $this->db->where($this->table.'.pengolahan_nilai_produksi_uraian_id',$id);
      $query = $this->db->get($this->table)->row();

      return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('pengolahan_nilai_produksi_uraian_id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('pengolahan_nilai_produksi_uraian_id' => $id))->row();

        return $updated;

    }

    

}
