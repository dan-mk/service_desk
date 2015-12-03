<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function index()
    {
        $this->load->model('logon_model');
        $logon_model = new Logon_Model;
        
        $usuario = "add";
        $senha = "123";
        $salt = mt_rand(0, 1000000000);
        
        $logon_model->genAdmin($usuario, hash('sha512', $salt . $senha), $salt);
    }
    
}