<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Error_custom_404 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
        $data["title"] = "Oh no! Page not found!";
        $data["first_name"] = "Login";
		$this->load->view('templates/beta/header', $data);

        $is_logged_in = $this->session->userdata('is_logged_in');
        $home_url = $is_logged_in ? "login" : "home";
?>
        <div class="container">
            <div class="row" id="header-row">
                <div class="col-sm-8">
                    <a class="navbar-brand" href="<?php echo base_url() + $home_url; ?>"><span id="project-name">PROJECT DYNASLOPE</span></a>
                </div>

                <div class="col-sm-4 text-right">
                    <span><img id="dynaslope-logo" src="/images/beta/dynaslope-logo.png" /></span>
                    <span class="nav-general-text text-center">
                        <div>IMPLEMENTED</div>
                        <div>AND FUNDED BY</div>
                    </span>
                    <span><img id="dost-phivolcs-logo" src="/images/beta/dost-phivolcs-logo.png" /></span>
                </div>
            </div>
        </div>
<?php        
        $this->output->set_status_header('404');        
        $this->load->view('pages/error_custom_404');
        $this->load->view('templates/beta/footer');
	}
}
?>