<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengembalian extends CI_Controller {
	public function index()
	{
		$page='pengembalian';
		$data['title'] = ucfirst($page); 
		$this->load->model('PengembalianModel');
		$data["pengembalian_list"] = $this->PengembalianModel->getDataPengembalian();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function create($id)
	{
		$this->load->model('PengembalianModel');
		$data["pengembaliandetail_list"] = $this->PengembalianModel->getDataPengembalianDetail($id);
		$data["pengembalianbuku_list"] = $this->PengembalianModel->getDataPengembalianBuku($id);
		$data["pengembalian_list"] = $this->PengembalianModel->getDataPengembalian();	
		$page='PengembalianCreate';
		$data['title'] = ucfirst($page); 
		$this->load->view('templates/header', $data);
		$this->load->view('create/'.$page,$data);
		$this->load->view('templates/footer', $data);


	}

	public function PengembalianFinal()
	{
		$del_id=$this->input->post('kembali');
		$terlambat=$this->input->post('terlambat');
		$denda=$this->input->post('denda');
		$tanggal_kembali=date('Y-m-d');
		$kd_buku=$this->input->post('kd_buku');

		 $N = count($del_id);
		 for ($i=0; $i <$N ; $i++) { 

		 	$data = array(
                'terlambat'=>$terlambat,
                'denda'=>$denda,
                'tanggal_kembali'=>$tanggal_kembali,
                'status'=>1
            );
            $data_buku = array(
                'status'=>1
            );
		    $this->db->where('id', $del_id[$i]);
		    $this->db->update('detail_peminjaman', $data);

		    $this->db->where('no_buku', $kd_buku[$i]);
		    $this->db->update('buku', $data_buku);
		    
		
		    	 }

		redirect('pengembalian','refresh');

		
	}






	// public function lihat()
	// {
	// 	$this->load->model('sekolah_model');
	// 	$data["kelas_list"] = $this->sekolah_model->getDataKelas();
	// 	$this->load->view('kelas_view',$data);	
	// }
	// public function create()
	// {
	// 	$this->load->helper('url','form');	
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	// 	$this->load->model('sekolah_model');
	// 	if($this->form_validation->run()==FALSE){
	// 		$this->load->view('kelas_create_view');
	// 	}else{
	// 		$this->sekolah_model->insertKelas();
	// 		$data["kelas_list"] = $this->sekolah_model->getDataKelas();	
	// 		$this->load->view('kelas_view', $data);
	// 	}
	// }
	// public function update($id)
	// {
	// 	$this->load->helper('url','form');	
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	// 	$this->load->model('sekolah_model');
	// 	$data['kelas']=$this->sekolah_model->getKelas($id);
	// 	if($this->form_validation->run()==FALSE){
	// 		$this->load->view('kelas_edit_view',$data);
	// 	}else{
	// 		$this->sekolah_model->updateById($id);
	// 		$data["kelas_list"] = $this->sekolah_model->getDataKelas();	
	// 		$this->load->view('kelas_view', $data);
	// 	}
	// }
	// public function delete($id)
	// {
	// 	$this->load->model('sekolah_model');
	// 	$this->sekolah_model->deleteKelas($id);
	// 	$data["kelas_list"] = $this->sekolah_model->getDataKelas();	
	// 	$this->load->view('kelas_view', $data);
	// }
}
/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>