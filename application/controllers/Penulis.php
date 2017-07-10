<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penulis extends CI_Controller {

	public function index()
	{
		$page='penulis';
		$data['title'] = ucfirst($page); 
		$this->load->model('PenulisModel');
		$data["Penulis_list"] = $this->PenulisModel->getDataPenulis();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
  	 {
	   $this->load->helper('url','form'); 
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	   $this->load->model('PenulisModel');
  
  			 if($this->form_validation->run()==FALSE){

				   $page='PenulisCreate';
				   $data['title'] = ucfirst($page); 
				   $this->load->view('templates/header', $data);
				   $this->load->view('create/'.$page,$data);
				   $this->load->view('templates/footer', $data);
  			 }else{

				    $this->load->model('PenulisModel');
				    $this->PenulisModel->insertPenulis();
				    $this->session->set_flashdata("pesan", "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian !</strong> Data Penulis Berhasil Ditambahkan.
                  </div>");

		 redirect("penulis");

   }
  }

	public function delete($id)
	 {
	 	$this->load->model('PenulisModel');
	 	$this->PenulisModel->deleteById($id);
	 	$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Penulis Berhasil Dihapus.
                  </div>");

	 	redirect("penulis");
	 }

 

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('PenulisModel');
		$data['penulis']=$this->PenulisModel->getPenulis($id);
		
				if($this->form_validation->run()==FALSE){

					$page='UpdatePenulis';
				 	$data['title'] = ucfirst($page); 
				   	$this->load->view('templates/header', $data);
				    $this->load->view('update/'.$page,$data);
				    $this->load->view('templates/footer', $data);
		        }else{

					$this->load->model('PenulisModel');
				    $this->PenulisModel->updatePenulis($id); 
				    $this->session->set_flashdata("pesan", "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Penulis Berhasil Diupdate.
                  </div>");
				    
		redirect("penulis");

		}
	}
	
}
/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>