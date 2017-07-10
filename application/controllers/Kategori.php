<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {

	public function index()
	{
		$page='kategori';
		$data['title'] = ucfirst($page); 
		$this->load->model('KategoriModel');
		$data["kategori_list"] = $this->KategoriModel->getDataKategori();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
  	 {
	   $this->load->helper('url','form'); 
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	   $this->load->model('KategoriModel');
  
  			 if($this->form_validation->run()==FALSE){

				   $page='KategoriCreate';
				   $data['title'] = ucfirst($page); 
				   $this->load->view('templates/header', $data);
				   $this->load->view('create/'.$page,$data);
				   $this->load->view('templates/footer', $data);
  			 }else{

				    $this->load->model('KategoriModel');
				    $this->KategoriModel->insertKategori();
				    $data["kategori_list"] = $this->KategoriModel->getDataKategori(); 
				    $this->load->view('templates/header', $data);
				    $this->session->set_flashdata("pesan", "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian !</strong> Data Kategori Berhasil Ditambahkan.
                  </div>");

				    $this->load->view('pages/kategori',$data);
				    $this->load->view('templates/footer', $data);

   }
  }

	public function delete($id)
	 {
	 	$this->load->model('KategoriModel');
	 	$kategoridipinjam = $this->KategoriModel->kategoridipinjam($id);

	 	if ($kategoridipinjam) {
				$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> gagal menghapus karena ada table yang saling berelasi di buku
                  </div>");

		        }else{
		        	$this->KategoriModel->deleteById($id);
	 	
	 		      $this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Kategori Berhasil Dihapus.
                  </div>");
	 		}

	 	redirect('kategori','refresh');
	 
	 }


 

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('KategoriModel');
		$data['kategori']=$this->KategoriModel->getKategori($id);
		
				if($this->form_validation->run()==FALSE){

					$page='UpdateKategori';
				 	$data['title'] = ucfirst($page); 
				   	$this->load->view('templates/header', $data);
				    $this->load->view('update/'.$page,$data);
				    $this->load->view('templates/footer', $data);
		        }else{

					$this->load->model('KategoriModel');
				    $this->KategoriModel->updateKategori($id);
				    $data["kategori_list"] = $this->KategoriModel->getDataKategori(); 
				    $this->load->view('templates/header', $data);
				    $this->session->set_flashdata("pesan", "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Kategori Berhasil Diupdate.
                  </div>");
				    $this->load->view('pages/kategori',$data);
				    $this->load->view('templates/footer', $data);
		}
	}
}
	

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>