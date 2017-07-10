<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Buku extends CI_Controller {

	public function index()
	{
		$page='buku';
		$data['title'] = ucfirst($page); 
		$this->load->model('BukuModel');
		$data["buku_list"] = $this->BukuModel->getDataBuku();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->load->model('BukuModel');
		$data['buku']=$this->BukuModel->getBuku($id);
		
				if($this->form_validation->run()==FALSE){

					$page='UpdateBuku';
				 	$data['title'] = ucfirst($page); 
				   	$this->load->view('templates/header', $data);
				    $this->load->view('update/'.$page,$data);
				    $this->load->view('templates/footer', $data);
			}else{
				$id_kat=$this->input->POST('kategori');
				$kategoridipinjam = $this->BukuModel->kategoridipinjam($id_kat);
		
			if ($kategoridipinjam) {
				$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> gagal menghapus karena ada table yang saling berelasi di peminjaman
                  </div>");

		        }else{

					$this->load->model('BukuModel');
				    // $this->BukuModel->updateBuku($id);
				    $data["buku_list"] = $this->BukuModel->getDataBuku(); 
				    $this->load->view('templates/header', $data);
				    $this->session->set_flashdata("pesan", "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Kategori Berhasil Diupdate.
                  </div>");

				  
			}
			  redirect('buku');
		}
				   

		}
	


	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->load->model('KategoriModel');
		$this->load->model('BukuModel');
		$data["kategori_list"] = $this->KategoriModel->getDataKategori();
		$data["penulis"]=$this->BukuModel->getDataPenulis();

			if($this->form_validation->run()==FALSE){

				$page='BukuCreate';
				$data['title'] = ucfirst($page); 
				$this->load->view('templates/header', $data);
				$this->load->view('create/'.$page,$data);
				$this->load->view('templates/footer', $data);

		}else{
				
				$this->load->model('BukuModel');
				$this->BukuModel->insertBuku();
				$this->session->set_flashdata("pesan", "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Buku Berhasil Ditambahkan.
                  </div>");


				redirect('buku');
		
			}
	}

	public function delete($id)
	{
		$this->load->model('BukuModel');
		$dipinjam = $this->BukuModel->bukuDiPinjam($id);
		
			if ($dipinjam) {
				$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> gagal menghapus karena ada table yang saling berelasi di peminjaman
                  </div>");
			} else {
				$this->load->model('BukuModel');
	 			$this->BukuModel->deleteById($id);
	 			$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Buku Berhasil Dihapus.
                  </div>");
			}
	 	
	 	redirect('buku');
	 	
	}

		public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('kategori')->like('nama_kategori',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_kategori,
				'judul'	=>$row->kd_kategori,
			

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

	  public function search_penerbit()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('penerbit')->like('nama_penerbit',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_penerbit,
				'nama'	=>$row->nama_penerbit,
			

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}



	 
}

?>