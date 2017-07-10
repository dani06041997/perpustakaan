<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PengembalianModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getDataPengembalian()
	{
		$query = $this->db->query("SELECT
                peminjaman.fk_peminjaman,
                peminjaman.kd_member,
                user.nama,
                peminjaman.tanggal_pinjam,
                detail_peminjaman.jatuh_tempo,
                Sum(detail_peminjaman.jumlah) AS jumlah,
                Sum(
                  detail_peminjaman.`status`
                ) AS jumlah_kembali,
                Sum(detail_peminjaman.jumlah) - Sum(
                  detail_peminjaman.`status`
                ) AS jumlah_kurangi,
                peminjaman.fk_peminjaman
              FROM
                detail_peminjaman,
                user,
                peminjaman
              WHERE
                detail_peminjaman.kd_peminjaman = peminjaman.fk_peminjaman
              AND user.nim_nip = peminjaman.kd_member
              GROUP BY
                fk_peminjaman
              ORDER BY
                tanggal_pinjam DESC

");
			return $query->result_array();
	}



		public function getDataPengembalianDetail($id)
	{
		$query = $this->db->query("SELECT
peminjaman.fk_peminjaman,
peminjaman.kd_transaksi,
`user`.nama,
peminjaman.tanggal_pinjam
FROM
peminjaman
INNER JOIN detail_peminjaman ON peminjaman.fk_peminjaman = detail_peminjaman.kd_peminjaman
INNER JOIN `user` ON peminjaman.kd_member = `user`.nim_nip where peminjaman.fk_peminjaman='$id'
 GROUP BY peminjaman.fk_peminjaman




");
			return $query->result_array();
	}

	public function getDataPengembalianBuku($id)
	{
		$query = $this->db->query("SELECT
detail_peminjaman.kd_buku,
buku.Judul,
detail_peminjaman.jatuh_tempo,
detail_peminjaman.terlambat,
detail_peminjaman.denda,
detail_peminjaman.status,
detail_peminjaman.id
FROM
peminjaman
INNER JOIN detail_peminjaman ON peminjaman.fk_peminjaman = detail_peminjaman.kd_peminjaman
INNER JOIN `user` ON peminjaman.kd_member = `user`.nim_nip
INNER JOIN buku ON detail_peminjaman.kd_buku = buku.no_buku
where peminjaman.fk_peminjaman='$id'

");
			return $query->result_array();
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
	
}
/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */
?>
