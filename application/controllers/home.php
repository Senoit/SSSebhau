<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function index(){
            //$c=$this->session->userdata('logged_in');
            //var_dump($c);
            //die();
            $this->load->model("Desg");
            $this->load->model("Pros");
            if($this->session->userdata('logged_in')){
                $session_data = $this->session->userdata('logged_in');
                $data['user_name'] = $session_data['user_name'];
                $data['user_login'] = $session_data['user_login'];
                $data['user_Management'] = $session_data['user_Management'];
                $data['user_Section'] = $session_data['user_Section'];
                $data['user_jod'] = $session_data['user_jod'];
                $data['user_id'] = $session_data['user_id'];
                
                $data['menulist']= $this->Desg->Create_MenuList_Multi_Costomz("subj","Subj_NO","Subj_Name_Ar",$this->input->post('Stu_ID'),$session_data['user_Section']);
                if($this->input->post('Stu_ID')!=NULL){
                $FldC=array(
                    'reg_no' => $this->input->post('Stu_ID'),
                    'dep_no' => $session_data['user_Section']
                        );
                $vl=$this->Pros->Get_Data_where("stu",$FldC);
                foreach ($vl as $cr) {
                    $data['full_name']=$cr->full_name;
                    $data['Stu_ID']=$cr->reg_no;
                    $data['dep_no']=$cr->dep_no;
                    }
                }
                //$data['full_name']=
                //$data['menulist']=  form_multiselect($Stu_subj, $options);
                $this->load->view('headpage',$data);
                $this->load->view('stu_subj',$data);
                $this->load->view('footpage',$data);
	}
        else
        {
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
