<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function daftar() //create user
	{
		$nim = $this->input->POST('nim');
		$username = $this->input->POST('username');
		$nama = $this->input->POST('nama');
		$alamat = $this->input->POST('alamat');
		$no_telp = $this->input->POST('no_telp');
		$tanggal_lahir = $this->input->POST('tgl_lahir');
		$foto = $this->input->POST('foto');
		$level = $this->input->POST('level');
		$password = md5($this->input->POST('password'));
		$data = array (
   			'username' => $username,
   			'nim_nip'  => $nim,
   			'nama'  => $nama,
   			'alamat'  => $alamat,
   			'no_telp'  => $no_telp,
   			'foto'  => $foto,
   			'tanggal_lahir'  => $tanggal_lahir,
   			'level'  => $level,
   			'password'  => $password,
  			
  		); 
		$this->db->insert('user',$data);
	}

	public function login($username,$password)
	{
		$this->db->select('id_user,username,password,level');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function select_username($username) //filter username
	{		 
		$this->db->select('id_user,username,password');
		$this->db->from('user');
    	$this->db->where('username', $username);
    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        	return true;
    	} else {
        	return false;
    	}
	}
	

}

/* End of file User.php */
/* Location: ./application/models/User.php */

 ?>