<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_information_model extends CI_Model {

	public function getSites() {

		$this->db->select("*");
		$this->db->from("sites");

		$query = $this->db->get();
		// var_dump($query->result());
		return $query->result();
	}

	public function insertNewSite($data){
		$this->db->insert("sites", $data);
		var_dump($data);
	}

	public function updateSenslopeSite($site_id, $data){
		$this->db->where("site_id", $site_id);
		$this->db->update("sites", $data); 
	}
}
?>