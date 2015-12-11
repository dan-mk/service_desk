<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_logged()) {
            $this->load->view("core/head");
            $data["logged"] = $this->is_logged();
            $data["admin"] = $this->is_admin();
            $this->load->view("core/cabecalho", $data);
            $this->load->view("tecnico/index", $data);
        } else {
            redirect("logon");
        }
    }

}
