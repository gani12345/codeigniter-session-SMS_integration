<?php

/**
*
*/
class Sms_lib{
 var  $username;
 var  $password;
 var  $host_url;
 var  $success_code;
 var  $CI;
 var  $hash;


 function   __construct(){
  $this->username=SMSLIBUSERNAME;
  $this->hash=SMSLIBHASH;
  $this->sender="CCAVIJ";
  $this->host_url=HOST;
  $this->success_code=SUCESSCODE;
 }


 public function create_sms($message,$numbers,$count){  
  $message = urlencode($message);
  $test = "0";
  $sms_api = "username=".$this->username."&hash=".$this->hash."&message=".$message."&sender=".$this->sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $sms_api);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  $output = curl_exec($ch); // This is the result from the API
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $header = substr($output, 0, $header_size);
  $body = substr($output, $header_size);
  curl_close($ch);
  
  if (strpos($header,'200 OK') !== false) {
   // $data=$this->create_sms_log($numbers,$message,date( 'Y-m-d H:i:s'),1,$count);
   // return $data;
   log_message("info","Inserted...");
  }  

  // return $sms_api;
 }

// public function create_sms_log($numbers,$message,$date,$user_id,$count){
//   $this->CI =& get_instance();
//   $this->CI->load->model('smsdj_model');
//   $sms_log=array( "contact" => $numbers,
//                   "sent_msg" =>urldecode($message),
//                   "sent_at"=>$date,
//                   "user_id"=>$user_id,
//                   "count"=>$count);
//   $msg=$this->CI->smsdj_model->save_sms_data($sms_log);
//   log_message('infooo',"saveddd...".json_encode($msg));
//   return 0;
// }



}

?>

