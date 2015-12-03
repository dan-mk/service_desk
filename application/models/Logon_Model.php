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
    
    public function getTecnicoById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('usuario')->result();
    }
    
    public function genAdmin($usuario, $senha, $salt)
    {
        $data = [
            "usuario" => $usuario,
            "senha" => $senha,
            "salt" => $salt
        ];
        
        $this->db->insert('usuario', $data);
    }
}
