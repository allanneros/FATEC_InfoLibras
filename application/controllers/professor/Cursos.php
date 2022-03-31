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

    //Página inicial - lista os cursos que o professor criou
    public function index($retorno=NULL) {
        try {
            verificarSessaoAtiva();

            if (!usuarioProfessor()) {
                redirect(base_url() . index_page() . '/inicio');
            }

            $data = lerSessaoAtual();
            $data['pageTitle'] = "Cursos";

            if (!is_null($retorno)) {
                $data['retorno'] = $retorno;
            }

            $data['lista_cursos'] = $this->curso_model->listarCursos($data['usuario_id']);
            $this->load->view('_restrito/header',$data);
            $this->load->view('professor/navbar',$data);
            $this->load->view('professor/cursos/listar',$data);
            $this->load->view('_restrito/footer',$data);

        }  catch(Exception $e) {
            echo($e->getMessage());
        }
    }    

    //Página para visualização - visualiza os dados do curso e lista as aulas
    public function visualizar($id_curso) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        $data['pageTitle']  = "Visualizar curso";

        $curso = $this->curso_model->lerCurso($id_curso);

        if ($curso == NULL) {
            //Se não encontrou o curso, deve retornar a página inicial
            redirect(base_url() . index_page() . '/professor/cursos');
        } else {
            //Carrega a página de visualização do curso e das aulas
            $this->load->model('aula_model');

            //Lista as aulas vinculadas ao curso
            $aulas = $this->aula_model->listarAulas($id_curso);

            $data['curso']          = $curso;
            $data['lista_aulas']    = $aulas;

            $this->load->view('_restrito/header',$data);
            $this->load->view('professor/navbar');
            $this->load->view('professor/cursos/visualizar',$data);
            $this->load->view('_restrito/footer',$data);
        }
    }

    //Excluir curso - deixar apenas para o admin
    function excluir($id) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $success = $this->curso_model->excluirCurso($id);
        if ($success) {
            $retorno = "Curso excluído com sucesso.";
        } else {
            $retorno = "Ocorreu um erro ao excluir este curso.";
        }
        $this->index($retorno);
    }

    //Ativar ou desativar o curso
    function ativar($id,$ativo) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $this->curso_model->ativarCurso($id,$ativo);
        $this->index();
    }

    //Página de criação do curso - cria cursos vinculados ao professor logado
    public function criar() {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();

        $data['pageTitle'] = "Incluir novo curso";

        //Lista de usuarios para vincular ao curso
        $this->load->model('usuario_model');
        $data['lista_usuarios'] = $this->usuario_model->listarUsuarios();

        $this->load->view('_restrito/header',$data);
        $this->load->view('professor/navbar');

        if ($this->input->post('form_curso') != NULL) {
            $form_curso     = $this->input->post('form_curso');
            $form_descricao = $this->input->post('form_descricao');

            $data['retorno'] = $this->curso_model->incluirCurso($form_curso,$form_descricao,$data['usuario_id']);

            //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
            if ($data['retorno']) {
                $this->index($data['retorno']);
                redirect(base_url() . index_page() . '/professor/cursos');
            }

        } else {
            $this->load->view('professor/cursos/criar',$data);
        }
        $this->load->view('_restrito/footer',$data);
    }

    //Editar curso
    public function editar($id) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        //Lista de usuarios para vincular ao curso
        $this->load->model('usuario_model');

        $data['lista_usuarios'] = $this->usuario_model->listarUsuarios();
        $data['curso']          = $this->curso_model->lerCurso($id);

        $data['page_title'] = 'Editar';

        if ($this->input->post('form_id') != NULL) {
            //se tem dados entao eh pra atualizar
            $form_id            = $this->input->post('form_id');
            $form_curso         = $this->input->post('form_curso');
            $form_descricao     = $this->input->post('form_descricao');

            $data['retorno'] = $this->curso_model->atualizarCurso($form_id,$form_curso,$form_descricao,$data['usuario_id']);

            if ($data['retorno']) {
                $this->index($data['retorno']);
            }
        } else {
            $this->load->view('_restrito/header',$data);
            $this->load->view('professor/navbar');
            $this->load->view('professor/cursos/editar',$data);
            $this->load->view('_restrito/footer',$data);
        }
    }

}
