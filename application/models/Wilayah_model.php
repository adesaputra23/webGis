<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model {

public function get()
	{
		$data=$this->db->get('tb_wilayah');
		return $data;
	}
public function get_a($tahun)
	{
		$data=$this->db->select('*')
					->from('tb_wilayah a')
					->join('tb_stunting b','a.kode_wilayah=b.kode_wilayah','LEFT')
					->where("tahun",$tahun)
					->group_by('nama_wilayah')
 					->get();
		return $data;
	}

public function get_kode($kode_wilayah){
        return $this->db->get_where('tb_wilayah', array('kode_wilayah'=>$kode_wilayah))->row();
    }

 public function getDataByID($kode_wilayah){
        return $this->db->get_where('tb_stunting', array('kode_wilayah'=>$kode_wilayah));
    }

public function getDataBy_w($kode_wilayah){
        return $this->db->get_where('tb_stunting', array('kode_wilayah'=>$kode_wilayah));
    }

  public function getDataBykode($kode_wilayah){
        $this->db->select('id, nama, tahun, COUNT(IF(tahun, tahun, NULL)) as total');
        $this->db->group_by('tahun'); 
        $this->db->order_by('total', 'desc');
        $this->db->where("kode_wilayah",$kode_wilayah);
      return $this->db->get("tb_stunting");
    }


 public function getId($id_wilayah = null)
	{
		$query = $this->db->get_where('tb_wilayah', array('id_wilayah' =>$id_wilayah))->row();
		return $query;
	}

 public function detail()
	{
		$data=$this->db->select('*')
					->from('tb_stunting a')
					->join('tb_wilayah b','a.kode_wilayah=b.kode_wilayah','LEFT')
 					->get();
		return $data;
	}

 public function hitungJumlah()
		{   
		    $query = $this->db->get('tb_wilayah');
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
		}

 public function insert($data)
 	{
 		$query = $this->db->insert('tb_wilayah', $data);
		return $query;
 	}

 public function update($id, $data)
	{
		$this->db->where('id_wilayah',$id);
        return $this->db->update('tb_wilayah', $data);
    
	}

	public function hapus($id_wilayah)
	{
		$this->db->where('id_wilayah', $id_wilayah);
        return $this->db->delete('tb_wilayah');
	}

public function insert_batch($data)
  {
   return $this->db->insert_batch('tb_wilayah',$data);
  }

public function wilayah($tahun, $kec)
	{
		 $data = $this->db->select('*')
                         ->from('qw_stunting')
                          ->where('tahun', $tahun)
                          ->where('kode_wilayah', $kec)
                          ->get();
        return $data;
	}



}