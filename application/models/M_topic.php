<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class M_topic extends CI_Model {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor         
        $this->load->database(); //Connexion à la BDD 
    }

    public function select_list_topic($prmidtheme) {
        $query = $this->db->select('*')
                ->from('topic')
                ->where('Theme_idTheme', $prmidtheme)
                ->get();
        return $query->result_array(); //conversion en tableau PHP     
    }

    public function select_topic_by_id($prmidtopic) {
        $query = $this->db->select('*')
                ->from('topic')
                ->where('idTopic', $prmidtopic)
                ->get();
        return $query->result_array(); //conversion en tableau PHP     
    }

    //recuperation des images dans le topic
    public function select_image_by_topic($prmidtopic) {
        $query = $this->db->select('*')
                ->from('attachment')
                ->where('Topic_idTopic', $prmidtopic)
                ->where('type_attachment', "image")
                ->get();
        return $query->result_array(); //conversion en tableau PHP  
    }
    
    public function insert_topic_by_theme($titre,$texte,$idtheme){
        $this->db->insert("topic", array("titre" => $titre, "texte" => $texte, "Theme_idTheme" => $idtheme));
    }

}
