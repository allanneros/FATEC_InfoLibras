<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Admin
//Classe Usuarios
//Neros Labs
//Contem elementos para administracao dos usuarios

class Usuarios extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('usuario_model');
    }

    //Listar os usuários
    public function index($retorno=NULL) {
        try {
            $id         = $this->session->userdata('usuario_id');
            $nome       = $this->session->userdata('usuario_nome');
            $login      = $this->session->userdata('usuario_login');
            $admin      = $this->session->userdata('usuario_admin');
            $professor  = $this->session->userdata('usuario_professor');

            $data['usuario_id']         = $id;
            $data['usuario_nome']       = $nome;
            $data['usuario_login']      = $login;
            $data['usuario_admin']      = $admin;
            $data['usuario_professor']  = $professor;

            if (!is_null($retorno)) {
                $data['retorno'] = $retorno;
            }

            $data['lista_usuarios'] = $this->usuario_model->listarUsuarios();
            $data['page_title'] = 'Usuarios';
            $this->load->view('admin/header',$data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/usuarios/listar',$data);
            $this->load->view('admin/footer',$data);

        }  catch(Exception $e) {
            echo($e->getMessage());
        }
    }
    
    //Habilitar acesso admin ou de professor ao usuário (ou remover)
    function habilitar($id,$tipo_acesso,$acesso) {
        $retorno = $this->usuario_model->habilitarUsuario($id,$tipo_acesso,$acesso);
        if ($retorno) {
            redirect(base_url() . index_page() . '/admin/usuarios');
        }
    }

    //Ativar ou desativar o usuario
    function ativar($id,$ativo) {
        $this->usuario_model->ativarUsuario($id,$ativo);
        //$this->index();
        redirect(base_url() . index_page() . '/admin/usuarios');
    }

    //Criar usuario
    public function criar() {
        $id         = $this->session->userdata('usuario_id');
        $nome       = $this->session->userdata('usuario_nome');
        $login      = $this->session->userdata('usuario_login');
        $admin      = $this->session->userdata('usuario_admin');
        $professor  = $this->session->userdata('usuario_professor');

        $data['usuario_id']         = $id;
        $data['usuario_nome']       = $nome;
        $data['usuario_login']      = $login;
        $data['usuario_admin']      = $admin;
        $data['usuario_professor']  = $professor;

        $data['page_title'] = 'Editar';

        $this->load->view('admin/header',$data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');

        //$data['retorno'] = $this->input->post('form_nome');
        
        if ($this->input->post('form_nome') != NULL) {
            $form_nome  = $this->input->post('form_nome');
            $form_login = $this->input->post('form_login');
            $form_ativo = $this->input->post('form_ativo');

            $data['retorno'] = $this->usuario_model->incluirUsuario($form_login,$form_nome,$form_ativo);
            
            //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
            if ($data['retorno']) {
                $this->index($data['retorno']);
                redirect(base_url() . index_page() . '/admin/usuarios');
            }

        } else {
            $this->load->view('admin/usuarios/criar',$data);
        }
        $this->load->view('admin/footer',$data);
    }

    //Editar usuario
    public function editar($id) {
        $usuario_id         = $this->session->userdata('usuario_id');
        $usuario_nome       = $this->session->userdata('usuario_nome');
        $usuario_login      = $this->session->userdata('usuario_login');
        $usuario_admin      = $this->session->userdata('usuario_admin');
        $usuario_professor  = $this->session->userdata('usuario_professor');

        $data['usuario_id']         = $usuario_id;
        $data['usuario_nome']       = $usuario_nome;
        $data['usuario_login']      = $usuario_login;
        $data['usuario_admin']      = $usuario_admin;
        $data['usuario_professor']  = $usuario_professor;

        $data['page_title'] = 'Editar';

        if ($this->input->post('form_id') != NULL) {
            //se tem dados entao eh pra atualizar
            $form_id        = $this->input->post('form_id');
            $form_nome      = $this->input->post('form_nome');
            $form_login     = $this->input->post('form_login');
            $form_ativo     = $this->input->post('form_ativo');
            $form_admin     = $this->input->post('form_admin');
            $form_professor = $this->input->post('form_professor');

            $data['retorno'] = $this->usuario_model->atualizarUsuario($form_id,$form_login,$form_nome,$form_ativo,$form_admin,$form_professor);

            if ($data['retorno']) {
                $this->index($data['retorno']);
                //redirect(base_url() . index_page() . '/admin/usuarios');
            }
        } else {
            $this->load->view('admin/header',$data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/sidebar');
    
            $data['usuario'] = $this->usuario_model->lerUsuario($id);

            $this->load->view('admin/usuarios/editar',$data);
            $this->load->view('admin/footer',$data);
        }
    }
}
