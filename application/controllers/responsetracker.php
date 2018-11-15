<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Responsetracker extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('responsetracker_model');
	}

	public function index() {
		$this->is_logged_in();

		$page = 'Response Tracker';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		$data['jquery'] = "old";
		$data['title'] = $page;

		$this->load->view('templates/beta/header', $data);
		$this->load->view('templates/beta/nav');
		$this->load->view('communications/responsetracker');
		$this->load->view('templates/beta/footer');
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

	public function getPerson(){
		$persons = [];
		$i = 0;
		$result = $this->responsetracker_model->getPerson();
		foreach ($result->result() as $data) {
			$persons[$i]['firstname'] = $data->firstname;
			$persons[$i]['lastname'] = $data->lastname;
			$persons[$i]['prefix'] = $data->prefix;
			$persons[$i]['office'] = $data->office;
			$persons[$i]['sitename'] = $data->sitename;
			$persons[$i]['number'] = $data->number;
			$i++;
		}
		$results['data'] = $persons;
		$results['type'] = 'person';
		print json_encode($results);
	}

	public function getSite(){
		$sites = [];
		$result = $this->responsetracker_model->getSite();
		foreach ($result->result() as $data) {
			array_push($sites, $data->sitename);
		}
		$results['data'] = $sites;
		$results['type'] = 'site';
		print json_encode($results);
	}

	public function analyticsPerson(){
		$data = json_decode($_POST['person']);

		$fullname = explode(",",$data->filterKey);

		$number = [];
		$firstname = $fullname[1];
		$lastname = $fullname[0];
		if (sizeof($fullname) > 3) {
			for ($i = 2; $i < sizeof($fullname); $i++){
				array_push($number,$fullname[$i]);
			}
		} else {
			array_push($number,$fullname[2]);
		}

		$timestamp_collections = [];
		$result = $this->responsetracker_model->getPersonSite($firstname,$lastname,$number);

		foreach ($result->result() as $site) {
			$chatTimeStamps = $this->getAnalyticsPerson($firstname,$lastname,$site,$data->period,$data->current_date,$number[0]);
			$timestamp_collections[$site->sitename] = $chatTimeStamps;
		}
		print json_encode($timestamp_collections);
	}

	public function analytics(){
		$post_data = json_decode($_POST['input']);
		$data['category'] = $post_data->category;

		if ($data['category'] == 'site'){
			$data['site_name'] = $post_data->site_name;
		}else if ($data['category'] == 'person'){
			$data['firstname'] = $post_data->firstname;
			$data['lastname'] = $post_data->lastname;
		}
		
		$data['period'] = $post_data->period;
		$data['current_date'] = $post_data->current_date;

		$chatTimeStamps = $this->responsetracker_model->getChatTimeStamps($data);
		print json_encode($chatTimeStamps);
	}

	// public function analyticsSite(){
	// 	$data = json_decode($_POST['site']);
	// 	$timestamp_collections = [];
	// 	$result = $this->responsetracker_model->getSitePersons($data->filterKey);
	// 	foreach ($result->result() as $person) {
	// 		$chatTimeStamps = $this->getAnalyticsSite($person->number,$data->period,$data->current_date,$data->filterKey);
	// 		$timestamp_collections[$person->office." - ".$person->firstname." ".$person->lastname] = $chatTimeStamps;
	// 	}
	// 	print json_encode($timestamp_collections);
	// }

	// public function getAnalyticsSite($number,$period,$current_date,$site){
	// 	$data['number'] = [(object) array('number'=> $number)];
	// 	$data['period'] = $period;
	// 	$data['site'] = $site;
	// 	$data['current_date'] = $current_date;
	// 	$data['category'] = "site";
	// 	$timeStamps = $this->responsetracker_model->getChatTimeStamps($data);
	// 	return $timeStamps;
	// }

	// public function getAnalyticsAllSite($period,$current_date){
	// 	// $data['number'] = $numbers;
	// 	$data['period'] = $period;
	// 	// $data['site'] = $sitenames;
	// 	$data['current_date'] = $current_date;
	// 	$data['category'] = "allsites";
	// 	$timeStamps = $this->responsetracker_model->getChatTimeStamps($data);
	// 	return $timeStamps;
	// }

	// public function getAnalyticsPerson($firstname,$lastname,$site,$period,$current_date,$number){
	// 	$data['firstname'] = $firstname;
	// 	$data['lastname'] = $lastname;
	// 	$data['sitename'] = $site;
	// 	$data['period'] = $period;
	// 	$data['current_date'] = $current_date;
	// 	$data['category'] = "persons";
	// 	$data['number'] = [(object) array('number'=> $number)];
	// 	$timeStamps = $this->responsetracker_model->getChatTimeStamps($data);
	// 	return $timeStamps;	
	// }

	public function getRegions(){
		$regions = $this->responsetracker_model->getAllRegions();
		print json_encode($regions);
	}

}