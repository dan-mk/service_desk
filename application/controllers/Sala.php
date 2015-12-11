<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function _remap($id_sala) {
        $this->load->view("core/head");
        $data["logged"] = $this->is_logged();
        $this->load->view("core/cabecalho", $data);
        $this->load->model("bloco_model");
        $this->load->model("sala_model");
        $this->load->model("equipamento_model");
        $data["id_sala"] = $id_sala;
        $this->load->view("sala/index", $data);
    }

}
