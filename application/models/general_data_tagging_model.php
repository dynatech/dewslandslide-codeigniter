<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_data_tagging_model extends CI_Model {

	public function getAllGDT() {
		$query = "SELECT * FROM gintag_reference";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function getGDTViaID() {

	}

	public function addGDT() {

	}

	public function updateGDT() {

	}

	public function deleteGDT() {

	}

	public function insertGDTPoint() {

	}

	public function modifyGDTPoint() {

	}

	public function removeGDTPoint() {

	}

	public function getAllGDTPoint() {
		$query = "SELECT * FROM gintags";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function getGDTPointViaID() {

	}

	public function getGDTPointViaTag() {

	}

}
?>