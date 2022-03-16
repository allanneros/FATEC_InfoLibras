<?php defined('BASEPATH') OR exit('No direct script access allowed');

//CONTROLLER INICIO
//Allan Neros
//Deve ser o primeiro Controller a ser chamado na aplicação
//Deve verificar se tem sessão aberta e se tiver já direciona para o menu

class Inicio extends CI_Controller {

    public function index() {
        //Verifica se tem sessão aberta
        //Se tiver, vai direto para o menu
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

        //enviar_email('allan@neros.com.br','Teste de envio de e-mail','Teste');
        $this->load->model('curso_model');

        if ($id == NULL) {
            redirect(base_url() . index_page() . '/acesso');
        } else {
            //Verificar o nivel de acesso
            //Se for admin, vai para uma tela
            if ($admin) {
                $this->load->view('admin/header',$data);
                $this->load->view('admin/navbar',$data);
                $this->load->view('admin/sidebar',$data);
                $this->load->view('admin/inicio_admin',$data);
                $this->load->view('admin/footer',$data);
            
            //Se for professor, vai para outra tela
            } elseif ($professor) {
                $this->load->view('header',$data);
                $this->load->view('professor/navbar',$data);
                //$this->load->view('professor/sidebar');
                $this->load->view('professor/inicio_professor',$data);
                $this->load->view('footer',$data);
            
            //Se for aluno, vai para a tela comum            
            } else {
                $data['lista_cursos_andamento'] = $this->curso_model->pesquisarCursosMatriculados($id);
                $data['lista_cursos_concluidos'] = $this->curso_model->pesquisarCursosConcluidos($id);

                $this->load->view('header',$data);
                $this->load->view('aluno/navbar',$data);
                //$this->load->view('professor/sidebar');
                $this->load->view('aluno/inicio_aluno',$data);
                $this->load->view('aluno/cursos/cursos_andamento',$data);
                $this->load->view('aluno/cursos/cursos_concluidos',$data);
                $this->load->view('footer',$data);
            }
            //redirect(base_url() . index_page() . '/usuarios');
        }
    }

}
