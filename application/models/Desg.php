<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Desg
 *
 * @author Snosi
 */
class Desg extends CI_Model{
       
        /*
        * This Function Create Form To Any Table 
        * 
        * Start Function :::::
        */
       function Create_From_Tabels($Tbl,$ActionTo,$btn,$FCh){
       if($FCh==0)
           $FCh="";
       $this->load->model("Pros");   
       echo form_open($ActionTo);
       $Creater = $this->Pros->SHOW_FULL_COLUMNS($Tbl);
       foreach ($Creater as $key) {
            
            //var_dump($get);
           if($key->Field==$this->Get_Primary_Key($Tbl)){
                if(!$key->Extra=='auto_increment'){
                    $data = array(
                    'name'          => $key->Field,
                    'id'            => $key->Field,
                    'value'         => $FCh.''.random_string('alnum',9).'',
                    'maxlength'     => '100',
                    'size'          => '50',
                    'style'         => 'width:30%'
                    );
                    echo "<div class='labeltxt'>".form_label($key->Comment, $key->Field )."</div>";
                    echo "<div class='inputStyle'>".form_input($data)."</div>";
                }
           }else{
                $AryTbl=$this->Pros->GET_CONSTRAINTS($key->Field,$Tbl);
                //var_dump($key->Field);
                if($AryTbl==0){
                    $data = array(
                    'name'          => $key->Field,
                    'id'            => $key->Field,
                    'value'         => '',
                    'maxlength'     => '100',
                    'size'          => '50',
                    'style'         => 'width:30%'
                    );
                    echo "<div class='labeltxt'>".form_label($key->Comment, $key->Field )."</div>";
                    echo "<div class='inputStyle'>".form_input($data)."</div>";
                }else{
                    //echo "<div class='labeltxt'>".form_label($key->Comment, $key->Field )."</div>";
                    //$this->Create_dropdown($AryTbl['Tbl'],$key->Field);
                }
           }
       }
    echo form_submit('Submit', $btn);
    echo form_close();
    }// End Function:::::::::
    
    
    /*
        * This Function Create dropdown For Any Table 
        * 
        * Start Function :::::
        */
    function Create_dropdown($Tbl,$Fld){
        
        $this->load->model("Pros");
        $GDATA=$this->Pros->GET_Data_From_Any_Table($Tbl);
            foreach ($GDATA as $value) {
                $options[]= $value["Name_Foundation"];
            }
        //$shirts_on_sale = array('small', 'large');
        echo form_dropdown($Fld, $options);
       // echo form_dropdown('shirts', $options, $shirts_on_sale);
    }// End Function:::::::::
    
    /*
        * This Function Create Menu List For Any Table 
        * 
        * but two field
        * 
        * Start Function :::::
        */
    function Create_MenuList_Multi($Tbl,$Fld,$sFld){
        
        $this->load->model("Pros");
        $GDATA=$this->Pros->GET_Data_From_Any_Table($Tbl);
            foreach ($GDATA as $value) {
                $options[$value[$Fld]]= "".$value[$Fld]."-".$value[$sFld];
            }
        return form_multiselect($Fld, $options);
    }// End Function:::::::::
    
/*
* This Function Create Menu List For Any Table 
* 
* but two field
* 
* Start Function :::::
*/
    
    function Create_MenuList_Multi_Costomz($FldName,$Fld,$sFld,$id,$sct){
        $sql="SELECT * FROM `subj` 
                WHERE Subj_NO in(
                                    select Subj_NO From subj_tree 
                                        where (Root_Subj_NO 
                                            in( select Subj_NO 
                                                from stu_sub
                                                where Subj_Stut like '1'
                                                and Stu_ID like '".$id."')
                                            or(Root_Subj_NO = 0)
                                            or(Subj_NO 
                                                in( select Subj_NO 
                                                    from stu_sub
                                                    where Subj_Stut like '-1'
                                                    and Stu_ID like '".$id."'))
                                            )and 
                                            Depar like '".$sct."'  
                                )";
        $strChBx="";
        $count=1;
        $this->load->model("Pros");
        $GDATA=$this->Pros->Get_data_By_SQL($sql);
            foreach ($GDATA as $value) {
                $options[$value[$Fld]]= "".$value[$Fld]."-".$value[$sFld];
                $strChBx.='<Div class="stylChBox" >'.$value[$sFld].' " '.$value[$Fld].' "-"'.$value["subj_unit"].'" '.form_checkbox($value[$Fld], $value[$Fld].'').'</Div>';
            }
        if(sizeof($GDATA)>0)
        
        return $strChBx; //form_multiselect($FldName, $options);
    }// End Function:::::::::

/*
* This Function Create Menu List For Any Table 
* 
* but two field
* 
* Start Function :::::
*/
    
    function Create_MenuList_Multi_Gnrl($FldName,$Fld,$sFld,$sql){
        $strChBx="";
        $count=1;
        $this->load->model("Pros");
        $GDATA=$this->Pros->Get_data_By_SQL($sql);
            foreach ($GDATA as $value) {
                $options[$value[$Fld]]= "".$value[$Fld]."-".$value[$sFld];
                $strChBx.='<Div class="stylChBox" >'.$value[$sFld].' " '.$value[$Fld].' "-"'.$value["subj_unit"].'" '.form_checkbox($value[$Fld], $value[$Fld].'').'</Div>';
            }
        if(sizeof($GDATA)>0)
        
        return $strChBx; //form_multiselect($FldName, $options);
    }// End Function:::::::::
        
    
    
/*
* This Function Create Menu List For Any Table 
* 
* 
* Start Function :::::
*/
    
    function Create_MenuList($Tbl,$Fld){
        
        $this->load->model("Pros");
        $GDATA=$this->Pros->GET_Data_From_Any_Table($Tbl);
            foreach ($GDATA as $value) {
                $options[]= $value[$Fld];
            }
        return form_multiselect($Fld, $options);
    }// End Function:::::::::
    
    /*
        * This Function Create Validation For Any Table 
        * 
        * Start Function :::::
        */
    function Create_Validation($Tbl){
       
       $this->load->model("Pros"); 
       $ary_fld=$this->Pros->Get_Name_Filed($Tbl);
            foreach ($ary_fld as $key ){
                        if($key->Null=='NO'){
                            $V[]= array(
                            'field' => $key->Field,
                            'label' => $key->Field,
                            'rules' => 'required'
                            );  
                        }else{
                            $V[]= array(
                            'field' => $key->Field,
                            'label' => $key->Field
                            );  
                        }
                }
                return $V;
    }// End Function:::::::::
    
/*
* This Function Get Primary Key 
* 
* Start Function :::::
*/
    
    function Get_Primary_Key($Tbl){
       $this->load->model("Pros"); 
       $ary_fld=$this->Pros->Get_Name_Filed($Tbl);
            foreach ($ary_fld as $key ){
                        if($key->Key=='PRI'){
                            return $key->Field;
                        }
                }
    }// End Function:::::::::
    
/*
* This Function Get Auto Increment Primary Key 
* 
* Start Function :::::
*/
    
    function Get_Auto_Increment($Tbl){
       $this->load->model("Pros"); 
       $ary_fld=$this->Pros->Get_Name_Filed($Tbl);
            foreach ($ary_fld as $key ){
                        if($key->Key=='PRI'&&$key->Extra=='auto_increment'){
                            return TRUE;
                        }
                }
        return FALSE;
    }// End Function:::::::::

/*
* This Function Check POST ERORR (NULL,EMPTY,NUBMER,VARCHAR) 
* 
* 
* Start Function :::::
* 
* 
*/
    
    function Chek_POST_Err($ary,$Tbl){
        $str="";
        $cont_err=0;
        $this->load->model("Pros");
        $Titles=$this->Pros->SHOW_FULL_COLUMNS($Tbl);
        foreach ($ary as $key => $value) {
            foreach ($Titles as $valueT) {
                if($valueT->Field==$key) {
                    if(!$value) {
                        $str.= "<div class='ErrFrm'> Please Enter ".$valueT->Comment."</div>";
                        $cont_err++;
                    }
                }
            }    
        } 
        if($cont_err>0){
            echo "<div class='ErrFrm'> Count Erorr ".$cont_err."</div>";
            echo $str;
        }
            
        return $cont_err;
    }// End Function:::::::::s  
}