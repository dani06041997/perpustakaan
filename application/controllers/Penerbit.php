<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penerbit extends CI_Controller {

	public function index()
	{
		$page='penerbit';
		$data['title'] = ucfirst($page); 
		$this->load->model('PenerbitModel');
		$data["Penerbit_list"] = $this->PenerbitModel->getDataPenerbit();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
  	 {
	   $this->load->helper('url','form'); 
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	   $this->load->model('PenerbitModel');
  
  			 if($this->form_validation->run()==FALSE){

				 $page='PenerbitCreate';
				 $data['title'] = ucfirst($page); 
				 $this->load->view('templates/header', $data);
				 $this->load->view('create/'.$page,$data);
				 $this->load->view('templates/footer', $data);

  			 }else{

				 $this->load->model('PenerbitModel');
				 $this->PenerbitModel->insertPenerbit(); 
				 $this->session->set_flashdata("pesan", "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian !</strong> Data Penerbit Berhasil Ditambahkan.
                  </div>");
				    
				 redirect("penerbit");
   }
  }

	public function delete($id)
	 {
	 	$this->load->model('PenerbitModel');
	 	$this->PenerbitModel->deleteById($id);
	 	$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Penerbit Berhasil Dihapus.
                  </div>");
	 	redirect("penerbit");
	 
	 }

 

	public function update($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('PenerbitModel');
		$data['penerbit']=$this->PenerbitModel->getPenerbit($id);
		
				if($this->form_validation->run()==FALSE){

					$page='UpdatePenerbit';
				 	$data['title'] = ucfirst($page); 
				   	$this->load->view('templates/header', $data);
				    $this->load->view('update/'.$page,$data);
				    $this->load->view('templates/footer', $data);
		        }else{

					$this->load->model('PenerbitModel');
				    $this->PenerbitModel->updatePenerbit($id);
				 
				    $this->session->set_flashdata("pesan", "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Kategori Berhasil Diupdate.
                  </div>");

				 redirect("penerbit");
				    
		}
	}
	
}
/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>