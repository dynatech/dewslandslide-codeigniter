<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subsurface_page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('site_level_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->is_logged_in();
		$page = 'Sub-Surface Level';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('templates/footer');
		$this->load->view('data_analysis/subsurface', $data);
	}

	public function getAllSiteNames(){
		$result = $this->site_level_model->getSiteNames();
		print json_encode($result);
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