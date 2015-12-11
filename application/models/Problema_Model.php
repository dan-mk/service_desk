<?php

class Problema_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getActiveFromEquipamento($id_equipamento) {
        $this->db->where("equipamento_idequipamento", $id_equipamento);
        $this->db->where("idproblema NOT IN (SELECT problema_idproblema FROM resolucao)");
        return $this->db->get('problema')->result();
    }
    
    public function getHistoricoFromEquipamento($id_equipamento) {
        $this->db->where("equipamento_idequipamento", $id_equipamento);
        $this->db->where("idproblema IN (SELECT problema_idproblema FROM resolucao)");
        return $this->db->get('problema')->result();
    }

    public function insertProblema($nome, $descricao, $data_problema, $id_equipamento) {
        $data = [
            "nome" => $nome,
            "descricao" => $descricao,
            "data_problema" => $data_problema,
            "equipamento_idequipamento" => $id_equipamento
        ];
        $this->db->insert('problema', $data);
    }
    
    public function deleteProblema($id_problema){
        $this->db->where('idProblema', $id_problema);
        $this->db->delete('problema');
    }
    

}
