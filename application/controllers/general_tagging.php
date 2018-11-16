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
	}
	
	public function getGeneralDataTagViaID() {
		$data = $_POST['data'];
		$result = $this->general_data_tagging_model->getGDTViaID($data['id']);
		echo json_encode($result);
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
		$data = $_POST['data_tags'];
		$result = $this->general_data_tagging_model->addGDT($data);
		echo json_encode($result);
	}

	public function updateGeneralDataTag() {
		$data = $_POST['data_tags'];
		$result = $this->general_data_tagging_model->updateGDT($data);
		echo json_encode($result);
	}

	public function deleteGeneralDataTag() {
		$data = $_POST['data_tags'];
		$result = $this->general_data_tagging_model->deleteGDT($data);
		$result = ($result == true) ? true : false;
		echo json_encode($result);
	}

	public function getGenTagPointViaID() {
		$data = $_POST['data'];
		var_dump($data);
	}

	public function getAllGenTagPoint(){
		$result = $this->general_data_tagging_model->getAllGDTPoint();
		print json_encode($result);
	}

	public function getAllGenTagPointViaTagname() {
		$data = $_POST;
		var_dump($data);
	}

	public function insertGenTagPoint() {
		$data = $_POST;
		$table_exists = $this->general_data_tagging_model->checkTableIfExisting($data['table']);
		if (sizeOf($table_exists) == 0) {
			$table_reference = $this->general_data_tagging_model->insertTableReference($data['table']);
		} else {
			$table_reference = $table_exists[0]->table_id;
		}
		$data_tags = $data["data_tag"];
		$result = null;
		foreach ($data_tags as $tag) {
			$config_app = switch_db("commons_db");
			$this->db = $this->load->database($config_app, TRUE);
			$tag_exists = $this->general_data_tagging_model->checkTagIfExisting($tag);
			// var_dump(sizeOf($tag_exists));
			if (sizeOf($tag_exists) == 0) {
				$tag_data = [
					"tag_name" => $tag,
					"tag_description" => $tag,
					"user" => $data['user_id']
				];
				$insert_tag_reference = $this->general_data_tagging_model->addGDT($tag_data);
				if ($insert_tag_reference == true) {
					$tag_reference = $this->general_data_tagging_model->getGDTViaTag($tag);
					$tag_reference = $tag_reference[0]->tag_id;
				} else {
					echo "RETURN";
				}
			} else {
				$tag_reference = $tag_exists[0]->tag_id;
			}
					
			// var_dump($tag_reference);
			switch ($data['type']) {
				case 'rainfall':
					$result = $this->insertRainfallGDT($data, $table_reference, $tag_reference);
					// var_dump($result);
					break;
				case 'surficial':
					$result = $this->insertSurficialGDT($data, $table_reference, $tag_reference);
					break;
				default:
					echo "No request";
					break;
			}
		}
		print $result;
	}

	public function insertSurficialGDT($data, $table_reference, $tag_reference) {
		$gdt_id  = $this->general_data_tagging_model->insertGDTPoint($data, $table_reference);
		$insert_gintag = $this->general_data_tagging_model->insertGDTReference($gdt_id,$tag_reference);
		return $insert_gintag;
	}

	public function insertRainfallGDT($data, $table_reference, $tag_reference) {
		$config_app = switch_db("senslopedb");
		$this->db = $this->load->database($config_app, TRUE);
		$rainfall_id = $this->general_data_tagging_model->getRainfallID($data,$table_reference);

		if (sizeOf($rainfall_id) != 0) {
			$start_id = $rainfall_id[0];
			$end_id = $rainfall_id[sizeOf($rainfall_id)-1];
		} else {
			return false;
		}
		$config_app = switch_db("commons_db");
		$this->db = $this->load->database($config_app, TRUE);
		$data = [
			"data_start_id" => $start_id->data_id,
			"data_end_id" => $end_id->data_id
			];
		$gdt_id  = $this->general_data_tagging_model->insertGDTPoint($data, $table_reference);
		$insert_gintag = $this->general_data_tagging_model->insertGDTReference($gdt_id,$tag_reference);
		return $insert_gintag;
	}

	public function modifyGenTagPoint() {
		$data = $_POST;
		var_dump($data);
	}

	public function removeGenTagPoint() {
		$data = $_POST;
		var_dump($data);
	}

	public function getAllTags(){
		$config_app = switch_db("commons_db");
		$this->db = $this->load->database($config_app, TRUE);
		$get_all_tags = $this->general_data_tagging_model->getAllGDT();
		$all_tags = [];
		foreach ($get_all_tags as $key) {
			array_push($all_tags, $key->tag_name);
		}
		echo json_encode($all_tags);
	}
}
?>