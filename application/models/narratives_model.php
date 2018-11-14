<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narratives_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Note: This function was taken from accomplishment model. 
     **/
    public function getNarrativesForShift($event_id, $start, $end) {
        $this->db->where_in('event_id', $event_id);
        $this->db->where('timestamp >=', $start);
        if( $end != '' )$this->db->where('timestamp <=', $end);
        $this->db->order_by("timestamp", "asc");
        $query = $this->db->get('narratives');
        $result = $query->result_array();
        return $result;
    }

}

?>