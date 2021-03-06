<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_logged()) {
            if ($this->is_admin()) {
                $this->load->view("core/head");
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $this->load->model("bloco_model");
                $this->load->view('admin/index');
            } else {
                $this->load->view('admin/forbidden');
            }
        } else {
            redirect("logon");
        }
    }

    public function adicionar_tecnico() {
        if ($this->is_logged() && $this->is_admin()) {
            
            $nome = $this->input->post("nome");
            $usuario = $this->input->post("usuario");
            $senha = $this->input->post("senha");
            $admin = $this->input->post("admin");
            $cpf = $this->input->post("cpf");
            $telefone = $this->input->post("telefone");
            
            if ($nome && $usuario && $senha) {
                $this->load->model("tecnico_model");
                $tecnico = new Tecnico_Model;

                if($admin){
                    $admin = 1;
                }else{
                    $admin = 0;
                }
                
                $tecnico->insertTecnico($usuario, $nome, $senha, $admin, $cpf, $telefone);
                redirect("admin");
            } else {
                $this->load->view("core/head");
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "Técnico: ";
                $data["titulo_cabecalho"] = "Adicionar técnico";
                $this->load->view("core/area_admin", $data);
                $this->load->view('admin/adicionar_tecnico');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }

    public function adicionar_bloco() {
        if ($this->is_logged() && $this->is_admin()) {
            $nome = $this->input->post("nome");
            $prioridade = $this->input->post("prioridade");
            if ($nome && $prioridade !== false) {
                $this->load->model("bloco_model");
                $m_bloco = new Bloco_Model;

                $m_bloco->insertBloco($nome, $prioridade);
                $id_bloco = $this->db->insert_id();
                redirect("admin/bloco/$id_bloco");
            } else {
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "Bloco: ";
                $data["titulo_cabecalho"] = "Adicionar bloco";
                $this->load->view("core/area_admin", $data);
                $this->load->view('admin/adicionar_bloco');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
    
    
    public function bloco($id_bloco){
        if ($this->is_logged() && $this->is_admin()) {
            
            $this->load->model("bloco_model");
            $m_bloco = new Bloco_Model;
            $bloco = $m_bloco->getBlocoById($id_bloco);
            
            if(!$bloco){
                redirect("admin");
            }
            
            $nome = $this->input->post("nome");
            $prioridade = $this->input->post("prioridade");
            $excluir = $this->input->post("excluir");
            
            if ($nome && $prioridade !== false) {
                if($excluir){
                    $m_bloco->deleteBloco($id_bloco);
                    redirect("admin");
                } else {
                    $m_bloco->updateBloco($id_bloco, $nome, $prioridade);
                    redirect("admin/bloco/$id_bloco");
                }
            } else {
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "Bloco: ";
                $data["titulo_cabecalho"] = $bloco[0]->nome;
                $this->load->view("core/area_admin", $data);
                $this->load->model("sala_model");
                $data["bloco"] = $bloco[0];
                $this->load->view("admin/bloco", $data);
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }

    public function adicionar_sala($id_bloco) {
        if ($this->is_logged() && $this->is_admin()) {
            
            $this->load->model("bloco_model");
            $m_bloco = new Bloco_Model;
            $bloco = $m_bloco->getBlocoById($id_bloco);
            
            if(!$bloco){
                redirect("admin");
            }
            
            $nome = $this->input->post("nome");

            if ($nome && $id_bloco) {
                $this->load->model("sala_model");
                $sala = new Sala_Model;

                $sala->insertSala($nome, $id_bloco);
                $id_sala = $this->db->insert_id();
                redirect("admin/sala/$id_sala");
            } else {
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "<a href=\"".url("admin/bloco/$id_bloco")."\">{$bloco[0]->nome}</a> - Sala:";
                $data["titulo_cabecalho"] = "Adicionar sala";
                $this->load->view("core/area_admin", $data);
                $this->load->view('admin/adicionar_sala');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
    
    public function sala($id_sala){
        if ($this->is_logged() && $this->is_admin()) {
            
            $this->load->model("sala_model");
            $m_sala = new Sala_Model;
            $sala = $m_sala->getSalaById($id_sala);
            
            if(!$sala){
                redirect("admin");
            }
            
            $id_bloco = $sala[0]->Bloco_idBloco;
            
            $nome = $this->input->post("nome");
            $excluir = $this->input->post("excluir");
            $novo_bloco = $this->input->post("id_bloco");
            
            if(!$novo_bloco || $novo_bloco == 0){
                $novo_bloco = $id_bloco;
            }
            
            $this->load->model("bloco_model");
            $m_bloco = new Bloco_Model;
            $bloco = $m_bloco->getBlocoById($id_bloco);
            
            if ($nome) {
                if($excluir){
                    $m_sala->deleteSala($id_sala);
                    redirect("admin/bloco/$id_bloco");
                } else {
                    $m_sala->updateSala($id_sala, $nome, $novo_bloco);
                    redirect("admin/sala/$id_sala");
                }
            } else {
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "<a href=\"".url("admin/bloco/$id_bloco")."\">{$bloco[0]->nome}</a> - Sala:";
                $data["titulo_cabecalho"] = $sala[0]->nome;
                $this->load->view("core/area_admin", $data);
                $this->load->model("sala_model");
                $this->load->model("equipamento_model");
                $data["sala"] = $sala[0];
                $this->load->view("admin/sala", $data);
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }

    public function adicionar_equipamento($id_sala) {
        if ($this->is_logged() && $this->is_admin()) {
            
            $codigo = $this->input->post("codigo");
            $id_tipo = $this->input->post("id_tipo");
            
            if($codigo && $id_tipo == 0 && $id_sala){
                $tipo_novo = $this->input->post("tipo_novo");
                $this->load->model("tipo_model");
                $m_tipo = new Tipo_Model;
                $m_tipo->insertTipo($tipo_novo);
                $id_tipo = $this->db->insert_id();
            }
            
            if ($codigo && $id_tipo && $id_sala) {
                $this->load->model("equipamento_model");
                $equipamento = new Equipamento_Model;

                $equipamento->insertEquipamento($codigo, $id_sala, $id_tipo);
                $id_equipamento = $this->db->insert_id();
                redirect("admin/sala/$id_sala");
            } else {
                $this->load->model("sala_model");
                $this->load->model("equipamento_model");
                
                $m_sala = new Sala_Model;
                $sala = $m_sala->getSalaById($id_sala);
                
                $id_bloco = $sala[0]->Bloco_idBloco;
                $this->load->model("bloco_model");
                $m_bloco = new Bloco_Model;
                $bloco = $m_bloco->getBlocoById($id_bloco);
                
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                $data["caminho"] = "<a href=\"".url("admin/bloco/$id_bloco")."\">{$bloco[0]->nome}</a>"
                . " - <a href=\"".url("admin/sala/$id_sala")."\">{$sala[0]->nome}</a> - Equipamento:";
                $data["titulo_cabecalho"] = "Adicionar equipamento";
                $this->load->view("core/area_admin", $data);
                $this->load->model("tipo_model");
                $this->load->view('admin/adicionar_equipamento');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }

    
    public function equipamento($id_equipamento){
        if ($this->is_logged() && $this->is_admin()) {
            
            $this->load->model("equipamento_model");
            $m_equipamento = new Equipamento_Model;
            $equipamento = $m_equipamento->getEquipamentoById($id_equipamento);
            
            if(!$equipamento){
                redirect("admin");
            }
            
            $id_sala = $equipamento[0]->Sala_idSala;
            
            $codigo = $this->input->post("codigo");
            $excluir = $this->input->post("excluir");
            $nova_sala = $this->input->post("nova_sala");
            
            if(!$nova_sala || $nova_sala == 0){
                $nova_sala = $id_sala;
            }
            
            $this->load->model("sala_model");
            $m_sala = new Sala_Model;
            $sala = $m_sala->getSalaById($id_sala);
            
            $id_bloco = $sala[0]->Bloco_idBloco;
            
            $this->load->model("bloco_model");
            $m_bloco = new Bloco_Model;
            $bloco = $m_bloco->getBlocoById($id_bloco);
            
            if ($codigo) {
                if($excluir){
                    $m_equipamento->deleteEquipamento($id_equipamento);
                    redirect("admin/sala/$id_sala");
                } else {
                    $m_equipamento->updateEquipamento($id_equipamento, $codigo, $nova_sala);
                    redirect("admin/equipamento/$id_equipamento");
                }
            } else {
                $this->load->view('core/head');
                $data["logged"] = $this->is_logged();
                $this->load->view("core/cabecalho", $data);
                
                $this->load->model("tipo_model");
                $tipo = $this->tipo_model->getTipoById($equipamento[0]->Tipo_idTipo);
                
                $data["caminho"] = "<a href=\"".url("admin/bloco/$id_bloco")."\">{$bloco[0]->nome}</a>"
                . " - <a href=\"".url("admin/sala/$id_sala")."\">{$sala[0]->nome}</a> - {$tipo[0]->nome}:";
                $data["titulo_cabecalho"] = $equipamento[0]->codigo;
                $this->load->view("core/area_admin", $data);
                $this->load->model("equipamento_model");
                $data["equipamento"] = $equipamento[0];
                $this->load->view("admin/equipamento", $data);
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
    
    
}
