<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    private $data = [];

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor 
        $this->load->helper("url");
        $this->load->model('M_theme');
        $this->load->model('M_login');
        $this->data['list_themes'] = $this->M_theme->select_all_theme();
    }

    public function index() {


        $this->data['title'] = "My Theme";


        $page = $this->load->view('V_accueil', $this->data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }

    // fonction pour crypter le mot de passe
    public function changePass($password) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        redirect($passwordhash);
    }

    // fonction pour se log
    public function user_login() {
        $this->data['page_title'] = "Tickets pour une société X";

        $newLogin = $this->input->post('login');
        $newPassword = $this->input->post('password');
        $result = $this->M_login->get_user_by_login($newLogin);
        if (count($result) != 0) {
            $user = $result[0];
            if (password_verify($newPassword, $user["password"])) {

                $_SESSION["loginok"] = array("idUser" => $user["idUser"], "Pseudo" => $user["pseudo"], "Login" => $user["login"]);
            }
        }

        $page = $this->load->view('V_accueil', $this->data, true);

        $this->load->view('commun/V_template', array('contenu' => $page));
    }
    public function user_logout(){
        
        session_destroy();
        redirect("C_accueil");
        
        
    }

}
