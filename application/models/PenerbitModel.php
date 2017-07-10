<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PenerbitModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getDataPenerbit()
	{
		$this->db->select("id_penerbit,nama_penerbit,kota");
		$query = $this->db->get('penerbit');
		return $query->result();
	}
	
	public function deleteById($id)
	{
			$this->db->where('id_penerbit', $id);
			$this->db->delete('penerbit');	
	}
	
	public function insertPenerbit()
 	{
  			$object = array(
  				'nama_penerbit' => $this->input->post('nama'), 
  				'kota' => $this->input->post('kota'), 
  				);
  			$this->db->insert('penerbit', $object);
 	}

 	public function updatePenerbit($id)
 	{
	  		$data = array(
	  			'nama_penerbit' => $this->input->post('nama'),
	  			'kota' => $this->input->post('kota'), 
	  			);
			$this->db->where('id_penerbit', $id);
			$this->db->update('penerbit', $data);
 	}
	
	public function getPenerbit($id)
	{
		$this->db->where('id_penerbit', $id);	
		$query = $this->db->get('penerbit',1);
		return $query->result();
	}
	
}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
