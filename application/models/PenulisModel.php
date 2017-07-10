<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PenulisModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getDataPenulis()
	{
		$this->db->select("id_penulis,nama_penulis");
		$query = $this->db->get('penulis');
		return $query->result();
	}

	public function deleteById($id)
	{
			$this->db->where('id_penulis', $id);
			$this->db->delete('penulis');	
	}

	public function insertPenulis()
 	{
  			$object = array(
  				'nama_penulis' => $this->input->post('nama'), 
  				);
  			$this->db->insert('penulis', $object);
 	}

 	public function updatePenulis($id)
 	{
	  		$data = array('nama_penulis' => $this->input->post('nama'));
			$this->db->where('id_penulis', $id);
			$this->db->update('penulis', $data);
 	}

	public function getPenulis($id)
	{
		$this->db->where('id_penulis', $id);	
		$query = $this->db->get('penulis',1);
		return $query->result();
	}
	
}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
