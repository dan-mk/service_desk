<?php

class Bloco_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getBlocoById($id_bloco){
        $this->db->where("idbloco", $id_bloco);
        return $this->db->get('bloco')->result();
    }

    public function getAll() {
        $this->db->order_by('prioridade', "ASC", "nome");
        return $this->db->get('bloco')->result();
    }

    public function insertBloco($nome, $prioridade) {
        $data = [
            "nome" => $nome,
            "prioridade" => $prioridade
        ];
        $this->db->insert('bloco', $data);
    }
    
    public function updateBloco($id_bloco, $nome, $prioridade) {
        $data = [
            "nome" => $nome,
            "prioridade" => $prioridade
        ];
        $this->db->where('idbloco', $id_bloco);
        $this->db->update('bloco', $data); 
    }
    
    public function deleteBloco($id_bloco){
        $this->db->where('idBloco', $id_bloco);
        $this->db->delete('bloco');
    }

}
