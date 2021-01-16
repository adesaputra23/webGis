<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Desa extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('Wilayah_model');
		$this->load->model('Stunting_model');
		$this->load->model('Desa_model');
		$this->load->library('excel');
	}

public function upload_geojson()
	{
		 			$id = $this->input->post("id");
					$kode = $this->input->post("kode");
					$kecamatan = $this->input->post("kecamatan");
					$desa = $this->input->post("desa");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$warna = $this->input->post("warna");
					$geojson = $this->input->post("file");
				
					$config['upload_path'] = './assets/filegsdesa/';
				    $config['allowed_types'] = '*';

				    $this->load->library('upload', $config);

				    if ( ! $this->upload->do_upload('file'))
				    {
				        $error = array('error' => $this->upload->display_errors());
				    }
				    else
				    {
				        $upload_data=$this->upload->data();
				        $geojson=$upload_data['file_name'];
				    }

						   $data = array(
							"id_desa"=>$id,
							"kode_desa"=>$kode,
							"kode_wilayah"=>$kecamatan,
							"nama_desa"=>$desa,
							"lat"=>$lat, 
							"lng"=>$lng,  
							"de_geojson"=>$geojson,  
							"warna"=>$warna,

						);

					 		if ($this->Desa_model->update($id, $data)) {
					               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/lihat');
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/lihat');
					           }
			                
			                
	}


public function lihat()
	{
		$data['judul'] = "Data Desa";
		$data['lihat'] = $this->Desa_model->get()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('data_desa/lihat', $data);
		$this->load->view('templates/footer');
	}

public function tambah()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode', 'Kode Desa', 'required|is_unique[tb_desa.kode_desa]');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Nama Desa', 'required');
		$this->form_validation->set_rules('lat', 'Latitute', 'required');
		$this->form_validation->set_rules('lng', 'Longitute', 'required');
		
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Data Desa";
					$data['kec'] = $this->Wilayah_model->get()->result();
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('data_desa/tambah_data');
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id_desa");
					$kode = $this->input->post("kode");
					$kecamatan = $this->input->post("kecamatan");
					$desa = $this->input->post("desa");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					$warna = $this->input->post("warna");

					$data = array(
							"id_desa"=>$id,
							"kode_desa"=>$kode,
							"kode_wilayah"=>$kecamatan,
							"nama_desa"=>$desa,
							"lat"=>$lat, 
							"lng"=>$lng,  
							"warna"=>$warna,

						);

							$config['upload_path']          = './assets/filegsdesa/';
			                $config['allowed_types']        = '*';

			                $this->load->library('upload', $config);

					        if ( ! $this->upload->do_upload('file'))
					        {
					                 	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/lihat');
					        }
					        else
					        {
					                $upload_data = $this->upload->data();
					                $file_name = $upload_data['file_name'];
					                $data['de_geojson']=$file_name;
					                if ($this->Desa_model->insert($data)) {
					               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/lihat');
					                }
					        }
			                }

	}

public function hapus($id_desa)
	{
		if($this->Desa_model->hapus($id_desa)){
		
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_desa/lihat'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_desa/lihat'));
		}
	}

 public function import()
 {
 	if(isset($_FILES["ex"]["name"]))
		{
			$path = $_FILES["ex"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$kode = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$kode_wilayah = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama_desa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$lat = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$lng = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$de_geojson = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$warna = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

					$data[] = array(
						'kode_desa'			=>$kode,
						'kode_wilayah'		=>$kode_wilayah, 
						'nama_desa'			=>$nama_desa,
						'lat'				=>$lat,
						'lng'				=>$lng,
						'de_geojson'		=>$de_geojson,
						'warna'				=>$warna
					);
				}
			}
			$this->Desa_model->insert_batch($data);
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Suksess!</strong> Data Exel berhasil di Import
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect('data_desa/lihat');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> File Exel gagal di import!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
        				</div>');
			redirect('data_desa/lihat');
		}
	}
 
 public function edit_data($id_desa)
 	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode', 'Kode Desa', 'required|is_unique[tb_desa.kode_desa]');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Nama Desa', 'required');
		$this->form_validation->set_rules('lat', 'Latitute', 'required');
		$this->form_validation->set_rules('lng', 'Longitute', 'required');
		
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Data Desa";
					$data['kec'] = $this->Wilayah_model->get()->result();
					$data['lihat'] = $this->Desa_model->getId($id_desa);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('data_desa/edit_data');
					$this->load->view('templates/footer');
                }
                else
                {

					$id = $this->input->post("id_desa");
					$kode = $this->input->post("kode");
					$kecamatan = $this->input->post("kecamatan");
					$desa = $this->input->post("desa");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					if (!empty($post['geojson'])) {
						$geojson = $this->input->post("geojson");
					}else{
						$geojson = $this->input->post("name_g");
					}
					$warna = $this->input->post("warna");
					
					$config['upload_path'] = './assets/filegs/';
				    $config['allowed_types'] = '*';

				    $this->load->library('upload', $config);

				    if ( ! $this->upload->do_upload('geojson'))
				    {
				        $error = array('error' => $this->upload->display_errors());
				    }
				    else
				    {
				        $upload_data=$this->upload->data();
				        $geojson=$upload_data['file_name'];
				    }

						$data = array(
							"id_desa"=>$id,
							"kode_desa"=>$kode,
							"kode_wilayah"=>$kecamatan,
							"nama_desa"=>$desa,
							"lat"=>$lat, 
							"lng"=>$lng, 
							"de_geojson"=>$geojson,  
							"warna"=>$warna,

						);

					 		if ($this->Desa_model->update($id_desa, $data)) {
					               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/lihat');
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_desa/edit_data');
					           }
			                }
 	}



}