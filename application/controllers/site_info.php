<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_info extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->model('site_information_model'); // CAUTION - already replaced by the complied AIO sites_model
		$this->load->model('sites_model'); 
		// $this->output->enable_profiler(TRUE);
		// echo $this->session->userdata('id');
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

	public function insertNewSite(){
		$data = array(
			"site_code" => $this->input->post("site_code"),
			"purok" => $this->input->post("purok"),
			"sitio" => $this->input->post("sitio"),
			"barangay" => $this->input->post("barangay"),
			"municipality" => $this->input->post("municipality"),
			"province" => $this->input->post("province"),
			"region" => $this->input->post("region"),
			"psgc" => $this->input->post("psgc"),
			"households" => $this->input->post("households"),
			"season" => $this->input->post("season"),
			"active" => $this->input->post("is_active")
		);

		$query = $this->sites_model->insertNewSite($data);

		echo $query;
	}

	public function updateSite(){
		$data = array(
			"site_code" => $this->input->post("site_code"),
			"purok" => $this->input->post("purok"),
			"sitio" => $this->input->post("sitio"),
			"barangay" => $this->input->post("barangay"),
			"municipality" => $this->input->post("municipality"),
			"province" => $this->input->post("province"),
			"region" => $this->input->post("region"),
			"psgc" => $this->input->post("psgc"),
			"households" => $this->input->post("households"),
			"season" => $this->input->post("season"),
			"active" => $this->input->post("is_active")
		);
		$site_id = $this->input->post("site_id");

		$query = $this->sites_model->updateSite($site_id, $data);
		echo $query;
	}

	public function deleteSite(){
		$site_id = $this->input->post("site_id");
		$query = $this->sites_model->deleteSite($site_id);
		
		echo $query;
	}

	public function getAllSites(){
		$all_sites = [];
		$sites = $this->sites_model->getCompleteSiteInformation("all",false);
		for ($counter = 0; $counter < sizeof($sites); $counter++) {
			$sites[$counter] = (array) $sites[$counter];
			$sites[$counter]['actions'] = "<div>".
			"<span class='update glyphicon glyphicon-pencil' aria-hidden='true' style='margin-right: 25%;'></span>".
			"<span class='delete glyphicon glyphicon-trash' aria-hidden='true' style='margin-right: 25%;'></span>".
			"</div>";
		}
		$all_sites = $sites;

		echo json_encode($all_sites);
	}

	public function is_logged_in() {
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