<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Model Usuario
//Neros Systems

class Usuario_model extends CI_Model {

    //construtor
    public function __construct() {
        parent::__construct(); 
    }

    public function localizarUsuarioChave($chave) {
        //Serve para localizar o usuário pela chave de acesso
        //Necessário para recuperação da senha
        $query = $this->db->get_where('usuario',array('chave_acesso'=>$chave));
        return $query->row_array();
    }    

    public function gerarChaveAcesso($id) {
        //Serve para gerar chave no registro do usuário
        //Com essa chave o usuário pode ativar sua conta ou recuperar o acesso
        $this->load->helper('criptografia');
        $chave = gerarChave();
        $data = array(
            'chave_acesso' =>  $chave
        );
        $this->db->where('id',$id);
        $this->db->update('usuario',$data);
        return ($this->db->affected_rows()>0? $chave : NULL);
    }

    public function localizarUsuario($login) {
        //Serve para localizar o usuário pelo e-mail
        //Necessário para recuperação da senha
        $query = $this->db->get_where('usuario',array('login'=>$login));
        return $query->row_array();
    }

    public function habilitarUsuario($id,$tipo_acesso,$acesso){
        if ($acesso != TRUE && $acesso !=FALSE) {
            return FALSE;
        } else {
            switch ($tipo_acesso) {
                case 'admin':
                    $data = array('admin' => $acesso);
                case 'professor':
                    $data = array('professor' => $acesso);
                default:
                    return FALSE;
            }
            $this->db->where('id',$id);
            $this->db->update('usuario',$data);
            return ($this->db->affected_rows()>0?TRUE:FALSE);
        }
    }

    public function autenticarUsuario($login,$senha) {
        $data = array(
            'login' => $login,
            'senha' => $senha
        );
        $query = $this->db->get_where('usuario',$data);
        return $query->row_array();
    }

    public function ativarUsuario($id,$ativo) {
        $data = array(
            'ativo' => $ativo
        );
        $this->db->where('id',$id);
        $this->db->update('usuario',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    public function registrarAluno($login,$senha,$nome,$chave){
        //Esta função serve para o aluno fazer seu cadastro no site
        //Ativo vem TRUE por definição
        //A senha já vem hasheada
        $data = array(
            'login'         =>  $login,
            'senha'         =>  $senha,
            'nome'          =>  $nome,
            'chave_acesso'  => $chave,
            'ativo'         =>  '0',
            'admin'         =>  '0',
            'professor'     =>  '0'
        );
        $this->db->insert('usuario',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    } 

    public function incluirUsuario($login,$nome,$ativo,$admin,$professor) {
        $data = array(
            'login'     =>  $login,
            "nome"      =>  $nome,
            'ativo'     =>  $ativo,
            'admin'     =>  $admin,
            'professor' =>  $professor
        );
        $this->db->insert('usuario',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Atualizar dados do usuario
    public function atualizarUsuario($id,$login,$nome,$ativo,$admin,$professor){
        $data = array(
            'login'     =>  $login,
            "nome"      =>  $nome,
            'ativo'     =>  $ativo,
            'admin'     =>  $admin,
            'professor' =>  $professor
        );
        $this->db->where('id',$id);
        $this->db->update('usuario',$data);
        return ($this->db->affected_rows()>0?TRUE:FALSE);
    }

    //Carrega lista de usuarios
    public function listarUsuarios() {
        //$query = $this->db->get_where('usuarios',array('ativo'=>$ativo));
        $query = $this->db->get('usuario');
        if (!$query->num_rows() > 0) {
            die("Nenhum registro encontrado.");
        }
        return $query->result_array();
    }

    //Carrega informações de um único usuário
    public function lerUsuario($id){
        $query = $this->db->get_where('usuario',array('id'=>$id));
        if (!$query->num_rows() > 0) {
            die("Nenhum registro encontrado.");
        }
        //return $query->result_array();
        return $query->row_array();
    }

}