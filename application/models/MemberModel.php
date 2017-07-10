<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MemberModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getDataMember()
	{
		$this->db->select("id_user,nim_nip,nama,no_telp,alamat,foto,tanggal_lahir,level");
		$this->db->where('level', 'user');
		$query = $this->db->get('user');
		return $query->result();
	}

	public function insertMember()
	{
		$tanggal =$this->input->post('tgl_lahir'); 
		$format = date('Y-m-d', strtotime($tanggal ));
		$object = array(
			'nim_nip' => $this->input->post('nim'), 
			'nama'=>$this->input->post('nama'), 
			'foto' => $this->upload->data('file_name'),
			'no_telp'=>$this->input->post('no_telp'),
			'alamat'=>$this->input->post('alamat'),
			'tanggal_lahir'=>$format,
			'email'=>$this->input->post('email'),
			'level'=>$this->input->post('level'),
			'username'=>$this->input->post('username'),
			'password'=>md5($this->input->post('password'))

			
		);

		$this->db->insert('user', $object);
	}

	public function deleteById($id)
	{
			$this->db->where('nim_nip', $id);
			$this->db->delete('user');	
	}

	function relasipinjam($id) {
	    $this->db->select('kd_member');
	    $this->db->from('peminjaman');
	    $this->db->where('kd_member', $id);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}	

}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
