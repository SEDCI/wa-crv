<?php
class Auth_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function checkAdmin($criteria)
	{
		$result = $this->db->get_where('admin', $criteria);
		return $result->num_rows();
	}

	public function checkUser($criteria)
	{
		$result = $this->db->get_where('users', $criteria);

		if ($result->num_rows() > 0) {
			return $result->row_array();
		}

		return false;
	}
}