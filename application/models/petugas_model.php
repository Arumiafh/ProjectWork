<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	public function get_data_siswa_all()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}


	public function get_data_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		$this->db->where('tb_detail.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID'));
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_siswa()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_all_petugas()
	{
		$this->db->select('*');
		$this->db->from('tb_petugas');
		$this->db->order_by('tb_petugas.NAMA_PETUGAS', 'ASC');

		return $this->db->get()->result();
	}

	public function get_petugas($id)
	{
		return $this->db->where('PETUGAS_ID', $id)->get('tb_petugas')->row();
	}

	public function get_nama_pembimbing()
	{
		$role = 'Pembimbing';
		$this->db->select('*');
		$this->db->from('tb_akunpetugas');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID=tb_akunpetugas.PETUGAS_ID');
		$this->db->where('tb_akunpetugas.ROLE', $role);
		$this->db->order_by('tb_petugas.NAMA_PETUGAS', 'ASC');

		return $this->db->get()->result();
	}

	public function get_detail_siswa($id)
	{
		$this->db->where('tb_siswa.SISWA_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->row();
	}

	public function get_data_pembimbing()
	{
		$role = 'Pembimbing';
		$this->db->where('ROLE', $role);
		$this->db->from('tb_petugas');
		$this->db->join('tb_akunpetugas', 'tb_akunpetugas.PETUGAS_ID = tb_petugas.PETUGAS_ID');
		$this->db->order_by('tb_petugas.PETUGAS_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_data_admin()
	{
		$role = 'Admin';
		$this->db->where('ROLE', $role);
		$this->db->from('tb_petugas');
		$this->db->join('tb_akunpetugas', 'tb_akunpetugas.PETUGAS_ID = tb_petugas.PETUGAS_ID');
		$this->db->order_by('tb_petugas.PETUGAS_ID', 'ASC');

		return $this->db->get()->result();
	}

	public function get_detail_petugas($id)
	{
		$this->db->where('tb_petugas.PETUGAS_ID', $id);
		$this->db->from('tb_petugas');
		$this->db->join('tb_akunpetugas', 'tb_akunpetugas.PETUGAS_ID = tb_petugas.PETUGAS_ID');
		$this->db->order_by('tb_petugas.PETUGAS_ID', 'ASC');

		return $this->db->get()->row();
	}

	public function get_siswa_bimbingan($id)
	{
		$this->db->where('tb_petugas.PETUGAS_ID', $id);
		$this->db->from('tb_siswa');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_siswa.PETUGAS_ID');
		return $this->db->get()->row();
	}

	public function get_profil_petugas($id)
	{
		$this->db->select('*');
		$this->db->where('tb_petugas.PETUGAS_ID', $id);
		$this->db->from('tb_petugas');
		$this->db->join('tb_akunpetugas', 'tb_akunpetugas.PETUGAS_ID = tb_petugas.PETUGAS_ID');

		return $this->db->get()->row();
	}

	public function total_records()
	{
		return $this->db->from('tb_siswa')->count_all_results();
	}

	public function total_verified()
	{
		$status = 'verified';
		$role = 'Siswa';

		$this->db->select('*');
		$this->db->from('tb_akunsiswa');
		$this->db->where('STATUS', $status);
		$this->db->where('ROLE', $role);
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_akunsiswa.SISWA_ID');
		if ($this->session->userdata('ROLE') == 'Pembimbing') {
			$this->db->where('tb_detail.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); 
		}
		return $this->db->count_all_results();

	}

	public function total_unverified()
	{
		$status = 'unverified';
		return $this->db->from('tb_akunsiswa')->where('STATUS', $status)->count_all_results();
	}

	public function total_admin()
	{
		$role = 'Admin';
		return $this->db->from('tb_akunpetugas')->where('ROLE', $role)->count_all_results();
	}

	 public function total_nilaisiswa()
	 {
		$this->db->select('*');
		$this->db->from('tb_nilai');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_nilai.SISWA_ID');
		if ($this->session->userdata('ROLE') == 'Pembimbing') {
			$this->db->where('tb_detail.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); 
		}
		return $this->db->count_all_results(); 	
	 }

	  public function total_absensiswa()
	 {
	 	$this->db->select('*');
		$this->db->from('tb_absensi');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_absensi.SISWA_ID');
		if ($this->session->userdata('ROLE') == 'Pembimbing') {
			$this->db->where('tb_detail.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); 
		}
		return $this->db->count_all_results(); 	
	 }


	public function total_p()
	{
		$role = 'Pembimbing';
		return $this->db->from('tb_akunpetugas')->where('ROLE', $role)->count_all_results();
	}

	public function verified($id)
	{
		$data = array('STATUS' => 'verified');

		$this->db->where('SISWA_ID',$id)->update('tb_akunsiswa',$data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function unverified($id)
	{
		$this->db->where('SISWA_ID', $id)
				 ->delete('tb_akunsiswa');
		$this->db->where('SISWA_ID', $id)
				 ->delete('tb_siswa');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function add_pembimbing($id)
	{
		$data = array('SISWA_ID'	 		=> $id,
					  'PETUGAS_ID' 		=> $this->input->post('pembimbing')
					);

		$this->db->insert('tb_detail', $data);
		$id_detail = $this->db->insert_id();

		$data1 = array('DETAIL_ID' => $id_detail );
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data1);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function del_siswa($id)
	{
		$this->db->where('SISWA_ID', $id)->delete('tb_siswa');

		$this->db->where('SISWA_ID', $id)->delete('tb_akunsiswa');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function all_kegiatan()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_kegiatansiswa', 'tb_kegiatansiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');

		if ($this->session->userdata('ROLE') == 'Pembimbing') {
			$this->db->where('tb_detail.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); 
		}
		
		$this->db->order_by('tb_kegiatansiswa.ID_KEGSIS', 'DESC');

		return $this->db->get()->result();
	}

	public function add_siswa($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Siswa',
					   'STATUS'			=> 'verified'
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

		$data3 = array('SISWA_ID' 		=> $id_siswa,
					   'PETUGAS_ID' 	=> $this->input->post('pembimbing')
					   );
		$this->db->insert('tb_detail', $data3);
		$id_detail = $this->db->insert_id();

		$data4 = array('DETAIL_ID' => $id_detail);
		$this->db->where('SISWA_ID', $id_siswa)->update('tb_siswa', $data4);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_siswa($id)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
						);

		$this->db->where('SISWA_ID', $id)->update('tb_akunsiswa', $data1);

		$data = array('NIS'					=> $this->input->post('nis'),
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
					  'TGL_SELESAI'			=> $this->input->post('tgl_selesai')
					  );
	
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_siswa_upload($id, $identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
						);

		$this->db->where('SISWA_ID', $id)->update('tb_akunsiswa', $data1);

		$data = array('NIS'					=> $this->input->post('nis'),
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
					  'FOTOIDENTITAS_SISWA'	=> $identitas['file_name']
					  );
	
		$this->db->where('SISWA_ID', $id)->update('tb_siswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_admin($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Admin',
						);

		$this->db->insert('tb_akunpetugas', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('NIP' 						=> $this->input->post('nip'),
					  'ACCOUNT_PETUGAS_ID'					=> $id_akun,
					  'NAMA_PETUGAS'				=> $this->input->post('nama'),
					  'JENKEL_PETUGAS'			=> $this->input->post('jenkel'),
					  'NOHP_PETUGAS'				=> $this->input->post('no_hp'),
					  'ALAMAT_PETUGAS'			=> $this->input->post('alamat'),
					  'FOTODIRI_PETUGAS'			=> 'blank.png',
					  'FOTOIDENTITAS_PETUGAS'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_petugas', $data);
		$id_petugas = $this->db->insert_id();

		$data2 = array('PETUGAS_ID' => $id_petugas);
		$this->db->where('ACCOUNT_PETUGAS_ID', $id_akun)->update('tb_akunpetugas', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_pembimbing($identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email'),
					   'ROLE'			=> 'Pembimbing',
						);

		$this->db->insert('tb_akunpetugas', $data1);
		$id_akun = $this->db->insert_id();

		$data = array('NIP' 						=> $this->input->post('nip'),
					  'ACCOUNT_PETUGAS_ID'					=> $id_akun,
					  'NAMA_PETUGAS'				=> $this->input->post('nama'),
					  'JENKEL_PETUGAS'			=> $this->input->post('jenkel'),
					  'NOHP_PETUGAS'				=> $this->input->post('no_hp'),
					  'ALAMAT_PETUGAS'			=> $this->input->post('alamat'),
					  'FOTODIRI_PETUGAS'			=> 'blank.png',
					  'FOTOIDENTITAS_PETUGAS'	=> $identitas['file_name']
					  );
	
		$this->db->insert('tb_petugas', $data);
		$id_pembimbing = $this->db->insert_id();

		$data2 = array('PETUGAS_ID' => $id_pembimbing);
		$this->db->where('ACCOUNT_PETUGAS_ID', $id_akun)->update('tb_akunpetugas', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_petugas($id)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email')
						);

		$this->db->where('PETUGAS_ID', $id)->update('tb_akunpetugas', $data1);


		$data = array('NIP'							=> $this->input->post('nip'),
					  'NAMA_PETUGAS'				=> $this->input->post('nama'),
					  'JENKEL_PETUGAS'			=> $this->input->post('jenkel'),
					  'NOHP_PETUGAS'				=> $this->input->post('no_hp'),
					  'ALAMAT_PETUGAS'			=> $this->input->post('alamat')
					  );
	
		$this->db->where('PETUGAS_ID', $id)->update('tb_petugas', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_petugas_upload($id, $identitas)
	{
		$data1 = array('USERNAME' 		=> $this->input->post('username'),
					   'PASSWORD' 		=> $this->input->post('password'),
					   'ACCOUNT_EMAIL'	=> $this->input->post('email')
						);

		$this->db->where('PETUGAS_ID', $id)->update('tb_akunpetugas', $data1);

		$data = array('NIP'							=> $this->input->post('nip'),
					  'NAMA_PETUGAS'				=> $this->input->post('nama'),
					  'JENKEL_PETUGAS'			=> $this->input->post('jenkel'),
					  'NOHP_PETUGAS'				=> $this->input->post('no_hp'),
					  'ALAMAT_PETUGAS'			=> $this->input->post('alamat'),
					  'FOTOIDENTITAS_PETUGAS'	=> $identitas['file_name']
					  );
	
		$this->db->where('PETUGAS_ID', $id)->update('tb_petugas', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function del_petugas($id)
	{
		$this->db->where('PETUGAS_ID', $id)->delete('tb_petugas');

		$this->db->where('PETUGAS_ID', $id)->delete('tb_akunpetugas');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_role($id)
	{
		$data = array('ROLE' => $this->input->post('role'));

		$this->db->where('PETUGAS_ID', $id)->update('tb_akunpetugas', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_foto($foto)
	{
		$id = $this->session->userdata('PEMBIMBING_ID');

		$data = array('FOTODIRI_PETUGAS' => $foto['file_name'] );

		$this->db->where('PETUGAS_ID', $id)->update('tb_petugas', $data);
		$this->session->set_userdata('FOTODIRI_PETUGAS', $foto['file_name']);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function add_nilai($id)
	{
		$data = array('SISWA_ID'		=> $id,
					  'NILAI_ID'		=> null,
					  'NILAI_SIKAP'		=> $this->input->post('nilai_sikap'),
					  'NILAI_KETERAMPILAN'=> $this->input->post('nilai_keterampilan')
					 );

		$this->db->insert('tb_nilai', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_nilai($id)
	{
		$data1 = array('SISWA_ID' 			=> $id,
					   'NILAI_SIKAP' 		=> $this->input->post('nilai_sikap'),
					   'NILAI_KETERAMPILAN'	=> $this->input->post('nilai_keterampilan')
						);

		$this->db->where('SISWA_ID', $id)->update('tb_nilai', $data1);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function cek_nilai()
	{
		$query = $this->db->select('*')    
						  ->get('tb_nilai');

		return $query->result();
	}


	public function get_nilai()
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		$this->db->join('tb_nilai', 'tb_nilai.SISWA_ID = tb_siswa.SISWA_ID');

			if ($this->session->userdata('ROLE') == 'Pembimbing') {
				$this->db->where('tb_petugas.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); }

		$this->db->order_by('tb_siswa.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}


public function get_absen()
	{
		$this->db->select('*');
		$this->db->from('tb_absensi');
		$this->db->join('tb_siswa', 'tb_siswa.SISWA_ID = tb_absensi.SISWA_ID');
		$this->db->join('tb_akunsiswa', 'tb_akunsiswa.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_detail', 'tb_detail.SISWA_ID = tb_siswa.SISWA_ID');
		$this->db->join('tb_petugas', 'tb_petugas.PETUGAS_ID = tb_detail.PETUGAS_ID');
		// $this->db->where('tb_absensi.SISWA_ID', $this->session->userdata('SISWA_ID'));

		if ($this->session->userdata('ROLE') == 'Pembimbing') {
				$this->db->where('tb_petugas.PETUGAS_ID', $this->session->userdata('PEMBIMBING_ID')); }

		$this->db->order_by('tb_absensi.SISWA_ID', 'ASC');

		return $this->db->get()->result();
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */