<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper Upload
//Allan Neros
//Contem funcoes relacionadas ao carregamento dos arquivos no portal

if ( !function_exists('carregarVideo')) {
    function carregarVideoAula($arquivo,$id_aula) {
        $CI =& get_instance();
        $CI->load->library('upload');

        //Se o caminho do video já existe, criar
        $caminho_upload = './uploads/aulas/' . $id_aula
        if (!is_dir($caminho_upload)) {
            mkdir($caminho_upload, 0777, $recursive = true);
        }

        //Configurações para o video
        $configuracao = array(
            'upload_path'   => $caminho_upload,
            'allowed_types' => 'mp4',
            'file_name'     => $id_aula . '.mp4',
            'max_size'      => '2048000000'
        );      

        $CI->upload->initialize($configuracao);
        if ($this->upload->do_upload($arquivo)) {
            return 'Arquivo salvo com sucesso';
        } else {
            return $CI->upload->display_errors();
        }
    }
}