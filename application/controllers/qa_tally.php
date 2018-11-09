<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Qa_tally extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$config_app = switch_db("senslopedb", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
		$this->load->helper(array('form', 'url'));
		$this->load->model('qa_tally_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->is_logged_in();
		$page = 'Quality Assurance';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		$this->load->view('templates/beta/header', $data);
        $this->load->view('templates/beta/nav');
		$this->load->view('reports/qa_tally_handlebars');
		$this->load->view('reports/qa_tally_page');
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

	public function getAllSitesOnEvent() {

	}

	public function getAllSitesOnExtended() {

	}

	public function getAllRecipientsForEventSites() {

	}

	public function getAllRecipientsForExtendedSites() {

	}

	public function addActualSentEWIforEvent() {

	}

	public function addActualSentEWIforExtended() {

	}

	public function getDailyRecordForEvent() {
		$config_app = switch_db("commons_db", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
	}

	public function getDailyRecordForExtended() {
		$config_app = switch_db("commons_db", "localhost");
		$this->db = $this->load->database($config_app, TRUE);
	}
}
?>