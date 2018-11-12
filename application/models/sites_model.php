<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author: Kevin Dhale dela Cruz
 * @author/editor: John Louie Nepomuceno
 * This is a compilation model of all functions relating to sites table.
 **/

class Sites_Model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Get complete site information for site information CRUD page
	 * Note: This was the getSites() fnx w/c came from site_information_model.php renamed
	 * as getCompleteSiteInformation(). The other 3 functions are also from the same model. 
	 * The following functions are in short, CRUD functions for the sites table.
	 **/
	public function getCompleteSiteInformation($site_filter = "all", $get_active_sites = true) { // 2 parameters, site_id and active - set a ifelse
		$this->db->select("*");
		$this->db->from("sites");

		if(intval($site_filter) == 0) {
			if($site_filter != "all") $this->db->where("site_code", $site_filter);
		} else $this->db->where("site_id", $site_filter);

		if($get_active_sites) $this->db->where("active", 1);

		$query = $this->db->get();
		return $query->result();
	}

	public function insertNewSite($data) {
		$this->db->insert("sites", $data);

		if ($this->db->affected_rows() > 0) {
		  return "true";
		} else {
		  return "false";
		}

		// return ($this->db->affected_rows() > 0 ? "true" : "false"); CAUTION - can this be used for PHP?
	}

	public function updateSite($site_id, $data) {
		$this->db->where("site_id", $site_id);
		$this->db->update("sites", $data);

		return "true";
	}

	public function deleteSite($site_id) {
		$this->db->where("site_id", $site_id);
		$this->db->delete("sites");

		if ($this->db->affected_rows() > 0) {
		  return "true";
		}else{
		  return "false";
		}

		// return ($this->db->affected_rows() > 0 ? "true" : "false"); CAUTION - can this be used for PHP?
	}	

	/**
	 * Note: Function originally came from pubrelease_model.php and manifestations_model.php
	 * We standardized the argument name to "$site_code" instead of just "$code"
	 * which was apparent in the duplicate function in manifestations_model
	 **/	
	public function getSiteID($site_code) {
		$this->db->select("site_id");
		$query = $this->db->get_where("sites", array("site_code" => $site_code));
		return $query->row()->site_id;
	}

	/**
	 * getSites() removed from monitoring_model
	 * Note that this function just gets all sites w/o the filter "WHERE active = 1" in their queries.
	 **/
	public function getSites() {
		$sql = "SELECT site_id, site_code, sitio, barangay, municipality, province, season
				FROM sites
				ORDER BY site_code ASC";

		$query = $this->db->query($sql);

		$i = 0;
	    foreach ($query->result_array() as $row) {
	    	$sitio = $row["sitio"];
	        $barangay = $row["barangay"];
	        $municipality = $row["municipality"];
	        $province = $row["province"];

	        if ($sitio == null) {
	          $address = "$barangay, $municipality, $province";
	        }
	        else {
	          $address = "$sitio, $barangay, $municipality, $province";
	        }

	        $site[$i]["site_id"] = $row["site_id"];
	        $site[$i]["site_code"] = $row["site_code"];
	        $site[$i]["season"] = $row["season"];
	        $site[$i++]["address"] = $address;
	    }

	    return $site;
	}

	/**
	 * getSites() removed from pubrelease_model and renamed getActiveSites() since other implementations
	 * on the models did not have "WHERE active = 1" in their queries.
	 **/
	public function getActiveSites() { // CAUTION - for refactoring - remove the foreach
		$sql = "SELECT site_id, site_code, sitio, barangay, municipality, province, season
				FROM sites
				WHERE active = 1
				ORDER BY site_code ASC";

		$query = $this->db->query($sql);

		$i = 0;
	    foreach ($query->result_array() as $row) {
	    	$sitio = $row["sitio"];
	        $barangay = $row["barangay"];
	        $municipality = $row["municipality"];
	        $province = $row["province"];

	        if ($sitio == null) {
	          $address = "$barangay, $municipality, $province";
	        } 
	        else {
	          $address = "$sitio, $barangay, $municipality, $province";
	        }

	        $site[$i]["site_id"] = $row["site_id"];
	        $site[$i]["site_code"] = $row["site_code"];
	        $site[$i]["season"] = $row["season"];
	        $site[$i++]["address"] = $address;
	    }

	    return $site;
	}

	public function getSitesWithRegions() {
		$query = $this->db->order_by("region")->get("sites");
		return $query->result();
	}

}

?>