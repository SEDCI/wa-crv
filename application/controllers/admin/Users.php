<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->helper('password');
		$this->load->library('email');
		$this->load->model('users_model');
	}

	public function showUsers()
	{
		$data['title'] = 'Users';
		$data['alert'] = $this->session->flashdata('alert');

		$criteria = array('status !=' => 'R');

		$data['users'] = $this->users_model->retrieveall($criteria);

		load_view_admin('users/list', $data);
	}

	public function addUser()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($this->input->post()) {
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('emailadd', 'E-mail Address', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
			$this->form_validation->set_rules('companyname', 'Company Name', 'trim|max_length[150]');
			$this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[6]|max_length[30]|is_unique[users.username]');
			$this->form_validation->set_rules('passw', 'Password', 'trim|required|min_length[6]|matches[cpassw]');
			$this->form_validation->set_rules('cpassw', 'Confirm Password', 'trim');

			if ($this->form_validation->run() === true) {
				$user_key = md5(API_CCTV_SALT.md5(random_password(32)));

				$data = array(
					'username' => $this->input->post('uname'),
					'password' => password_hash($this->input->post('passw'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT)),
					'email' => $this->input->post('emailadd'),
					'last_name' => $this->input->post('lname'),
					'first_name' => $this->input->post('fname'),
					'company' => $this->input->post('companyname'),
					'user_key' => md5(API_CCTV_SALT.md5(random_password(32))),
					'status' => 'A',
					'date_registered' => date('Y-m-d H:i:s'),
					'date_updated' => date('Y-m-d H:i:s')
				);

				$this->users_model->create($data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A user has been successfully added.</div>');

				redirect('admin/users');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add User';

		load_view_admin('users/add', $data);
	}

	public function editUser($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$criteria = array('id' => $id);

		$data['user'] = $this->users_model->retrieve($criteria);

		if ($this->input->post()) {
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('companyname', 'Company Name', 'trim|max_length[150]');
			$this->form_validation->set_rules('passw', 'Password', 'trim|min_length[6]|matches[cpassw]');
			$this->form_validation->set_rules('cpassw', 'Confirm Password', 'trim');

			if ($this->input->post('emailadd') != $data['user']['email']) {
				$this->form_validation->set_rules('emailadd', 'E-mail Address', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
			}

			if ($this->input->post('uname') != $data['user']['username']) {
				$this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[6]|max_length[30]|is_unique[users.username]');
			}

			if ($this->form_validation->run() === true) {
				$data = array(
					'username' => $this->input->post('uname'),
					'email' => $this->input->post('emailadd'),
					'last_name' => $this->input->post('lname'),
					'first_name' => $this->input->post('fname'),
					'company' => $this->input->post('companyname')
				);

				$data['status'] = ($this->input->post('status')) ? 'A' : 'I';

				if ($this->input->post('passw') != '') {
					$data['password'] = password_hash($this->input->post('passw'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT));
				}

				$criteria = array('id' => $id);

				$this->users_model->update($criteria, $data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A user has been successfully updated.</div>');

				redirect('admin/users');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit User';
		$data['id'] = $id;

		load_view_admin('users/edit', $data);
	}

	public function deleteUser($id)
	{
		$criteria = array('id' => $id);
		//$this->users_model->delete($criteria);
		$data = array('status' => 'R');
		$this->users_model->update($criteria, $data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">A user has been successfully deleted.</div>');

		redirect('admin/users');
	}
}
