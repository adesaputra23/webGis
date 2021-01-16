<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stunting_model extends CI_Model {

public function get()
	{
		// $data=$this->db->get('tb_stunting');
		$data=$this->db->select('*')
					->from('tb_stunting a')
					->join('tb_wilayah b','a.kode_wilayah=b.kode_wilayah','LEFT')
					->get();
		return $data;
	}

public function getDataByID($tahun){
        return $this->db->get_where('tb_stunting', array('tahun'=>$tahun));
    }

public function pdf_tahun($tahun, $kec){
        $data = $this->db->select('*')
                         ->from('qw_stunting')
                          ->where('tahun', $tahun)
                          ->where('kode_wilayah', $kec)
                          ->get();
        return $data;
    }

public function tampil_wilayah($tahun)
  {
      
      $this->db->select('id, nama, kode_wilayah, COUNT(IF(kode_wilayah, kode_wilayah, NULL)) as total');
       $this->db->group_by('kode_wilayah'); 
       $this->db->order_by('total', 'desc');
       $detail = $this->db->get('tb_stunting');


       return $detail;
  }

public function gettahun(){
    $data=$this->db->get('tb_tahun');
    return $data;
  }

public function hitungJumlah()
{   
    $query = $this->db->get('tb_stunting');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}

public function lihat2()
  {
    $val=$this->db->select('*')
                               ->from('tb_user')
                               ->join('tb_stunting','tb_stunting.kode_wilayah=tb_user.kode_wilayah')
                               ->join('tb_wilayah','tb_wilayah.kode_wilayah=tb_stunting.kode_wilayah')
                               ->get();
   return $val;
  }

public function insert($data)
  {
    $query = $this->db->insert('tb_stunting', $data);
    return $query;
  }

 public function lihat()
  {
    // $data=$this->db->get('tb_stunting');
    $data=$this->db->select('*')
          ->from('tb_user a')
          ->join('tb_stunting b','a.kode_wilayah=b.kode_wilayah','LEFT')
          ->get();
    return $data;
  }

public function detail($id)
  {
    $query = $this->db->get_where('tb_stunting', array('id'=>$id))->row();
    return $query;
  }

public function detail2($kode_wilayah)
  {
    return $this->db->get_where('tb_stunting', array('kode_wilayah'=>$kode_wilayah));
  }

  public function pdf_w($tahun,$kode_wilayah)
  {
   $data = $this->db->select('*')
                       ->from('qw_stunting')
                       ->where('tahun',$tahun)
                       ->where('kode_wilayah',$kode_wilayah)
                       ->get();
      return $data;
  }

 public function hapus($id)
  {
    $this->db->where('id', $id);
        return $this->db->delete('tb_stunting');
  }

  public function update($id, $data)
    {
      $this->db->where('id',$id);
      return $this->db->update('tb_stunting', $data);
    }

  public function cari_d($tahun)
    {
        $this->db->select('id, nama, kode_wilayah, COUNT(IF(kode_wilayah, kode_wilayah, NULL)) as total');
        $this->db->group_by('kode_wilayah'); 
        $this->db->order_by('total', 'desc');
        $this->db->where("tahun",$tahun);
      return $this->db->get("tb_stunting");
    }

  public function cari_a($tahun)
    {
        $this->db->select('*');
        $this->db->where("tahun",$tahun);
      return $this->db->get("qw_stunting");
    }

    public function cari_p($tahun,$kec)
    {
        $this->db->select('*');
        $this->db->where("tahun",$tahun);
        $this->db->where("kode_wilayah",$kec);
      return $this->db->get("qw_stunting");
    }

    public function cari_w($tahun)
    {
        return $this->db->get_where('kode_wilayah', array('tahun'=>$tahun));
    }

    public function test()
      {
        $sql = "select kode_wilayah, count(*) as jumlah
                from tb_stunting
                group by kode_wilayah";
        $getkecamatan = $this->db->query($sql);
        return $getkecamatan;
      }

  public function grafik($tahun)
    {
        $this->db->select('id, nama, kode_wilayah, COUNT(IF(kode_wilayah, kode_wilayah, NULL)) as total');
        $this->db->group_by('kode_wilayah'); 
        $this->db->order_by('total');
        $this->db->where("tahun",$tahun);
      return $this->db->get("tb_stunting");
    }

public function l_wilayah($tahun)
    {
        $this->db->select('nama,nama_wilayah,kode_wilayah, COUNT(IF(kode_wilayah, kode_wilayah, NULL)) as total');
        $this->db->group_by('kode_wilayah'); 
        $this->db->order_by('total');
        $this->db->where("tahun", $tahun);
      return $this->db->get('qw_stunting');
    }

public function hitung_w($tahun)
    {
      // SELECT SUM(`kode_wilayah`) FROM `qw_stunting` WHERE `tahun`='2019'
     $data = $this->db->select('kode_wilayah')
                       ->from('qw_stunting')
                       ->where("tahun",$tahun)
                       ->get()->result();
       return $data;
    }

  public function insert_batch($data)
  {
   return $this->db->insert_batch('tb_stunting',$data);
  }

  public function data_s($kode_wilayah, $tahun)
    {
        $data = $this->db->select('*')
           ->from('tb_stunting')
           ->where('kode_wilayah',$kode_wilayah)
            ->where('tahun',$tahun)
           ->get();
          return $data;
    }

public function tampil_data($tahun, $kec)
    {
      $data = $this->db->select('*')
                       ->from('qw_stunting')
                       ->where('tahun',$tahun)
                       ->where('kode_wilayah',$kec)
                       ->get();
      return $data;
    }

public function tampil_data_s($tahun, $kode_wilayah)
    {
      $data = $this->db->select('*')
                       ->from('qw_stunting')
                       ->where('tahun',$tahun)
                       ->where('kode_wilayah',$kode_wilayah)
                       ->get();
      return $data;
    }

public function p_s_home()
    {
       $this->db->select('id, nama, kode_wilayah, COUNT(IF(kode_wilayah, kode_wilayah, NULL)) as total');
        $this->db->group_by('kode_wilayah'); 
        $this->db->order_by('total', 'desc');
        $this->db->where("tahun",2019);
      return $this->db->get("tb_stunting");
    }

 public function p_p_home()
    {
        $this->db->select('*');
        $this->db->where("tahun",2019);
      return $this->db->get("tb_stunting");
    }

public function p_r_home()
  {
    $this->db->select('*');
    $this->db->where("tahun",2019);
    $this->db->where("kode_wilayah",'63.01.12');
    return $this->db->get("tb_stunting");

  }

public function cari_i($kode_wilayah)
    {
        $this->db->select('*');
        $this->db->where("tahun", 2019);
        $this->db->where("kode_wilayah", $kode_wilayah);
      return $this->db->get("qw_stunting");
    }

public function i()
    {
        $this->db->select('*');
        $this->db->where("tahun", 2019);
        $this->db->where("kode_wilayah", '63.01.19');
      return $this->db->get("qw_stunting");
    }

public function cari_q($lokasi)
    {
        $this->db->select('*');
        $this->db->where("tahun", 2019);
        $this->db->where("alamat", $lokasi);
      return $this->db->get("qw_stunting");
    }

public function h($kode_wilayah)
    {
        $this->db->select('*');
        $this->db->where("kode_wilayah", $kode_wilayah);
      return $this->db->get("tb_desa");
    }

public function k_desa($desa, $tahun, $kode_wilayah)
    {
      $this->db->select('*');
      $this->db->where("kode_wilayah", $kode_wilayah);
        $this->db->where("tahun", $tahun);
        $this->db->where("alamat", $desa);
        $this->db->where("ketegori",'Pendek');
        $db = $this->db->get('tb_stunting');
        return $db;
    }

public function s_desa($desa, $tahun, $kode_wilayah)
    {
      $this->db->select('*');
      $this->db->where("kode_wilayah", $kode_wilayah);
        $this->db->where("tahun", $tahun);
        $this->db->where("alamat", $desa);
        $this->db->where("ketegori",'Sangat Pendek');
        $db = $this->db->get('tb_stunting');
        return $db;
    }

public function i_info()
  {
        $this->db->select('kode_wilayah,tahun, COUNT(tahun) as total');
        $this->db->from('tb_stunting');
        $this->db->group_by('kode_wilayah');
        $this->db->group_by('tahun');
        $this->db->order_by('total', 'desc');
       return $db = $this->db->get();
  }


 
}