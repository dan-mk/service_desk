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
    
}