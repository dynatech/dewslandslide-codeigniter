<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lin extends CI_Controller {

	public function index() {
		//echo "testing lang";
		$data['main_content'] = 'login_form';
		$data['title'] = 'Login';
		$this->load->view('includes/template', $data);
	}

	public function validate_credentials() {
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if ($query['status']) {	//if the user's credentials validated

			$config_app = switch_db("senslopedb");
			$this->db = $this->load->database($config_app, TRUE);

			$data = $query['data'];
			$dataset = array (
				'id' => $data['user_id'],
				'username' => $this->input->post('username'),
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($dataset);
			redirect('/home');
		}
		else {
			$this->index();
		}
	}

	public function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	public function create_member() {
		$this->load->library('form_validation');
		// field name, error message, validation rules
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE) {
			$this->signup();
		}
		else {
			$this->load->model('membership_model');
			
			if ($query = $this->membership_model->create_member()) {
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else {
				$this->signup();
			}
		}
	}

	public function mobile_login(){
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		$data["result"] = $query;
		print json_encode($data);
	}
}