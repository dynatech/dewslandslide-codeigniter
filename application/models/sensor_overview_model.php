<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sensor_overview_model extends CI_Model {
	
	public function getDeactivatedSensors () {
		return $this->db->select("tsm_name as logger_name, date_deactivated")
			->from("tsm_sensors")
			->where("date_deactivated IS NOT NULL")
			->get()
			->result();
		}

	public function getDeactivatedLoggers () {
		return $this->db->select("logger_name, date_deactivated")
		->from("loggers")
		->where("date_deactivated IS NOT NULL")
		->get()
		->result();
	}

	public function getLoggerHealth () {
		return $this->db
		// ->distinct("l.logger_name")
		->select("logger_name, time_delta, data_presence, last_data")
		->from(
			"(SELECT MAX(health_id) as health_id
			FROM logger_health
			GROUP BY tsm_id) as result
			JOIN logger_health as lh
			ON result.health_id = lh.health_id
			JOIN tsm_sensors as tsm
			ON lh.tsm_id = tsm.tsm_id
			JOIN loggers as l
			ON l.logger_id = tsm.logger_id")
		->get()
		->result();
	}

	public function getRainHealth () {
		return $this->db
		->select("gauge_name as logger_name, time_delta, data_presence, last_data")
 		->from(
			"(SELECT rg.gauge_name, MAX(rh.health_id) AS health_id 
			FROM rain_health AS rh
			JOIN rainfall_gauges AS rg ON rh.rain_id = rg.rain_id
			GROUP BY rh.rain_id) AS result
			JOIN rain_health AS rh2 ON result.health_id = rh2.health_id")
		->get()
		->result();
	}	

	public function getPiezoHealth () {
		return $this->db
		->select("logger_name, time_delta, data_presence, last_data")
 		->from(
			"(SELECT MAX(health_id) as health_id
			FROM piezo_health
			GROUP BY piezo_id) as result
			JOIN piezo_health as ph
			ON result.health_id = ph.health_id
			JOIN piezo_sensors as ps
			ON ph.piezo_id = ps.piezo_id
			JOIN loggers as l
			ON ps.logger_id = l.logger_id")
		->get()
		->result();
	}

	public function getSomsHealth () {
		return $this->db->select("ss.soms_name as logger_name,
			sh.time_delta, sh.data_presence, sh.last_data")
		->from("soms_health as sh")
		->join("soms_sensors as ss", "sh.soms_id = ss.soms_id" )
		->get()
		->result();
	}
}

?>