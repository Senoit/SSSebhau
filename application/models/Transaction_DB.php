<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaction_DB
 *
 * @author Snosi
 */
class Transaction_DB extends CI_Model{
   
    /*
    *   This Function Input Data From Array In Tabel 
     * 
     * Start Function :::::
    */
    Function inputdata($ary,$Tbl){

        if($this->db->insert($Tbl,$this->Get_Array($ary))){
            return TRUE;
        }else{
            return FALSE;
        }
    }// End Function:::::::::
    
    /*
    *   This Function Input Data From Array In Tabel 
     *  
     *  But with loop For Multi insert
     * Start Function :::::
    */
    Function inputdataLoop($ary,$Tbl){
        //var_dump($ary);
        $this->load->model('Pros');
        $col=$this->Pros->SHOW_FULL_COLUMNS($Tbl);
        foreach ($col as $value) {
            if($value->Field=='Stu_ID')
                $aryfld[$value->Field]=$ary['Stu_ID'];
            else
                $aryfld[$value->Field]=NULL;
        }
        foreach ($ary as $key => $values) {
            
            //$aryfld[];
            //var_dump($aryfld);
            //die();
            //$this->db->insert($Tbl,$this->Get_Array($aryfld));
            $this->db->select('Subj_NO');
            $this->db->where('Subj_NO',$key);
            $qry=$this->db->get('subj');
            foreach ($qry->result() as $ky ) {
                $aryfld['Subj_NO']=$ky->Subj_NO;
                $aryfld['Subj_Stut']=0;
                $inary[]=$aryfld;
            }
            
            //var_dump($cv);
            //var_dump($aryfld );
            //var_dump($aryfld);
        }
        //var_dump($inary);
        //var_dump($aryfld);
        if($this->db->insert_batch($Tbl,$inary)){
            return TRUE;
        }else{
            return FALSE;
        }
    }// End Function:::::::::
    
    
    /*
    *   This Function Get Array For InPut 
    * 
    * Start Function :::::
    */
    Function Get_Array($ary){
        foreach ($ary as $key => $value) {
            If($key!="Submit")
                $data[$key]=$value;   
        }
        //var_dump($data);
        return $data;
    }// End Function:::::::::
}
