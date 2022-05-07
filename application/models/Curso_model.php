<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Model Curso
//Neros Systems

class Curso_model extends CI_Model {

    //construtor
    public function __construct() {
        parent::__construct(); 
    }

    //verificar matricula no curso
    public function verificarMatriculaCurso($id_aluno,$id_curso) {
        $this->db->select('c.id,c.curso,c.descricao,c.ativo,m.data_inscricao,u.nome');
        $this->db->from('curso c');
        $this->db->join('matricula m','m.id_curso = c.id','inner');
        $this->db->join('usuario u','c.id_usuario = u.id','inner');
        $where = array(
                        'm.id_usuario'  => $id_aluno,
                        'm.status'      => 'A',
                        'c.id'          => $id_curso,  
                );
        $this->db->where($where);
        $query = $this->db->get();
        return ($query->result_array() ? TRUE : FALSE);

    }

    //Matricular o aluno no curso
    public function matricularCurso($id_aluno,$id_curso) {
        $hoje = date("Y-m-d H:i:s");
        $data = array(
            'id_usuario'        =>  $id_aluno,
            "id_curso"          =>  $id_curso,
            'data_inscricao'    =>  $hoje,
            'status'            =>  'A'
        );
        $this->db->insert('matricula',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Listar cursos concluídos pelo usuário
    public function pesquisarCursosConcluidos($id_usuario) {
        $this->db->select('c.id,c.curso,c.descricao,c.ativo,m.data_inscricao,u.nome');
        $this->db->from('curso c');
        $this->db->join('matricula m','m.id_curso = c.id','inner');
        $this->db->join('usuario u','c.id_usuario = u.id','inner');
        $where = array(
                        'm.id_usuario' => $id_usuario,
                        'm.status' => 'C'  
                );
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Listar cursos matriculados
    public function pesquisarCursosMatriculados($id_usuario) {
        $this->db->select('c.id,c.curso,c.descricao,c.ativo,m.data_inscricao,u.nome');
        $this->db->from('curso c');
        $this->db->join('matricula m','m.id_curso = c.id','inner');
        $this->db->join('usuario u','c.id_usuario = u.id','inner');
        $where = array(
                        'm.id_usuario' => $id_usuario,
                        'm.status' => 'A'  
                );
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Pesquisar cursos ativos (tela de pesquisa)
    public function pesquisarCursosAtivos($palavra=null) {
        $this->db->select('c.id,c.curso,c.descricao,c.ativo,c.id_usuario,u.nome');
        $this->db->from('curso c');
        $this->db->join('usuario u','c.id_usuario = u.id');
        if ($palavra!=NULL) {
            $this->db->like('c.curso',$palavra);
            $this->db->or_like('c.descricao',$palavra);
        }
        $this->db->where('c.ativo !=',0);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Excluir curso
    public function excluirCurso($id) {
        $this->db->where('id',$id);
        $this->db->delete('curso');
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }
    
    //Insere o curso na tabela
    public function incluirCurso($curso,$descricao,$id_usuario) {
        $hoje = date("Y-m-d H:i:s");
        $data = array(
            'curso'         =>  $curso,
            "descricao"     =>  $descricao,
            'ativo'         =>  '-1',
            'data_criacao'  =>  $hoje,
            'id_usuario'    =>  $id_usuario
        );
        $this->db->insert('curso',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Atualizar dados do curso
    public function atualizarCurso($id,$curso,$descricao,$id_usuario){
        $data = array(
            'curso'         =>  $curso,
            "descricao"     =>  $descricao,
            'id_usuario'    =>  $id_usuario
        );
        $this->db->where('id',$id);
        $this->db->update('curso',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Carrega lista de cursos
    //Se id_usuario for informado lista apenas os cursos do professor
    public function listarCursos($id_usuario=NULL) {
        if ($id_usuario!=NULL) {
            $query = $this->db->get_where('uvw_cursos',array('id_usuario'=>$id_usuario));
        } else {
            $query = $this->db->get('uvw_cursos');
        }
        return $query->result_array();
    }

    //Carrega informações de um único curso
    public function lerCurso($id){
        $query = $this->db->get_where('uvw_cursos',array('id'=>$id));
        return $query->row_array();
    }

    //ativa ou desativa o curso
    public function ativarCurso($id,$ativo) {
        $data = array(
            'ativo' => $ativo
        );
        $this->db->where('id',$id);
        $this->db->update('curso',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

}
