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
        $data = lerSessaoAtual();

        $aula = $this->aula_model->lerAula($id_aula);

        if ($aula == NULL) {
            //Se não encontrou o curso, deve retornar a página inicial
            redirect(base_url() . index_page() . '/aluno/cursos');
        } else {
            //Carrega a página de visualização do curso e das aulas
            //var_dump($aula);
            $data['aula'] = $aula;

            $this->load->view('header',$data);
            $this->load->view('aluno/navbar');
            $this->load->view('aluno/aulas/visualizar',$data);
            $this->load->view('footer',$data);
        }
    }

}
