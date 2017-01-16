<?
//4/wvxO3nUKcVnUb1G3Bl5fq5qPZnWyZJiB1NLGJAVKi5g
//4/ORwMeGCNTYWd2-gLCpoZPJnvG5rWeFYZDUmlyNz9BmA
//gem install google-api-client
class Backgroundrunner extends CI_Controller
{

    public function __construct() {
        parent::__construct();

    }

        public function execute_delayed_job(){
            require_once APPPATH.'libraries/DJJob.php';
            #require_once APPPATH.'libraries/emaildjjob.php';
            require_once APPPATH.'libraries/smsdjjob.php';
            require_once APPPATH.'libraries/prosmsdjjob.php';
            #require_once APPPATH.'libraries/invoicemaildjjob.php';
            #require_once APPPATH.'libraries/promosms.php';
            /*$db = $this->db->database;
            log_message("info","DB Name".json_encode($db));*/
            $db_properties=array(
            'driver'=> 'mysql',
            'host'=> '127.0.0.1',
            'dbname'=> $this->db->database,
            'user'=> $this->db->username,
            'password'=> $this->db->password);
            DJJob::configure($db_properties);
            $worker = new DJWorker(array('queue' => 'default'));
            $worker->start();
        }

}
?>