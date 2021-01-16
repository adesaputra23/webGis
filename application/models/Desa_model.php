<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa_model extends CI_Model {

public function get(){
	
	$data=$this->db->select('*')
					->from('tb_desa a')
					->join('tb_wilayah b','a.kode_wilayah=b.kode_wilayah','LEFT')
					->get();
		return $data;
	}

public function get_w($kode_wilayah){
	
	$data=$this->db->select('*')
					->where('kode_wilayah', $kode_wilayah)
					->get('tb_desa');
		return $data;
	}

public function get_all($kode_wilayah){
	
	$data=$this->db->select('*')
					->where('kode_wilayah', $kode_wilayah)
					->get('tb_desa');
		return $data;
	}

public function getId($id_desa){
        return $this->db->get_where('tb_desa', array('id_desa'=>$id_desa))->row();
    }

public function get_kode($desa){
        return $this->db->get_where('tb_desa', array('nama_desa'=>$desa))->row();
    }

public function kec($tahun, $kode_wilayah)
	{
		$this->db->select('alamat, COUNT(alamat) as total');
		$this->db->from('tb_stunting'); 
		$this->db->group_by('alamat'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("tahun", $tahun);
        $this->db->where("kode_wilayah", $kode_wilayah);
        return $this->db->get();
	}

public function v_marker($desa, $tahun)
	{
		  $this->db->select('*');
        $this->db->where("tahun", $tahun);
        $this->db->where("alamat", $desa);
       return $this->db->get('tb_stunting');
	}

public function chard1($tahun1)
	{
		$this->db->select('nama_wilayah, kode_wilayah, COUNT(kode_wilayah) as total');
		$this->db->from('qw_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("tahun", $tahun1);
      	return $this->db->get();
	}

public function chard2($tahun2)
	{
		$this->db->select('nama_wilayah,kode_wilayah,nama_wilayah, COUNT(kode_wilayah) as total');
		$this->db->from('qw_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("tahun", $tahun2);
      	return $this->db->get();
	}
public function name($tahun2,$tahun2)
	{
		$this->db->select('kode_wilayah, nama_wilayah, COUNT(kode_wilayah) as total');
		$this->db->from('qw_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("tahun", $tahun2);
        $this->db->where("tahun", $tahun2);
      	return $this->db->get();
	}

public function kategori_pendek($tahun1)
	{
		$this->db->select('nama_wilayah, kode_wilayah,ketegori, COUNT(ketegori) as total');
		$this->db->from('qw_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("ketegori", 'pendek');
        $this->db->where("tahun", $tahun1);
      return $this->db->get();
	}

public function kategori_s_pendek($tahun1)
	{
		$this->db->select('nama_wilayah, kode_wilayah,ketegori, COUNT(ketegori) as total');
		$this->db->from('qw_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("ketegori", 'sangat pendek');
        $this->db->where("tahun", $tahun1);
      return $this->db->get();
	}

 public function hapus($id_desa)
  {
    $this->db->where('id_desa', $id_desa);
        return $this->db->delete('tb_desa');
  }

  public function insert($data)
 	{
 		$query = $this->db->insert('tb_desa', $data);
		return $query;
 	}

 public function insert_batch($data)
  {
   return $this->db->insert_batch('tb_desa',$data);
  }

public function update($id_desa, $data)
	{
		$this->db->where('id_desa',$id_desa);
        return $this->db->update('tb_desa', $data);
    
	}

}