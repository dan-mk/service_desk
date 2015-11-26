<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function index()
    {
        $this->load->view('logon');
    }
    
    public function logar()
    {
        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");
        
        if($usuario && $senha){
            $this->load->model('logon_model');
            $logon_model = new Logon_Model;
        
            $tecnico = $logon_model->getTecnicoByUsuario($usuario);
            if($tecnico && md5($tecnico[0]->salt.$senha) == $tecnico[0]->senha){
                
                //Logado
                
            }
        }
        
    }
    
}