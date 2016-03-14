<?php
class Verification_model extends CI_Model
{
	protected $table = 'user_verification';

	public function __construct()
	{
		$this->load->database();
	}

	public function checkVerificationkey($verification_key)
	{
		$this->db->where(array('verification_key' => $verification_key));

		if ($this->db->get($this->table)->num_rows() > 0) {
			return true;
		}

		return false;
	}

	public function getVerificationdata($verification_key)
	{
		$this->db->join('users b', 'a.m_personal_id=b.m_personal_id');
		$this->db->where(array('verification_key' => $verification_key, 'status' => 'U'));
		$this->db->select("a.m_personal_id, email");
		$result = $this->db->get($this->table.' a');

		return ($result->num_rows() > 0) ? $result->row_array() : false;
	}

	public function updateVerificationstatus($verification_key)
	{
		return $this->db->update($this->table, array('status' => 'V'), array('verification_key' => $verification_key));
	}
}
