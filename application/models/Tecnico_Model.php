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

    public function insertTecnico($usuario, $nome, $cpf, $telefone, $senha, $admin = 0) {
        $salt = hash('sha512', mt_rand(0, 1000000000));
        $senha = hash('sha512', $salt . $senha);
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

}
