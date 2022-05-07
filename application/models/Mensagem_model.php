<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Model Mensagens
//Neros Labs
//Contem elementos relacionados as mensagens na tela

class Mensagem_model extends CI_Model {
    public $tipo;        //segue padrão bootstrap: success, danger, primary, etc
    public $mensagem;    //mensagem que será exibida no alert

    //construtor
    public function __construct() {
        parent::__construct(); 
    }

    public function lerMensagem() {
        //Serve para ler a mensagem que está armazenada
        //Se não tiver nada, não exibe nada, caso contrário gera um alert especifico
        
        if (($this->tipo) || ($this->mensagem)) {
            return Array(
                'tipo'      => $this->tipo,
                'mensagem'  => $this->mensagem,
            );
        }
    }

    public function definirMensagem($tipo,$mensagem) {
        //Serve para definir a mensagem que será lida na próxima tela
        $this->tipo     = $tipo;
        $this->mensagem = $mensagem;

        return TRUE;
    }



}








