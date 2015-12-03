<?php

class Bloco extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function insertBloco($nome, $prioridade)
    {
        $data = [
            "nome" => $nome,
            "prioridade" => $prioridade
        ];
        $this->db->insert('bloco', $data);
    }
}