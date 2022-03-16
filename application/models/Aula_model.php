<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Model Aula
//Allan Neros

class Aula_model extends CI_Model {

    //construtor
    public function __construct() {
        parent::__construct(); 
    }

    //Inclui o video na aula
    public function incluirVideo($id_aula,$arquivo_video) {
        $data = array (
            'arquivo_video' => $arquivo_video
        );
        $this->db->where('id',$id_aula);
        $this->db->update('aula',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Carrega informações de uma única aula
    public function lerAula($id){
        $query = $this->db->get_where('aula',array('id'=>$id));
        return $query->row_array();
    }

    //Excluir aula
    public function excluirAula($id_aula){
        $this->db->where('id',$id_aula);
        $this->db->delete('aula');
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Atualizar dados da aula
    public function atualizarAula($id,$tema,$resumo,$arquivo_video){
        $data = array (
            'tema'          => $tema,
            'resumo'        => $resumo,
            'arquivo_video' => $arquivo_video
        );
        $this->db->where('id',$id);
        $this->db->update('aula',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    public function incluirAula($id_curso,$tema,$resumo) {
        //Serve para criar uma nova aula
        //O upload do video é feito em outro momento, pois é necessário vincular ao ID da aula
        $data = array (
            'id_curso'  => $id_curso,
            'tema'      => $tema,
            'resumo'    => $resumo
        );
        $this->db->insert('aula',$data);
        //Para vincular o upload do video, a função deve retornar o ID
        return $this->db->insert_id();
        //return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    public function listarAulas($id_curso=NULL) {
        //Serve para listar as aulas
        //Se curso for definido, filtra 
        if ($id_curso!=NULL) {
            $query = $this->db->get_where('aula',array('id_curso'=>$id_curso));
        } else {
            $query = $this->db->get('aula');
        }
        return $query->result_array();
    }
}

