<?php defined('BASEPATH') OR exit('No direct script access allowed');

//CONTROLLER INICIO
//Allan Neros
//Deve ser o primeiro Controller a ser chamado na aplicação
//Deve verificar se tem sessão aberta e se tiver já direciona para o menu

class Inicio extends CI_Controller {

    public function index() {
        verificarSessaoAtiva();

        if (usuarioAdmin() || usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        $data['pageTitle']  = "Início - Acesso de Professor";

        $this->load->model('curso_model');
        
        $data['lista_cursos_andamento'] = $this->curso_model->pesquisarCursosMatriculados($data['usuario_id']);
        $data['lista_cursos_concluidos'] = $this->curso_model->pesquisarCursosConcluidos($data['usuario_id']);

        $this->load->view('_restrito/header',$data);
        $this->load->view('aluno/navbar',$data);
        $this->load->view('aluno/inicio_aluno',$data);
        $this->load->view('aluno/cursos/cursos_andamento',$data);
        $this->load->view('aluno/cursos/cursos_concluidos',$data);
        $this->load->view('_restrito/footer',$data);

    }

}
