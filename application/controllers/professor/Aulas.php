<?php defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/controllers/mail/MailNotificacoes.php');
require(APPPATH . '/controllers/misc/Mensagens.php');

use CodeIgniter\Files\File;

//Classe Aula
//Neros Labs
//Este controller cuida da manutenção das aulas
//Do ponto de vista do professor

class Aulas extends CI_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('aula_model');
    }

    //Lista os materiais de apoio
    private function _listarMaterialAula($id_aula) {
        $material = $this->aula_model->listarMateriais($id_aula);
        if (!$material) {
            $material   = array(
                            'nome'      => '',
                            'arquivo'   => ''
                        );
        }
        return $material;
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
    public function editar($id_aula){
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        if ($id_aula == NULL) {
            redirect(base_url() . index_page() . '/professor/cursos');

        } else {
            $data = lerSessaoAtual();

            $data['aula']       = $this->aula_model->lerAula($id_aula);

            //Se tiver vindo do formulario, procede com a inclusao
            if ($this->input->post('form_tema') != NULL) {
                $form_tema          = $this->input->post('form_tema');
                $form_resumo        = $this->input->post('form_resumo');
                $form_arquivo_video = $this->input->post('form_arquivo_video');
                $form_id_curso      = $data['aula']['id_curso'];    //$this->input->post('form_id_curso');

                //upload do arquivo de legenda
                $upload_config  = array(
                                        'upload_path'   =>  './uploads/legenda/',
                                        'allowed_types' =>  'srt|vtt',
                                        //'file_name'     =>  $form_id .'.jpg',
                                        'max_size'      =>  500,
                                        'max_width'     =>  1024,
                                        'max_height'    =>  768,
                                        'overwrite'     =>  TRUE
                                );

                $this->load->library('upload', $upload_config);

                if ($this->upload->do_upload('form_arquivo_legenda')) {
                    $file                   = $this->upload->data(); 
                    $form_arquivo_legenda   = $file['file_name'];
                    $form_arquivo_legenda   = APP_UPLOAD_FOLDER . '/legenda/' . $form_arquivo_legenda;  
                    Mensagens::definirMensagem('success','Arquivo salvo com sucesso.');

                } else {
                    $form_arquivo_legenda = "";
                    Mensagens::definirMensagem('danger','Não foi possível salvar o arquivo.' . $this->upload->display_errors('<p>', '</p>'));

                }
                
                $aula = $this->aula_model->atualizarAula($id_aula,$form_tema,$form_resumo,$form_arquivo_video,$form_arquivo_legenda);

                //Se conseguir incluir no sistema, direciona para a listagem e exibe mensagem
                if ($aula != 0) {
                    //redirect(base_url() . index_page() . '/professor/cursos/visualizar/' . $form_id_curso);
                    Mensagens::definirMensagem('success','Aula atualizada com sucesso.');

                } else {
                    //redirect(base_url() . index_page() . '/professor/aulas/editar/' . $id_aula . '/' . $form_id_curso);
                    Mensagens::definirMensagem('danger','Não foi possível atualizar a aula.');

                }

            //Caso contrario exibe o form para registro da aula com a identificação do curso
            } else {
                Mensagens::definirMensagem('','');

            }

            $data['aula']           = $this->aula_model->lerAula($id_aula);
            $data['aula_arquivos']  = $this->_listarMaterialAula($id_aula);
            $data['pageTitle']      = 'Editar aula';

            $this->load->view('_restrito/header',$data);
            $this->load->view('professor/navbar',$data);
            $this->load->view('professor/aulas/editar',$data);
            $this->load->view('_restrito/footer',$data);

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

        }

        redirect(base_url() . index_page() . '/professor/aulas/editar/' . $id_aula . '/' . $id_curso);

    }

    //carregar material da aula
    public function carregarMaterial($id_aula) {
        verificarSessaoAtiva();

        if (!usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        //Serve para carregar o video da aula
        $form_id_aula               = $this->input->post('form_id_aula');
        $form_material_descricao    = $this->input->post('form_arquivo_descricao');

        //Só carrega se o video foi mesmo definido
        if ($form_material_descricao != NULL) {
            //upload do arquivo de legenda
            $upload_config  = array(
                                    'upload_path'   =>  './uploads/doc/',
                                    'allowed_types' =>  'doc|docx|pdf|xls|xlsx|ppt|pptx|pps|ppsx',
                                    //'file_name'     =>  $form_id .'.jpg',
                                    'max_size'      =>  50000,
                                    'max_width'     =>  1024,
                                    'max_height'    =>  768,
                                    'overwrite'     =>  TRUE
                            );

            $this->load->library('upload', $upload_config);

            if ($this->upload->do_upload('form_arquivo_material')) {
                $file                   = $this->upload->data(); 
                var_export($file);
                $form_material_arquivo  = $file['file_name'];
                var_export($form_material_arquivo);
                $form_material_arquivo  = APP_UPLOAD_FOLDER . '/doc/' . $form_material_arquivo;  

                Mensagens::definirMensagem('success','Arquivo salvo com sucesso.');

                $return = $this->aula_model->incluirMaterial($form_id_aula,$form_material_descricao,$form_material_arquivo);

            } else {
                $form_material_arquivo = "";
                echo($this->upload->display_errors('<p>', '</p>')); 
                Mensagens::definirMensagem('danger','Não foi possível salvar o arquivo.' . $this->upload->display_errors('<p>', '</p>'));

            }

        }

        redirect(base_url() . index_page() . '/professor/aulas/editar/' . $id_aula);

    }

    //Criar aula
    public function criar($id_curso) {
        verificarSessaoAtiva();

        $data['pageTitle'] = 'Incluir aula';

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
