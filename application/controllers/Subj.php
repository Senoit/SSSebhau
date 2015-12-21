<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subj
 *
 * @author SNOSI TWATI
 *          +218925737486
 *          Snosi@icloud.com
 *           
 */
class Subj  extends CI_Controller{
    
    function __construct()
    {
      parent::__construct();
    }
    
    function index(){
        $this->load->helper(array('form'));
        if($this->session->userdata('logged_in')){
                $session_data = $this->session->userdata('logged_in');
                $data['user_name'] = $session_data['user_name'];
                $data['user_login'] = $session_data['user_login'];
                $data['user_Management'] = $session_data['user_Management'];
                $data['user_Section'] = $session_data['user_Section'];
                $data['user_jod'] = $session_data['user_jod'];
                $data['user_id'] = $session_data['user_id'];
                $this->load->view('headpage',$data);
                $this->load->view('view_subj',$data);
                $this->load->view('footpage',$data);
        }else{      
            $this->load->view('login_view');
        }
        
    }
    
}
