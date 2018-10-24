<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_data_tagging_model extends CI_Model {

	public function getAllGDT() {
		$query = "SELECT * FROM gintag_reference";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function getGDTViaID() {

	}

	public function addGDT($data) {
		$query = "INSERT INTO gintag_reference VALUES (0,'".$data['tag_name']."','".$data['tag_description']."','".$data['user']."')";
		$result = $this->db->query($query);
		return $result;
	}

	public function updateGDT($data) {
		$query = "UPDATE gintag_reference SET tag_name = '".$data['tag_name']."',tag_desc = '".$data['tag_description']."',last_modified_by = '".$data['user']."' WHERE tag_id = '".$data['tag_id']."'";
		$result = $this->db->query($query);
		return $result;
	}

	public function deleteGDT($data) {
		$query = "DELETE FROM gintag_reference WHERE tag_id = '".$data['tag_id']."'";
		$result = $this->db->query($query);
		return $result;
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