<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KategoriModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getDataKategori()
	{
		$this->db->select("kd_kategori,nama_kategori");
		$query = $this->db->get('kategori');
		return $query->result();
	}
	
	public function deleteById($id)
	{
			$this->db->where('kd_kategori', $id);
			$this->db->delete('kategori');	
	}
	function bukuParameterDelete($id) {
	    $this->db->select('fk_kategori');
	    $this->db->from('buku');
	    $this->db->where('fk_kategori', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function insertKategori()
 	{
  			$object = array(
  				'nama_kategori' => $this->input->post('nama'), 
  				);
  			$this->db->insert('kategori', $object);
 	}

 	public function updateKategori($id)
 	{
	  		$data = array('nama_kategori' => $this->input->post('nama'));
			$this->db->where('kd_kategori', $id);
			$this->db->update('kategori', $data);
 	}

 	function kategoridipinjam($id) {
	    $this->db->select('fk_kategori');
	    $this->db->from('buku');
	    $this->db->where('fk_kategori', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
	
	public function getKategori($id)
	{
		$this->db->where('kd_kategori', $id);	
		$query = $this->db->get('kategori',1);
		return $query->result();
	}


	
}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
