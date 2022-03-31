<?php defined('BASEPATH') OR exit('No direct script access allowed');

//CONTROLLER INICIO
//Allan Neros
//Deve ser o primeiro Controller a ser chamado na aplicação
//Deve verificar se tem sessão aberta e se tiver já direciona para o menu

class Inicio extends CI_Controller {

    public function index() {
        verificarSessaoAtiva();

        //Se for admin, vai para uma tela
        if (usuarioAdmin()) {
            redirect(base_url() . index_page() . '/admin/inicio');

        //Se for professor, vai para outra tela
        } elseif (usuarioProfessor()) {
            redirect(base_url() . index_page() . '/professor/inicio');
        
        //Se for aluno, vai para a tela comum            
        } else {
            redirect(base_url() . index_page() . '/aluno/inicio');

        }
    }

}
