<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pros
 *
 * @author Snosi
 */
class Pros extends CI_Model{
    
    /*
    * This Function Get var Session and
     * 
     * pass to ...... 
     * 
     * Start Function :::::
    */
    public function SessionPassTo(&$Data)
    {
        $session_data = $this->session->userdata('logged_in');
            $Data['user_name'] = $session_data['user_name'];
            $Data['user_login'] = $session_data['user_login'];
            $Data['user_Management'] = $session_data['user_Management'];
            $Data['user_Section'] = $session_data['user_Section'];
            $Data['user_jod'] = $session_data['user_jod'];
            $Data['user_id'] = $session_data['user_id'];
    }// End Function:::::::::
    
    /*
    * This Function Convert POST To Arry 
     * 
     * Start Function :::::
    */
    public function convert_to_Arry()
    {
        
    }// End Function:::::::::
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     */
    function Get_Data_where($tbl,$ary)
    {
        $query=$query = $this->db->get_where($tbl,$ary );
        return $query->result();
    }// End Function:::::::::
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     */
    
    function Get_Name_Filed($tbl)
    {
        $query=$this->db->query("DESC ".$tbl."");
        return $query->result();
    }// End Function:::::::::
    
    /*
     * This Function  SHOW FULL COLUMNS Of Table 
     * 
     */
    
    function SHOW_FULL_COLUMNS($tbl)
    {
        $query=$this->db->query("SHOW FULL COLUMNS FROM ".$tbl."");
        return $query->result();
    }// End Function:::::::::
    
    /*
    * This Function GET Filed Name And Convert To Array 
     * 
     * Start Function :::::
    */
    public function Get_Ary_From_Table($tbl)
    {
       
       $ary_fld= $this->Get_Name_Filed($tbl);
            for($i=0;$i< sizeof($ary_fld);$i++){
                foreach ($ary_fld[$i] as $key => $value) {
                    if($key=="Field")
                    {
                        $Fld_Tbl[$value]=-1;
                    }
                }
            }
       return $Fld_Tbl;
    }// End Function:::::::::
    
   /*
    * This Function GET Filed Name And Convert To Array 
     * 
     * Start Function :::::
    */
    public function Set_In_Table($tbl)
    {
        
       $Fld_Tbl= Get_Ary_From_Table($tbl);  
       return $Fld_Tbl;
    }// End Function::::::::: 
    
    
    /*
    * This Function GET CONSTRAINTS To GET NAME TABLE 
    * 
    * Start Function :::::
    */
    public function GET_Data_From_Any_Table($Tbl){
        
        $query= $this->db->get($Tbl);
        $Cls=$query->result_array();
        return $Cls;
    }// End Function::::::::: 
    
    /*
    * This Function GET CONSTRAINTS To GET NAME TABLE 
    * 
    * Start Function :::::
    */
    public function GET_CONSTRAINTS($Fld,$Tbl){
       //$query=$this->db->get();
       //var_dump($Fld);
        $query= $this->db->get_where('information_schema.COLUMNS', array('COLUMN_NAME' => $Fld));
        $Cls=$query->result();
        foreach ($Cls as $obj) {
            if($obj->COLUMN_KEY=='PRI' && $obj->TABLE_NAME!=$Tbl)
            {
                $datatbl["Tbl"]=$obj->TABLE_NAME;
                $datatbl["Fld"]=$Fld; 
                return $datatbl;
            }
        }
        return 0;
    }// End Function::::::::: 
    
    /*
     * This Function Get Name Filed Of Table 
     * 
     * but SQL COSTOMZ
     * 
     */
    
    function Get_data_By_SQL($sql)
    {
        
        $query=$this->db->query($sql);
        return $query->result_array();
    }// End Function:::::::::
    
}