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

    //Inscrição
    //Registra a matricula do aluno no curso 
    public function matricular($id_curso) {
        $data       = lerSessaoAtual();
        $id_aluno   = $data['usuario_id'];

        $data['retorno'] = $this->curso_model->matricularCurso($id_aluno,$id_curso);
        //Se matriculou, deve ir ate o curso
        if ($data['retorno']) {
            $this->index($data['retorno']);
            redirect(base_url() . index_page() . '/inicio'); //TODO: mudar para a pagina do curso matriculado
        }
    }

    //Página inicial 
    public function index($retorno=NULL) {
        try {
            $data = lerSessaoAtual();
            
            if (!is_null($retorno)) {
                $data['retorno'] = $retorno;
            }
            
            $this->pesquisar();

        }  catch(Exception $e) {
            echo($e->getMessage());
        }
    }    

    //Pesquisar curso
    //Pesquisa o nome ou a descrição do curso
    public function pesquisar($palavra=NULL) {
        try {
            $data = lerSessaoAtual();

            $data['lista_cursos'] = $this->curso_model->pesquisarCursosAtivos($palavra);
            $data['page_title'] = 'Buscar cursos';
            $this->load->view('header',$data);
            $this->load->view('aluno/navbar',$data);
            $this->load->view('aluno/cursos/cursos_pesquisa',$data);
            $this->load->view('footer',$data);

        }  catch(Exception $e) {
            echo($e->getMessage());
        }
    }

    //Página para visualização - visualiza os dados do curso e lista as aulas
    public function visualizar($id_curso) {
        //$data = lerSessaoAtual();

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

            $this->load->view('header',$data);
            $this->load->view('aluno/navbar');
            $this->load->view('aluno/cursos/visualizar',$data);
            $this->load->view('footer',$data);
        }
    }

}
