<?php

class Bloco_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        return $this->db->get('bloco')->result();
    }

    public function insertBloco($nome, $prioridade) {
        $data = [
            "nome" => $nome,
            "prioridade" => $prioridade
        ];
        $this->db->insert('bloco', $data);
    }

}
