<?php

class Tecnico extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function selectTecnico($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('usuario')->result();
    }
    
    public function insertTecnico($usuario, $senha)
    {
        $salt = mt_rand(0, 1000000000);
        $data = [
            "usuario" => $usuario,
            "senha" => $senha,
            "salt" => $salt,
            "admin" => 0
        ];
        $this->db->insert('usuario', $data);
    }
}
