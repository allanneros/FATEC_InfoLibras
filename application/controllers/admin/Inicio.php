<?php defined('BASEPATH') OR exit('No direct script access allowed');

//CONTROLLER INICIO
//Allan Neros
//Deve ser o primeiro Controller a ser chamado na aplicação
//Deve verificar se tem sessão aberta e se tiver já direciona para o menu

class Inicio extends CI_Controller {

    public function index() {
        verificarSessaoAtiva();

        if (!usuarioAdmin()) {
            redirect(base_url() . index_page() . '/inicio');
        }
        
        $data = lerSessaoAtual();
        $data['pageTitle']  = "Início - Acesso de Professor";

        $this->load->view('admin/header',$data);
        $this->load->view('admin/navbar',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/inicio_admin',$data);
        $this->load->view('admin/footer',$data);

    }

}
