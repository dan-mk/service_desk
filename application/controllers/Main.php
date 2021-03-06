<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view("core/head");
        $data["logged"] = $this->is_logged();
        $this->load->view("core/cabecalho", $data);
        $this->load->model("bloco_model");
        $this->load->model("sala_model");
        $this->load->view("main/index");
    }

}
