<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tecnico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
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
    
    public function resolver($id_problema){
        if ($this->is_logged()) {
            
            $descricao = $this->input->post("descricao");
            $data_resolucao = date("Y-m-d H:i");
            $id_tecnico = $this->session->userdata("id");
            
            $this->load->model("resolucao_model");
            $this->resolucao_model->insertResolucao($descricao, $data_resolucao, $id_problema, $id_tecnico);
            
            $this->load->model("problema_model");
            $problema = $this->problema_model->getProblemaById($id_problema);
            
            redirect("equipamento/{$problema[0]->Equipamento_idEquipamento}");
            
        } else {
            redirect("logon");
        }
    }
    
    public function excluir_problema($id_problema){
        if ($this->is_logged()) {

            $this->load->model("problema_model");
            $problema = $this->problema_model->getProblemaById($id_problema);
            
            $this->problema_model->deleteProblema($id_problema);
            
            redirect("equipamento/{$problema[0]->Equipamento_idEquipamento}");
            
        } else {
            redirect("logon");
        }
    }

}
