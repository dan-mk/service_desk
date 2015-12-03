<?php

class Tipo extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function insertTipo($nome)
    {
        $data = [
            "nome" => $nome
        ];
        $this->db->insert('tipo', $data);
    }
}