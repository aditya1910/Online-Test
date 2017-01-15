<?php
//session_start(); //we need to call PHP's session object to access it through CI
/*class Home extends MY_Controller {

 function __construct()
 {
   parent::__construct();
   // print_r($this->session->userdata('home'));
   // exit();

 }
*/

 /*function index()
 {
   //print_r($this->session->userdata('home'));

   if($this->get_session_data())
   {
     $session_data = $this->get_session_data();
     $data['username'] = $session_data['username'];
     $data['user_id'] = $session_data['user_id'];
     
     $this->load->view('home', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }*/

/* function logout()
 {
    $session_data = $this->get_session_data();  // set session end time after logout 
    $this->load->model('user');
    $this->user->log_end_time($session_data['current_session']);
   $this->session->unset_userdata('home');
   session_destroy();
   redirect('login', 'refresh');
 }*/

}
?>