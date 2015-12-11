<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
    }

    public function _remap($id_equipamento) {
        $descricao = $this->input->post("descricao");
        $nome = $this->input->post("nome");
        
        if($descricao){
            
            if(empty($nome)){
                $nome = "Anônimo";
            }
            
            $this->load->model("problema_model");
            $data_problema = date("Y-m-d H:i");
            $this->problema_model->insertProblema($nome, $descricao, $data_problema, $id_equipamento);
            redirect("equipamento/$id_equipamento");
            
        } else {
            $this->load->view("core/head");
            $data["logged"] = $this->is_logged();
            $this->load->view("core/cabecalho", $data);
            $this->load->model("bloco_model");
            $this->load->model("sala_model");
            $this->load->model("equipamento_model");
            $this->load->model("problema_model");
            $this->load->model("resolucao_model");
            $data["id_equipamento"] = $id_equipamento;
            $this->load->view("equipamento/index", $data);
        }
    }

}
