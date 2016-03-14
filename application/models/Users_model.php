<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function create($data)
	{
		return $this->db->insert('users', $data);
	}

	public function retrieveall($criteria = '', $fields = '')
	{
		if (!empty($criteria)) {
			$this->db->where($criteria);
		}

		if (!empty($fields)) {
			$fields = is_array($fields) ? implode(',', $fields) : $fields;
			$this->db->select($fields);
		}

		$result = $this->db->get('users');

		return $result->result_array();
	}

	public function retrieve($criteria = '')
	{
		if (!empty($criteria)) {
			$this->db->where($criteria);
		}

		$result = $this->db->get('users');

		return $result->row_array();
	}

	public function update($criteria, $data)
	{
		return $this->db->update('users', $data, $criteria);
	}

	public function delete($criteria)
	{
		return $this->db->delete('users', $criteria);
	}
}
