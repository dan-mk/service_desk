<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_logged()) {
            if ($this->is_admin()) {
                redirect("admin");
            } else {
                redirect("main");
            }
        } else {
            $this->load->view("core/head");
            $data["logged"] = false;
            $this->load->view("core/cabecalho", $data);
            $this->load->view('logon/logon_form');
        }
    }

    public function logar() {
        $usuario = $this->input->post("usuario");
        $senha = $this->input->post("senha");

        if ($usuario && $senha) {
            $this->load->model('tecnico_model');
            $m_tecnico = new Tecnico_Model;

            $tecnico = $m_tecnico->getTecnicoByUsuario($usuario);
            if ($tecnico) {

                $senha_input = hash('sha512', $tecnico[0]->salt . $senha);
                $senha_banco = $tecnico[0]->senha;
                
                if ($senha_input === $senha_banco) {

                    // Logado
                    $login_string = hash('sha512', $tecnico[0]->senha . $_SERVER['HTTP_USER_AGENT']);
                    $session = [
                        'id' => $tecnico[0]->idTecnico,
                        'login_string' => $login_string
                    ];
                    $this->session->set_userdata($session);
                    redirect("main");
                }
            }
        }
        redirect("logon");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("logon");
    }

}
