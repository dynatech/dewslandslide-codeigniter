<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author: Kevin Dhale dela Cruz
 * @author/editor: John Louie Nepomuceno
 * This is a compilation model of all functions relating to users table.
 **/

class Lut_Model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Note: This was from bulletin_model.php, 
	 * manifestations_model, and monitoring_model.php all renamed as getDEWSLUsers().
	 **/


	public function getResponses ($public_alert) {
		$query = $this->db->get_where('lut_responses', array('public_alert_level' => $public_alert));
		$query3 = $this->db->get('lut_triggers');
		$data['response'] = $query->result_array()[0];
		foreach ($query3->result_object() as $line) {
			$data['trigger_desc'][$line->trigger_type] = $line->detailed_desc;
		}

		return $data;
	}

	public function getAlerts() {
		$sql = "SELECT
					lut_alerts.internal_alert_level, 
					lut_alerts.internal_alert_desc, 
					lut_alerts.public_alert_level, 
					lut_alerts.public_alert_desc, 
					lut_alerts.supp_info_rain, 
					lut_alerts.supp_info_ground, 
					lut_alerts.supp_info_eq, 
					lut_responses.response_llmc_lgu, 
					lut_responses.response_community 
				FROM lut_alerts 
				INNER JOIN lut_responses 
				ON lut_alerts.public_alert_level=lut_responses.public_alert_level
				ORDER BY lut_alerts.internal_alert_level ASC";

		$result = $this->db->query($sql);

		$i = 0;
		foreach ($result->result_array() as $row)
		{
	        $alert_level[$i]["internal_alert_level"] = $row["internal_alert_level"];
	        $alert_level[$i]["internal_alert_desc"] = $row["internal_alert_desc"];
	        $alert_level[$i]["public_alert_level"] = $row["public_alert_level"];
	        $alert_level[$i]["public_alert_desc"] = $row["public_alert_desc"];
	        
	        $temp_str = "";
	        if (!is_null($row["supp_info_ground"])) $temp_str = $row["supp_info_ground"] . " ";
	        if (!is_null($row["supp_info_rain"])) $temp_str = $temp_str . $row["supp_info_rain"] . " ";
	        if (!is_null($row["supp_info_eq"])) $temp_str = $temp_str . " " . $row["supp_info_eq"];
			$alert_level[$i]["supplementary_info"] = $temp_str;
			
	        $alert_level[$i]["response_llmc_lgu"] = $row["response_llmc_lgu"];
	        $alert_level[$i++]["response_community"] = $row["response_community"];
		}
		
		return $alert_level;
	}

}

?>