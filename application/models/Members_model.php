<?php
class Members_model extends CI_Model
{
	protected $personal_table = 'm_personal';

	public function __construct()
	{
		$this->load->database();
	}

	public function getMemberslist($criteria = '')
	{
		if (!empty($criteria)) {
			$this->db->where($criteria);
		}

		$this->db->select("membership_id, last_name, first_name, middle_name, nick_name, home_address, cellphone, email_address");
		$this->db->order_by('last_name');
		$this->db->order_by('first_name');
		$this->db->order_by('middle_name');
		$result = $this->db->get('m_personal');
		return $result->result_array();
	}

	public function getMemberinfo($criteria)
	{
		if (!empty($criteria)) {
			$result_personal = $this->db->get_where('m_personal', $criteria);
			$result_personal = $result_personal->row_array();
			$m_personal_id = $result_personal['id'];

			$where = array('m_personal_id' => $m_personal_id);

			$result_children = $this->db->get_where('m_children', $where);

			$school_levels_array = array(
				'h' => 'High School',
				'c' => 'College',
				'g' => 'Graduate School',
				'p' => 'Post Graduate School'
			);

			foreach ($school_levels_array as $school_level => $school_level_label) {
				$where_education = array('m_personal_id' => $m_personal_id, 'level' => $school_level);
				$this->db->select('id, school_name, course, inclusive_years');
				$result = $this->db->get_where('m_education', $where_education);
				$result_education[$school_level_label] = $result->result_array();
			}

			$result_religious = $this->db->get_where('m_religious', $where);
			return array('personal' => $result_personal, 'children' => $result_children->result_array(), 'education' => $result_education, 'religious' => $result_religious->row_array());
		}

		return false;
	}

	public function saveMember()
	{
		/**
		* Personal Information
		*/
		$membership_id = $this->getNextmembershipid();
		$civil_status_others = ($this->input->post('civilstatus') == 'O' && $this->input->post('ocivilstatus')) ? $this->input->post('ocivilstatus') : '';

		$personal_info = array(
			'membership_id' => $membership_id,
			'last_name' => $this->input->post('lastname'),
			'first_name' => $this->input->post('firstname'),
			'middle_name' => $this->input->post('middlename'),
			'nick_name' => $this->input->post('nickname'),
			'home_address' => $this->input->post('homeaddress'),
			'date_of_birth' => nice_date($this->input->post('bdmonth').'-'.$this->input->post('bdday').'-'.$this->input->post('bdyear'), 'Y-m-d'),
			'place_of_birth' => $this->input->post('placeofbirth'),
			'home_number' => $this->input->post('homenumber'),
			'cellphone' => $this->input->post('cellphone'),
			'email_address' => $this->input->post('emailaddress'),
			'company_office' => $this->input->post('companyoffice'),
			'occupation' => $this->input->post('occupation'),
			'office_number' => $this->input->post('officenumber'),
			'fax' => $this->input->post('fax'),
			'office_email' => $this->input->post('officeemail'),
			'civil_status' => $this->input->post('civilstatus'),
			'civil_status_others' => $civil_status_others,
			'date_first_visit' => $this->input->post('datefirstvisit'),
			'invited_by' => $this->input->post('invitedby'),
			's_last_name' => $this->input->post('slastname'),
			's_first_name' => $this->input->post('sfirstname'),
			's_middle_name' => $this->input->post('smiddlename'),
			's_nick_name' => $this->input->post('snickname'),
			'date_married' => nice_date($this->input->post('dmmonth').'-'.$this->input->post('dmday').'-'.$this->input->post('dmyear'), 'Y-m-d'),
			's_birthdate' => nice_date($this->input->post('sbdmonth').'-'.$this->input->post('sbdday').'-'.$this->input->post('sbdyear'), 'Y-m-d'),
			'father_name' => $this->input->post('fathername'),
			'father_age' => $this->input->post('fatherage'),
			'mother_name' => $this->input->post('mothername'),
			'mother_age' => $this->input->post('motherage'),
			'date_received' => $this->input->post('datereceived'),
			'application_type' => $this->input->post('applicationtype'),
			'status' => 'A'
		);

		$this->db->insert('m_personal', $personal_info);
		$m_personal_id = $this->db->insert_id();

		/**
		* Children
		*/
		$cname = $this->input->post('cname');
		$cbirthday = $this->input->post('cbirthday');

		for ($c = 0; $c < count($cname); $c++) {
			if (!empty($cname[$c])) {
				$children = array(
					'm_personal_id' => $m_personal_id,
					'name' => $cname[$c],
					'birthdate' => nice_date($cbirthday[$c], 'Y-m-d')
				);

				$this->db->insert('m_children', $children);
			}
		}

		/**
		* Educational Background
		*/
		$school_levels_array = array('h', 'c', 'g', 'p');

		foreach ($school_levels_array as $school_level) {
			$nameschool = $this->input->post($school_level.'nameschool');
			$course = $this->input->post($school_level.'course');
			$incyears = $this->input->post($school_level.'incyears');

			for ($s = 0; $s < count($nameschool); $s++) {
				if (!empty($nameschool[$s])) {
					$education = array(
						'm_personal_id' => $m_personal_id,
						'level' => $school_level,
						'school_name' => $nameschool[$s],
						'course' => $course[$s],
						'inclusive_years' => $incyears[$s]
					);

					$this->db->insert('m_education', $education);
				}
			}
		}

		/**
		* Religious Background
		*/
		$religious = array(
			'm_personal_id' => $m_personal_id,
			'bg1_when' => nice_date($this->input->post('rel1when'), 'Y-m-d'),
			'bg1_where' => $this->input->post('rel1where'),
			'bg1_whom' => $this->input->post('rel1whom'),
			'bg2_yesno' => $this->input->post('rel2yesno'),
			'bg2_when' => nice_date($this->input->post('rel2when'), 'Y-m-d'),
			'bg2_where' => $this->input->post('rel2where'),
			'bg2_minister' => $this->input->post('rel2minister'),
			'bg3_church' => $this->input->post('rel3church'),
			'bg3_years' => $this->input->post('rel3years'),
			'bg3_pastor' => $this->input->post('rel3pastor'),
			'bg3_address' => $this->input->post('rel3address'),
			'bg3_telno' => $this->input->post('rel3telno'),
			'bg3_positions' => $this->input->post('rel3positions'),
			'bg4_reasons' => $this->input->post('rel4reasons'),
			'bg5_yesno' => $this->input->post('rel5yesno'),
			'bg5_question' => $this->input->post('rel5question')
		);

		$this->db->insert('m_religious', $religious);

		//$password = random_password();

		$user_data = array(
			'm_personal_id' => $m_personal_id,
			'email' => $this->input->post('emailaddress'),
			//'password' => password_hash($password, PASSWORD_BCRYPT, array('salt' => GCF_SALT)),
			'registered_date' => date('Y-m-d H:i:s'),
			'registered_by' => $this->session->userdata('adminuser'),
			'verification_date' => '0000-00-00 00:00:00'
		);

		$this->db->insert('users', $user_data);

		$verification_key = md5(md5(GCF_SALT.$m_personal_id.GCF_SALT.date('Y-m-d H:i:s')));

		$verification_data = array(
			'verification_key' => $verification_key,
			'm_personal_id' => $m_personal_id,
			'date_generated' => date('Y-m-d H:i:s'),
			'status' => 'U'
		);

		$this->db->insert('user_verification', $verification_data);

		return $verification_key;
	}

	public function updateMember()
	{
		/**
		* Personal Information
		*/
		$m_personal_id = $this->input->post('personalid');
		$membership_id = $this->input->post('memberid');

		$civil_status_others = ($this->input->post('civilstatus') == 'O' && $this->input->post('ocivilstatus')) ? $this->input->post('ocivilstatus') : '';

		$personal_info = array(
			'last_name' => $this->input->post('lastname'),
			'first_name' => $this->input->post('firstname'),
			'middle_name' => $this->input->post('middlename'),
			'nick_name' => $this->input->post('nickname'),
			'home_address' => $this->input->post('homeaddress'),
			'date_of_birth' => nice_date($this->input->post('bdmonth').'-'.$this->input->post('bdday').'-'.$this->input->post('bdyear'), 'Y-m-d'),
			'place_of_birth' => $this->input->post('placeofbirth'),
			'home_number' => $this->input->post('homenumber'),
			'cellphone' => $this->input->post('cellphone'),
			'email_address' => $this->input->post('emailaddress'),
			'company_office' => $this->input->post('companyoffice'),
			'occupation' => $this->input->post('occupation'),
			'office_number' => $this->input->post('officenumber'),
			'fax' => $this->input->post('fax'),
			'office_email' => $this->input->post('officeemail'),
			'civil_status' => $this->input->post('civilstatus'),
			'civil_status_others' => $civil_status_others,
			'date_first_visit' => $this->input->post('datefirstvisit'),
			'invited_by' => $this->input->post('invitedby'),
			's_last_name' => $this->input->post('slastname'),
			's_first_name' => $this->input->post('sfirstname'),
			's_middle_name' => $this->input->post('smiddlename'),
			's_nick_name' => $this->input->post('snickname'),
			'date_married' => nice_date($this->input->post('dmmonth').'-'.$this->input->post('dmday').'-'.$this->input->post('dmyear'), 'Y-m-d'),
			's_birthdate' => nice_date($this->input->post('sbdmonth').'-'.$this->input->post('sbdday').'-'.$this->input->post('sbdyear'), 'Y-m-d'),
			'father_name' => $this->input->post('fathername'),
			'father_age' => $this->input->post('fatherage'),
			'mother_name' => $this->input->post('mothername'),
			'mother_age' => $this->input->post('motherage'),
			'date_received' => $this->input->post('datereceived'),
			'application_type' => $this->input->post('applicationtype')
		);

		$this->db->update('m_personal', $personal_info, array('id' => $m_personal_id, 'membership_id' => $membership_id));

		/**
		* Children
		*/
		$cname = $this->input->post('cname');
		$cbirthday = $this->input->post('cbirthday');
		$cid = $this->input->post('cid');
		$cdelete = $this->input->post('cdelete');

		for ($c = 0; $c < count($cname); $c++) {
			if (!empty($cdelete[$c])) {
				$this->db->delete('m_children', array('id' => $cdelete[$c]));
			} else {
				if (!empty($cname[$c])) {
					$children = array(
						'name' => $cname[$c],
						'birthdate' => nice_date($cbirthday[$c], 'Y-m-d')
					);

					if (!empty($cid[$c])) {
						$this->db->update('m_children', $children, array('id' => $cid[$c]));
					} else {
						$children['m_personal_id'] = $m_personal_id;
						$this->db->insert('m_children', $children);
					}
				}
			}
		}

		/**
		* Educational Background
		*/
		$school_levels_array = array('h', 'c', 'g', 'p');

		foreach ($school_levels_array as $school_level) {
			$nameschool = $this->input->post($school_level.'nameschool');
			$course = $this->input->post($school_level.'course');
			$incyears = $this->input->post($school_level.'incyears');
			$eid = $this->input->post($school_level.'eid');
			$edelete = $this->input->post($school_level.'edelete');

			for ($s = 0; $s < count($nameschool); $s++) {
				if (!empty($edelete[$s])) {
					$this->db->delete('m_education', array('id' => $edelete[$s]));
				} else {
					if (!empty($nameschool[$s])) {
						$education = array(
							'school_name' => $nameschool[$s],
							'level' => $school_level,
							'course' => $course[$s],
							'inclusive_years' => $incyears[$s]
						);

						if (!empty($eid[$s])) {
							$this->db->update('m_education', $education, array('id' => $eid[$s]));
						} else {
							$education['m_personal_id'] = $m_personal_id;
							$this->db->insert('m_education', $education);
						}
					}
				}
			}
		}

		/**
		* Religious Background
		*/
		$religious = array(
			'bg1_when' => nice_date($this->input->post('rel1when'), 'Y-m-d'),
			'bg1_where' => $this->input->post('rel1where'),
			'bg1_whom' => $this->input->post('rel1whom'),
			'bg2_yesno' => $this->input->post('rel2yesno'),
			'bg2_when' => nice_date($this->input->post('rel2when'), 'Y-m-d'),
			'bg2_where' => $this->input->post('rel2where'),
			'bg2_minister' => $this->input->post('rel2minister'),
			'bg3_church' => $this->input->post('rel3church'),
			'bg3_years' => $this->input->post('rel3years'),
			'bg3_pastor' => $this->input->post('rel3pastor'),
			'bg3_address' => $this->input->post('rel3address'),
			'bg3_telno' => $this->input->post('rel3telno'),
			'bg3_positions' => $this->input->post('rel3positions'),
			'bg4_reasons' => $this->input->post('rel4reasons'),
			'bg5_yesno' => $this->input->post('rel5yesno'),
			'bg5_question' => $this->input->post('rel5question')
		);

		$this->db->update('m_religious', $religious, array('m_personal_id' => $m_personal_id));

		return true;
	}

	public function getNextmembershipid()
	{
		$this->db->like('membership_id', 'RM'.date('Ym'), 'after');
		$this->db->select('membership_id');
		$this->db->order_by('membership_id', 'DESC');
		$this->db->limit(1, 0);
		$result = $this->db->get('m_personal')->row_array();

		if (!empty($result['membership_id'])) {
			$last_membership_id = explode('-', $result['membership_id']);
			$next_membership_id = $last_membership_id[0].'-'.str_pad(intval($last_membership_id[1]) + 1, 5, '0', STR_PAD_LEFT);
		} else {
			$next_membership_id = 'RM'.date('Ym').'-00001';
		}

		return $next_membership_id;
	}

	public function archiveMember($criteria)
	{
		return $this->db->update('m_personal', array('status' => 'D'), $criteria);
	}
}
