<?php 

class Login extends CI_Controller

 {
	 function __construct()
 {
   parent::__construct();
 }

	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login');

	}

function validation()
{
	$this->load->library('form_validation');
  $this->form_validation->set_rules('username', 'Username','required');
  $this->form_validation->set_rules('password', 'Password','required|callback_check_login');
 
 if(!$this->form_validation->run())
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
    
   }
   else
   {
     //Go to private area
     redirect('login/home', 'refresh');
   }

 }

 function check_login($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');

   //query the database
   $this->load->model('user','',TRUE);
   $result = $this->user->login($username, $password);

   if($result)
   {

     $sess_array = array();
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


 function home()
 {
   if($this->session->userdata())
   {
     //$session_data = $this->get_session_data();
     $session_data = $this->session->userdata('user');
     $data['username'] = $session_data['username'];
     $data['user_id'] = $session_data['user_id'];
     $this->load->view('home', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

  function logout()
 {
    $session_data = $this->session->userdata('user'); // set session end time after logout 
    $this->load->model('user');
    $this->user->log_end_time($session_data['current_session']);
   $this->session->unset_userdata('user');
   session_destroy();
   redirect('login', 'refresh');
 }

}