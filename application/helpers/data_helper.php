<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper Data
//Allan Neros
//Contem funcoes relacionadas a datas

if ( !function_exists('hoje')) {
    function hoje() {
        //Retorna a data e hora atual
        $data_hoje = date("Y-m-d H:i:s");
        return $data_hoje;
    }   
}