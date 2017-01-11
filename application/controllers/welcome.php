<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library("Session");
		$this->load->helper('string');

		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
       	// header("Pragma: no-cache"); // HTTP 1.0.
       	// header("Expires: 0");
	}

	public function index()
	{	if($this->session->userdata('is_logged_in')){
			$this->load->view('template/header');
			$this->load->view('welcome_message');
		}else{
			redirect("user");
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */