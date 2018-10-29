<?php  

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class Accomplishment_Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function getShiftReleases($start, $end)
		{
			$this->db->select('public_alert_release.*, public_alert_event.*, sites.site_code, u1.firstname AS mt_first, u1.lastname AS mt_last, u2.firstname AS ct_first, u2.lastname AS ct_last');
			$this->db->from('public_alert_release');
			$this->db->join('public_alert_event', 'public_alert_event.event_id = public_alert_release.event_id');
			$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
			$this->db->join('comms_db.users AS u1', "u1.user_id = public_alert_release.reporter_id_mt");
			$this->db->join('comms_db.users AS u2', "u2.user_id = public_alert_release.reporter_id_ct");
			$this->db->where('public_alert_release.data_timestamp >', $start);
			$this->db->where('public_alert_release.data_timestamp <=', $end);
			$this->db->where('public_alert_event.status !=', 'routine ');
			$this->db->where('public_alert_event.status !=', 'invalid ');
			$this->db->order_by("data_timestamp", "desc");
			$query = $this->db->get();
			$result = $query->result_array();
			return json_encode($result);
		}

		// public function getShiftTriggers($releases) // CAUTION - already in public_alert_trigger_model
		// {
		// 	$this->db->where_in('release_id', $releases);
		// 	$this->db->order_by("timestamp", "desc");
		// 	$query = $this->db->get('public_alert_trigger');
		// 	$result = $query->result_array();
		// 	return $result;
		// }

		// public function getAllTriggers($events) // CAUTION - already in public_alert_trigger_model
		// {
		// 	$this->db->where_in('event_id', $events);
		// 	$this->db->order_by("timestamp", "desc");
		// 	$query = $this->db->get('public_alert_trigger');
		// 	$result = $query->result_array();
		// 	return $result;
		// }

		public function getSitesWithAlerts()
		{
			$this->db->select('public_alert_event.*, sites.*, sites.site_code AS name');
			$this->db->from('public_alert_event');
			$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
			$this->db->where('status', 'on-going');
			$this->db->or_where('status', 'extended');
			$query = $this->db->get();
			return json_encode($query->result_object());
		}

		public function getNarratives($event_id)
		{
			$this->db->select("narratives.*, sites.site_code AS name");
			$this->db->from("narratives");
			$this->db->join("public_alert_event", "public_alert_event.event_id = narratives.event_id" );
			$this->db->join("sites", "public_alert_event.site_id = sites.site_id");
			$this->db->where_in('narratives.event_id', $event_id);
			$query = $this->db->get();
			$result = $query->result_array();
			return json_encode($result);
		}

		// public function getNarrativesForShift($event_id, $start, $end) // CAUTION - this is already in narratives_model
		// {
		// 	$this->db->where_in('event_id', $event_id);
		// 	$this->db->where('timestamp >=', $start);
		// 	if( $end != '' )$this->db->where('timestamp <=', $end);
		// 	$this->db->order_by("timestamp", "asc");
		// 	$query = $this->db->get('narratives');
		// 	$result = $query->result_array();
		// 	return json_encode($result);
		// }

		// public function getEndOfShiftDataAnalysis($shift_start, $event_id) // CAUTION - already in eos_data_analysis_model
		// {
		// 	$selection = "analysis";
		// 	$where_arr = array("event_id" => $event_id);

		// 	if ($shift_start !== "all") $where_arr["shift_start"] = $shift_start;
		// 	else $selection = "*";

		// 	$this->db->select($selection)->from("end_of_shift_analysis")
		// 		->where($where_arr);
		// 	$query = $this->db->get();
			
		// 	if ($query->num_rows() ===  0) return array("analysis" => null);
		// 	if ($shift_start === "all") return $query->result_object();
		// 	return $query->result_object()[0];
		// }

		public function getEvent($event_id) // CAUTION - already in events_model
		{
			$query = $this->db->get_where('public_alert_event', array("event_id" => $event_id));
			return $query->result_object()[0];
		}

		public function getEmailCredentials($username)
		{
			$query = $this->db->select("*")
						->from("comms_db.membership AS mem")
						->join("comms_db.user_emails AS um", "mem.user_fk_id = um.user_id")
						->where("mem.username", $username)
						->get();

			if( $query->num_rows() == 0 ) $result = "No '" . $username . "' username on the database.";
			else $result = $query->result_array()[0];
			return $result;
		}

		public function insert($table, $data)
		{
        	$this->db->insert($table, $data);
        	$id = $this->db->insert_id();
        	return $id;
    	}

    	public function updateIfExistsElseInsert($table, $data, $on_update_fields)
    	{

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

    	function delegate($array, $isValues = false) 
    	{
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

    	public function update($column, $key, $table, $data)
		{
			$this->db->where($column, $key);
			$this->db->update($table, $data);
		}
		
		public function delete($table, $array)
		{
			$this->db->delete($table, $array); 
		}

		// SELECT r.release_id, r.event_id, r.data_timestamp, r.reporter_id_mt, r.reporter_id_ct 
		// FROM senslopedb.`public_alert_release` r
		// WHERE r.event_id IN
		// (
		//     SELECT e.event_id FROM senslopedb.public_alert_event e
		//     WHERE e.status != 'routine' OR e.status != 'invalid'
		// )
		// AND r.data_timestamp > '2017-01-12 07:30:00' and r.data_timestamp < '2017-01-12 20:00:00'
		// ORDER BY r.release_id DESC


		// TEST CASE
		/*SELECT r.*, e.* FROM public_alert_release r INNER JOIN public_alert_event e ON e.event_id = r.event_id WHERE r.data_timestamp > '2016-09-30 07:30:00' AND r.data_timestamp <= '2016-09-30 20:00:00' AND e.status != 'routine'*/

	}

?>
