<?php

class Logon_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function getTecnicoByUsuario($usuario)
    {
        $this->db->where('usuario', $usuario);
        return $this->db->get('usuario')->result();
    }
    
    
}
