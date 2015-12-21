<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); 
class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('User','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   //$this->load->library('form_validation');
   //var_dump($this->form_validation->set_rules('user_login', 'user_login', 'trim|required|xss_clean'));
   $this->form_validation->set_rules('user_login', 'user_login', 'trim|required');
   $this->form_validation->set_rules('user_password', 'user_password', 'trim|required|callback_check_database');
    //echo "1111111";
   if($this->form_validation->run() == FALSE)
   {
        //echo "222222";
        //Field validation failed.  User redirected to login page
        $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
     
   //Field validation succeeded.  Validate against database
    $username = $this->input->post('user_login');
    //var_dump($username);
   //query the database
   
    $this->load->model('User');
    $result = $this->User->login($username, $password);
    
   if($result)
   {
    $sess_array = array();
    foreach($result as $row){
        $sess_array = array(
            'user_id' => $row->user_id,
            'user_login' => $row->user_login,
            'user_name' => $row->user_name,
            'user_Management' => $row->user_Management,
            'user_Section' => $row->user_Section,
            'user_jod' => $row->user_jod
        );
        
    $this->session->set_userdata('logged_in', $sess_array);
    }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
