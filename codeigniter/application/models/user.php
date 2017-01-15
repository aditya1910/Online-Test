<?php

class User extends CI_Model
{

function login($username,$password)
{
	$query = $this->db->query("SELECT `user_id`,`user_name` FROM `user` WHERE `user_name`= '$username' AND `password`= password('$password')");
	/*$this->db->SELECT('user_id,user_name');
	$this->db->from('user');
	$this->db->WHERE('user_name',$username);
	$this->db->WHERE('password',$password);
	$this->db->limit(1);
	$query = mysql_query($query);
	$query = $this->db->get('user');*/

	if($query->num_rows()==1)
		return $query->result();
	else
		return false;
}

function log_session($user_id)            // start a session when a user log in  
{
	$start_time = date("h:i:sa");
	$date = date('Y-m-d H:i:s');
	$session_data = array('session_id'=>'','user_id'=>$user_id,'start_time'=>$start_time,'end_time'=>'','date'=>$date);
	
	$this->db->insert('session',$session_data);
	//$this->db->query("INSERT INTO `session` VALUES('','$user_id','$start_time','','$date') ");   // change query here 
	$session = $this->db->insert_id();
	return $session;
	//echo $session;


}

function log_end_time($current_session)                // end the session when the user logout and update the end time of the session 
{
	$end_time = array('end_time'=>date("h:i:sa"));
	$this->db->WHERE('session_id',$current_session);
	$this->db->update('session',$end_time);
	//$this->db->query("UPDATE `session` SET `end_time`='$end_time' WHERE `session_id`='$current_session'");

}

}
?>