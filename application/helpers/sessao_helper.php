<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper Sessao
//Allan Neros
//Contem funcoes relacionadas a sessao

if ( !function_exists('verificarSessaoAtiva')) {
    function verificarSessaoAtiva() {
        //Verifica se o usuário tem acesso administrativo
        $CI =& get_instance();
        $r = usuarioLogado();

        if (!usuarioLogado()) {
            redirect(base_url() . index_page() . '/acesso');

        }
    }   
}

if ( !function_exists('usuarioAtivo')) {
    function usuarioAtivo() {
        //Verifica se o usuário tem acesso administrativo
        $CI =& get_instance();

        $data = lerSessaoAtual();

        return $data['usuario_ativo'];
    }   
}

if ( !function_exists('usuarioProfessor')) {
    function usuarioProfessor() {
        $CI =& get_instance();
        $data = lerSessaoAtual();

        return $data['usuario_professor'];
    }   
}

if ( !function_exists('usuarioAdmin')) {
    function usuarioAdmin() {
        $CI =& get_instance();
        $data = lerSessaoAtual();

        return $data['usuario_admin'];
    }   
}

if ( !function_exists('usuarioLogado')) {
    function usuarioLogado() {
        $CI =& get_instance();
        $data = lerSessaoAtual();

        return ($data['usuario_id'] == NULL ? FALSE : TRUE);

    }   
}

if ( !function_exists('lerSessaoAtual')) {
    function lerSessaoAtual() {
        $CI =& get_instance();

        //Carrega os dados da sessão atual e devolve um array que pode ser trabalhado no controller e na view
        $data['usuario_id']         = $CI->session->userdata('usuario_id');
        $data['usuario_nome']       = $CI->session->userdata('usuario_nome');
        $data['usuario_ativo']      = $CI->session->userdata('usuario_ativo');
        $data['usuario_login']      = $CI->session->userdata('usuario_login');
        $data['usuario_admin']      = $CI->session->userdata('usuario_admin');
        $data['usuario_professor']  = $CI->session->userdata('usuario_professor');

        return $data;
    }   
}