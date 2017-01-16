<?php

/**
*
*/
class Smsdjjob{
 var  $username;
 var  $hash;
 var  $sender;
 var  $host_url;
 var  $success_code;
 var  $smsmessage;
 var  $cnt;
 var $userid;
 var $CI;
 var $customer_name;
 var $date;
 var $cot;

 function   __construct($smsmessage,$contact_number,$count){
  //$this->CI =& get_instance();
  $this->username=urlencode(USERNAME);
  $this->hash=urlencode(USERHASH);
  $this->sender=urlencode(SENDER);
  $this->host_url=HOST;
  $this->success_code=SUCESSCODE;
  $this->smsmessage=rawurlencode($smsmessage);
  $this->cnt=$contact_number;
  $this->cot=$count;
  
 }

 public function perform(){
  echo "SMSjjob perform is calling";
  echo $this->cnt;
  log_message("info","messagesssssss".json_encode($this->cot));
  // log_message("info","messagessss".json_encode($this->cot));
  
  #$ch = curl_init();
  $this->cnt= implode(',', $this->cnt);
 
  $data = $this->host_url.'username='.$this->username.'&hash='.$this->hash.'&numbers='.$this->cnt."&sender=".$this->sender."&message=".$this->smsmessage;
  

  #$sms_api=$this->host_url."username=".$this->username."&password=".$this->password."&message=".$message."&sender=".$this->sender."&numbers=".$numbers."&test=".$test;
  
  #print_r($sms_api);
  log_message("info","SMS URL".json_encode($data));
  $ch = curl_init($data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  #$response = curl_exec($ch);
  #curl_close($ch);
  #curl_setopt($ch,CURLOPT_URL,$sms_api);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_VERBOSE, 1);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  $output=curl_exec($ch);
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $header = substr($output, 0, $header_size);
  $body = substr($output, $header_size);
  curl_close($ch);
  echo ($output);
  //$user_id="1";
  if (strpos($header,'200 OK') !== false) {
   $data=$this->create_sms_log($this->cnt,$this->smsmessage,date( 'Y-m-d H:i:s'),1,$this->cot);
   return $data;
   log_message("info","Inserted...");
  }
 }
 
public function create_sms_log($contact_number,$smsmessage,$date,$user_id,$count){
  $this->CI =& get_instance();
  $this->CI->load->model('smsdj_model');
  $sms_log=array(
                  "contact" => $contact_number,
                  "sent_msg" =>urldecode($smsmessage),
                  "sent_at"=>$date,
                  "user_id"=>$user_id,
                  "count"=>$count);
   $msg=$this->CI->smsdj_model->save_sms_data($sms_log);

log_message('infooo',"saveddd...".json_encode($msg));

}

}

?>

