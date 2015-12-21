<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tree_Sub
 *
 * @author Snosi
 */
class Tree_Sub extends CI_Controller {

        function __construct()
        {
           parent::__construct();
           $this->load->model('Transaction_DB','',TRUE);
           $this->load->model('Pros','',TRUE);
           $this->load->model('Desg','',TRUE);
        }
	function index(){
            //$c=$this->session->userdata('logged_in');
            //var_dump($c);
            //die();
            var_dump($_POST);
            $this->load->model("Desg");
            $this->load->model("Pros");
            if($this->session->userdata('logged_in')){
                $this->Pros->SessionPassTo($Data);
                $sql="Select * From subj where Depar like '".$Data['user_Section']."'";
                $Data['menulist']= $this->Desg->Create_MenuList_Multi_Gnrl("subj","Subj_NO","Subj_Name_Ar",$sql);
                if($this->input->post){
                    $Data['Subj_NO']=$this->input->post('Subj_NO');
                    $Data['Subj_Name_Ar']=$this->input->post('Subj_Name_Ar');
                    $Data['Subj_Name_Eg']=$this->input->post('Subj_Name_Eg');
                    $Data['dep_no']=$Data['user_Section'];
                }
              
               // $Data['dep_no']=$session_data['user_Section'];
                //$data['full_name']=
                //$data['menulist']=  form_multiselect($Stu_subj, $options);
                $this->load->view('headpage',$Data);
                $this->load->view('Tree_Sub',$Data);
                $this->load->view('footpage',$Data);
	}else{
          //If no session, redirect to login page
          redirect('login', 'refresh');
        }
   }
   
   function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
 
}

