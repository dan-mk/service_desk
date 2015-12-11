<?php

class Tecnico_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTecnicoByUsuario($usuario) {
        $this->db->where('usuario', $usuario);
        return $this->db->get('tecnico')->result();
    }

    public function getTecnicoById($id) {
        $this->db->where('idtecnico', $id);
        return $this->db->get('tecnico')->result();
    }
    
    public function getAll(){
        return $this->db->get('tecnico')->result();
    }

    public function insertTecnico($usuario, $nome, $senha, $admin,
            $cpf = "xxx.xxx.xxx-xx", $telefone = "(xx) xxxx-xxxx") {
        $salt = hash('sha512', mt_rand(0, 1000000000));
        $senha = hash('sha512', $salt . $senha);
        
        if(empty($cpf)){
            $cpf = "xxx.xxx.xxx-xx";
        }
        
        if(empty($telefone)){
            $telefone = "(xx) xxxx-xxxx";
        }

        $data = [
            "usuario" => $usuario,
            "nome" => $nome,
            "cpf" => $cpf,
            "telefone" => $telefone,
            "salt" => $salt,
            "senha" => $senha,
            "admin" => $admin
        ];
        $this->db->insert('tecnico', $data);
    }
    
    
    function getUltimosProblemas(){
        $query = $this->db->query('SELECT equipamento.* FROM equipamento INNER JOIN problema '
                . 'ON idequipamento = equipamento_idequipamento WHERE idproblema '
                . 'NOT IN (SELECT problema_idproblema FROM resolucao) GROUP BY idequipamento '
                . 'ORDER BY max(data_problema) DESC LIMIT 6');
        return $query->result(); 
    }
    
    function getUltimosResolvidos(){
        $query = $this->db->query('SELECT equipamento.* FROM equipamento INNER JOIN problema '
                . 'ON idequipamento = equipamento_idequipamento INNER JOIN resolucao '
                . 'ON idproblema = problema_idproblema GROUP BY idequipamento '
                . 'ORDER BY max(data_resolucao) DESC LIMIT 6');
        return $query->result(); 
    }
    
    function getUltimosResolvidosPorVoce($id_tecnico){
        $query = $this->db->query('SELECT equipamento.* FROM equipamento INNER JOIN problema '
                . 'ON idequipamento = equipamento_idequipamento INNER JOIN resolucao '
                . 'ON idproblema = problema_idproblema WHERE tecnico_idtecnico = '.$id_tecnico.' '
                . 'GROUP BY idequipamento ORDER BY max(data_resolucao) DESC LIMIT 6');
        return $query->result(); 
    }

}
