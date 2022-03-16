<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper Sessao
//Allan Neros
//Contem funcoes relacionadas a sessao

if ( !function_exists('lerSessaoAtual')) {
    function lerSessaoAtual() {
        $CI =& get_instance();

        //Carrega os dados da sessão atual e devolve um array que pode ser trabalhado no controller e na view
        $usuario_id         = $CI->session->userdata('usuario_id');
        $usuario_nome       = $CI->session->userdata('usuario_nome');
        $usuario_login      = $CI->session->userdata('usuario_login');
        $usuario_admin      = $CI->session->userdata('usuario_admin');
        $usuario_professor  = $CI->session->userdata('usuario_professor');

        $data['usuario_id']         = $usuario_id;
        $data['usuario_nome']       = $usuario_nome;
        $data['usuario_login']      = $usuario_login;
        $data['usuario_admin']      = $usuario_admin;
        $data['usuario_professor']  = $usuario_professor;

        return $data;
    }   
}