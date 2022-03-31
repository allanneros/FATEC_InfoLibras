<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Classe Curso
//Neros Labs
//Este controller cuida da manutenção dos cursos
//Do ponto de vista do aluno
//Alunos só podem se matricular ou desmatricular dos cursos

class Cursos extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('curso_model');
    }

    private function _verificarInscricao($id_aluno,$id_curso) {
        return $this->curso_model->verificarMatriculaCurso($id_aluno,$id_curso);
    }

    //Inscrição
    //Registra a matricula do aluno no curso 
    public function matricular($id_curso) {
        verificarSessaoAtiva();

        if (usuarioAdmin() || usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data       = lerSessaoAtual();
        $retorno = $this->_verificarInscricao($data['usuario_id'],$id_curso);

        if ($retorno) {
            $data['retorno'] = "Você já está matriculado neste curso.";
        } else {
            $retorno = $this->curso_model->matricularCurso($data['usuario_id'],$id_curso);
            if ($retorno) {
                $data['retorno'] = "Inscrição realizada com sucesso.";
            } 
        }

        $this->index($data['retorno']);
    }

    //Página inicial 
    public function index($retorno=NULL) {
        try {
            verificarSessaoAtiva();

            if (usuarioAdmin() || usuarioProfessor()) {
                redirect(base_url() . index_page() . '/inicio');
            }

            $data = lerSessaoAtual();
            $data['retorno'] = (!is_null($retorno)) ? $retorno : ''; 
            
            $this->pesquisar($data['retorno']);

        }  catch(Exception $e) {
            echo($e->getMessage());

        }
    }    

    //Pesquisar curso
    //Pesquisa o nome ou a descrição do curso
    public function pesquisar($retorno=NULL,$palavra=NULL) {
        try {
            verificarSessaoAtiva();

            if (usuarioAdmin() || usuarioProfessor()) {
                redirect(base_url() . index_page() . '/inicio');
            }

            $data = lerSessaoAtual();

            $data['lista_cursos'] = $this->curso_model->pesquisarCursosAtivos($palavra);
            $data['pageTitle'] = 'Buscar cursos';
            $data['retorno'] = $retorno;
            
            $this->load->view('_restrito/header',$data);
            $this->load->view('aluno/navbar',$data);
            $this->load->view('aluno/cursos/cursos_pesquisa',$data);
            $this->load->view('_restrito/footer',$data);

        }  catch(Exception $e) {
            echo($e->getMessage());
        }
    }

    //Página para visualização - visualiza os dados do curso e lista as aulas
    public function visualizar($id_curso) {
        verificarSessaoAtiva();

        if (usuarioAdmin() || usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        $curso = $this->curso_model->lerCurso($id_curso);

        if ($curso == NULL) {
            //Se não encontrou o curso, deve retornar a página inicial
            redirect(base_url() . index_page() . '/aluno/cursos');
        } else {
            //Carrega a página de visualização do curso e das aulas
            $this->load->model('aula_model');

            //Lista as aulas vinculadas ao curso
            $aulas = $this->aula_model->listarAulas($id_curso);

            $data['curso']          = $curso;
            $data['lista_aulas']    = $aulas;

            $this->load->view('_restrito/header',$data);
            $this->load->view('aluno/navbar');
            $this->load->view('aluno/cursos/visualizar',$data);
            $this->load->view('_restrito/footer',$data);
        }
    }

}
