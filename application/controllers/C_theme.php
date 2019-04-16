<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_theme extends CI_Controller {

    private $data = [];

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor 
        $this->load->helper("url");
        $this->load->model('M_theme');
        $this->data['list_themes'] = $this->M_theme->select_all_theme();
        
    }

    public function index() {


        $this->data['title'] = "My Theme";


        $page = $this->load->view('V_accueil', $this->data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }

    public function list_topic($prmidTheme = "") {


        $this->data['title'] = "Liste des Topic";

        // recuperer le nom de theme en function $ prmidTheme
        foreach ($this->data['list_themes'] as $theme) {
            if($theme["idTheme"] == $prmidTheme){
              $this->data['theme']= $theme;
            }
            
        }

      $this->load->model('M_topic');//charger le M_topic
      $this->data['list_topic'] = $this->M_topic->select_list_topic($prmidTheme);//getting id of the theme 


        $page = $this->load->view('V_list_topic', $this->data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }
    

    
    

}
