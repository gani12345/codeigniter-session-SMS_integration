<?php 

class User_model extends CI_Model
{
	public function user_exist($name,$pass){
		$sql="select * from user where name=? and pass=?";
		$query=$this->db->query($sql,array('name'=>$name,'pass'=>$pass));
		if($query->num_rows() == 1)
		{
			// $data=array('is_logged_in'=>true);
			$this->session->set_userdata(array('is_logged_in'=>true));
			return true;
		}else{
			return false;
		}
	}
}

 ?>