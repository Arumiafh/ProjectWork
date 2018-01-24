<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function simpan($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Siswa',
					   'STATUS'			=> 'unverified'
						);

		$this->db->insert('tb_akunsiswa', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('SISWA_ID' 			=> NULL,
					  'ACCOUNT_ID'			=> $id_akun,
					  'NIS'					=> $this->input->post('nis'),
					  'NAMA_SISWA'			=> $this->input->post('nama'),
					  'JENKEL_SISWA'		=> $this->input->post('jenkel'),
					  'TEMPATLAHIR_SISWA '  => $this->input->post('tempatlahir'), 
					  'TANGGALLAHIR_SISWA'	=> $this->input->post('tgl_lhr'),
					  'AGAMA_SISWA'			=> $this->input->post('agama'),
					  'ALAMAT_SISWA'		=> $this->input->post('alamatsiswa'),
					  'NOHP_SISWA'			=> $this->input->post('nohp'),
					  'ASAL_SMK'			=> $this->input->post('asal'),
					  'JURUSAN'				=> $this->input->post('jurusan'),
					  'NOTELP_SMK'			=> $this->input->post('notelp'),
					  'ALAMAT_SMK'			=> $this->input->post('alamatsekolah'),
					  'TGL_MULAI'			=> $this->input->post('tgl_mulai'),
					  'TGL_SELESAI'			=> $this->input->post('tgl_selesai'),
					  'FOTODIRI_SISWA'		=> 'blank.png',
					  'FOTOIDENTITAS_SISWA'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_siswa', $data);
		$id_siswa = $this->db->insert_id();

		$data2 = array('SISWA_ID' => $id_siswa);
		$this->db->where('ACCOUNT_ID', $id_akun)->update('tb_akunsiswa', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$query = $this->db->select('*')->from('tb_akunsiswa')
									   ->join('tb_siswa', 'tb_akunsiswa.ACCOUNT_ID=tb_siswa.ACCOUNT_ID')
									   ->where('USERNAME',$username)->where('PASSWORD',$password)
									   ->get();

		if($query->num_rows() > 0){
			$result = $query->result_array();

			$siswa = array_shift($result);

			$data = array('USERNAME' 	=> $username, 
						  'logged_in' 	=> TRUE, 
						  'SISWA_ID' 	=> $siswa['SISWA_ID'], 
						  'ROLE'		=> $siswa['ROLE'],
						  'NAMA_SISWA'	=> $siswa['NAMA_SISWA'],
						  'FOTODIRI_SISWA' => $siswa['FOTODIRI_SISWA'],
						  'STATUS'		=> $siswa['STATUS']
						);

			$this->session->set_userdata($data);

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function login_petugas()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->select('*')->from('tb_akunpetugas')->join('tb_petugas', 'tb_akunpetugas.PETUGAS_ID=tb_petugas.PETUGAS_ID')->where('USERNAME',$username)->where('PASSWORD',$password)
			->get()	;


		if($query->num_rows() > 0){
			$result = $query->result_array();

			$petugas = array_shift($result);

			$data = array('USERNAME' 		=> $username, 
						  'logged_in' 		=> TRUE, 
						  'PEMBIMBING_ID' 	=> $petugas['PETUGAS_ID'], 
						  'ROLE' 			=> $petugas['ROLE'],
						  'FOTODIRI_PETUGAS' => $petugas['FOTODIRI_PETUGAS'],
						  'NAMA_PETUGAS' => $petugas['NAMA_PETUGAS']
						);

			$this->session->set_userdata($data);

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_user($username)
	{
		$query = $this->db->where('USERNAME',$username)
						  ->get('tb_akunsiswa');

		if($query->num_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
	