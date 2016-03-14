<?php
class Dashboard extends MY_Controller
{
	private $dashboard_constants;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('loadview');

		$this->dashboard_constants = array(
			'title' => 'Dashboard',
			'adminuser' => $this->session->userdata('adminuser')
		);
	}

	public function showIndex()
	{
		$data['title'] = 'Dashboard';

		load_view_admin('dashboard/index', $this->dashboard_constants, 'dashboard_nav');
	}
}
