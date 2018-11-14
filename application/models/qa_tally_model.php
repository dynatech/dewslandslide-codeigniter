<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Qa_Tally_Model extends CI_Model {

		public function getRecordForToday($status) {
			$query = "SELECT * FROM commons_db.qa_tally_event INNER JOIN senslopedb.public_alert_event ON qa_tally_event.event_id = senslopedb.public_alert_event.event_id WHERE senslopedb.public_alert_event.status = '".$status."';";
			$result = $this->db->query($query);;
			if ($result->num_rows != 0) {
				$sites = $result->result();
			} else {
				$sites = [];
			}
			return $sites;
		}

		public function getDefaultRecordForToday($status) {
			$query = "SELECT * FROM senslopedb.public_alert_event INNER JOIN sites ON public_alert_event.site_id = sites.site_id where status = '".$status."';";
			$result = $this->db->query($query);
			if ($result->num_rows != 0) {
				$sites = $result->result();
			} else {
				$sites = [];
			}
			return $sites;
		}

		public function getRecipientsForSite($site_id) {
			$query = "";
			$result = $this->db->query($query);
			if ($result->num_rows != 0) {
				$sites = $result->result();
			} else {
				$sites = [];
			}
			return $sites;
		}
	}
?>