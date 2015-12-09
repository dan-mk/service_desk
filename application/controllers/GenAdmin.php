<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function index()
    {
        $this->load->model('tecnico_model');
        $m_tecnico = new Tecnico_Model;
        
        $usuario = "adm";
        $nome = "Admin";
        $cpf = "000.000.000-00";
        $telefone = "(49) 3333-3333";
        $senha = "123";
        
        $m_tecnico->insertTecnico($usuario, $nome, $cpf, $telefone, $senha, 1);
    }
    
}