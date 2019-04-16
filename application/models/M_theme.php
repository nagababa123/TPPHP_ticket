<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class M_theme extends CI_Model {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor         
        $this->load->database(); //Connexion à la BDD 
    }

    public function select_all_theme() {
        $query = $this->db->select('*')
                ->from('theme')
                ->get();
        return $query->result_array(); //conversion en tableau PHP     
    }

}
