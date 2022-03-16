<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Model Matricula
//Neros Labs
//Contem elementos relacionados a matricula do aluno no curso
//É a forma de vincular o aluno no curso e mapear acessos

class Matricula_model extends CI_Model {
    //As matriculas são registradas com o usuario e o curso
    //Status:
    //  [A]tiva     (o aluno se inscreveu mas ainda não concluiu o curso) 
    //  [E]ncerrada (o aluno se inscreveu e concluiu o curso)
    //  [C]ancelada (o aluno se inscreveu mas cancelou a matrícula)

    //construtor
    public function __construct() {
        parent::__construct(); 
    }

    public function contarMatriculasUsuario($id_usuario,$status=NULL){
        //Conta a quantidade de matriculas vinculadas ao usuario
        //Se $status for informado, filtra pelo campo
        $where = array('id_usuario' => $id_usuario);
        if ($status != NULL) {
            array_push($where,'status'=>$status);
        }
        $this->db
                ->select('count(matricula.id) as qtde_matriculas');
                ->from('matricula');
                ->where(array('id_usuario' => $id_usuario));
    }

    public function registrarMatricula($id_usuario,$id_curso){
        //Inclui matricula do usuário no curso
        //Usuario e curso não podem ser nulos
        if ($id_usuario==NULL || $id_curso == NULL) {
            return FALSE;
        } else {
            $hoje = date("Y-m-d H:i:s");
            $data = array(
                'id_curso'          =>  $id_curso,
                "id_usuario"        =>  $id_usuario,
                'data_inscricao'    =>  $hoje,
                'status'            =>  'A'
            );
            $this->db->insert('usuario',$data);
            return ($this->db->affected_rows()>0?TRUE:FALSE);
        }
    }

}

