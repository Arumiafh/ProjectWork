<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
	}

	public function index()
	{
		redirect('petugas/dashboard');
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PEMBIMBING_ID');
				$data['siswa'] = $this->petugas_model->get_data_siswa_all();
				$data['siswa1'] = $this->petugas_model->get_siswa();
				$data['total'] = $this->petugas_model->total_records();
				$data['total_v'] = $this->petugas_model->total_verified();
				$data['total_s'] = $this->petugas_model->total_absensiswa();
				$data['total_u'] = $this->petugas_model->total_unverified();
				$data['total_a'] = $this->petugas_model->total_admin();
				$data['total_p'] = $this->petugas_model->total_p();
				$data['total_l'] = $this->petugas_model->total_nilaisiswa();
				$data['petugas'] = $this->petugas_model->get_petugas($id);
				$data['pembimbing'] = $this->petugas_model->get_all_petugas();	
				$data['namapembimbing'] = $this->petugas_model->get_nama_pembimbing();
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['main_view'] = 'dashboard_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function data_siswa()
	{
		if($this->session->userdata('logged_in') == TRUE){
		
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				if ($this->session->userdata('ROLE') == 'Admin') {
					$data['siswa'] = $this->petugas_model->get_data_siswa_all();
				} elseif($this->session->userdata('ROLE') == 'Pembimbing'){
					$data['siswa'] = $this->petugas_model->get_data_siswa();
				}
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['pembimbing'] = $this->petugas_model->get_all_petugas();
				$data['ceknilai'] = $this->petugas_model->cek_nilai();	
				$data['main_view'] = 'table_siswa_view';
				$this->load->view('template', $data);
			
		} else {
			redirect('auth');
		}
	}


	public function verified($id)
	{
		if($this->petugas_model->add_pembimbing($id) == TRUE){
			if($this->petugas_model->verified($id) == TRUE){
				$this->session->set_flashdata('success', 'Approval Success');
				redirect('petugas/dashboard');
			} else {
				$this->session->set_flashdata('failed', 'Approval Failed');
	            redirect('petugas/dashboard');
			}
		} else {
			$this->session->set_flashdata('failed', 'Approval Failed');
	        redirect('petugas/dashboard');
		}
	}

	public function unverified($id)
	{
		if($this->petugas_model->unverified($id) == TRUE){
			$this->session->set_flashdata('success', 'Delete Success');
			redirect('petugas/dashboard');
		} else {
			$this->session->set_flashdata('failed', 'Delete Failed');
			redirect('petugas/dashboard');
		}
	}

	public function del_kegiatan_dashboard($id)
	{
		if($this->siswa_model->del_kegiatan($id) == TRUE){
			$this->session->set_flashdata('success', 'Kegiatan Berhasil Dihapus');
			redirect('petugas/data_kegiatan');
		} else {
			$this->session->set_flashdata('failed', 'Kegiatan Gagal Dihapus');
			redirect('petugas/data_kegiatan');
		}
	}

	public function data_kegiatan()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				$data['kegiatan'] = $this->petugas_model->all_kegiatan();
				$data['main_view'] = 'kegiatan_view';
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function add_siswa()
	{	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

            if($this->upload->do_upload('identitas')){
				if($this->admin_model->add_siswa($this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Pendaftaran Berhasil');
		            redirect('petugas/data_siswa');
				} else {
					$this->session->set_flashdata('failed', 'Pendaftaran Gagal');
		            redirect('petugas/data_siswa');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('petugas/data_siswa');
			}
	}

	public function edit_siswa($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id_p = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id_p);	
				$data['siswa'] = $this->petugas_model->get_detail_siswa($id);
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['main_view'] = 'edit_siswa_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function del_siswa($id)
	{
		if($this->petugas_model->del_siswa($id) == TRUE){
			$this->session->set_flashdata('success', 'Siswa Berhasil Dihapus');
			redirect('petugas/data_siswa');
		} else {
			$this->session->set_flashdata('failed', 'Siswa Gagal Dihapus');
			redirect('petugas/data_siswa');
		}
	}

	public function edit_siswa_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
		    if($this->petugas_model->edit_siswa($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('petugas/data_siswa');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('petugas/data_siswa');
			}
		} else {
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('identitas')){
				if($this->petugas_model->edit_siswa_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('petugas/data_siswa');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
		            redirect('petugas/data_siswa');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('petugas/data_siswa');
			}
		}
	}


	public function add_pembimbing()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

        if($this->upload->do_upload('identitas')){
			if($this->petugas_model->tambah_pembimbing($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Tambah Pembimbing Berhasil');
				redirect('petugas/data_pembimbing');
			} else {
				$this->session->set_flashdata('failed', 'Tambah Pembimbing Gagal');
				redirect('petugas/data_pembimbing');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
	        redirect('petugas/data_pembimbing');
		}
	}

	public function add_admin()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

        if($this->upload->do_upload('identitas')){
			if($this->petugas_model->tambah_admin($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Tambah admin berhasil');
				redirect('petugas/data_admin');
			} else {
				$this->session->set_flashdata('failed', 'Tambah admin gagal');
				redirect('petugas/data_admin');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
	        redirect('petugas/data_admin');
		}
	}

	public function edit_pembimbing($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				$id_p = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id_p);	
				$data['petugas1'] = $this->petugas_model->get_detail_petugas($id);
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['main_view'] = 'edit_pembimbing_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
		
	}

	public function edit_admin($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Admin'){
				$id_p = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id_p);	
				$data['petugas1'] = $this->petugas_model->get_detail_petugas($id);
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['main_view'] = 'edit_admin_view';
				$this->load->view('template', $data);
			} else {
				redirect('admin');
			}
		} else {
			redirect('auth');
		}
	}

	public function edit_pembimbing_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->petugas_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('petugas/data_pembimbing');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('petugas/data_pembimbing');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->petugas_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('petugas/data_pembimbing');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('petugas/data_pembimbing');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('petugas/data_pembimbing');
			}   
		}
	}

	public function edit_admin_submit($id)
	{
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->petugas_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('petugas/data_admin');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('petugas/data_admin');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->petugas_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('petugas/data_admin');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('petugas/data_admin');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('petugas/data_admin');
			}   
		}
	}

	public function del_pembimbing($id)
	{
		if($this->petugas_model->del_petugas($id) == TRUE){
			$this->session->set_flashdata('success', 'Pembimbing Berhasil Dihapus');
			redirect('petugas/data_pembimbing');
		} else {
			$this->session->set_flashdata('failed', 'Pembimbing Gagal Dihapus');
			redirect('petugas/data_pembimbing');
		}
	}

	public function del_admin($id)
	{
		if($this->petugas_model->del_petugas($id) == TRUE){
			$this->session->set_flashdata('success', 'Admin Berhasil Dihapus');
			redirect('petugas/data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Admin Gagal Dihapus');
			redirect('petugas/data_admin');
		}
	}

	public function data_admin()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			if($this->session->userdata('ROLE') == 'Admin'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				$data['admin'] = $this->petugas_model->get_data_admin();
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['total_a'] = $this->petugas_model->total_admin();
				$data['main_view'] = 'table_admin_view';
				$this->load->view('template', $data);
			} 
			else 
			{
				redirect('');
			}
		} 
		else 
		{
			redirect('auth');
		}
	}

	public function role_pembimbing($id)
	{
		if($this->petugas_model->update_role($id) == TRUE){
			$this->session->set_flashdata('success', 'Role berhasil di update');
			redirect('petugas/data_pembimbing');
		} else {
			$this->session->set_flashdata('failed', 'Pastikan Role yang akan anda ganti benar');
			redirect('petugas/data_pembimbing');
		}
	}

	public function role_admin($id)
	{
		if($this->petugas_model->update_role($id) == TRUE){
			$this->session->set_flashdata('success', 'Role berhasil di update');
			redirect('petugas/data_admin');
		} else {
			$this->session->set_flashdata('failed', 'Pastikan Role yang akan anda ganti benar');
			redirect('petugas/data_admin');
		}
	}

	public function foto_profil()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('foto')){
			if($this->petugas_model->update_foto($this->upload->data()) == TRUE){
				$this->session->set_flashdata('success', 'Update foto berhasil');
		        redirect('petugas/dashboard');
			} else {
				$this->session->set_flashdata('failed', 'Update foto gagal');
		        redirect('petugas/dashboard');
			}
		} else {
			$this->session->set_flashdata('failed', $this->upload->display_errors());
		    redirect('petugas/dashboard');
		}
	}

	public function edit_profil_pembimbing()
	{
		$id = $this->session->userdata('PETUGAS_ID');
		if(!isset($_FILES['identitas']) || $_FILES['identitas']['error'] == UPLOAD_ERR_NO_FILE) {
			if($this->petugas_model->edit_petugas($id) == TRUE){
				$this->session->set_flashdata('success', 'Edit data berhasil');
				redirect('petugas/data_pembimbing');
			} else {
				$this->session->set_flashdata('success', 'Edit data berhasil');
			    redirect('petugas/data_pembimbing');
			}
		} else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2000';
			$this->load->library('upload', $config);

	        if($this->upload->do_upload('identitas')){
				if($this->petugas_model->edit_petugas_upload($id, $this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Edit data berhasil');
					redirect('petugas/data_pembimbing');
				} else {
					$this->session->set_flashdata('success', 'Edit data berhasil');
			        redirect('petugas/data_pembimbing');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('petugas/data_pembimbing');
			}   
		}
	}

	public function nilaisiswa()
	{
		$id = $this->uri->segment(3);
		//$this->input->post('submit');
			if ($this->petugas_model->add_nilai($id) == TRUE) {
				$this->session->set_flashdata('success', 'Nilai Siswa Berhasil Ditambahkan');
				redirect('petugas/data_siswa');
			} else {
				$this->session->set_flashdata('failed','Nilai Siswa Gagal Ditambahkan');
				redirect('petugas/data_siswa');
			}
	}

	public function data_pembimbing()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			if($this->session->userdata('ROLE') == 'Admin'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				$data['pembimbing'] = $this->petugas_model->get_data_pembimbing();
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['total_p'] = $this->petugas_model->total_p();
				$data['main_view'] = 'table_pembimbing_view';
				$this->load->view('template', $data);
			} 
			else 
			{
				redirect('petugas');
			}
		} 
		else 
		{
			redirect('auth');
		}
	}


	public function user_manual_pembimbing()
	{
		$data['main_view'] = 'um_pembimbing_view';
		$data['menu'] = 'um_menu_prmbimbing';
		$this->load->view('template_user_manual', $data);
	}

	public function user_manual_admin()
	{
		$data['main_view'] = 'um_admin_view';
		$data['menu'] = 'um_menu_admin';
		$this->load->view('template_user_manual', $data);
	}

	public function rekap_absen()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				$data['siswa'] = $this->petugas_model->get_data_siswa();
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['pembimbing'] = $this->petugas_model->get_all_petugas();
				$data['absen'] = $this->petugas_model->get_absen();	
				$data['main_view'] = 'rekap_absen_view';
				$this->load->view('template', $data);
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
			if($this->session->userdata('ROLE') != 'Siswa'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['petugas'] = $this->petugas_model->get_petugas($id);	
				$data['siswa'] = $this->petugas_model->get_data_siswa();
				$data['profil'] = $this->petugas_model->get_profil_petugas($id);
				$data['pembimbing'] = $this->petugas_model->get_all_petugas();
				$data['nilai'] = $this->petugas_model->get_nilai();	
				$data['main_view'] = 'rekap_nilai_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function lihat_nilai()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Pembimbing'){
				$id = $this->session->userdata('PETUGAS_ID');
				$data['nilai'] = $this->petugas_model->get_nilai();
				$data['main_view'] = 'table_siswa_view';
				$this->load->view('template', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

	public function edit_nilai_siswa()
	{
		$id = $this->uri->segment(3);
		//$this->input->post('submit');
			if ($this->petugas_model->edit_nilai($id) == TRUE) {
				$this->session->set_flashdata('success', 'Nilai Siswa Berhasil Ditambahkan');
				redirect('petugas/rekap_nilai');
			} else {
				$this->session->set_flashdata('failed','Nilai Siswa Gagal Ditambahkan');
				redirect('petugas/rekap_nilai');
			}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */