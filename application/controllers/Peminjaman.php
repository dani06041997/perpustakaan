<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Peminjaman extends CI_Controller {
	public function index()
	{
		$page='peminjaman';
		$data['title'] = ucfirst($page); 
		$this->load->model('PeminjamanModel');
		$data['noauto']=$this->PeminjamanModel->nootomatis();
		$data["peminjaman_list"] = $this->PeminjamanModel->getDataPeminjaman();	
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}

	public function monitoring_user()
	{
		$username = ($this->session->userdata['logged_in']['username']);
		$page='monitoringpeminjaman';
		$data['title'] = ucfirst($page); 
		$this->load->model('PeminjamanModel');
		$data["Monitoring_user"] = $this->PeminjamanModel->getMonitoringUser($username);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer', $data);
	}



	// public function lihat()
	// {
	// 	$this->load->model('sekolah_model');
	// 	$data["kelas_list"] = $this->sekolah_model->getDataKelas();
	// 	$this->load->view('kelas_view',$data);	
	// }
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_buku', 'No_buku', 'trim|required');
		$this->load->model('PeminjamanModel');
		$data['noauto']=$this->PeminjamanModel->nootomatis();
		$data["keranjang_list"] = $this->PeminjamanModel->getDataKeranjang();
		if($this->form_validation->run()==FALSE){

				$page='PeminjamanCreate';
				$data['title'] = ucfirst($page); 
				$this->load->view('templates/header', $data);
			    $this->load->view('create/'.$page,$data);
			    $this->load->view('templates/footer', $data);
		}else{
			 $username = ($this->session->userdata['logged_in']['username']);                
			$this->db->from('keranjang_buku');
			$this->db->where('admin', $username);
			$jumlah= $this->db->count_all_results(); 

			if($jumlah>4){
			echo "<script> alert('Maaf Buku yang anda pinjam melebihi batas');</script>";
			
			$page='PeminjamanCreate';
			$data['title'] = ucfirst($page); 
			$this->load->view('templates/header', $data);
	    	$this->load->view('create/'.$page,$data);
	    	$this->load->view('templates/footer', $data);
			
			    }else{
			    	echo "$jumlah";
			    	$this->PeminjamanModel->updateStok();
			    	$this->PeminjamanModel->insertKeranjang();

					$data["keranjang_list"] = $this->PeminjamanModel->getDataKeranjang();	
					$page='PeminjamanCreate';
					$data['title'] = ucfirst($page); 
					$this->load->view('templates/header', $data);
			    	$this->load->view('create/'.$page,$data);
			    	$this->load->view('templates/footer', $data);
			    }

		}
	}

	public function TransaksiPeminjaman()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_peminjaman', 'No_peminjaman', 'trim|required');
		$this->load->model('PeminjamanModel');
		$data["keranjang_list"] = $this->PeminjamanModel->getDataKeranjang();
		if($this->form_validation->run()==FALSE){

				$page='PeminjamanCreate';
				$data['title'] = ucfirst($page); 
				$this->load->view('templates/header', $data);
			    $this->load->view('create/'.$page,$data);
			    $this->load->view('templates/footer', $data);		
	    }else{
	    	 $keranjang=$this->PeminjamanModel->tampilKeranjang()->result();
        foreach($keranjang as $row){
            $info=array(
                'kd_peminjaman'=>$this->input->post('no_peminjaman'),
                'jumlah'=>1,
                'denda'=>0,
                'terlambat'=>0,
                'kd_buku'=>$row->fk_buku,
                'jatuh_tempo'=>$this->input->post('jatuh_tempo'),
                'status'=>0
            );
            $this->PeminjamanModel->simpan($info);

        }
	    	$this->PeminjamanModel->insertTransaksi();
	    		$this->PeminjamanModel->truncateKeranjang();
	    	
	    	// $this->PeminjamanModel->truncateKeranjang();
			$data["keranjang_list"] = $this->PeminjamanModel->getDataKeranjang();	
			$data['noauto']=$this->PeminjamanModel->nootomatis();
			$page='PeminjamanCreate';
			$data['title'] = ucfirst($page); 
			$this->load->view('templates/header', $data);
	    	$this->load->view('create/'.$page,$data);
	    	$this->load->view('templates/footer', $data);
	    }

		}
	

	public function delete($id)
	 {
	 	$this->load->model('PeminjamanModel');
	 	$this->PeminjamanModel->updateStokTambah($id);
	 	$this->PeminjamanModel->deleteById($id);
	 	$data['noauto']=$this->PeminjamanModel->nootomatis();	
	 	$data["keranjang_list"] = $this->PeminjamanModel->getDataKeranjang();	
		$page='PeminjamanCreate';
		$data['title'] = ucfirst($page); 
		$this->load->view('templates/header', $data);
	    $this->load->view('create/'.$page,$data);
	    $this->load->view('templates/footer', $data);
	 }



	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('buku')->where('status',"1")->like('no_buku',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->no_buku,
				'judul'	=>$row->Judul,
			

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}



  public function search_anggota()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('user')->where('level',"user")->like('nim_nip',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nim_nip,
				'nama'	=>$row->nama,
			

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}

    }

	// public function search_buku()
	// {
	// 	// tangkap variabel keyword dari URL
	// 	$keyword = $this->uri->segment(3);

	// 	// cari di database
	// 	$data = $this->db->from('buku')->like('no_buku',$keyword)->get();	

	// 	// format keluaran di dalam array
	// 	foreach($data->result() as $row)
	// 	{
	// 		$arr['query'] = $keyword;
	// 		$arr['suggestions'][] = array(
	// 			'value'	=>$row->no_buku,
	// 			'judul'	=>$row->judul

	// 		);
	// 	}
	// 	// minimal PHP 5.2
	// 	echo json_encode($arr);
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

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
?>