<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Stunting extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('User_model');
		$this->load->model('Tahun_model');
		$this->load->library('excel');
	}

public function index()

	{
		$tahun = $this->input->post('tahun');
		$kec = $this->input->post('kec');

		$data['v_tampil'] = $this->Stunting_model->tampil_data($tahun,$kec)->result();
		$data['judul'] = "Data Stunting";
		$data['tahun'] = $this->Tahun_model->get();
		$data['kec'] = $this->Wilayah_model->get();
		$data['row'] = $this->Stunting_model->get();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('stunting/lihat', $data);
		$this->load->view('templates/footer');
	}


public function staf($kode_wilayah)

	{
		$tahun = $this->input->post('tahun');

		$data['judul'] = "Data Stunting";
		$data['tahun'] = $this->Tahun_model->get();
		$data['lihat2'] = $this->Stunting_model->detail2($kode_wilayah);
		$data['v_tampil'] = $this->Stunting_model->tampil_data_s($tahun,$kode_wilayah)->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('stunting/view', $data);
		$this->load->view('templates/footer');
	}

public function tambah_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('tb', 'TB/U', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');


		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Tambah Data";
                    $data['row'] = $this->Wilayah_model->get();
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('stunting/tambah_data',$data);
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$nama = $this->input->post("nama");
					$alamat = $this->input->post("alamat");
					$kecamatan = $this->input->post("kecamatan");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$tanggal = $this->input->post("tanggal");
					$jk = $this->input->post("jk");
					$umur = $this->input->post("umur");
					$tb = $this->input->post("tb");
					$kategori = $this->input->post("kategori");


					$data = array(
							"id"=>$id,
							"nama"=>$nama,
							"alamat"=>$alamat, 
							"kode_wilayah"=>$kecamatan,
							"lat"=>$lat,
							"lng"=>$lng,
							"tanggal"=>$tanggal,
							"jk"=>$jk,
							"umur"=>$umur,
							"tb"=>$tb,       
							"ketegori"=>$kategori,
							"marker"=>$jk.'.png',
							"tahun"=>$tanggal,

						);

						if ($this->Stunting_model->insert($data)) {
							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah);
						}else{

							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah);
						}
			      }

		
	}

public function tambah_s()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('tb', 'TB/U', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');


		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Tambah Data";
                    $data['row'] = $this->Wilayah_model->get();
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('stunting/tambah_s',$data);
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$nama = $this->input->post("nama");
					$alamat = $this->input->post("alamat");
					$kecamatan = $this->input->post("kecamatan");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$tanggal = $this->input->post("tanggal");
					$jk = $this->input->post("jk");
					$umur = $this->input->post("umur");
					$tb = $this->input->post("tb");
					$kategori = $this->input->post("kategori");


					$data = array(
							"id"=>$id,
							"nama"=>$nama,
							"alamat"=>$alamat, 
							"kode_wilayah"=>$kecamatan,
							"lat"=>$lat,
							"lng"=>$lng,
							"tanggal"=>$tanggal,
							"jk"=>$jk,
							"umur"=>$umur,
							"tb"=>$tb,       
							"ketegori"=>$kategori,
							"marker"=>$jk.'.png',
							"tahun"=>$tanggal,

						);

						if ($this->Stunting_model->insert($data)) {
							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting');
						}else{

							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting');
						}
			      }

		
	}



public function edit($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('tb', 'TB/U', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Ubah Data";
                    $data['row'] = $this->Wilayah_model->get();
					$data['data'] = $this->Stunting_model->detail($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('stunting/edit_data',$data);
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$nama = $this->input->post("nama");
					$alamat = $this->input->post("alamat");
					$kecamatan = $this->input->post("kecamatan");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$tanggal = $this->input->post("tanggal");
					$jk = $this->input->post("jk");
					$umur = $this->input->post("umur");
					$tb = $this->input->post("tb");
					$kategori = $this->input->post("kategori");

						    $data=array(
						    			"id"=>$id,
										"nama"=>$nama,
										"alamat"=>$alamat, 
										"kode_wilayah"=>$kecamatan,
										"lat"=>$lat,
										"lng"=>$lng,
										"tanggal"=>$tanggal,
										"jk"=>$jk,
										"umur"=>$umur,
										"tb"=>$tb,       
										"ketegori"=>$kategori,
										"marker"=>$jk.'.png',
										"tahun"=>$tanggal,
									);

					 		if ($this->Stunting_model->update($id, $data)) {
					               $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting');
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting/edit_data');
					           }
					       }
					}



public function edit_data_s($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('tb', 'TB/U', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Ubah Data";
                    $data['row'] = $this->Wilayah_model->get();
					$data['data'] = $this->Stunting_model->detail($id);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('stunting/edit_data_s',$data);
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$nama = $this->input->post("nama");
					$alamat = $this->input->post("alamat");
					$kecamatan = $this->input->post("kecamatan");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$tanggal = $this->input->post("tanggal");
					$jk = $this->input->post("jk");
					$umur = $this->input->post("umur");
					$tb = $this->input->post("tb");
					$kategori = $this->input->post("kategori");

						    $data=array(
						    			"id"=>$id,
										"nama"=>$nama,
										"alamat"=>$alamat, 
										"kode_wilayah"=>$kecamatan,
										"lat"=>$lat,
										"lng"=>$lng,
										"tanggal"=>$tanggal,
										"jk"=>$jk,
										"umur"=>$umur,
										"tb"=>$tb,       
										"ketegori"=>$kategori,
										"marker"=>$jk.'.png',
										"tahun"=>$tanggal,
									);

					 		if ($this->Stunting_model->update($id, $data)) {
					               $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah);
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_stunting/edit_data_s');
					           }
					       }
					}
				



public function hapus($id)
	{
		$data = $this->Stunting_model->detail($id);
		$nama = './assets/marker/'.$data->marker;

		if(is_readable($nama)){
			$delete = $this->Stunting_model->hapus($id);
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_stunting'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_stunting'));
		}
	}

	public function hapus_s($id)
	{
		$data = $this->Stunting_model->detail($id);
		$nama = './assets/marker/'.$data->marker;

		if(is_readable($nama)){
			$delete = $this->Stunting_model->hapus($id);
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah));
		}
	}

	public function importcsv_s()
	{
		if(isset($_FILES["csv"]["name"]))
		{
			$path = $_FILES["csv"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kode_wilayah = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$lat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$lng = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$tanggal = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$umur = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$tb = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$kategori = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$tahun = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

					$data[] = array(
						'nama'			=>$nama,
						'alamat'		=>$alamat, 
						'kode_wilayah'	=>$kode_wilayah,
						'lat'			=>$lat,
						'lng'			=>$lng,
						'tanggal'		=>$tanggal,
						'jk'			=>$jenis_kelamin,
						'umur'			=>$umur,
						'tb'			=>$tb,  
						'ketegori'		=>$kategori,     
						'marker'		=>$jenis_kelamin.'.png',
						'tahun'			=>$tahun
					);
				}
			}
			$this->Stunting_model->insert_batch($data);
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Suksess!</strong> Data Exel berhasil di Import
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect(base_url('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> File Exel gagal di import!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
        				</div>');
			redirect(base_url('data_stunting/staf/'.$this->fungsi->user_login()->kode_wilayah));
		}

}
		

public function pdf()
{
	if ($tahun=$this->input->get('tahun') AND $kec=$this->input->get('kec')) {
		
	$this->load->library('dompdf_gen');
	$data['judul'] = "Cetak Data Stunting";
	$data['row'] = $this->Stunting_model->pdf_tahun($tahun,$kec)->result();
	$data['tahun'] = $tahun;
	$data['kec'] = $kec;
	$this->load->view('stunting/laporan_pdf', $data);

	$paper_size = 'A4';
	$orientation = 'portrait';
	$html = $this->output->get_output();
	$this->dompdf->set_paper($orientation, $paper_size);

	$this->dompdf->load_html($html);
	$this->dompdf->render();
	$this->dompdf->stream("laporan_stunting.pdf", array('Attachment' =>0));
	}
	
}

public function pdf_s($kode_wilayah)
{
	$tahun=$this->input->get('tahun');

	$this->load->library('dompdf_gen');
	$data['judul'] = "Cetak Data Stunting";
	$data['row'] = $this->Stunting_model->pdf_w($tahun,$kode_wilayah)->result();
	$data['tahun'] = $tahun;
	$this->load->view('stunting/pdf_s', $data);

	$paper_size = 'A4';
	$orientation = 'portrait';
	$html = $this->output->get_output();
	$this->dompdf->set_paper($orientation, $paper_size);

	$this->dompdf->load_html($html);
	$this->dompdf->render();
	$this->dompdf->stream("laporan_stunting.pdf", array('Attachment' =>0));
	
}

public function exel()
	{
		if(isset($_FILES["csv"]["name"]))
		{
			$path = $_FILES["csv"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kode_wilayah = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$lat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$lng = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$tanggal = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$umur = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$tb = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$kategori = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$tahun = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

					$data[] = array(
						'nama'			=>$nama,
						'alamat'		=>$alamat, 
						'kode_wilayah'	=>$kode_wilayah,
						'lat'			=>$lat,
						'lng'			=>$lng,
						'jk'			=>$jenis_kelamin,
						'tanggal'		=>$tanggal,
						'umur'			=>$umur,
						'tb'			=>$tb,  
						'ketegori'		=>$kategori,     
						'marker'		=>$jenis_kelamin.'.png',
						'tahun'			=>$tahun
					);
				}
			}
			$this->Stunting_model->insert_batch($data);
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Suksess!</strong> Data Exel berhasil di Import
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect('data_stunting');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> File Exel gagal di import!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
        				</div>');
			redirect('data_stunting');
		}
	}




}