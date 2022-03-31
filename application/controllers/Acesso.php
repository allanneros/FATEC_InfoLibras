<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/controllers/mail/MailNotificacoes.php');


//Controller Acesso
//Neros Labs
//Este controller serve para cuidar das funções de acesso ao sistema
class Acesso extends CI_Controller {

    function __construct() { 
        parent::__construct();
    }

    public function index() {
        //Exibe a tela de autenticação  
        $data['pageTitle'] = "Acesso ao sistema";
        $data['retorno'] = "";

        $form_login = $this->input->post('form_login');
        $form_senha = $this->input->post('form_senha');
 
        if ($form_login == NULL) {
            $data['retorno'] = "";
        } else {
            $acesso = $this->autenticar($form_login,$form_senha);

            if ($acesso != NULL) {
                //Verifica se o usuário está ativo
                $this->iniciarSessao($acesso);
                $sessao = lerSessaoAtual();
                
                if (!$sessao['usuario_ativo']) {
                    $data['retorno'] = "Seu usuário está inativo na plataforma.";

                } else {
                    redirect(base_url() . index_page() . '/inicio');

                }
                
            } else {
                $data['retorno'] = 'Usu&aacute;rio ou senha inv&aacute;lidos.';

            }
        }

        $this->load->view('header',$data);
        $this->load->view('acesso/login',$data);
        $this->load->view('footer',$data);
    }

    //Ativar
    //Serve para o usuário ativar a sua conta no site
    function ativar($chave=NULL){
        $this->load->model('usuario_model');

        $data['pageTitle'] = "Ativação de novo usuário";

        //Se nao tiver chave, significa que é um novo pedido de senha
        if ($chave==NULL) {
            $form_login = $this->input->post('form_login');

            //Se for a primeira visita exibir o form de solicitação
            if ($form_login == NULL) {
                $data = NULL;
            } else {
                //Caso contrário, localizar o e-mail no sistema... 
                $usuario = $this->usuario_model->localizarUsuario($form_login);
                
                //...e se encontrado gerar uma chave de acesso...
                if ($usuario != NULL) {
                    $chave = $this->usuario_model->gerarChaveAcesso($usuario['id']);
                    //...e mandar por e-mail para o cara
                    if ($chave != NULL) {
                        //TODO: aplicar o modelo de notificação para ativação
                        //enviar_email($usuario['login'],'Sua chave de acesso','Chave: ' . $chave);
                        $data['retorno'] = 'Foi gerada uma chave de acesso e enviada em seu e-mail.';
                    }
                }
                
            }

            $this->load->view('header',$data);
            $this->load->view('acesso/ativar',$data);
            $this->load->view('footer',$data);

        //Se foi gerada uma chave, verificar se confere com o que está no registro e reativa o cara
        } else {
            $registro = $this->usuario_model->localizarUsuarioChave($chave);
            if ($registro !=NULL) {
                //Se a chave confere, ativa o usuário e retorna para a tela de login
                $this->usuario_model->ativarUsuario($registro['id'],'-1');
                $this->index();
            }
        }
    }

    //Recuperar
    //Serve para o usuário recuperar o acesso
    //O usuário deverá informar um e-mail válido e se encontrado o sistema irá gerar uma chave 
    //  temporária para que ele possa definir uma nova senha
    function recuperar(){
        $this->load->model('usuario_model');

        $form_login = $this->input->post('form_login');

        $data['pageTitle'] = "Recuperar acesso";

        //Se for a primeira visita exibir o form de solicitação
        if ($form_login == NULL) {
            $data = NULL;
        } else {
            //Caso contrário, localizar o e-mail no sistema... 
            $usuario = $this->usuario_model->localizarUsuario($form_login);
            
            //...e se encontrado gerar uma chave de acesso...
            if ($usuario != NULL) {
                $chave = $this->usuario_model->gerarChaveAcesso($usuario['id']);
                //...e mandar por e-mail para o cara
                if ($chave != NULL) {
                    $info = Array(
                        'mailRecipients'    => $usuario['login'],
                        'recoverKey'        => $chave,
                    );
                    $result = MailNotificacoes::enviarNotificacaoRecuperacao($info);

                    $data['retorno'] = 'Foi gerada uma chave de acesso e enviada em seu e-mail.';
                }
            } else {
                $data['retorno'] = 'Não foi localizado usuário com este e-mail. Verifique e tente novamente.';
            }
                
        }

        $this->load->view('header',$data);
        $this->load->view('acesso/recuperar',$data);
        $this->load->view('footer',$data);

    }

    //Redefinir
    //Serve para alterar a senha de acesso
    function redefinir($chave=NULL){
        $this->load->model('usuario_model');

        $data['pageTitle']  = "Redefinir senha de acesso";
        $data['form_chave'] = "";

        $chave      = $this->input->get('chave', TRUE);
        $form_chave = $this->input->post('form_chave');
        $form_senha = $this->input->post('form_senha');

        //Se a chave foi fornecida na URL, preenche o campo do form
        if ($chave) {
            $data['form_chave'] = $chave;

        //Caso contrário, verifica se a chave está no form (post)
        } elseif (!$form_chave) {
            $data['retorno'] = "Chave inválida";
            //redirect(base_url() . index_page() . '/acesso');

        //Senão, segue o processo para atualização da senha
        } elseif (!$form_senha) {
            $data['retorno'] = "Senha não foi informada";

        } else {
            $registro = $this->usuario_model->localizarUsuarioChave($form_chave);

            if ($registro) {
                //Se a chave confere, ativa o usuário e retorna para a tela de login
                $return = $this->usuario_model->atualizarSenhaUsuario($registro['id'],$form_senha);
                
                if ($return != NULL) {
                    $data['retorno'] = "Senha redefinida com sucesso.";
                    redirect(base_url() . index_page() . '/inicio');

                } else {
                    $data['retorno'] = "Não foi possível alterar a senha.";

                }

            } else {
                $data['retorno'] = "Chave não encontrada.";
            }

        }

        $this->load->view('header',$data);
        $this->load->view('acesso/redefinir',$data);
        $this->load->view('footer',$data);
    }


    //Registrar
    //Serve para o aluno se cadastrar no site
    public function registrar($chave=NULL) {
        $this->load->model('usuario_model');

        $data['pageTitle'] = "Cadastre-se";

        if ($chave == NULL) {
            $form_login             = $this->input->post('form_login');
            $form_nome              = $this->input->post('form_nome');
            $form_senha             = $this->input->post('form_senha');
            $form_senha_confirmacao = $this->input->post('form_senha_confirmacao');
            
            if ($form_login == NULL || $form_nome == NULL || $form_senha == NULL) {
                $data = NULL;
            } else {
                //Senhas conferem?
                if ($form_senha != $form_senha_confirmacao) {
                    $data['retorno'] = 'Senhas n&atilde;o conferem';
                } else {
                    //Faz um hash na senha para encriptar
                    $form_senha = hash('sha512',$form_senha);
                    //$form_senha = password_hash($form_senha,PASSWORD_DEFAULT);
                    
                    //Gera chave de acesso
                    $chave = gerarChave();

                    $registro = $this->usuario_model->registrarAluno($form_login,$form_senha,$form_nome,$chave);
                    if ($registro) {
                        //Se registrou o aluno, envia a chave de ativação por e-mail
                        $info['activationKey']      = $chave;
                        $info['$mailRecipients']    = $form_login;

                        $e = MailNotificacoes::enviarNotificacaoRegistro($info);

                        redirect(base_url() . index_page() . '/inicio');
                    }
                }
            }

        } else {
            //Se tem chave de ativação, localiza e ativa o usuário
            $registro = $this->usuario_model->localizarUsuarioChave($chave);
            if ($registro !=NULL) {
                //Se a chave confere, ativa o usuário e retorna para a tela de login
                $this->usuario_model->ativarUsuario($registro['id'],'-1');
                redirect(base_url() . index_page() . '/inicio');
            } else {
                //Caso contrário, exibe a mensagem e volta para a tela de login
                $data['retorno'] = 'Chave de ativação inválida.';
            }
        }

        $this->load->view('header',$data);
        $this->load->view('acesso/registrar',$data);
        $this->load->view('footer',$data);

    }
    
    //Autentica o usuário no sistema
    public function autenticar($usuario,$senha) {
        $this->load->model('usuario_model');

        //Aqui é necessário fazer o hash da senha para mandar ao banco de dados
        $senha = hash('sha512',$senha);

        //Faz a busca do usuário no sistema e se encontrar preenche os dados de sessão
        $data = $this->usuario_model->autenticarUsuario($usuario,$senha);
        return $data;
    }

    //Iniciar sessão
    //Responsavel por guardar as informações de sessão do usuário logado
    public function iniciarSessao($data) {
        if ($data != NULL) {
            $sessao = array(
                'usuario_id'        => $data['id'],
                'usuario_login'     => $data['login'],
                'usuario_nome'      => $data['nome'],
                'usuario_ativo'     => $data['ativo'],
                'usuario_admin'     => $data['admin'],
                'usuario_professor' => $data['professor']
            );
            
            $this->session->set_userdata($sessao);
            
        } else {
            $this->index();
        }

    }

    public function encerrarSessao(){
        $this->session->unset_userdata('usuario_id');
        redirect(base_url() . index_page() . '/inicio');
    }
}
