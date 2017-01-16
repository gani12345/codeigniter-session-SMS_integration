<?php
class smsdj_model extends CI_Model{

	public function save_sms_data($sms_log){
        log_message("info","msg".json_encode($sms_log));
        $data=$this->db->insert("sms_log",$sms_log);
        return $data;
    }
}
?>