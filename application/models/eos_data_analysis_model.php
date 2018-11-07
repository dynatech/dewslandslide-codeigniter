<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eos_data_analysis_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Note: This function was taken from accomplishment model. 
     **/
    public function getEndOfShiftDataAnalysis($shift_start, $event_id) {
        $selection = "analysis";
        $where_arr = array("event_id" => $event_id);

        if ($shift_start !== "all") $where_arr["shift_start"] = $shift_start;
        else $selection = "*";

        $this->db->select($selection)->from("end_of_shift_analysis")
            ->where($where_arr);
        $query = $this->db->get();
        
        if ($query->num_rows() ===  0) return array("analysis" => null);
        if ($shift_start === "all") return $query->result_object();
        return $query->result_object()[0];
    }

}

?>