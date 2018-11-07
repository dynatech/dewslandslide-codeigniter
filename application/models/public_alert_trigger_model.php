<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_alert_trigger_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     *  Note: This function was taken from accomplishment model. 
     **/
    public function getShiftTriggers($releases) {
        $this->db->where_in('release_id', $releases);
        $this->db->order_by("timestamp", "desc");
        $query = $this->db->get('public_alert_trigger');
        $result = $query->result_array();
        return $result;
    }

    public function getAllTriggers($events) {
        $this->db->where_in('event_id', $events);
        $this->db->order_by("timestamp", "desc");
        $query = $this->db->get('public_alert_trigger');
        $result = $query->result_array();
        return $result;
    }

}

?>