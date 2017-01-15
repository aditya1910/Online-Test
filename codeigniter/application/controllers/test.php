<?php 

class Test extends MY_Controller
{


function __construct()
{
	parent::__construct();

}

function index()
	{
	
             $data = array();
            // $session_data = $this->get_session_data();
             $this->get_session_data();
             $data['username'] = $this->user_name;
             $data['user_id'] = $this->user_id;
             $data['current_session'] = $this->current_session;
             $this->load->model('question');                                 // load question model
             $question = $this->question->fetch_question($data);            // fetch question one by one from model 
          if(!$question)
                redirect('login/home','refresh');
          else{
                     $data['current_question'] = $question->question_id;   
                     $this->session->set_userdata('user', $data);                 // assign value to current question to session array
                                                                                // print the questions 
                    $question_path = array();
                    switch ($question->question_type) {
                          case 1:
                              $question_content = explode("#", $question->question_content);
                             $question_path = array('question_path' => '../audio/'.$question_content[1], 'question_text'=>$question_content[2],'user_name' =>$data['username']);
                             // $question = (object) array_merge( (array)$question, array('question_path' => '../audio/'.$question_content[1], 'question_text'=>$question_content[2],'user_name' =>$data['username']));
                              break;
                          case 2:
                              $question_content = explode("@", $question->question_content);
                              $question_path = array('question_path' => '../video/'.$question_content[1], 'question_text'=>$question_content[2],'user_name' =>$data['username']);
                             //   $question = (object) array_merge( (array)$question, array('question_path' => '../video/'.$question_content[1], 'question_text'=>$question_content[2],'user_name' =>$data['username'])); // Append question path and text with the question object .
                              break;
                          default:
                          $question_path = array('question_path' => $question->question_content, 'question_text'=>$question->question_content,'user_name' =>$data['username']);
                         // $question = (object) array_merge( (array)$question, array('question_path' => $question->question_content, 'question_text'=>$question->question_content,'user_name' =>$data['username']));
                  }
                  $question = (object) array_merge( (array)$question, $question_path);

                  //  print_r($question);

                    
             $this->parser->parse('test',$question); 
           }  
 }
 

    function answer(){

      $response = $_POST['response'];    // response answer from the user 
      $total_time =$_POST['time'];      // total time for each question 
      $this->get_session_data();
      
      $user_id = $this->user_id;
      $current_question = $this->current_question;
      $question_id = $this->current_question;
      $current_session = $this->current_session;
     
      $this->load->model('question');
      $answer_status = $this->question->check_answer($question_id,$response);
      echo $answer_status;
    
      $this->question->log_attempt($question_id,$response,$user_id,$answer_status,$total_time,$current_session); 
     }


}