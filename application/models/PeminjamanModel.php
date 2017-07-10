<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PeminjamanModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	 function nootomatis(){

	 	 $today=date('Ymd');
	 	 $query = $this->db->query("select max(fk_peminjaman) as last from peminjaman where fk_peminjaman like '$today%'");
      
        $data = $query->row();
        $lastNoFaktur=$data->last;
        
        $lastNoUrut=substr($lastNoFaktur,8,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNoTransaksi=$today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }

	
	public function getDataPeminjaman()
	{
		$query = $this->db->query("SELECT
peminjaman.kd_transaksi,
`user`.nama,
peminjaman.tanggal_pinjam,
detail_peminjaman.tanggal_kembali,
Count(detail_peminjaman.kd_buku) AS jumlah_buku,
detail_peminjaman.`status`
FROM
peminjaman
INNER JOIN detail_peminjaman ON peminjaman.fk_peminjaman = detail_peminjaman.kd_peminjaman
INNER JOIN `user` ON peminjaman.kd_member = `user`.id_user
GROUP BY kd_transaksi
");
			return $query->result_array();
	}

	public function getMonitoringUser($user)
	{
		$query = $this->db->query("SELECT
`user`.nama,
detail_peminjaman.jatuh_tempo,
detail_peminjaman.kd_buku,
detail_peminjaman.kd_peminjaman,
buku.Judul,
peminjaman.tanggal_pinjam,
detail_peminjaman.`status`,
peminjaman.fk_peminjaman
FROM
`user`
INNER JOIN peminjaman ON peminjaman.kd_member = `user`.nim_nip
INNER JOIN detail_peminjaman ON peminjaman.fk_peminjaman = detail_peminjaman.kd_peminjaman
INNER JOIN buku ON detail_peminjaman.kd_buku = buku.no_buku
where `user`.username='$user'

");
			return $query->result_array();
	}




	public function getDataKeranjang()
	{
		$query = $this->db->query("SELECT*FROM keranjang_buku
");
			return $query->result_array();
	}

	function tampilKeranjang(){
        return $this->db->get("keranjang_buku");
    }

	public function insertKeranjang()
 		{
  			$object = array(
  				'fk_buku' => $this->input->post('no_buku'), 
  				'judul' => $this->input->post('judul'), 
  				'tanggal_pinjam' => $this->input->post('tanggal_pinjam'), 
  				'jatuh_tempo' => $this->input->post('jatuh_tempo'),
  				'admin' => $this->input->post('admin')

  				);
  			$this->db->insert('keranjang_buku', $object);
 		}

 	public function updateStok()
 		{
 			$id=$this->input->post('no_buku');
  			$data = array('status'=>$this->input->post('status'));
			$this->db->where('no_buku', $id);
		    $this->db->update('buku', $data);
 		}
 	public function updateStokTambah($id)
 		{
 		
  			$data = array('status'=>'1');
			$this->db->where('no_buku', $id);
		    $this->db->update('buku', $data);
 		}




 			public function insertDetailTransaksi()
 		{
  			  $q = $this->db->get('keranjang_buku')->result();
  			  foreach($q as $r) { 


      		  $this->db->insert('detail_peminjaman', $r); 
   			 }
 		}

 		public function insertTransaksi()
 		{
  			$object = array(
  				'kd_member' => $this->input->post('nim'), 
  				'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
  				'fk_peminjaman' => $this->input->post('no_peminjaman'),
  				'admin' => $this->input->post('admin')

  				);
  			$this->db->insert('peminjaman', $object);
 		}

 		function simpan($info){
        $this->db->insert("detail_peminjaman",$info);
    }
    
	
	// public function insertKelas()
	// {
	// 	$object = array(
	// 		'nama' => $this->input->post('nama'), 
	// 	);
	// 	$this->db->insert('kelas', $object);
	// }
	// public function getKelas($id)
	// {
	// 	$this->db->where('id', $id);	
	// 	$query = $this->db->get('kelas',1);
	// 	return $query->result();
	// }
	
public function deleteById($id)
		{
			$this->db->where('fk_buku', $id);
			$this->db->delete('keranjang_buku');	
		}
public function truncateKeranjang()
{
	$this->db->truncate('keranjang_buku');
}

}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
