<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_model extends CI_Model {

public function get(){
    $data=$this->db->get('tb_tahun');
    return $data;
  }

public function get_status(){
          $this->db->select('*');
          $this->db->from('tb_tahun');
          $this->db->where('status', 1);
    $data = $this->db->get('');
    return $data;
  }

  public function insert($data)
  {
  	 $query = $this->db->insert('tb_tahun', $data);
    return $query;
  }

public function getTahunById($id)
{
	$data = $this->db->get_where('tb_tahun', array('id'=>$id));
	return $data->result();
}

public function update($id, $data)
    {
      $this->db->where('id',$id);
      return $this->db->update('tb_tahun', $data);
    }

 public function hapus($id)
  {
    $this->db->where('id', $id);
        return $this->db->delete('tb_tahun');
  }
  public function get_kode($tahun){
        return $this->db->get_where('tb_tahun', array('tahun'=>$tahun))->row();
    }

}

?>