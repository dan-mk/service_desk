<?php

class Sala extends CI_Model {

    public function __construct()
    {
        parent::__construct();   
    }
    
    public function insertSala($nome, $id_bloco)
    {
		$this->db->where('id', $id_bloco);
		$bloco = $this->db->get('bloco')->result();
	
		if($bloco){
			$data = [
				"nome" => $nome,
				"bloco_idbloco" => $id_bloco
			];
			$this->db->insert('sala', $data);
		}
    }
}