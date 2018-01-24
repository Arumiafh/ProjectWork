<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function profil($id)
	{
		$this->db->select('*');
		$this->db->where('tb_akunsiswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');

		return $this->db->get()->row();
	}

	public function kegiatan($id)
	{
		$data = array('TGL_KEGSIS'		=> date('Y-m-d'),
					  'ISI_KEGSIS'		=> $this->input->post('kegiatan'),
					  'SISWA_ID'		=> $id
					 );

		$this->db->insert('tb_kegiatansiswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_kegiatan($id)
	{
		$this->db->where('tb_siswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_kegiatansiswa', 'tb_kegiatansiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_kegiatansiswa.ID_KEGSIS', 'DESC');

		return $this->db->get()->result();
	}

	public function del_kegiatan($id)
	{
		$this->db->where('ID_KEGSIS', $id)->delete('tb_kegiatansiswa');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_foto($foto)
	{
		$id = $this->session->userdata('SISWA_ID');

		$data = array('FOTODIRI_SISWA' => $foto['file_name'] );

		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function absen($id)
	{
		$data = array('ID_ABSEN'		=> null,
					  'SISWA_ID'		=> $id,
				      'WAKTU_ABSENSI'	=> date('d/m/Y H:i:s'),
				      'STATUS'			=> 'sudah'
					 );

		$this->db->insert('tb_absensi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function cek_absen($id){
		$query = $this->db->select("*")->from("tb_absensi")->where("SISWA_ID",$id)->where("WAKTU_ABSENSI","'"+date('d/m/Y')+"'","FALSE")->get()->result();
		return count($query);
	}

	public function get_absen()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		$this->db->join('tb_absensi', 'tb_absensi.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->where('tb_absensi.SISWA_ID', $this->session->userdata('SISWA_ID'));
		$this->db->order_by('tb_absensi.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_nilai()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		$this->db->join('tb_nilai', 'tb_nilai.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->where('tb_nilai.SISWA_ID', $this->session->userdata('SISWA_ID'));

		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_siswa_bimbingan($id)
	{
		$this->db->where('tb_petugas.PETUGAS_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_siswa.PETUGAS_ID');
		return $this->db->get()->row();
	}

}

/* End of file siswa.php */
/* Location: ./application/models/siswa.php */