<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_topic extends CI_Controller {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor 
        $this->load->helper("url");
        $this->load->model('M_theme');
        $this->load->model('M_topic'); //charger le M_topic
        $this->data['list_themes'] = $this->M_theme->select_all_theme();
    }

    public function index() {
        
    }

    public function detail_topic($prmidTopic) {
        $this->data['title'] = "Detail des Topic";

        
        $this->data['topic'] = $this->M_topic->select_topic_by_id($prmidTopic)[0]; //getting id of the theme 
        $this->data['list_attachment'] = $this->M_topic->select_image_by_topic($prmidTopic); //getting image by idtopic 


        $page = $this->load->view('V_detail_topic', $this->data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }

    //function qui amene à la page V_newTopic
    public function ajoute_detail_topic($prmidtheme) {
        $this->data['title'] = "Detail des Topic";

           //getting id of the theme
        foreach ($this->data['list_themes'] as $theme) {
            if ($theme["idTheme"] == $prmidtheme) {
                $this->data['theme'] = $theme;
            }
        }
        if (isset($_SESSION["loginok"])) {
            
        
        $page = $this->load->view('V_newTopic', $this->data, true);
        }else{
        $page = $this->load->view('V_accueil', $this->data, true);

        }
        $this->load->view('commun/V_template', array('contenu' => $page));
    }
    
    //function qui ajoute le nouveau topic dans la base 
    public function new_topic($prmidtheme){
        $this->data['title'] = "Detail des Topic";
        
        $newtitre = $this->input->post("titretopic");//on recupère les detail de fomr qui a dans V_newtopic
        $newtexte = $this->input->post("detailtopic");
               
        
        $this->M_topic->insert_topic_by_theme($newtitre,$newtexte,$prmidtheme);
        redirect("C_theme/list_topic/".$prmidtheme);
        
    }
    

}
