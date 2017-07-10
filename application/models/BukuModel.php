<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BukuModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	
	public function getDataBuku()
	{
		$this->db->select(" buku.kd_buku,buku.Judul,GROUP_CONCAT(penulis.nama_penulis SEPARATOR ', ') AS penulis,buku.penerbit,kategori.nama_kategori, buku.`status`,buku.copy,buku.no_buku");

			$this->db->join('kategori', 'buku.fk_kategori = kategori.kd_kategori', 'left');
			$this->db->join('buku_penulis', 'buku_penulis.fk_buku  = buku.kd_buku', 'left');
			$this->db->join('penulis', 'buku_penulis.fk_penulis = penulis.id_penulis', 'left');
			$this->db->group_by('buku.judul');	
			$query = $this->db->get('buku');
			return $query->result();
	}

	public function getBuku($id)
	{
		$this->db->select(" kategori.nama_kategori,buku.no_buku,buku.kd_buku,buku.Judul,buku.penerbit,buku.copy,buku.status");
			$this->db->join('kategori', 'buku.fk_kategori = kategori.kd_kategori', 'left');	
			$this->db->where('kd_buku', $id);
			$query = $this->db->get('buku');
			return $query->result();
	}
	
	public function deleteById($id)
	{
			$this->db->where('no_buku', $id);
			$this->db->delete('buku');	
	}
	public function getDataPenulis()
	{
		$this->db->select("id_penulis,nama_penulis");
		$query = $this->db->get('penulis');
		return $query->result();
	}

	public function updateBuku($id)
 	{
		$data = array(
			'Judul' => $this->input->post('judul'),
			'penerbit' => $this->input->post('penerbit'),
			'penulis' => $this->input->post('penulis'),
			'status' => 1,
			'copy' => $this->input->post('copy'),
			'fk_kategori' => $this->input->post('kategori'),



			);
			$this->db->where('kd_buku', $id);
			$this->db->update('buku', $data);		
 	}

	function bukuDiPinjam($id) {
	    $this->db->select('kd_buku');
	    $this->db->from('detail_peminjaman');
	    $this->db->where('kd_buku', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}


	function kategoridipinjam($id_kat) {
	    $this->db->select('nama_kategori');
	    $this->db->from('kategori');
	    $this->db->where('nama_kategori', $id_kat);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function insertBuku()
	{
		

		$no_buku = $this->input->POST('no');
		$judul = $this->input->POST('judul');
		$kategori = $this->input->POST('kategori');
		$penerbit = $this->input->POST('penerbit');
		$penulis = $this->input->POST('penulis');
		$copy = $this->input->POST('copy');
		$status = 1;

		$data = array (
			 'no_buku' => $no_buku,
   			'judul' => $judul,
   			'fk_kategori'  => $kategori,
   			'penerbit'  => $penerbit,
   			'penulis'  => $penulis,
   			'status'  => $status,
   			'copy'  => $copy,
   			
  			
  		); 
		$this->db->insert('buku',$data);
	
	}

	
	
	
}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
