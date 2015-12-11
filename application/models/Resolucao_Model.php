<?php

class Resolucao_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getResolucaoFromProblema($id_problema) {
        $this->db->where("problema_idproblema", $id_problema);
        return $this->db->get('resolucao')->result();
    }

    public function insertResolucao($descricao, $data_resolucao, $id_problema, $id_tecnico) {
        $data = [
            "descricao" => $descricao,
            "data_resolucao" => $data_resolucao,
            "problema_idproblema" => $id_problema,
            "tecnico_idtecnico" => $id_tecnico
        ];
        $this->db->insert('resolucao', $data);
    }
    
    public function updateResolucao($descricao, $data_resolucao, $id_problema, $id_tecnico) {
        $data = [
            "descricao" => $descricao,
            "data_resolucao" => $data_resolucao,
            "problema_idproblema" => $id_problema,
            "tecnico_idtecnico" => $id_tecnico
        ];
        $this->db->where('idResolucao', $id_resolucao);
        $this->db->update('resolucao');
    }
    
    public function deleteResolucao($id_resolucao){
        $this->db->where('idResolucao', $id_resolucao);
        $this->db->delete('resolucao');
    }
    

}
