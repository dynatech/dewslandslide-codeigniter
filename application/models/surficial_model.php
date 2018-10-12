<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class surficial_model extends CI_Model {

	public function getSurficialDataByRange ($site_code, $start_date, $end_date) {
		// $sc = $this->convertSiteCodesFromNewToOld($site_code);
		// $this->db->select(
		// 	"marker_observations.mo_id as mo_id, 
		// 	marker_observations.ts, 
		// 	UPPER(marker_names.marker_name) as crack_id,
		// 	marker_data.measurement as measurement,
		// 	marker_data.marker_id as marker_id,
		// 	sites.site_code as site_id");
		// $this->db->from("marker_observations");
		// $this->db->join("marker_data", "marker_data.mo_id = marker_observations.mo_id");
		// $this->db->join("marker_names", "marker_names.name_id = marker_data.marker_id");
		// $this->db->join("sites", "sites.site_id = marker_observations.site_id");
		// $this->db->where("marker_observations.ts >=", $start_date);
		// if ($end_date !== null) $this->db->where("marker_observations.ts <=", $end_date);
		// $this->db->where("sites.site_code", $site_code);
		// $this->db->where("marker_data.measurement <=", "500");
		// $this->db->order_by("sites.site_code");
		// $this->db->order_by("marker_names.marker_name");
		// $this->db->order_by("marker_observations.ts");

		$this->db->select(
			"marker_observations.mo_id as mo_id, 
			marker_observations.ts, 
			UPPER(site_markers.marker_name) as crack_id,
			marker_data.measurement as measurement,
			marker_data.marker_id as marker_id,
			site_markers.site_code"
		);
		$this->db->from("marker_observations");
		$this->db->join("marker_data", "marker_data.mo_id = marker_observations.mo_id");
		$this->db->join("site_markers", "site_markers.marker_id = marker_data.marker_id");
		$this->db->where("marker_observations.ts >=", $start_date);

		if ($end_date !== null) $this->db->where("marker_observations.ts <=", $end_date);

		$this->db->where("site_markers.site_code", $site_code);
		$this->db->where("marker_data.measurement <=", "500");
		$this->db->order_by("site_markers.marker_name");
		$this->db->order_by("marker_observations.ts");		

		$query = $this->db->get();
		return $query->result(); 
	}

	public function getSurficialDataLastTenTimestamps ($site_code, $end_date) {
		// $site_code = $this->convertSiteCodesFromNewToOld($site_code);
		$this->db->select("DISTINCT(marker_observations.ts) as ts");
		$this->db->from("marker_observations");
		$this->db->join("sites", "sites.site_id = marker_observations.site_id");
		$this->db->where("sites.site_code", $site_code);
		if ($end_date !== null) $this->db->where("marker_observations.ts <=", $end_date);
		$this->db->order_by("marker_observations.ts", "desc");
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSurficialDataLastTenPoints ($site_code, $latest_ts_arr) {
		// $site_code = $this->convertSiteCodesFromNewToOld($site_code);
		$this->db->select(
			"marker_observations.mo_id as mo_id, 
			marker_observations.ts,
			UPPER(site_markers.marker_name) as crack_id,
			marker_data.measurement,
			site_markers.site_id"
		);
		$this->db->from("marker_observations");
		$this->db->join("marker_data", "marker_data.mo_id = marker_observations.mo_id");
		$this->db->join("site_markers", "site_markers.marker_id = marker_data.marker_id");
		$this->db->where_in("marker_observations.ts", $latest_ts_arr);
		$this->db->where("site_markers.site_code", $site_code);
		$this->db->where("marker_data.measurement <=", "500");
		$this->db->order_by("marker_observations.ts");

		$query = $this->db->get();
		return $query->result();
	}

	public function getGroundMarkerName ($site_code) {
		// $site_code = $this->convertSiteCodesFromNewToOld($site_code);
		$this->db->select("DISTINCT(marker_name) as crack_id, marker_id");
		$this->db->from("site_markers");
		$this->db->where("site_code", $site_code);
		$this->db->where("in_use", 1);
		$this->db->order_by("crack_id", "asc");

		$query = $this->db->get();
		return $query->result();
	}

	public function getGroundLatestTime ($site_code) {
		// $site_code = $this->convertSiteCodesFromNewToOld($site_code);
		$this->db->select(
			"marker_observations.ts as timestamp,
			marker_observations.weather as weather,
			marker_observations.meas_type as meas_type");
		$this->db->from("marker_observations");
		$this->db->join("sites", "sites.site_id = marker_observations.site_id");
		$this->db->where("sites.site_code", $site_code);
		$this->db->order_by("timestamp", "desc");
		$this->db->limit(11);

		$query = $this->db->get();
		return $query->result();
	}

	// =======================================================
	public function insertIfNotExists($table, $data)
	{
		$temp = $data;
		if ($table === "marker_data") {
			unset($temp["measurement"]);
			$result = $this->db->get_where($table, $temp);
		} else if ($table === "marker_observations") {
			$temp = array( 
				"site_id" => $temp["site_id"],
				"ts" => $temp["ts"]
			);
			$result = $this->db->get_where($table, $temp);
		}

		if( $result->num_rows() > 0 ) {
			$row = $result->row();
			return array("does_exists" => true, "data" => $row);
		} else {
			$this->db->insert($table, $data);
        	$id = $this->db->insert_id();
        	return array("does_exists" => false, "data" => $id);
		}
    }

    public function update($column, $key, $table, $data)
	{
		$this->db->where($column, $key);
		$this->db->update($table, $data);
	}

	public function getMarkerID($site_id, $marker_name) {
		$result = $this->db->get_where("site_markers", array(
			"site_id" => $site_id,
			"marker_name" => $marker_name
		));
		return $result->row()->marker_id;
	}

	// FOR OLD DB

	function convertSiteCodesFromNewToOld ($site_code) {
		$sc = "";
		switch ($site_code) {
			case "mng":
				$sc = "man"; break;
			case "png":
				$sc = "pan"; break;
			case "bto":
				$sc = "bat"; break;
			case "jor":
				$sc = "pob"; break;
			case "tga":
				$sc = "tag"; break;
			default: 
				$sc = $site_code; break;
		}
		return $sc;
	}
}