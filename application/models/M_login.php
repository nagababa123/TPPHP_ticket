<?php

defined('BASEPATH') OR Exit('No direct script access allowed');
class M_login extends CI_Model {

       public function __construct() {
       parent::__construct();
       /* La connexion à la base se fait grâce à l’instruction: */
       $this->load->database();
   }
//selecting login from table user in database 
   public function get_user_by_login($loginUser) {
       $query = $this->db->
               select('*')
               ->from('user')
               ->where('Login', $loginUser)
               ->get();
       return $query->result_array(); //conversion en tableau PHP
   }
}


