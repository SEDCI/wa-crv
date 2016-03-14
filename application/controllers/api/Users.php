<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('usersapi_model');
	}

	public function getuser()
	{
		switch ($this->input->method(true)) {
			case 'GET':
				$login = array(
					'username' => $this->input->get('username'),
					'password' => password_hash($this->input->get('password'), PASSWORD_BCRYPT, array('salt' => API_CCTV_SALT))
				);

				$user = $this->usersapi_model->retrieve($login);

				if (!empty($user)) {
					$response = array(
						'response_status' =>'200'
					);

					$response = array_merge($response, $user);
				} else {
					$response = array(
						'response_status' => '401'
					);
				}
				break;
			default:
					$response = array(
						'response_status' => '405'
					);
				break;
		}

		if ($this->input->get('callback')) {
			$output = $this->input->get('callback').'('.json_encode($response).');';
		} else {
			$output = json_encode($response);
		}

		$this->output->set_output($output);
	}
}
