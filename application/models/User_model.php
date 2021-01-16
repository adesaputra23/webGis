<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email', $post['email']);
		$this->db->where('pasword', $post['password']);
		$query = $this->db->get();
		return $query;

	}

public function hitungJumlah()
{   
    $query = $this->db->get('tb_user');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function getanggota(){
		$data=$this->db->get('tb_pengguna');
		return $data;
	}

public function get_pengguna($level){
	 return $this->db->get_where('tb_pengguna', array('level'=>$level))->row();
	}

public function get_user($level){
	 $data=$this->db->get_where('tb_user', array('level'=>$level));
	return $data;

	}

public function getDataByID($nip){
        return $this->db->get_where('tb_user', array('nip'=>$nip));
    }

public function lihat(){
		$data=$this->db->select('*')
					->from('tb_user a')
					->join('tb_wilayah b','a.kode_wilayah=b.kode_wilayah','LEFT')
 					->get();
 		return $data;
	}

public function get($email = null)
	{
		$this->db->from('tb_user a')
				->join('tb_wilayah b','a.kode_wilayah=b.kode_wilayah','LEFT');
		if($email != null){
			$this->db->where('email', $email);
		}
		$query = $this->db->get();
		return $query;
	}

public function detail($nip = null)
	{
		$query = $this->db->get_where('tb_user', array('nip' =>$nip))->row();
		return $query;
	}
public function detail2($nip = null)
	{
		$query = $this->db->get_where('tb_user', array('nip' =>$nip));
		return $query;
	}

public function insert($data)
	{
		$query = $this->db->insert('tb_user', $data);
		return $query;
	}

public function update($nip, $data)
	{
		$this->db->where('nip',$nip);
        return $this->db->update('tb_user', $data);
	}

public function hapus($nip)
	{
		$this->db->where('nip', $nip);
        return $this->db->delete('tb_user');
	}



}