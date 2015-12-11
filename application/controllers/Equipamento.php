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
            $this->load->model("tecnico_model");
            $this->load->model("bloco_model");
            $this->load->model("sala_model");
            $this->load->model("equipamento_model");
            $this->load->model("problema_model");
            $this->load->model("resolucao_model");
            $data["id_equipamento"] = $id_equipamento;
            
            $this->load->model("equipamento_model");
            $m_equipamento = new Equipamento_Model;
            $equipamento = $m_equipamento->getEquipamentoById($id_equipamento);
            
            $id_sala = $equipamento[0]->Sala_idSala;
            
            $this->load->model("sala_model");
            $m_sala = new Sala_Model;
            $sala = $m_sala->getSalaById($id_sala);
            
            $id_bloco = $sala[0]->Bloco_idBloco;
            
            $this->load->model("bloco_model");
            $m_bloco = new Bloco_Model;
            $bloco = $m_bloco->getBlocoById($id_bloco);
            
            
            $data["caminho"] = "<a href=\"".url("sala/$id_sala")."\">{$sala[0]->nome}</a> - Equipamento:";
            $this->load->view("equipamento/index", $data);
        }
    }

}
