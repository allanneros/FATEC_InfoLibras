<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Classe Curso
//Neros Labs
//Este controller cuida da manutenção dos cursos
//Do ponto de vista do professor

class Cursos extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('curso_model');
    }

    //Listar os cursos
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

            $data['lista_cursos'] = $this->curso_model->listarCursos();
            $data['page_title'] = 'Cursos';
            $this->load->view('admin/header',$data);
            $this->load->view('admin/navbar',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/cursos/listar',$data);
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
        //Lista de usuarios para vincular ao curso
        $this->load->model('usuario_model');
        $data['lista_usuarios'] = $this->usuario_model->listarUsuarios();

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

        $data['page_title'] = 'Criar';

        $this->load->view('admin/header',$data);
        $this->load->view('admin/navbar');
        $this->load->view('admin/sidebar');

        if ($this->input->post('form_curso') != NULL) {
            $form_curso     = $this->input->post('form_curso');
            $form_descricao = $this->input->post('form_descricao');
            $form_id_usuario= $this->input->post('form_id_usuario');

            $data['retorno'] = $this->curso_model->incluirCurso($form_curso,$form_descricao,$form_id_usuario);

            //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
            if ($data['retorno']) {
                $this->index($data['retorno']);
                redirect(base_url() . index_page() . '/admin/cursos');
            }

        } else {
            $this->load->view('admin/cursos/criar',$data);
        }
        $this->load->view('admin/footer',$data);
    }

    //Editar curso
    public function editar($id) {
        //Lista de usuarios para vincular ao curso
        $this->load->model('usuario_model');
        $data['lista_usuarios'] = $this->usuario_model->listarUsuarios();

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
            $form_id            = $this->input->post('form_id');
            $form_curso         = $this->input->post('form_curso');
            $form_descricao     = $this->input->post('form_descricao');
            $form_id_usuario    = $this->input->post('form_id_usuario');

            $data['retorno'] = $this->curso_model->atualizarCurso($form_id,$form_curso,$form_descricao,$form_id_usuario);

            if ($data['retorno']) {
                $this->index($data['retorno']);
            }
        } else {
            $this->load->view('admin/header',$data);
            $this->load->view('admin/navbar');
            $this->load->view('admin/sidebar');
    
            $data['curso'] = $this->curso_model->lerCurso($id);

            $this->load->view('admin/cursos/editar',$data);
            $this->load->view('admin/footer',$data);
        }
    }
}
