<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Surficial extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('surficial_model');
		$this->load->helper('url');
	}

	public function index() {
		echo "Surficial controller";
	}

    public function convertOldDataToRefDB () {
        $filename = "/home/swat/Desktop/tue_surficial.json";
        $file = fopen($filename, "r") OR die("Unable to open file $filename");
        $json = fread($file, filesize($filename));
        $json = json_decode($json);

        $timestamps = [];
        $markers = [];
        $site_id = 49;
        $lookup = ["meas_type", "observer_name", "weather"];

        foreach ($json as $key => $entry) {
            $ts = $entry->timestamp;
            if ($this->addKeyIfNotExist($ts, $timestamps)) {
                foreach ($lookup as $value) {
                    $timestamps[$ts][$value] = $entry->$value;
                }

                $timestamps[$ts]["reliability"] = $entry->reliability === "Y" ? 1 : 0;
                $timestamps[$ts]["site_id"] = $site_id;
                $timestamps[$ts]["ts"] = $ts;
                $timestamps[$ts]["data_source"] = "SMS";
                // $timestamps[$ts]["markers"] = [];
                $this->addKeyIfNotExist($ts, $markers);
            }

            $temp = array(
                "marker_name" => $entry->crack_id, 
                "measurement" => $entry->meas
            );

            // array_push($timestamps[$ts]["markers"], $temp);
            array_push($markers[$ts], $temp);
        }

        // insert m_observations
        // ---- get marker_id
        // ---- insert m_data 

        print "<pre>";
        foreach ($timestamps as $ts => $value) {

            $ret = $this->surficial_model->insertIfNotExists("marker_observations", $value);
            // $ret = array('does_exists' => false, "data" => 1);

            if ($ret["does_exists"] === false) {
                $mo_id = $ret["data"];
            } else {
                $mo_id = $ret["data"]->mo_id;
            }

            foreach ($markers[$ts] as $key => $marker) {
                $markers[$ts][$key]["mo_id"] = $mo_id;
                $marker_name = $markers[$ts][$key]["marker_name"];

                $marker_id = $this->surficial_model->getMarkerID($site_id, $marker_name);
                $markers[$ts][$key]["marker_id"] = $marker_id;

                unset($markers[$ts][$key]["marker_name"]);

                $update = $markers[$ts][$key];

                // var_dump($update);

                $ret2 = $this->surficial_model->insertIfNotExists("marker_data", $update);
                if ($ret2["does_exists"] === true) {
                    $data_id = $ret2["data"]->data_id;
                    $this->surficial_model->update("data_id", $data_id, "marker_data", $update);
                }
            }

            var_dump($timestamps[$ts]);
            var_dump($markers[$ts]);
        }
        print "</pre>";

        fclose($file);
    }

    private function addKeyIfNotExist ($key, &$arr) {
        if(!array_key_exists($key, $arr)) {
            $arr[$key] = [];
            return true;
        }
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