<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_tagging extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->load->model('ewi_template_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	public function index() {
		$this->is_logged_in();
		$page = 'General Data Tagging';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
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

	public function addNewGeneralDataTag() {

	}

	public function updateGeneralDataTag() {

	}

	public function deleteGeneralDataTag() {

	}

	public function insertGenTagPoint() {

	}

	public function modifyGenTagPoint() {

	}

	public function removeGenTagPoint() {
		
	}
}
?>