<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rainfall_scanner extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('pubrelease_model');
		$this->load->model('sites_model');
	}

	public function index () {
		$this->is_logged_in();
		$page = 'Rainfall Scanner Page';
		$data['first_name'] = $this->session->userdata('first_name');
		$data['last_name'] = $this->session->userdata('last_name');
		$data['user_id'] = $this->session->userdata("id");
		
		$data['title'] = $page;
		
		$sites = $this->sites_model->getSitesWithRegions();

		$regions = [];
		$provinces = [];
		foreach ($sites as $site) {
			array_push($regions, $site->region);
			array_push($provinces, $site->province);
		}
		$data["regions"] = array_unique($regions);
		asort($provinces);
		$data["provinces"] = array_unique($provinces);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('templates/footer');
		$this->load->view('data_analysis/rainfall_scanner', $data);
	}

	public function getRainfallPercentages () {
		try {
            $paths = $this->getOSspecificpath();
        } catch (Exception $e) {
            echo "Caught exception: ",  $e->getMessage(), "\n";
        }

        $exec_file = "getAllSitesRainfallSummary.py";

        $command = "{$paths["python_path"]} {$paths["file_path"]}$exec_file";
        exec($command, $output, $return);
        // output is an array [<timestamp of execution>, <runtime>, <actual data array>]
        $return = $output[sizeof($output)-1];
		echo json_encode($return);
	}

	public function getSitesWithRegions () {
		$sites = json_encode($this->sites_model->getSitesWithRegions());
		echo json_encode($sites);
	}

	private function getOSspecificpath () {
        $os = PHP_OS;
        $python_path = "";
        $file_path = "";

        if (strpos($os, "WIN") !== false) {
            $python_path = "C:/Users/Dynaslope/Anaconda2/python.exe";
            $file_path = "C:/xampp/updews-pycodes/Liaison/";
        } elseif (strpos($os, "UBUNTU") !== false || strpos($os, "Linux") !== false) {
            $python_path = "/home/ubuntu/miniconda2/bin/python";
            // $python_path = "/home/swat/anaconda2/bin/python";
            $file_path = "/var/www/updews-pycodes/web_plots/";
        } else {
            throw new Exception("Unknown OS for execution... Script discontinued...");
        }

        return array(
            "python_path" => $python_path, 
            "file_path" => $file_path
        );
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