<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devicesapi_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function keycheck($key)
	{
		$this->db->select('id');
		$this->db->where(array('user_key' => $key));

		$result = $this->db->get('users');

		if ($result->num_rows() > 0) {
			return $result->row_array();
		}

		return false;
	}

	public function alldevices($id, $items_per_page = '', $page = '1')
	{
		if (!empty($items_per_page)) {
			$offset = ($page - 1) * $items_per_page;
			$limit = $items_per_page;
			$this->db->limit($offset, $limit);
		}

		$this->db->where(array('user_id' => $id));

		$this->db->select('name, ip_address, port');

		return $this->db->get('devices')->result_array();
	}

	public function device($name)
	{
		$where = array('name' => $name);

		$this->db->select('name, ip_address, port');

		return $this->db->get_where('devices', $where)->row_array();
	}

	public function update($names)
	{
		$names = explode(':', $names);

		$data = array('ip_address' => $this->input->server('REMOTE_ADDR'));

		$this->db->where_in('name', $names);

		return $this->db->update('devices', $data);
	}
}
