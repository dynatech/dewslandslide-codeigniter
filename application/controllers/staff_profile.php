<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('staff_profile_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}


	public function index() {
		$this->is_logged_in();

		$page = 'Staff Profile';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('pages/staff_profile_page');
		$this->load->view('templates/beta/footer');
	}

	public function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
	}

	public function getStaffProfile()  {
		$result = $this->staff_profile_model->staffProfile($_POST['id']);
		print json_encode($result->result());	
	}

	public function  getAllStaffProfile() {
		$result = $this->staff_profile_model->getAll();
		print json_encode($result->result());
	}

	public function changeProfilePic() {

	}

	public function updateStaffProfile() {

	}

	public function addNewProfile() {

	}

}
?>