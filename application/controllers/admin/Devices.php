<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->model('users_model');
		$this->load->model('devices_model');
	}

	public function showDevices()
	{
		$data['title'] = 'Devices';
		$data['alert'] = $this->session->flashdata('alert');


		$options = array(
			'criteria' => array(
				'd.status !=' => 'R'
			)
		);

		$data['devices'] = $this->devices_model->retrieveall($options, "d.*, CONCAT(u.first_name, ' ', u.last_name) AS client_name, u.username, u.company");

		load_view_admin('devices/list', $data);
	}

	public function addDevice()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['users_dropdown'] = $this->generateUserdropdown();

		if ($this->input->post()) {
			$this->form_validation->set_rules('client', 'Client', 'trim|required|integer');
			$this->form_validation->set_rules('devicename', 'Device Name', 'trim|required|min_length[5]|max_length[30]|is_unique[devices.name]');
			$this->form_validation->set_rules('ipadd', 'IP Address', 'trim|required|valid_ip');
			$this->form_validation->set_rules('port', 'Port', 'trim|required|integer');

			if ($this->form_validation->run() === true) {
				$data = array(
					'user_id' => $this->input->post('client'),
					'name' => $this->input->post('devicename'),
					'ip_address' => $this->input->post('ipadd'),
					'port' => $this->input->post('port'),
					'date_added' => date('Y-m-d H:i:s'),
					'status' => 'A',
					'date_updated' => date('Y-m-d H:i:s')
				);

				$this->devices_model->create($data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A device has been successfully added.</div>');

				redirect('admin/devices');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Add Device';

		load_view_admin('devices/add', $data);
	}

	public function generateUserdropdown()
	{
		$criteria = array('status' => 'A');
		$fields = array('id', "CONCAT(first_name, ' ', last_name) AS client_name, company");

		$users = $this->users_model->retrieveall($criteria, $fields);

		$users_dropdown[''] = 'Select a Client...';

		foreach ($users as $user) {
			$client_full = (!empty($user['company'])) ? $user['client_name'].' ('.$user['company'].')' : $user['client_name'];
			$users_dropdown[$user['id']] = $client_full;
		}

		return $users_dropdown;
	}

	public function editDevice($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$criteria = array('id' => $id);

		$data['device'] = $this->devices_model->retrieve($criteria);

		$data['users_dropdown'] = $this->generateUserdropdown();

		if ($this->input->post()) {
			$this->form_validation->set_rules('client', 'Client', 'trim|required|integer');
			$this->form_validation->set_rules('ipadd', 'IP Address', 'trim|required|valid_ip');
			$this->form_validation->set_rules('port', 'Port', 'trim|required|integer');

			if ($this->input->post('devicename') != $data['device']['name']) {
				$this->form_validation->set_rules('devicename', 'Device Name', 'trim|required|min_length[5]|max_length[30]|is_unique[devices.name]');
			}

			if ($this->form_validation->run() === true) {
				$data = array(
					'user_id' => $this->input->post('client'),
					'name' => $this->input->post('devicename'),
					'ip_address' => $this->input->post('ipadd'),
					'port' => $this->input->post('port')
				);

				$data['status'] = ($this->input->post('status')) ? 'A' : 'I';

				$criteria = array('id' => $id);

				$this->devices_model->update($criteria, $data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success">A device has been successfully updated.</div>');

				redirect('admin/devices');
			} else {
				$data['alert'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			}
		}

		$data['title'] = 'Edit Device';
		$data['id'] = $id;

		load_view_admin('devices/edit', $data);
	}

	public function deleteDevice($id)
	{
		$criteria = array('id' => $id);
		//$this->devices_model->delete($criteria);
		$data = array('status' => 'R');
		$this->devices_model->update($criteria, $data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">A device has been successfully deleted.</div>');

		redirect('admin/devices');
	}

	public function viewDevice($name)
	{
		$options = array(
			'criteria' => array(
				'name' => $name
			)
		);

		$data['device'] = $this->devices_model->retrieve($options);
		$data['title'] = $data['device']['name'];

		$this->load->view('admin/devices/view', $data);
	}
}
