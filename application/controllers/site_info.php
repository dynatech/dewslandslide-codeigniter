<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_info extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('site_information_model');
	}
	public function index() {
		$this->is_logged_in();
		$page = 'Site Information Page';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('misc/site_info');
		$this->load->view('templates/beta/footer');
	}

	public function insertNewSite($data){
		$data = array(
			"site_code" => $this->input->post('name'),
			"purok" => $this->input->post('name'),
			"sitio" => $this->input->post('name'),
			"barangay" => $this->input->post('name'),
			"municipality" => $this->input->post('name'),
			"province" => $this->input->post('name'),
			"region" => $this->input->post('name'),
			"psgc" => $this->input->post('name'),
			"active" => $this->input->post('name'),
			"households" => $this->input->post('name'),
			"season" => $this->input->post('name')
		);

		$query = $this->site_information_model->insertNewSite($data);
		return $query;
	}

	public function updateSite($site_id, $data){
		$data = array(
			"site_code" => $this->input->post('name'),
			"purok" => $this->input->post('name'),
			"sitio" => $this->input->post('name'),
			"barangay" => $this->input->post('name'),
			"municipality" => $this->input->post('name'),
			"province" => $this->input->post('name'),
			"region" => $this->input->post('name'),
			"psgc" => $this->input->post('name'),
			"active" => $this->input->post('name'),
			"households" => $this->input->post('name'),
			"season" => $this->input->post('name')
		);

		$query = $this->site_information_model->updateSite($data);
		return $query;
	}

	public function deleteSite($site_id){
		$query = $this->site_information_model->deleteSite($site_id);

		return $query;
	}

	public function getSiteInformation($site_id){
		$sites = $this->site_information_model->getSiteInformation($site_id);

		return json_encode($sites);
	}

	public function getAllSites(){
		$sites = $this->site_information_model->getSites();

		return json_encode($sites);
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
}
?>