<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->model('users_model');
	}

	public function view()
	{
		$data['title'] = 'My Profile';
		$data['alert'] = $this->session->flashdata('alert');

		$criteria = array('id' => $this->session->userdata('clientuserid'));

		$data['user'] = $this->users_model->retrieve($criteria);

		load_view_user('profile/view', $data);
	}

	public function edit()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$criteria = array('id' => $this->session->userdata('clientuserid'));

		$data['user'] = $this->users_model->retrieve($criteria);

		if ($this->input->post()) {
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('companyname', 'Company Name', 'trim|max_length[150]');

			if ($this->input->post('emailadd') != $data['user']['email']) {
				$this->form_validation->set_rules('emailadd', 'E-mail Address', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
			}

			if ($this->form_validation->run() === true) {
				$data = array(
					'email' => $this->input->post('emailadd'),
					'last_name' => $this->input->post('lname'),
					'first_name' => $this->input->post('fname'),
					'company' => $this->input->post('companyname')
				);

				$criteria = array('id' => $this->session->userdata('clientuserid'));

				$this->users_model->update($criteria, $data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">You have successfully updated your profile.</div>');

				redirect('profile');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Profile';

		load_view_user('profile/edit', $data);
	}

	public function editPassword()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('users_model');

		if ($this->input->post()) {
			$this->form_validation->set_rules('opassw', 'Old Password', 'trim|required|callback_checkOldpassword');
			$this->form_validation->set_rules('npassw', 'New Password', 'trim|required|min_length[6]|matches[cpassw]');
			$this->form_validation->set_rules('cpassw', 'Confirm Password', 'trim');

			if ($this->form_validation->run() === true) {
				$data = array(
					'password' => password_hash($this->input->post('npassw'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT))
				);

				$criteria = array('id' => $this->session->userdata('clientuserid'));

				$this->users_model->update($criteria, $data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">You have successfully changed your password.</div>');

				redirect('profile');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Change Password';

		load_view_user('profile/passwordchange', $data);
	}

	public function checkOldpassword($str)
	{
		$criteria = array(
			'id' => $this->session->userdata('clientuserid'),
			'username' => $this->session->userdata('clientuser'),
			'password' => password_hash($str, PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT))
		);

		if (count($this->users_model->retrieve($criteria)) == 0) {
			$this->form_validation->set_message('checkOldpassword', 'Invalid Old Password');
			return false;
		}

		return true;
	}
}
