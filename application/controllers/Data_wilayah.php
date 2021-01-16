<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Wilayah extends CI_Controller {


public function __construct()
	{
		parent::__construct();
		$this->load->model('Wilayah_model');
		$this->load->model('Stunting_model');
		$this->load->library('excel');
	}

public function wilayah()

	{
		$data['judul'] = "Data Wilayah";
		$data['row'] = $this->Wilayah_model->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('data_wilayah/wilayah', $data);
		$this->load->view('templates/footer');
	}

public function tambah_data()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode', 'Kode Kecamatan', 'required|is_unique[tb_wilayah.kode_wilayah]');
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
		
		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Tambah Data";
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('data_wilayah/tambah_data');
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id_wilayah");
					$kode = $this->input->post("kode");
					$nama_kecamatan = $this->input->post("nama_kecamatan");
					$warna = $this->input->post("warna");

					$data = array(
							"id_wilayah"=>$id,
							"kode_wilayah"=>$kode,
							"nama_wilayah"=>$nama_kecamatan, 
							"warna"=>$warna,

						);

							$config['upload_path']          = './assets/filegs/';
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
					               		redirect('data_wilayah/tambah_data');
					        }
					        else
					        {
					                $upload_data = $this->upload->data();
					                $file_name = $upload_data['file_name'];
					                $data['geojson']=$file_name;
					                if ($this->Wilayah_model->insert($data)) {
					               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_wilayah/wilayah');
					                }
					        }
			                }

		
	}


public function edit_data($id_wilayah)
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Ubah Data";
                    $data['data'] = $this->Wilayah_model->getId($id_wilayah);
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('data_wilayah/edit_data', $data);
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id_wilayah");
					$kode = $this->input->post("kode");
					$nama_kecamatan = $this->input->post("nama_kecamatan");
					$lat = $this->input->post("lat");
					$lng = $this->input->post("lng");
					if (!empty($post['geojson'])) {
						$geojson = $this->input->post("geojson");
					}else{
						$geojson = $this->input->post("gs");
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
							"id_wilayah"=>$id,
							"kode_wilayah"=>$kode,
							"nama_wilayah"=>$nama_kecamatan, 
							"lat"=>$lat,
							"lng"=>$lng,
							"warna"=>$warna,
							"geojson"=>$geojson,


						);

					 		if ($this->Wilayah_model->update($id, $data)) {
					               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_wilayah/wilayah');
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('data_wilayah/edit_data');
					           }
			                }

		
	}

public function proses_edit()
	{
		$id = $this->input->post("id_wilayah");
		$kode = $this->input->post("kode");
		$nama_kecamatan = $this->input->post("nama_kecamatan");
		$geojson = $this->input->post("geojson");
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
				"id_wilayah"=>$id,
				"kode_wilayah"=>$kode,
				"nama_wilayah"=>$nama_kecamatan, 
				"warna"=>$warna,
				"geojson"=>$geojson,

			);

		 		if ($a = $this->Wilayah_model->update($id, $data)) {
		               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Diubah
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
		               		redirect('data_wilayah/wilayah');
		           }else{
		           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Diubah
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
		               		redirect('data_wilayah/edit_data');
		           }
	}

public function hapus($id_wilayah)
	{
		$data = $this->Wilayah_model->getId($id_wilayah);
		$nama = './assets/filegs/'.$data->geojson;

		if(is_readable($nama)){
			$delete = $this->Wilayah_model->hapus($id_wilayah);
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_wilayah/wilayah'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('data_wilayah/wilayah'));
		}
	}


public function import_csv()
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
					$kode_wilayah = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_wilayah = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$lat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$lng = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$geojson = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$warna = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

					$data[] = array(
						'kode_wilayah'		=>$kode_wilayah,
						'nama_wilayah'		=>$nama_wilayah,
						'lat'				=>$lat,
						'lng'				=>$lng,
						'geojson'			=>$geojson.'.geojson',
						'warna'				=>$warna
					);
				}
			}
			$this->Wilayah_model->insert_batch($data);
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Suksess!</strong> Data Exel berhasil di Import
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
			redirect('data_wilayah/wilayah');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> File Exel gagal di import!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
        				</div>');
			redirect('data_wilayah/wilayah');
		}
	}


 public function pdf_wilayah()
 	{
	 	$this->load->library('dompdf_gen');

	 	$data['judul'] = "Cetak Wilayah";
		$data['row'] = $this->Wilayah_model->get()->result();
		$this->load->view('data_wilayah/pdf_wilayah', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_Wilayah.pdf", array('Attachment' =>0));
 	}



}