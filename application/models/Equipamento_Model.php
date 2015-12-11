<?php

class Equipamento_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getEquipamentoById($id_equipamento){
        $this->db->where("idequipamento", $id_equipamento);
        return $this->db->get('equipamento')->result();
    }

    public function getAllFromSala($id_sala) {
        $this->db->where("sala_idsala", $id_sala);
        return $this->db->get('equipamento')->result();
    }

    public function insertEquipamento($codigo, $id_sala, $id_tipo) {
        $data = [
            "codigo" => $codigo,
            "sala_idsala" => $id_sala,
            "tipo_idtipo" => $id_tipo
        ];
        $this->db->insert('equipamento', $data);
    }
    
    public function updateEquipamento($id_equipamento, $codigo, $id_sala, $id_tipo) {
        $data = [
            "codigo" => $codigo,
            "sala_idsala" => $id_sala,
            "tipo_idtipo" => $id_tipo
        ];
        $this->db->where('idequipamento', $id_equipamento);
        $this->db->update('equipamento', $data); 
    }
    
    public function deleteEquipamento($id_equipamento){
        $this->db->where('idEquipamento', $id_equipamento);
        $this->db->delete('equipamento');
    }
    

}
