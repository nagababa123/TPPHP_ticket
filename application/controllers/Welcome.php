<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor 
        $this->load->helper("url");
    }

    public function index() {
        $this->load->view('index');
    }

}
