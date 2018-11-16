<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring extends CI_Controller 
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('monitoring_model');
		$this->load->model('sites_model');
		$this->load->model('users_model');
	}

	public function index () {
		$this->is_logged_in();

		$data['title'] = 'Dashboard - Site Alert Monitoring';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");

		$data['events'] = json_encode('null');
		$data['sites'] = json_encode($this->sites_model->getSites());
		$data['staff'] = json_encode($this->users_model->getDEWSLUsers());
		$data['monitoring'] = $this->load->view('public_alert/monitoring_dashboard_tables', null, true);
		$data['generated_alerts'] = $this->load->view('public_alert/generated_alerts', $data, true);
		$data['bulletin_modals'] = $this->load->view('public_alert/bulletin_modals', $data, true);

		$this->load->view('templates/beta/header', $data);
        $this->load->view('templates/beta/nav');
		$this->load->view('public_alert/monitoring_dashboard', $data);
        $this->load->view('templates/beta/footer');
	}

	public function getOnGoingAndExtended () {
		date_default_timezone_set('Asia/Manila');
		$events = json_encode($this->monitoring_model->getOnGoingAndExtended());

		$latest = []; $extended = [];
		$overdue = [];

		foreach (json_decode($events) as $event) {
			$temp = strtotime($event->data_timestamp);
			$hour = date("H" , $temp);
			if ($hour == '23' && (int) date("H" , strtotime($event->release_time)) < 4)
				$temp = $this->roundTime(strtotime($event->data_timestamp));

			$event->release_time = date("j F Y\<\b\\r\>" , $temp) . date("H:i" , strtotime($event->release_time));

			if ($event->status == "on-going") {
				if (strtotime($event->validity) > strtotime('now')) {
					$address = "$event->barangay, $event->municipality, $event->province";
					$marker['address'] = is_null($event->sitio) ? $address : $event->sitio . ", " . $address;
					array_push($latest, $event);
				} else {
					array_push($overdue, $event);
				}			
			} else {
				$start = strtotime('tomorrow noon', strtotime($event->validity));
	 			$end = strtotime('+2 days', $start);
	 			$day = 3 - ceil(($end - (60*60*12) - strtotime('now'))/(60*60*24));

	 			if ($day <= 0) array_push($latest, $event);
	 			else if ($day > 0 && $day <= 3) {
		 			$event->start = $start;
					$event->end = $end;
					$event->day = $day;
					array_push($extended, $event);
	 			} else {
	 				$this->load->model('api_model');
	 				$this->api_model->update("event_id", $event->event_id, "public_alert_event", array("status" => "finished"));
	 			}
			}
		}

		$x = array('latest' => $latest, 'extended' => $extended, 'overdue' => $overdue);

		echo json_encode($x);
	}

	public function getAllRoutineEventsGivenDate ($date) {
		$result = $this->monitoring_model->getAllRoutineEventsGivenDate($date);
		echo json_encode($result);
	}

	function roundTime($timestamp)
	{
		// Adjust timestamp to nearest hour if minutes are not 00
		$minutes = (int)( date('i', $timestamp) );
		$hours = (int)( date('h', $timestamp) );
		$x = ($minutes > 0 ) ? true : false;

		$minutes = $minutes == 0 ? 60 : $minutes;
		$timestamp = $timestamp + (60 - $minutes) * 60;

		// Round the time value to the nearest interval (4, 8, 12)
		$hours = $hours % 4 == 0 ? 0 : $hours % 4;
		$timestamp = $timestamp + (4 - $hours) * 3600;

		// Remove 1 hour if timestamp is a regular release (LOOK $x)
		if( $x ) $timestamp = $timestamp - 3600;
		return $timestamp;
	}

	public function getSites()
	{
		$data = json_encode($this->sites_model->getSites());
		echo $data;
	}

	public function getFirstEventRelease($event_id)
	{
		$data = json_encode($this->monitoring_model->getFirstEventRelease($event_id));
		echo $data;
	}

	// public function showSavedAlerts() // CAUTION - unused codes
	// {
	// 	$data = $this->monitoring_model->getAlertsForVerification();
	// 	echo "$data";
	// }

	public function saveToVerificationTable()
	{
		$data['site'] = $_POST["site"];
		$data['timestamp'] = $_POST["timestamp"];
		$data['alert'] = $_POST["alert"];
		$data['type'] = $_POST["type"];
		$data['status'] = $_POST["status"];
		$data['reason'] = $_POST["reason"];
		$data['last_updated'] = $_POST["last_updated"];

		$id = $this->monitoring_model->insert('alert_verification', $data);
		if($id > 0) echo "$id";
		else echo "null";
	}

	public function changeFile($id)
	{
		copy( $_SERVER['DOCUMENT_ROOT'] . "/temp/data/p" . $id . "/PublicAlert.json", $_SERVER['DOCUMENT_ROOT'] . "/temp/data/PublicAlert.json" );
		echo $id;
	}

	public function processAlerts()
	{
		$latest = $_POST['latest'];
		$extended = $_POST['extended'];
		$overdue = $_POST['overdue'];
	}

	public function getStaffNames($include_inactive = false)
	{
		if ($include_inactive === "1") $include_inactive = true;
		echo json_encode($this->users_model->getDEWSLUsers($include_inactive));
	}

	public function is_logged_in() 
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
		else {
		}
	}
}

/* End of file monitoring.php */
/* Location: ./application/controllers/monitoring.php */

?>
