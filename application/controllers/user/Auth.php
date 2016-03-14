<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->model('auth_model');
	}

	public function showLogin()
	{
		$this->load->helper('form');

		$data['title'] = 'Login';
		$data['validation_errors'] = $this->session->flashdata('validation_errors');
		$this->unsetSession();

		load_view_user('auth/login', $data, false);
	}

	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('uname', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('passw', 'Password', 'trim|required|min_length[6]');

		if ($this->form_validation->run() === true):
			$criteria = array(
				'username' => $this->input->post('uname'),
				'password' => password_hash($this->input->post('passw'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT))
			);

			$user = $this->auth_model->checkUser($criteria);

			if ($user):
				$this->session->set_userdata('clientuser', $user['username']);
				$this->session->set_userdata('clientuserid', $user['id']);
				redirect('dashboard');
			endif;
		endif;

		$this->session->set_flashdata('validation_errors', '<div class="alert alert-danger">Invalid Username or Password.</div>');
		redirect('login');
	}

	public function logout()
	{
		$this->unsetSession();
		redirect('login');
	}

	public function unsetSession()
	{
		if ($this->session->userdata('adminuser') == '') {
			$this->session->sess_destroy();
		} else {
			$this->session->unset_userdata('clientuser');
		}
	}
}
