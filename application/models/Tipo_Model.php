<?php

class Tipo_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertTipo($nome) {
        $data = [
            "nome" => $nome
        ];
        $this->db->insert('tipo', $data);
    }

    public function getAll() {
        return $this->db->get('tipo')->result();
    }
    
    public function getTipoById($id_tipo){
        $this->db->where("idtipo", $id_tipo);
        return $this->db->get('tipo')->result();
    }
    
}
