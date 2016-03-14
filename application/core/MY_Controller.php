<?php
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->router->uri->segments[1] == 'admin') {
			if (!isset($this->router->uri->segments[2]) || (!in_array($this->router->uri->segments[2], array('login', 'auth')) && !$this->session->userdata('adminuser'))) {
				redirect('admin/login');
			}
		}
		else {
			if (!isset($this->router->uri->segments[1]) || (!in_array($this->router->uri->segments[1], array('login', 'auth')) && !$this->session->userdata('clientuser'))) {
				redirect('login');
			}
		}
	}
}
