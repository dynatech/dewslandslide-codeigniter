<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_data_tagging_model extends CI_Model {

	public function getAllGDT() {
		$query = "SELECT * FROM gintag_reference";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function getGDTViaTag($tag_name) {
		$query = "SELECT * FROM gintag_reference WHERE tag_name = '".$tag_name."'";
		$result = $this->db->query($query);
		return $result->result();
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

		$set_zero = "SET FOREIGN_KEY_CHECKS = 0;";
		$result = $this->db->query($set_zero);

		$query = "DELETE FROM gintag_reference WHERE tag_id = '".$data['tag_id']."'";
		$result = $this->db->query($query);
		return $result;
	}

	public function insertGDTPoint($data,$table_name) {
		$insert_gdt_point_query = "INSERT INTO gintag_details VALUES (0, '".date("Y-m-d H:i:s", time())."', ".$data['data_start_id'].",".$data['data_end_id'].",'".$table_name."')";
		$result = $this->db->query($insert_gdt_point_query);
		if ($result == true) {
			$data = $this->db->insert_id();
		}
		return $data;
	}

	public function insertGDTReference($gdt_id, $tag_id) {
		$query = "INSERT INTO gintags VALUES (0, '".$gdt_id."', '".$tag_id."')";
		$result = $this->db->query($query);
		return $result;
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

	public function getGDTPointViaID($id) {

	}

	public function getGDTViaID($id) {
		$query = "SELECT * FROM gintag_reference WHERE tag_id = '".$id."'";
		$result = $this->db->query($result);
		$result = ($result->num_rows != 0) ? $result->result() : [];
		return $result;
	}

	public function getGDTPointViaTag() {

	}

	public function checkTableIfExisting($table_name) {
		$query = "SELECT * FROM dynaslope_table_list WHERE table_name = '".$table_name."'";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function insertTableReference($table_name) {
		$data = [];
		$query = "INSERT INTO dynaslope_table_list VALUES (0,'".$table_name."')";
		$result = $this->db->query($query);
		if ($result == true) {
			$data = $this->db->insert_id();
		}
		return $data;
	}

	public function checkTagIfExisting($tag_name) {
		$query = "SELECT * FROM gintag_reference WHERE tag_name = '".$tag_name."'";
		$result = $this->db->query($query);
		return $result->result();
	}

	public function getRainfallID($data, $table_reference) {
		if ($data['data_start_id'] == $data['data_end_id']) {
			$query_builder = "WHERE ts = '".$data['data_start_id']."'";
		} else {
			$query_builder = "WHERE ts >= '".$data['data_start_id']."' AND ts <= '".$data['data_end_id']."'";
		}
		$get_rainfall_id = "SELECT * FROM ".strtolower($data['table'])." ".$query_builder;
		$rainfall_id = $this->db->query($get_rainfall_id);
		return $rainfall_id->result();
	}

}
?>