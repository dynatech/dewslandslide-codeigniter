<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author: Kevin Dhale dela Cruz
 * @author/editor: John Louie Nepomuceno
 * This is a compilation model of all functions relating to users table.
 **/

class Users_Model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Gets the dewsl users' (staff) id, first name, and last name.
	 * Note: This was the 3 getStaff() functions w/c came from pubrelease_model.php, 
	 * manifestations_model, and monitoring_model.php all renamed as getDEWSLUsers().
	 **/

	public function getDEWSLUsers($include_inactive = false) { // CAUTION - already in users_model
		$this->db->select('u.user_id AS id, u.firstname AS first_name, u.lastname AS last_name');
		$this->db->from('comms_db.users AS u');
		$this->db->join('comms_db.membership AS mem', 'mem.user_fk_id = u.user_id');
		if (!$include_inactive) $this->db->where('is_active','1');
		$this->db->order_by("u.lastname", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFullNameOfUserbyID($user_id) {
		$this->db->select('u.firstname, u.lastname');
		$this->db->from('comms_db.users AS u');
		$this->db->where('u.user_id', $user_id);
		$result = $this->db->get()->row();
		return $result->firstname . " " . $result->lastname;
	}

	public function getEmailCredentials($username) {
		$query = $this->db->select("*")
					->from("comms_db.membership AS mem")
					->join("comms_db.user_emails AS um", "mem.user_fk_id = um.user_id")
					->where("mem.username", $username)
					->get();

		if( $query->num_rows() == 0 ) $result = "No '" . $username . "' username on the database.";
		else $result = $query->result_array()[0];
		return $result;
	}
}

?>