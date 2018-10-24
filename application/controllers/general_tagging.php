<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_tagging extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('general_data_tagging_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$config_app = switch_db("commons_db");
		$this->db = $this->load->database($config_app, TRUE);
	}
	public function index() {
		$this->is_logged_in();
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = 'General Data Tagging';
		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('general_tagging/crud_page');
		$this->load->view('templates/beta/footer');
	}

	public function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
			echo 'You don\'t have permission to access this page. <a href="../lin">Login</a>';
			die();
		}
		else {
		}
	}
	
	public function getGeneralDataTagViaID() {
		$data = $_POST['data'];
	}

	public function getAllGeneralDataTag() {
		$all_tags = [];
		$tags = $this->general_data_tagging_model->getAllGDT();
		for ($counter = 0; $counter < sizeof($tags); $counter++) {
			$tags[$counter] = (array) $tags[$counter];
			$tags[$counter]['actions'] = "<div>".
			"<span class='update glyphicon glyphicon-pencil' aria-hidden='true' style='margin-right: 25%;'></span>".
			"<span class='delete glyphicon glyphicon-trash' aria-hidden='true' style='margin-right: 25%;'></span>".
			"</div>";
		}
		$all_tags['data'] = $tags;
		echo json_encode($all_tags);
	}

	public function addNewGeneralDataTag() {
		$data = $_POST['data'];
	}

	public function updateGeneralDataTag() {
		$data = $_POST['data'];
	}

	public function deleteGeneralDataTag() {
		$data = $_POST['data'];
	}

	public function getGenTagPointViaID() {
		$data = $_POST['data'];
	}

	public function getAllGenTagPoint(){
		$result = $this->general_data_tagging_model->getAllGDTPoint();
		print json_encode($result);
	}

	public function getAllGenTagPointViaTagname() {
		$data = $_POST['data'];
	}

	public function insertGenTagPoint() {
		$data = $_POST['data'];
	}

	public function modifyGenTagPoint() {
		$data = $_POST['data'];
	}

	public function removeGenTagPoint() {
		$data = $_POST['data'];
	}
}
?>