<?php
class Sms extends CI_Controller{
	public function __construct() {
	parent::__construct();
	$this->load->library('Session');
    $this->load->helper('string');
    $this->load->library('sms_lib');
    // $this->load->library('backgroundhelper');
    // $this->load->library('form_validation');
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0");
	}

	public function index()
	{
	  if($this->session->userdata('is_logged_in')){
	    $smsmessage = $this->input->post('msg');
	    $contact = $this->input->post('contact');

	  
	     $sms_length=strlen($smsmessage);
	      if($sms_length < 160){
	        $count =1;
	      }else if($sms_length > 160 &&  $sms_length <320){
	        $count =2;
	      }else if($sms_length > 320 &&  $sms_length <480){
	        $count =3;
	      }else if($sms_length > 480 &&  $sms_length < 640){
	        $count =4;
	      }
	     
	        $smsapi=$this->sms_lib->create_sms($smsmessage,$contact,$count); 
	        // $this->backgroundhelper->createsms_background($smsmessage,array($contact),$date,$count);
	       	$this->load->view('template/header');
			$this->load->view('sms/index');
	      }else{
	    	redirect('user');	
	      }
	}

}