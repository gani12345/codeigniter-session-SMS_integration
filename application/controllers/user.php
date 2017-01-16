<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library("Session");
		$this->load->helper('string');

		header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
       	header("Pragma: no-cache"); // HTTP 1.0.
       	header("Expires: 0");
	}


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('user/index');
	}

	public function login()
	{
		$name=$this->input->post("username");
		$pass=md5($this->input->post("password"));

		$data=$this->user_model->user_exist($name,$pass);
		if($data){
			// $this->session->set_userdata($data);
			$this->load->view('template/header');
			$this->load->view('sms/index');
			// redirect("sms/index");
		}else{
			redirect("user");
		}
	}

  public function logout(){
		$this->session->set_userdata(array('is_logged_in'=>false));
		redirect("user");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */