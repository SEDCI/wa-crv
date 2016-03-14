<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');
		$this->load->model('devices_model');
	}

	public function showIndex()
	{
		$data['title'] = 'Dashboard';

		$data = array_merge($data, $this->getDevicestatuscount());
		$data = array_merge($data, $this->getDeviceslastmodified());

		load_view_user('dashboard/index', $data);
	}

	public function getDevicestatuscount()
	{
		$options_active = array(
			'criteria' => array(
				'user_id' => $this->session->userdata('clientuserid'),
				'status' => 'A'
			)
		);

		$options_inactive = array(
			'criteria' => array(
				'user_id' => $this->session->userdata('clientuserid'),
				'status' => 'I'
			)
		);

		$active = $this->devices_model->retrieve($options_active, 'COUNT(id) AS cnt');
		$inactive = $this->devices_model->retrieve($options_inactive, 'COUNT(id) AS cnt');
		$data['active'] = $active['cnt'];
		$data['inactive'] = $inactive['cnt'];

		return $data;
	}

	public function getDeviceslastmodified()
	{
		$options = array(
			'criteria' => array(
				'user_id' => $this->session->userdata('clientuserid'),
				'd.date_updated >=' => '(CURDATE() - INTERVAL 5 DAY)'
			),
			'order' => 'd.date_updated DESC'
		);

		$data['devices'] = $this->devices_model->retrieveall($options, 'd.name, d.date_updated');

		return $data;
	}
}
