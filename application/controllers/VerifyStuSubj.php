<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerifyStuSubj
 *
 * @author Snosi
 */
class VerifyStuSubj extends CI_Controller {
    
function __construct()
{
   parent::__construct();
   $this->load->model('Transaction_DB','',TRUE);
   $this->load->model('Pros','',TRUE);
   $this->load->model('Desg','',TRUE);
}

function index(){  
    //$this->Transaction_DB->inputdataLoop($this->input->post(),"stu_sub");
    if($this->session->userdata('logged_in')) 
        $session_data = $this->session->userdata('logged_in');
    $msg=array('required' => '<div class="errlbl">   الرجاء ادخال  %s. </div>',
               'is_natural_no_zero' => '<div class="errlbl">  يجب ان يكون اكترمن صفر %s. </div>',
               'PriKey' => '<div class="errlbl">   %s - قيمتها مدخلة مسبقا </div>',
               'SubjUnits' => '<div class="errlbl"> الرجاء مراجعة عدد الوحدات.</div>',
               'StuInDepr' => '<div class="errlbl">هذا الطالب لاينتمي الي هذا القسم .</div>'
        );
   $this->form_validation->set_rules('Stu_ID', 'رقم الطالب', 'trim|required|callback_SubjUnits',$msg);
   if($this->form_validation->run() == FALSE){
        if($this->input->post('Stu_ID')!=NULL){
            $FldC=array(
            'reg_no' => $this->input->post('Stu_ID'),
            'dep_no' => $session_data['user_Section']
                );
            $vl=$this->Pros->Get_Data_where("stu",$FldC);
            foreach ($vl as $cr) {
                $Data['full_name']=$cr->full_name;
                $Data['Stu_ID']=$cr->reg_no;
                $Data['dep_no']=$cr->dep_no;
            }
        }
    $Data['URL_NOW']=  uri_string();
    $Data['menulist'] = $this->Desg->Create_MenuList_Multi_Costomz("subj","Subj_NO","Subj_Name_Ar",$this->input->post('Stu_ID'),$session_data['user_Section']);
    $this->Pros->SessionPassTo($Data);   
    $this->load->view('headpage',$Data);
    $this->load->view('stu_subj',$Data);
    $this->load->view('footpage',$Data);
   }else{
        if($this->Transaction_DB->inputdataLoop($this->input->post(),"stu_sub")==TRUE){
            if($this->input->post('Stu_ID')!=NULL){
                $FldC=array(
                'reg_no' => $this->input->post('Stu_ID'),
                'dep_no' => $session_data['user_Section']
                    );
                $vl=$this->Pros->Get_Data_where("stu",$FldC);
                foreach ($vl as $cr) {
                    $Data['full_name']=$cr->full_name;
                    $Data['Stu_ID']=$cr->reg_no;
                    $Data['dep_no']=$cr->dep_no;
                }
            }
            $Data['menulist']= $this->Desg->Create_MenuList_Multi_Costomz("subj","Subj_NO","Subj_Name_Ar",$this->input->post('Stu_ID'),$session_data['user_Section']);
            $this->Pros->SessionPassTo($Data);
            $Data['scs']= TRUE;
            $this->load->view('headpage',$Data);
            $this->load->view('stu_subj',$Data);
            $this->load->view('footpage',$Data);
        }else{
            $Data['menulist']= $this->Desg->Create_MenuList_Multi_Costomz("subj","Subj_NO","Subj_Name_Ar",$this->input->post('Stu_ID'),$session_data['user_Section']);
            $this->Pros->SessionPassTo($Data);
            $Data['scs']= FALSE;
            $this->load->view('headpage',$Data);
            $this->load->view('stu_subj',$Data);
            $this->load->view('footpage',$Data);
        }
    }
}

 function StuInDepr(){
    $this->db->select('*');
    $this->db->where('dep_no',$this->input->post('dep_no'));
    $this->db->where('reg_no',$this->input->post('Stu_ID'));
    $qry = $this->db->get('stu');
    $Data=$qry->result_array();
        if(sizeof($Data)>0){
            $this->form_validation->set_message('StuInDepr');
            return FALSE;
        }else{
            return TRUE;
        }
    }
function SubjUnits(){
    $conut_unit=0;
    $pst=$this->input->post();
    $this->db->select_sum('subj_unit');
    foreach ($pst as $key => $value) {
        $this->db->or_where_in('Subj_NO',$key);
    }
    $qry = $this->db->get('subj');
    $Data=$qry->result();
    foreach ($Data as $value) {
        $conut_unit=$value->subj_unit;
    }
        if($conut_unit>6 && $conut_unit<16){
            $this->form_validation->set_message('SubjUnits');
            return FALSE;
        }else{
            return TRUE;
        }
    }
}