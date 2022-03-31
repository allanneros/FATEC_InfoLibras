<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Classe Aula
//Neros Labs
//Este controller cuida da manutenção das aulas
//Do ponto de vista do professor

class Aulas extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('aula_model');
    }

    //Excluir aula
    public function excluir($id_aula,$id_curso) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data = lerSessaoAtual();
        $this->aula_model->excluirAula($id_aula);
        redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso);

    }

    //Atualizar aula
    public function editar($id_aula,$id_curso){
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        if ($id_aula == NULL) {
            redirect(base_url() . index_page() . '/professor/cursos');

        } else {
            $data = lerSessaoAtual();
            $data['id_aula'] = $id_aula;

            //Se tiver vindo do formulario, procede com a inclusao
            if ($this->input->post('form_tema') != NULL) {
                $form_tema          = $this->input->post('form_tema');
                $form_resumo        = $this->input->post('form_resumo');
                $form_arquivo_video = $this->input->post('form_arquivo_video');
                
                $id_aula = $this->aula_model->atualizarAula($id_aula,$form_tema,$form_resumo,$form_arquivo_video);

                //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
                if ($id_aula>0) {
                    redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso);
                }

            //Caso contrario exibe o form para registro da aula com a identificação do curso
            } else {
                $data['aula'] = $this->aula_model->lerAula($id_aula);
                $this->load->view('_restrito/header',$data);
                $this->load->view('professor/navbar',$data);
                $this->load->view('professor/aulas/editar',$data);
                $this->load->view('_restrito/footer',$data);
            }
        }

    }

    //Excluir video
    public function excluirVideo($id_aula,$id_curso) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        //Serve para excluir o vídeo da aula
        //Apaga do disco e também do banco de dados
        $return = $this->aula_model->excluirVideo($id_aula);

        //Se o arquivo de video foi incluído com sucesso, abre a tela de edição
        if ($return > 0) {
            redirect(base_url() . index_page() . '/professor/aulas/editar/' . $id_aula . '/' . $id_curso);
        } else {
            redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso);
        }
    }

    //Carregar video
    public function carregarVideo($id_aula,$id_curso) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        //Serve para carregar o video da aula
        $form_arquivo_video = $this->input->post('form_arquivo_video');

        //Só carrega se o video foi mesmo definido
        if ($form_arquivo_video != NULL) {
            $return = $this->aula_model->incluirVideo($id_aula,$form_arquivo_video);

            //Se o arquivo de video foi incluído com sucesso, abre a tela de edição
            if ($return > 0) {
                redirect(base_url() . index_page() . '/professor/aulas/editar/' . $id_aula . '/' . $id_curso);
            } else {
                redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso);
            }
        }
    }

    //Criar aula
    public function criar($id_curso) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        //Deve abrir a tela para criação da aula
        //A cfiação da aula deve ser informada:
        //  Tema
        //  Resumo
        //  Upload do vídeo
        //  Legenda 
        
        //id_curso é obrigatório, se não for definido deve voltar para a lista
        if ($id_curso == NULL) {
            redirect(base_url() . index_page() . '/professor/cursos');
        } else {
            $data = lerSessaoAtual();

            //Se tiver vindo do formulario, procede com a inclusao
            if ($this->input->post('form_tema') != NULL) {
                $form_tema          = $this->input->post('form_tema');
                $form_resumo        = $this->input->post('form_resumo');
                
                $id_aula = $this->aula_model->incluirAula($id_curso,$form_tema,$form_resumo);

                //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
                if ($id_aula>0) {
                    redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $id_curso);
                }

            //Caso contrario exibe o form para registro da aula com a identificação do curso
            } else {
                $data['id_curso'] = $id_curso;
                $this->load->view('_restrito/header',$data);
                $this->load->view('professor/navbar',$data);
                $this->load->view('professor/aulas/criar',$data);
                $this->load->view('_restrito/footer',$data);
            }
        }
    }
}
