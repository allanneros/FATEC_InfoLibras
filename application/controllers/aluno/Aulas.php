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

    public function visualizar($id_aula) {
        verificarSessaoAtiva();

        if (usuarioAdmin() || usuarioProfessor()) {
            redirect(base_url() . index_page() . '/inicio');
        }

        $data                   = lerSessaoAtual();
        $data['aula']           = $this->aula_model->lerAula($id_aula);
        $data['aula_arquivos']  = $this->_listarMaterialAula($id_aula);

        if ($data['aula'] == NULL) {
            //Se não encontrou o curso, deve retornar a página inicial
            redirect(base_url() . index_page() . '/aluno/cursos');
        } else {
            //Carrega a página de visualização do curso e das aulas
            $data['pageTitle']      = "Visualizar aula";

            $this->load->view('_restrito/header',$data);
            $this->load->view('aluno/navbar');
            $this->load->view('aluno/aulas/visualizar',$data);
            $this->load->view('_restrito/footer',$data);
        }
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

}
