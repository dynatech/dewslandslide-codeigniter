<?php  

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class Bulletin_Model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		// public function getName ($id) { // CAUTION - already in users_model and is renamed as getFullNameOfUserbyID()
		// 	$this->db->select('u.firstname, u.lastname');
		// 	$this->db->from('comms_db.users AS u');
		// 	$this->db->where('u.user_id', $id);
		// 	$result = $this->db->get()->row();
		// 	return $result->firstname . " " . $result->lastname;
		// }

		// public function getResponses ($public_alert) { // CAUTION - already in lut_model
		// 	$query = $this->db->get_where('lut_responses', array('public_alert_level' => $public_alert));
		// 	$query3 = $this->db->get('lut_triggers');
		// 	$data['response'] = $query->result_array()[0];
		// 	foreach ($query3->result_object() as $line) {
		// 		$data['trigger_desc'][$line->trigger_type] = $line->detailed_desc;
		// 	}

		// 	return json_encode($data);
		// }

		public function getEvent ($event_id) { // CAUTION FOR REFACTORING WITH EVENT MODEL
			$this->db->select('public_alert_event.*, sites.*');
			$this->db->from('public_alert_event');
			$this->db->join('sites', 'public_alert_event.site_id = sites.site_id');
			$this->db->where('public_alert_event.event_id', $event_id);
			$query = $this->db->get();
			return $query->row();
		}

		public function getAllEventTriggers($event_id, $release_id = null)
		{
			if( $release_id == null ) $array = array('event_id' => $event_id);
			else $array = array('event_id' => $event_id, 'release_id' => $release_id);
			$this->db->where($array);
			$this->db->from('public_alert_trigger');
			$this->db->order_by("timestamp", "desc");
			$this->db->order_by("release_id", "desc");
			$result = $this->db->get();

			$data = $result->result_array();

			foreach ($data as &$arr) 
			{
				if($arr['trigger_type'] == 'E') 
				{
					$this->db->where('trigger_id', $arr['trigger_id']);
					$query = $this->db->get('public_alert_eq');
					$arr['eq_info'] = array_pop($query->result_array());
				} else if ($arr['trigger_type'] == 'D') 
				{
					$this->db->where('trigger_id', $arr['trigger_id']);
					$query = $this->db->get('public_alert_on_demand');
					$arr['od_info'] = array_pop($query->result_object());
				} else if (strtoupper($arr['trigger_type']) == 'M') 
				{
					$this->db->where('release_id', $arr['release_id']);
					$query = $this->db->get('public_alert_manifestation');
					$arr['manifestation_info'] = array_pop($query->result_object());
				}
			}

			return $data;
		}
		
		// public function getRelease($release_id) // CAUTION - already in pubrelease_model
		// {
		// 	$query = $this->db->get_where('public_alert_release', array('release_id' => $release_id));
		// 	return count($query->result_array()) > 0 ? $query->row() : null;
		// }

		public function getPreviousNonA0Release($event_id)
		{
			$query = $this->db->select("internal_alert_level")
						->from("public_alert_release")
						->where("event_id", $event_id)
						->where("internal_alert_level NOT IN ('A0', 'ND')")
						->order_by("data_timestamp", 'DESC')
						->limit(1)
						->get();
			return $query->result_array()[0]['internal_alert_level'];
		}

	}


?>
