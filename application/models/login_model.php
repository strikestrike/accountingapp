<?php  
           if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * webprepration
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
class login_model extends CI_Model {   

     public function __construct()
    {
        parent::__construct();
    }
 
    public function login_valid($username, $password)
     {
        $query= $this->db->query("SELECT * FROM admin WHERE username='$username' AND password = '$password'");
        //$q = $this->db->where(['username' => $username, 'password' => $password]) ->get('admin');
        if ($query->num_rows()) {
            return $query->row() ;
            //return TRUE; 
        } else {
            return FALSE;
        }
    }
 
} 

?> 