<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller {
	public function index()
	{
		$page='member';
		$data['title'] = ucfirst($page); 
		$this->load->model('MemberModel');
		$data["member_list"] = $this->MemberModel->getDataMember();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('MemberModel');
		if($this->form_validation->run()==FALSE){
			$page='MemberCreate';
				$data['title'] = ucfirst($page); 
				$this->load->view('templates/header', $data);
				$this->load->view('create/'.$page,$data);
				$this->load->view('templates/footer', $data);
		}else{
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = 1000000;
			$config['max_width']  = 10240;
			$config['max_height']  = 7680;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors());
				$page='MemberCreate';
				$data['title'] = ucfirst($page); 
				$this->load->view('templates/header', $data);
				$this->load->view('create/'.$page,$data,$error);
				$this->load->view('templates/footer', $data);
				// $this->load->view('barang_create_view', $error);
			}
			else{
					$this->load->model('MemberModel');
				$this->MemberModel->insertMember();
				$page='member';
				$data['title'] = ucfirst($page); 
				
				$data["member_list"] = $this->MemberModel->getDataMember();	
				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page,$data);
				$this->load->view('templates/footer', $data);
			}
		}
	}

	public function delete($id)
	{
		$this->load->model('MemberModel');
		$relasi = $this->MemberModel->relasipinjam($id);
		
			if ($relasi) {
				$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> gagal menghapus karena ada table yang saling berelasi di peminjaman
                  </div>");
			} else {
				$this->load->model('MemberModel');
	 			$this->MemberModel->deleteById($id);
	 			$this->session->set_flashdata("pesan", "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Perhatian!</strong> Data Member Berhasil Dihapus.
                  </div>");
			}
	 	
	 	redirect('member');
	 	
	}
	
}
/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>