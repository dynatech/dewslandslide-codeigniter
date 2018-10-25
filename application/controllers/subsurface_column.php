<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subsurface_column extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('subsurface_column_model');  
    }

    /**
     *  Subsurface Column APIs 
     */

    public function getSiteSubsurfaceColumns ($site_code) {
        $columns = $this->subsurface_column_model->getSiteSubsurfaceColumns($site_code);
        $temp_arr = array_unique(array_column($columns, "tsm_name"));
        $columns = array_values(array_intersect_key($columns, $temp_arr));

        echo json_encode($columns);
    }
}
?>