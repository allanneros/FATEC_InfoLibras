<?php defined('BASEPATH') OR exit('No direct script access allowed');

//CONTROLLER INICIO
//Allan Neros
//Deve ser o primeiro Controller a ser chamado na aplicação
//Deve verificar se tem sessão aberta e se tiver já direciona para o menu

class Inicio extends CI_Controller {

    public function index() {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        $data['pageTitle']  = "Início - Acesso de Professor";

        $this->load->view('_restrito/header',$data);
        $this->load->view('professor/navbar',$data);
        $this->load->view('professor/inicio_professor',$data);
        $this->load->view('_restrito/footer',$data);

    }

}
