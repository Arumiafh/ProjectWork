<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->load->model('auth_model');
		$this->load->model('siswa_model');
		$this->load->helper('captcha');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				redirect('siswa');
			} else {
				redirect('petugas');
			}
		} else {
			redirect('auth/home');
		}
	}

	public function home()
	{
		$this->load->view('home_view');
	}

	public function login_petugas()
	{
		$this->load->view('login_petugas_view');
	}

	public function login_siswa_submit()
	{
			$inputCaptcha = $this->input->post('captcha');
	        $sessCaptcha = $this->session->userdata('captchaCode');

	        if($inputCaptcha === $sessCaptcha){
				if($this->auth_model->login() == TRUE){
						if($this->session->userdata('STATUS') == 'verified'){
							redirect('siswa/dashboard');
						} else {
							redirect('auth/verifikasi');
						}
				} else {
					$this->session->set_flashdata('failed', 'Login Gagal, Username/Password Salah');
		            redirect('auth/login_siswa');
				}
	        } else {
	        	$this->session->set_flashdata('username_error', $this->input->post('username'));
	        	$this->session->set_flashdata('password_error', $this->input->post('password'));

	        	$this->session->set_flashdata('failed', 'Captcha code was not match, please try again');
		        redirect('auth/login_siswa');
	        }
	}


	public function login_siswa()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				redirect('siswa');
			} else {
				redirect('petugas');
			}
		} else {
			$config = array(
	            'img_path'      => 'captcha_images/',
	            'img_url'       => base_url().'captcha_images/',
	            'img_width'     => '100',
	            'img_height'    => '30',
	            'word_length'   => '4',
	            'font_size'     => '32',
	            'expiration'    => 7200
	        );
	        $captcha = create_captcha($config);
	        
	        // Unset previous captcha and store new captcha word
	        $this->session->unset_userdata('captchaCode');
	        $this->session->set_userdata('captchaCode',$captcha['word']);
	        
	        // Send captcha image to view
	        $data['captchaImg'] = $captcha['image'];
	    $data['main_view'] = 'login_siswa_view';
		$this->load->view('template_siswa', $data);	
		}
	}

	public function register_siswa()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				redirect('siswa');
			} else {
				redirect('petugas');
			}
		} else {
			$config = array(
	            'img_path'      => 'captcha_images/',
	            'img_url'       => base_url().'captcha_images/',
	            'img_width'     => 100,
	            'img_height'    => 30,
	            'word_length'   => 4,
	            'font_size'     => 32,
	            'expiration'    => 7200
	        );
	        $captcha = create_captcha($config);
	        
	        // Unset previous captcha and store new captcha word
	        $this->session->unset_userdata('captchaCode');
	        $this->session->set_userdata('captchaCode',$captcha['word']);
	        
	        // Send captcha image to view
	        $data['captchaImg'] = $captcha['image'];

		    $data['main_view'] = 'register_siswa_view';
			$this->load->view('template_siswa', $data);	
		}
	}

	public function checkusername($username)
	{
        $user = $this->auth_model->get_user($username);
        
        if($user == null)
        {
            echo "notexists";
        }
        else
        {
            echo "exists";
        }  
	}

	public function daftar()
	{	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '2000';
		$this->load->library('upload', $config);

		$inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');

        if($inputCaptcha === $sessCaptcha){
            if($this->upload->do_upload('identitas')){
				if($this->auth_model->simpan($this->upload->data()) == TRUE){
					$this->session->set_flashdata('success', 'Pendaftaran Berhasil, Silahkan Log In');
		            redirect('auth/login_siswa');
				} else {
					$this->session->set_flashdata('failed', 'Pendaftaran Gagal');
		            redirect('auth/register_siswa');
				}
			} else {
				$this->session->set_flashdata('failed', $this->upload->display_errors());
		        redirect('auth/register_siswa');
			}
        }else{
        	$this->session->set_flashdata('username_error', $this->input->post('username'));
        	$this->session->set_flashdata('password_error', $this->input->post('password'));
        	$this->session->set_flashdata('confirm_password_error', $this->input->post('confirm_password'));
        	$this->session->set_flashdata('email_error', $this->input->post('email'));
        	$this->session->set_flashdata('nis_error', $this->input->post('nis'));
        	$this->session->set_flashdata('nama_error', $this->input->post('nama'));
        	$this->session->set_flashdata('tempatlahir_error', $this->input->post('tempatlahir'));
        	$this->session->set_flashdata('tgl_lhr_error', $this->input->post('tgl_lhr'));
        	$this->session->set_flashdata('agama_error', $this->input->post('agama'));
        	$this->session->set_flashdata('alamatsiswa_error', $this->input->post('alamatsiswa'));
        	$this->session->set_flashdata('nohp_error', $this->input->post('nohp'));
        	$this->session->set_flashdata('asal_error', $this->input->post('asal'));
        	$this->session->set_flashdata('jurusan_error', $this->input->post('jurusan'));
        	$this->session->set_flashdata('notelp_error', $this->input->post('notelp'));
        	$this->session->set_flashdata('alamatsekolah_error', $this->input->post('alamatsekolah'));
        	$this->session->set_flashdata('tgl_mulai_error', $this->input->post('tgl_mulai'));
        	$this->session->set_flashdata('tgl_selesai_error', $this->input->post('tgl_selesai'));

            $this->session->set_flashdata('failed', 'Captcha code was not match, please try again');
		    redirect('auth/register_siswa');
        }
	}

	public function login_petugas_submit(){

		if($this->auth_model->login_petugas() == TRUE){
			redirect('petugas/dashboard');
		} else {
			$this->session->set_flashdata('failed', 'Login Gagal, Username/Password Salah');
			redirect('auth/login_petugas');
		}
	}

	public function Ajax_Captcha($code)
	{
      $sessCaptcha = $this->session->userdata('captchaCode');

	  if ($code == strtoupper($sessCaptcha))
	  {
	       return true;
	  }
	  else
	  {
	      return false;
	  }
	}

	public function logout()
	{
		$this->session->set_userdata('');
		$this->session->sess_destroy();
		redirect('auth');
	}

    public function refresh_captcha(){
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => 100,
            'img_height'    => 30,
            'word_length'   => 4,
            'font_size'     => 16,
            'expiration'    => 7200
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }

    public function verifikasi()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('ROLE') == 'Siswa'){
				$id = $this->session->userdata('SISWA_ID');
				$data['profil'] = $this->siswa_model->profil($id);
				$data['main_view'] = 'verifikasi_siswa_view';
				$this->load->view('template_siswa', $data);
			} else {
				redirect('siswa');
			}
		} else {
			redirect('auth');
		}
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */