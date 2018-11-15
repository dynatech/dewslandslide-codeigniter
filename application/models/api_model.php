<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author: Kevin Dhale dela Cruz
 * @author/editor: John Louie Nepomuceno
 * This is a compilation model of all functions relating to users table.
 **/

class Api_Model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * These are functions that most models can use to add new data. 
	 * A template form of CRUD that can be called by any controller.
	 **/

	public function insert($table, $data) {
    	$this->db->insert($table, $data);
    	$id = $this->db->insert_id();
    	return $id;
	}

	public function insertIfNotExists($table, $data) {
		$result = $this->db->get_where($table, $data);
		if( $result->num_rows() > 0 ) {
			$row = $result->row();
			return $row->feature_id;
		} else {
			$this->db->insert($table, $data);
        	$id = $this->db->insert_id();
        	return $id;
		}
    }

	public function doesExists($select, $table, $where_array) {
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where_array);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateIfExistsElseInsert($table, $data, $on_update_fields) {
		$query = "INSERT INTO $table (";
		$query = $query . $this->delegate( array_keys($data) );
		$query = $query . ") VALUES (";
		$query = $query . $this->delegate(  array_values($data), true );
		$query = $query . ") ON DUPLICATE KEY UPDATE ";

		$i = 1;
		foreach ($on_update_fields as $key) 
		{
			$query = $query . $key . "=VALUES($key)";
		}

		$result = $this->db->query($query);
		return $result;
	}

	function delegate($array, $isValues = false) {
		$i = 1; $query = "";
		foreach ($array as $key) 
		{
			if( $isValues ) $query = $query . $this->db->escape($key);
			else $query = $query . $key;
			if(count($array) > $i) $query = $query . ", ";
			$i++;
		}

		return $query;
	}

	public function update($column, $key, $table, $data) {
		$this->db->where($column, $key);
		$this->db->update($table, $data);
	}
	
	public function delete($table, $array) {
		$this->db->delete($table, $array); 
	}	
}

?>