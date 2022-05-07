<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*  CLASSE DE MENSAGENS
    Allan Neros
    Contem funcoes relacionadas a mensagens de retorno no site
    Depende do model Mensagens_model

*/ 
abstract class Mensagens {

    public function __construct()  {
        parent::__construct();
    }
    public function __destruct() {
    }

    public static function lerMensagem() {
        $CI =& get_instance();
        $CI->load->model('mensagem_model');
        
        $msg = $CI->mensagem_model->lerMensagem();

        if ($msg) {
            echo('<div class="alert alert-' . $msg['tipo'] . ' alert-dismissible">');
            echo('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
            //echo('<h4><i class="icon fa fa-check"></i> Aviso</h4>');
            echo($msg['mensagem']);
            echo('</div>');

        }

    }

    public static function definirMensagem($tipo,$mensagem) {
        $CI =& get_instance();
        $CI->load->model('mensagem_model');
        
        $msg = $CI->mensagem_model->definirMensagem($tipo,$mensagem);

        //return (($msg) ? TRUE : FALSE);
    }


}