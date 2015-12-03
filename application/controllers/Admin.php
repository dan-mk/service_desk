<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if($this->is_logged() && $this->is_admin()){
            
            $this->load->view('admin/index');
            
        } else {
            $this->load->view('admin/forbidden');
        }
    }
    
    
    public function adicionar_tecnico()
    {
        if($this->is_logged() && $this->is_admin()){
            $usuario = $this->input->post("usuario");
            $senha = $this->input->post("senha");
            if($usuario && $senha){
                $this->load->model("tecnico");
                $tecnico = new Tecnico;
                
                $tecnico->insertTecnico($usuario, $senha);
                redirect("admin");
            } else {
                $this->load->view('admin/adicionar_tecnico');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
	
	public function adicionar_bloco()
    {
        if($this->is_logged() && $this->is_admin()){
            $nome = $this->input->post("nome");
            $prioridade = $this->input->post("prioridade");
            if($nome && $prioridade){
                $this->load->model("bloco");
                $bloco = new Bloco;
                
                $bloco->insertBloco($nome, $prioridade);
                redirect("admin");
            } else {
                $this->load->view('admin/adicionar_bloco');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
	
	public function adicionar_sala()
    {
        if($this->is_logged() && $this->is_admin()){
            $nome = $this->input->post("nome");
            $id_bloco = $this->input->post("id_bloco");
            if($nome && $id_bloco){
                $this->load->model("sala");
                $sala = new Sala;
                
                $sala->insertSala($nome, $id_bloco);
                redirect("admin");
            } else {
                $this->load->view('admin/adicionar_sala');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
	
	public function adicionar_tipo()
    {
        if($this->is_logged() && $this->is_admin()){
            $nome = $this->input->post("nome");
            if($nome){
                $this->load->model("tipo");
                $tipo = new Tipo;
                
                $tipo->insertTipo($nome);
                redirect("admin");
            } else {
                $this->load->view('admin/adicionar_tipo');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
	
	public function adicionar_equipamento()
    {
        if($this->is_logged() && $this->is_admin()){
            $codigo = $this->input->post("codigo");
			$id_tipo = $this->input->post("id_tipo");
			$id_sala = $this->input->post("id_sala");
            if($codigo && $id_tipo && $id_sala){
                $this->load->model("equipamento");
                $equipamento = new Equipamento;
                
                $equipamento->insertEquipamento($codigo, $id_tipo, $id_sala);
                redirect("admin");
            } else {
                $this->load->view('admin/adicionar_equipamento');
            }
        } else {
            $this->load->view('admin/forbidden');
        }
    }
    
}