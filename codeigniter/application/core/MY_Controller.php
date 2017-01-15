<?php 

class MY_Controller extends CI_Controller {

public $user_id;
public $user_name;
public $current_session;
public $current_question;
function __construct()
{
	parent::__construct();


	if(!$this->session->userdata('user'))
		redirect('login', 'refresh');
	

}

function get_session_data()
{
	//$session_data = array();
    $session_data= $this->session->userdata('user');
	$this->user_id = $session_data['user_id'];
	$this->user_name = $session_data['username'];
	$this->current_session = $session_data['current_session'];
	$this->current_question = $session_data['current_question'];

}

/*function check_session()
{
	if($this->session->userdata('user'))
		return true;
	else
		return false;
}
*/


}



?>
