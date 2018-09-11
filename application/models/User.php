<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public function imageUpload($name,$img,$foldername){
        return move_uploaded_file($_FILES[$name]['tmp_name'],'uploads/'.$foldername.'/'.$img);
    }

    public function insertDb($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    
}


