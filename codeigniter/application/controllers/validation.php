<?php

/*class Validation extends CI_Controller
{
	function __constructor()
	{
		parent::__constructor();
		$this->load->model('user','',TRUE);
	}

function index()
{
	$this->load->library('form_validation');
  $this->form_validation->set_rules('username', 'Username','required');
  $this->form_validation->set_rules('password', 'Password','required|callback_check_login');*/
	//$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 
 /*if(!$this->form_validation->run())
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
    //echo "error";
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }*/

/* function check_login($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');

   //query the database
   $this->load->model('user','',TRUE);
   $result = $this->user->login($username, $password);

   if($result)
   {*/

     /*$user_id = $result['user_id']; 
     $this->load->model('user');
     $this->user->start_session($user_id);  */  
    /* $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'user_id' => $row->user_id,
         'username' => $row->user_name,
          'current_question' => "",
          'current_session' => ""
       );
       $this->load->model('user');
       $current_session = $this->user->log_session($sess_array['user_id']);   // Set session data for each user 
       $sess_array['current_session'] = $current_session;
      
       $this->session->set_userdata('user', $sess_array);
      // print_r($this->session->userdata('home'));
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}*/

?>