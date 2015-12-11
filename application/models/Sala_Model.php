<?php

class Sala_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllFromBloco($id_bloco) {
        $this->db->where("bloco_idbloco", $id_bloco);
        return $this->db->get('sala')->result();
    }
    
    public function getSalaById($id_sala){
        $this->db->where("idsala", $id_sala);
        return $this->db->get('sala')->result();
    }
    
    public function updateSala($id_sala, $nome, $id_bloco) {
        $data = [
            "nome" => $nome,
            "bloco_idbloco" => $id_bloco
        ];
        $this->db->where('idsala', $id_sala);
        $this->db->update('sala', $data); 
    }

    public function insertSala($nome, $id_bloco) {
        $data = [
            "nome" => $nome,
            "bloco_idbloco" => $id_bloco
        ];
        $this->db->insert('sala', $data);
    }
    
    public function deleteSala($id_sala){
        $this->db->where('idSala', $id_sala);
        $this->db->delete('sala');
    }

}
