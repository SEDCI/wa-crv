<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
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

		$data['title'] = 'Administrator Login';
		$data['validation_errors'] = $this->session->flashdata('validation_errors');
		$this->unsetSession();

		load_view_admin('auth/login', $data, false);
	}

	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('adminuser', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('adminpass', 'Password', 'trim|required|min_length[6]');

		if ($this->form_validation->run() === true):
			$criteria = array(
				'username' => $this->input->post('adminuser'),
				'password' => password_hash($this->input->post('adminpass'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT))
			);

			$admin = $this->auth_model->checkAdmin($criteria);

			if ($admin > 0):
				$this->session->set_userdata('adminuser', $this->input->post('adminuser'));
				redirect('admin/dashboard');
			endif;
		endif;

		$this->session->set_flashdata('validation_errors', '<div class="alert alert-danger">Invalid Username or Password.</div>');
		redirect('admin/login');
	}

	public function logout()
	{
		$this->unsetSession();
		redirect('admin/login');
	}

	public function unsetSession()
	{
		if ($this->session->userdata('clientuser') == '') {
			$this->session->sess_destroy();
		} else {
			$this->session->unset_userdata('adminuser');
		}
	}
}
