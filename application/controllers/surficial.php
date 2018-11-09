<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Surficial extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('surficial_model');
        $this->load->model('sites_model');
        $this->load->model('api_model');
		$this->load->helper('url');
	}

	public function index () {
        $data["title"] = "Surficial Markers Page";

        $data['user_id'] = $this->session->userdata("id");
        $data['first_name'] = $this->session->userdata('first_name');
        $data['last_name'] = $this->session->userdata('last_name');
        $data["sites"] = $this->sites_model->getCompleteSiteInformation("all", false);

		$this->load->view('templates/beta/header', $data);
        $this->load->view('templates/beta/nav');
        $this->load->view('data_analysis/surficial_markers_page', $data);
        $this->load->view('templates/beta/footer');
	}

    /**
     * Gets the surficial markers.
     *
     * @param      <type>          $site_code      The site code
     * @param      boolean|string  $filter_in_use  remove not used markers
     * @param      boolean|string  $complete_data  include description, latitude, longitude on return
     */
    public function getSurficialMarkers ($site_code, $filter_in_use = true, $complete_data = false) {
        $filter_in_use = $filter_in_use === "false" ? false : true;
        $complete_data = $complete_data === "true" ? true : false;
        
        $surficial_markers = $this->surficial_model->getSurficialMarkers($site_code, $filter_in_use, $complete_data);
        echo json_encode($surficial_markers);
    }

    public function getSurficialMarkerHistory ($marker_id) {
        $history = $this->surficial_model->getSurficialMarkerHistory($marker_id);
        echo json_encode($history);
    }

    public function insertNewMarker () {
        $desc = $_POST["description"];
        $lat = $_POST["latitude"];
        $long = $_POST["longitude"];

        $temp = array(
            "site_id" => $_POST["site_id"],
            "description" => $desc === "" ? null : $desc,
            "latitude" => $lat === "" ? null : $lat,
            "longitude" => $long === "" ? null : $long,
            "in_use" => $_POST["in_use"]
        );

        $marker_id = $this->api_model->insert("markers", $temp);
        
        $history_id = $this->api_model->insert("marker_history", array(
            "marker_id" => $marker_id, "event" => $_POST["event"]
        ));
        
        $this->api_model->insert("marker_names", array(
            "history_id" => $history_id, "marker_name" => $_POST["marker_name"]
        ));
        
        echo $marker_id;
    }

    public function updateSurficialMarker () {
        $event = $_POST["event"];
        $marker_id = $_POST["marker_id"];
        $desc = $_POST["description"];
        $lat = $_POST["latitude"];
        $long = $_POST["longitude"];

        if ($event === "rename") {
            $history_id = $this->api_model->insert("marker_history", array(
                "marker_id" => $marker_id, "event" => $event
            ));

            $this->api_model->insert("marker_names", array(
                "history_id" => $history_id, "marker_name" => $_POST["marker_name"]
            ));
        }

        $temp = array(
            "description" => $desc === "" ? null : $desc,
            "latitude" => $lat === "" ? null : $lat,
            "longitude" => $long === "" ? null : $long,
            "in_use" => $_POST["in_use"]
        );

        $this->api_model->update("marker_id", $marker_id, "markers", $temp);

        echo "success";
    }

    public function updateMarkerDataPointMeasurement () {
        $this->api_model->update("data_id", $_POST["data_id"], "marker_data", array("measurement" => $_POST["measurement"]));
    }

    public function deleteMarkerDataPointMeasurement () {
        $this->api_model->delete("marker_data", array("data_id" => $_POST["data_id"]));
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
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
			die();
		}
		else {
		}
	}
}
?>