<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backgroundhelper  {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

            private $db_properties="";
            private $db="";
            public function __construct() {
            $CI =&get_instance();
            $CI->load->database();
            $this->db = $CI->db;
            $this->db_properties=array(
            'driver'=> 'mysql',
            'host'=> '127.0.0.1',
            'dbname'=> DB_DATABASE,
            'user'=> DB_USERNAME,
            'password'=> DB_PASSWORD);
            }

   public function createemail_background($to,$subject,$message){
        require_once APPPATH.'libraries/DJJob.php';
        require_once APPPATH.'libraries/emaildjjob.php';
        //$message="mabba mental dharawad";
        DJJob::configure($this->db_properties);
         $mj = new Emaildjjob($to,$subject,$message);
        //$mj = new Narasappa('a','b',$to,$subject,$message);
        DJJob::enqueue($mj);
   }


    public function createsms_background($sms_message,$contact,$count){
        echo "Hi sms";
        require_once APPPATH.'libraries/DJJob.php';
        require_once APPPATH.'libraries/smsdjjob.php';
        DJJob::configure($this->db_properties);
        $mj = new Smsdjjob($sms_message,$contact,$count);
      //  DJJob::enqueue(new Smsdjjob("delayed_job"));
        DJJob::enqueue($mj);
        echo "hi";
    }

    public function transactionalsms_background($sms_message,$contact,$count){
        echo "Hi sms";
        require_once APPPATH.'libraries/DJJob.php';
        require_once APPPATH.'libraries/prosmsdjjob.php';
        DJJob::configure($this->db_properties);
        $mj = new Prosmsdjjob($sms_message,$contact,$count);
      //  DJJob::enqueue(new Smsdjjob("delayed_job"));
        DJJob::enqueue($mj);
        echo "hi";
    }

    /*public function create_invoiceemail_background($to,$subject,$message,$attachfile){
        require_once APPPATH.'libraries/DJJob.php';
        require_once APPPATH.'libraries/invoicemaildjjob.php';

        DJJob::configure($this->db_properties);
        $mj = new Invoicemaildjjob($to,$subject,$message,$attachfile);
        DJJob::enqueue($mj);
   }

   public function createpromosms_background($message,$to,$userid){
        require_once APPPATH.'libraries/DJJob.php';
        require_once APPPATH.'libraries/promosms.php';
        DJJob::configure($this->db_properties);
        $mj = new Promosms($message,$to,$userid);
        DJJob::enqueue($mj);
    }*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
