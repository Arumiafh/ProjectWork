<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
	}

	public function index()
	{
		redirect('siswa/dashboard');
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				$id = $this->session->userdata('SISWA_ID');
				$data['profil'] = $this->siswa_model->profil($id);
				$data['kegiatan'] = $this->siswa_model->get_kegiatan($id);
				$data['cekabsen'] = $this->siswa_model->cek_absen($id);
				$data['main_view'] = 'dashboard_siswa_view';
				$this->load->view('template_menusiswa', $data);
			} else {
				redirect('petugas');
			}
		} else {
			redirect('auth');
		}	
	}

	public function profile()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				$id = $this->session->userdata('SISWA_ID');
				$data['profil'] = $this->siswa_model->profil($id);
				$data['kegiatan'] = $this->siswa_model->get_kegiatan($id);
				$data['cekabsen'] = $this->siswa_model->cek_absen($id);
				$this->load->view('profile_view', $data);
			} else {
				redirect('petugas');
			}
		} else {
			redirect('auth');
		}	
	}

	public function kegiatan()
	{
		$id = $this->session->userdata('SISWA_ID');
		if($this->siswa_model->kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil Menulis Kegiatan');
			redirect('siswa/profile');
		} else {
			$this->session->set_flashdata('failed', 'Gagal Menulis Kegiatan');
			redirect('siswa/profile');
		}
	}

	public function absen()
	{

		$id = $this->session->userdata('SISWA_ID');
		$data['profil'] = $this->siswa_model->profil($id);
		if($this->siswa_model->absen($id) == TRUE){
				$this->session->set_flashdata('success', 'Absensi Berhasil Dilakukan');
				redirect('siswa/profile');
			} else {
				$this->session->set_flashdata('failed', 'Absensi Gagal Dilakukan');
				redirect('siswa/profile');
			}
	} 

	public function del_kegiatan($id)
	{
		if($this->siswa_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Kegiatan Berhasil Dihapus');
			redirect('siswa/profile');
		} else {
			$this->session->set_flashdata('failed', 'Kegiatan Gagal Dihapus');
			redirect('siswa/profile');
		}
	}

	public function edit_submit()
	{
		$id = $this->session->userdata('SISWA_ID');
		$data['siswa'] = $this->petugas_model->get_detail_siswa($id);

		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
		    if($this->petugas_model->edit_siswa($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('siswa/profile');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('siswa/profile');
			}
		} else {
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('identitas')){
				if($this->petugas_model->edit_siswa_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('siswa/profile');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
		            redirect('siswa/profile');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('siswa/profile');
			}
		}
	}

	public function foto_profil()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('foto')){
			if($this->siswa_model->update_foto($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Update foto berhasil');
		        redirect('siswa/profile');
			} else {
				$this->session->set_flashdata('failed', 'Update foto gagal');
		        redirect('siswa/profile');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
		    redirect('siswa/profile');
		}
	}

	public function rekap_absen()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				$id = $this->session->userdata('SISWA_ID');
				$data['absensis'] = $this->siswa_model->get_absen();
				$data['main_view'] = 'rekap_absen_siswa_view';
				$this->load->view('template_menusiswa', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function rekap_nilai()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				$id = $this->session->userdata('SISWA_ID');
				$data['nilai'] = $this->siswa_model->get_nilai();
				$data['main_view'] = 'siswa_lihat_nilai_view';
				$this->load->view('template_menusiswa', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function user_manual()
	{
		$data['main_view'] = 'um_siswa_view';
		$data['menu'] = 'um_menu_siswa';
		$this->load->view('template_user_manual', $data);
	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */