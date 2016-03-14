<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('devicesapi_model');
	}

	public function getdevices($key = '', $items_per_page = '', $page = '')
	{
		$client = $this->devicesapi_model->keycheck($key);

		if (empty($key) || !$client) {
			$this->output->set_header('HTTP/1.1 401 Unauthorized');
		} else {
			switch ($this->input->method(true)) {
				case 'GET':
					$this->output->set_header('HTTP/1.1 200 OK');
					$this->output->set_output(json_encode($this->devicesapi_model->alldevices($client['id'])));
					break;
				default:
					$this->output->set_header('HTTP/1.1 405 Method Not Allowed');
					break;
			}
		}
	}

	public function getdevice($key = '', $name = '')
	{
		$client = $this->devicesapi_model->keycheck($key);

		if (empty($key) || !$client) {
			$this->output->set_header('HTTP/1.1 401 Unauthorized');
		} else {
			switch ($this->input->method(true)) {
				case 'GET':
					$this->output->set_header('HTTP/1.1 200 OK');
					$this->output->set_output(json_encode($this->devicesapi_model->device($name)));
					break;
				default:
					$this->output->set_header('HTTP/1.1 405 Method Not Allowed');
					break;
			}
		}
	}

	public function updateip($key = '', $names = '')
	{
		$client = $this->devicesapi_model->keycheck($key);

		if (empty($key) || !$client) {
			$this->output->set_header('HTTP/1.1 401 Unauthorized');
		} else {
			switch ($this->input->method(true)) {
				case 'GET':
					if ($this->devicesapi_model->update($names)) {
						//$this->output->set_header('HTTP/1.1 200 OK');
						$response = array(
							'response_status' => '200',
							'last_update' => date('F j, Y h:i:s A'),
							'last_update_iso' => date('Y-m-d').'T'.date('H:i:s')
						);
					} else {
						//$this->output->set_header('HTTP/1.1 304 Not Modified');
						$response = array(
							'response_status' => '304'
						);
					}
					break;
				default:
					//$this->output->set_header('HTTP/1.1 405 Method Not Allowed');
						$response = array(
							'response_status' => '405'
						);
					break;
			}
		}

		if ($this->input->get('callback')) {
			$output = $this->input->get('callback').'('.json_encode($response).');';
		} else {
			$output = json_encode($response);
		}

		$this->output->set_output($output);
	}

	public function getservertime($key = '')
	{
		$client = $this->devicesapi_model->keycheck($key);

		if (empty($key) || !$client) {
			$this->output->set_header('HTTP/1.1 401 Unauthorized');
		} else {
			switch ($this->input->method(true)) {
				case 'GET':
					$response = array(
						'response_status' => '200',
						'server_time' => date('Y-m-d').'T'.date('H:i:s')
					);
					break;
				default:
					$response = array(
						'response_status' => '405'
					);
					break;
			}
		}

		if ($this->input->get('callback')) {
			$output = $this->input->get('callback').'('.json_encode($response).');';
		} else {
			$output = json_encode($response);
		}

		$this->output->set_output($output);
	}
}
