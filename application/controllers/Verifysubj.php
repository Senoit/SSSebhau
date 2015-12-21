<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); 
class Verifysubj extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Transaction_DB','',TRUE);
   $this->load->model('Pros','',TRUE);
 }

 function index()
 {
    $msg=array('required' => '<div class="errlbl">  مطلوب ادخال %s. </div>',
               'is_natural_no_zero' => '<div class="errlbl">  يجب ان يكون اكترمن صفر %s. </div>',
               'PriKey' => '<div class="errlbl">   %s - قيمتها مدخلة مسبقا </div>'
        );
   //This method will have the credentials validation
   //$this->load->library('form_validation');
   //var_dump($this->form_validation->set_rules('user_login', 'user_login', 'trim|required|xss_clean'));
   $this->form_validation->set_rules('Subj_NO', 'رقم المادة', 'trim|required|callback_PriKey',$msg);
   $this->form_validation->set_rules('Subj_Name_Ar', 'اسم المادة بالعربي', 'trim|required',$msg);
   $this->form_validation->set_rules('Subj_Name_Eg', 'الاسم بالانجليزي', 'trim|required',$msg);
   $this->form_validation->set_rules('subj_unit', 'عدد الوحدات', 'trim|required|is_natural_no_zero',$msg);
   $this->form_validation->set_rules('Depar', 'القسم', 'trim|required',$msg);
   
    //echo "1111111";
   if($this->form_validation->run() == FALSE){
        //echo "222222";
        //Field validation failed.  User redirected to login page
       
        $Data['Subj_NO']= $this->input->post('Subj_NO');
        $Data['Subj_Name_Ar']= $this->input->post('Subj_Name_Ar');
        $Data['Subj_Name_Eg']= $this->input->post('Subj_Name_Eg');
        $Data['subj_unit']= $this->input->post('subj_unit');
        $Data['Depar']= $this->input->post('Depar');
        $Data['URL_NOW']=  uri_string();
        if($this->session->userdata('logged_in')){
            $this->Pros->SessionPassTo($Data);
        }    
        $this->load->view('headpage',$Data);
        $this->load->view('view_subj',$Data);
        $this->load->view('footpage',$Data);
   }else{
     //Go to private area
    //echo  uri_string();
    //echo base_url();
    //redirect('view_subj','refresh');
       
        if($this->Transaction_DB->inputdata($this->input->post(),"subj")==TRUE){;
            if($this->session->userdata('logged_in')){
            $this->Pros->SessionPassTo($Data);
            $Data['scs']= TRUE;
            } 
            $this->load->view('headpage',$Data);
            $this->load->view('view_subj',$Data);
            $this->load->view('footpage',$Data);
        }
    }
}

 function PriKey(){
    $this->db->select('*');
    $this->db->where('Subj_NO',$this->input->post('Subj_NO'));
    $qry = $this->db->get('subj');
    $data=$qry->result_array();
    //var_dump($data);
    //foreach ($data as $value) {
        //$value->Subj_NO);
        if(sizeof($data)>0){
            $this->form_validation->set_message('PriKey');
            return FALSE;
        }else{
            return TRUE;
        }
    //} 
    
 }
}
