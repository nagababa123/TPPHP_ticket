<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_accueil extends CI_Controller {

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

}
