<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *  BPM
 *  BPNM
 *  bonita
 * @author Snosi
 */
Class User extends CI_Model
{
 function login($username, $password)
 {
    //var_dump($password);
    $this -> db -> select('user_id,user_name,user_login,user_password,user_Management,user_Section,user_jod');
    $this -> db -> from('stu_user');
    $this -> db -> where('user_login', $username);
    $this -> db -> where('user_password', MD5($password));
    $this -> db -> limit(1);

    $query = $this -> db -> get();
    
    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
   else
   {
     return false;
   }
 }
}

