<?php

class Question extends CI_Model
{
	
	function fetch_question($data)
	{
		//print_r($data);
		$user_id = $data['user_id'];
		$query = $this->db->query("SELECT * FROM `question` WHERE `question_id` NOT IN (SELECT `question_id` FROM `attempt` WHERE `user_id` = '$user_id') LIMIT 1");
		if($query->num_rows()!=0)
			return $query->row();
		else
			return false;		
	}

	function log_attempt($question_id,$response,$user_id,$answer_status,$total_time,$session)
	{
		$date = date('Y-m-d H:i:s');
		$log_attempt = array('attempt_id'=>'', 'user_id'=>$user_id , 'question_id'=>$question_id,'response'=>$response,'session_id'=>$session,'total_time'=>$total_time,'date'=>$date,'answer_status'=>$answer_status);
		$this->db->insert('attempt',$log_attempt);
	}

	function check_answer($question_id,$response)
	{
		$this->db->SELECT('*');
		$this->db->WHERE('correct_answer',$response );
		$this->db->WHERE('question_id' ,$question_id);
		$query = $this->db->get('question');
		//$query = $this->db->query("SELECT * FROM `question` WHERE `correct_answer`='$response' AND `question_id`=$question_id");
		
		if($query->num_rows() !=0)
			return 1;
		else 
			return 0;
	}
}