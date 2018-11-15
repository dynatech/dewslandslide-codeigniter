<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sensor_overview extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('sensor_overview_model');  
    }

	public function index() {
		$this->is_logged_in();
		$page = 'Dataloggers and Sensors Overview';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");

        date_default_timezone_set('Asia/Manila'); 
		
		$data['title'] = $page;
		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('data_analysis/sensor_overview');
		$this->load->view('templates/beta/footer');
	}

	public function deactivatedSensors () {
		$data = [];
		$deactivated_sensors = 
		$this->sensor_overview_model->getDeactivatedSensors();

		array_push($data, $deactivated_sensors, "#deact-sensor", "Deactivated Sensor Columns", "#deact-sensor-div");
		echo json_encode([$data]);
	}

	public function deactivatedLoggers () {
		$data = [];
		$deactivated_loggers = 
		$this->sensor_overview_model->getDeactivatedLoggers();

		array_push($data, $deactivated_loggers, "#deact-sensor", "Deactivated Dataloggers", "#deact-logger-div");
		echo json_encode([$data]);
	}
	
	public function loggerHealth () {
		$data = [];
		$logger_health = 
		$this->sensor_overview_model->getLoggerHealth();

		array_push($data, $logger_health, "#logger-health");
		echo json_encode([$data]);
	}

	public function rainHealth () {
		$data = [];
		$rain_health = 
		$this->sensor_overview_model->getRainHealth();

		array_push($data, $rain_health, "#rain-gauges");
		echo json_encode([$data]);
	}

	public function somsHealth () {
		$data = [];
		$soms_health = 
		$this->sensor_overview_model->getSomsHealth();

		array_push($data, $soms_health, "#soil-moisture");
		echo json_encode([$data]);
	}

	public function piezoHealth () {
		$data = [];
		$piezo_health = 
		$this->sensor_overview_model->getPiezoHealth();

		array_push($data, $piezo_health, "#piezometer");
		echo json_encode([$data]);
	}

	public function is_logged_in () {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
            echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
            die();
        }
        else {
        }
    }
}
?>