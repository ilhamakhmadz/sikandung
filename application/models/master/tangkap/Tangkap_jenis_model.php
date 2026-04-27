<?php

class Tangkap_jenis_model extends MY_Model {

    protected $table = 'tangkap_jenis';
    protected $table_relation = 'tangkap_kategori';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".tangkap_jenis_id, ";
    $select .= $this->table.".tangkap_jenis_nama, ";
    $select .= $this->table_relation.".tangkap_kategori_nama, ";
    return $select;
}

  function datatables()
  {
    $this->datatables->select($this->_get_select());
    $this->datatables->from($this->table);
    $this->datatables->join($this->table_relation,$this->table_relation.".tangkap_kategori_id =".$this->table.".tangkap_kategori_id");
    $this->db->order_by($this->table_relation.".tangkap_kategori_nama", 'asc');
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
      $this->db->where('tangkap_jenis_id', $idString);
      $updated = $this->db->delete($this->table);

      return $updated;
    }

    public function get_by_id($id){
      $this->db->select('*');
      $this->db->where($this->table.'.tangkap_jenis_id',$id);
      $query = $this->db->get($this->table)->row();

      return $query;
    }

    public function get_data()
    {
      $this->db->select($this->_get_select());
      $this->db->from($this->table);
      $this->db->join($this->table_relation,$this->table_relation.".tangkap_kategori_id =".$this->table.".tangkap_kategori_id");
      $this->db->order_by($this->table_relation.".tangkap_kategori_nama", 'asc');
      return $this->db->get()->result();
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('tangkap_jenis_id' => $id));

        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('tangkap_jenis_id' => $id))->row();

        return $updated;

    }

    

}
