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

    public function get_list_tahun()
    {
        $this->db->distinct();
        $this->db->select('tahun');
        $this->db->from($this->table);
        $this->db->where('visible', 1);
        $this->db->where('tahun IS NOT NULL');
        $this->db->where('tahun >', 2000);
        $this->db->order_by('tahun', 'DESC');
        $results = $this->db->get()->result();

        $years = [];
        foreach ($results as $r) {
            if (!empty($r->tahun) && !in_array((int)$r->tahun, $years)) {
                $years[] = (int)$r->tahun;
            }
        }
        $currentYear = (int)date('Y');
        if (!in_array($currentYear, $years)) {
            array_unshift($years, $currentYear);
        }
        rsort($years);
        return $years;
    }

    public function get_export_data($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id,
            p.tahun,
            p.tanggal_kuesioner,
            p.nama_responden,
            p.petugas_enumerator,
            p.submit,
            pi.nik,
            pi.nama,
            pi.nama_kelompok,
            pi.jabatan,
            pi.alamat_jalan,
            pi.telepon,
            mk.Nama_Kecamatan,
            md.Nama_Desa,
            pk.jenis_perusahaan,
            pk.kegiatan_usaha,
            pk.jenis_olahan,
            pk.frekuensi_produksi_peminggu,
            pk.mulai_berproduksi,
            pk.luas_bangunan_keseluruhan,
            pk.luas_bangunan_produksi,
            pk.permodalan,
            pk.perijinan_usaha
        ');
        $this->db->from('pengolahan p');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('pengolahan_ket_umum pk', 'pk.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_alat_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id, p.tahun, p.tanggal_kuesioner, pi.nik, pi.nama, pi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            pau.pengolahan_alat_produksi_uraian_ket as uraian,
            ap.pengolahan_alat_produksi_volume as volume,
            ap.pengolahan_alat_produksi_harga as harga,
            ap.pengolahan_alat_produksi_nilai as nilai
        ');
        $this->db->from('pengolahan_alat_produksi ap');
        $this->db->join('pengolahan p', 'p.pengolahan_id = ap.pengolahan_id');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('pengolahan_alat_produksi_uraian pau', 'pau.pengolahan_alat_produksi_uraian_id = ap.pengolahan_alat_produksi_uraian_id', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_bahan_utama($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id, p.tahun, p.tanggal_kuesioner, pi.nik, pi.nama, pi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            pbu.pengolahan_bahan_utama_uraian_ket as uraian,
            bu.pengolahan_bahan_utama_asal as asal,
            bu.pengolahan_bahan_utama_volume as volume,
            bu.pengolahan_bahan_utama_harga as harga,
            bu.pengolahan_bahan_utama_nilai as nilai
        ');
        $this->db->from('pengolahan_bahan_utama bu');
        $this->db->join('pengolahan p', 'p.pengolahan_id = bu.pengolahan_id');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('pengolahan_bahan_utama_uraian pbu', 'pbu.pengolahan_bahan_utama_uraian_id = bu.pengolahan_bahan_utama_uraian_id', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_bahan_lain($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id, p.tahun, p.tanggal_kuesioner, pi.nik, pi.nama, pi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            pblu.pengolahan_bahan_lain_uraian_ket as uraian,
            bl.pengolahan_bahan_lain_volume as volume,
            bl.pengolahan_bahan_lain_harga as harga,
            bl.pengolahan_bahan_lain_nilai as nilai
        ');
        $this->db->from('pengolahan_bahan_lain bl');
        $this->db->join('pengolahan p', 'p.pengolahan_id = bl.pengolahan_id');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('pengolahan_bahan_lain_uraian pblu', 'pblu.pengolahan_bahan_lain_uraian_id = bl.pengolahan_bahan_lain_uraian_id', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_nilai_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id, p.tahun, p.tanggal_kuesioner, pi.nik, pi.nama, pi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            pnu.pengolahan_nilai_produksi_uraian_ket as uraian,
            np.pengolahan_nilai_lokasi_pemasaran as lokasi_pemasaran,
            np.pengolahan_nilai_produksi_volume as volume,
            np.pengolahan_nilai_produksi_harga as harga,
            np.pengolahan_nilai_produksi_nilai as nilai
        ');
        $this->db->from('pengolahan_nilai_produksi np');
        $this->db->join('pengolahan p', 'p.pengolahan_id = np.pengolahan_id');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('pengolahan_nilai_produksi_uraian pnu', 'pnu.pengolahan_nilai_produksi_uraian_id = np.pengolahan_nilai_produksi_uraian_id', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_perijinan($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            p.pengolahan_id, p.tahun, p.tanggal_kuesioner, pi.nik, pi.nama, pi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            ppu.pengolahan_perijinan_uraian_ket as jenis_perijinan,
            pj.pengolahan_perijinan_no as no_perijinan,
            pj.pengolahan_perijinan_tgl as tgl_perijinan
        ');
        $this->db->from('pengolahan_perijinan pj');
        $this->db->join('pengolahan p', 'p.pengolahan_id = pj.pengolahan_id');
        $this->db->join('pengolahan_identitas pi', 'pi.pengolahan_id = p.pengolahan_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = pi.kd_desa AND md.Kd_Kec = pi.kd_kec', 'left');
        $this->db->join('pengolahan_perijinan_uraian ppu', 'ppu.pengolahan_perijinan_uraian_id = pj.pengolahan_perijinan_uraian_id', 'left');
        $this->db->where('p.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('p.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('p.tahun', $tahunInt);
            $this->db->or_where('YEAR(p.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('p.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }
}
