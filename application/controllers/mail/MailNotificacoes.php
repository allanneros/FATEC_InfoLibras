<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*  CLASSE MAIL RECUPERAR ACESSO
    CONTEM AS FUNÇÕES RELACIONADAS À FUNCAO DE NOTIFICAÇÃO
*/ 
abstract class MailNotificacoes {

    public function __construct()  {
        parent::__construct();
    }
    public function __destruct() {
    }

    public static function enviarNotificacaoRegistro($info) {
        $mailSubject    = "Registro no site";
        $mailBody       = "Olá! <br>"
                        . "Estamos contentes com seu registro em nosso site."
                        . "<br>"
                        . "Acesse o endereço abaixo para redefinir a sua senha: <br>"
                        . "<a href='" . base_url() . index_page() . '/Acesso/Ativar?chave=' . $info['activationKey'] . "'>"
                        . "Ativar a conta"
                        . "</a";

        sendMail($info['mailRecipients'],$mailSubject,$mailBody);
    }

    public static function enviarNotificacaoRecuperacao($info) {
        $mailSubject    = "Recuperação de acesso ao site";
        $mailBody       = "Olá! <br>"
                        . "Recebemos sua solicitação de recuperação do acesso ao site."
                        . "<br>"
                        . "Acesse o endereço abaixo para redefinir a sua senha: <br>"
                        . "<a href='" . base_url() . index_page() . '/Acesso/Redefinir?chave=' . $info['recoverKey'] . "'>"
                        . "Redefinir minha senha"
                        . "</a";

        sendMail($info['mailRecipients'],$mailSubject,$mailBody);
    }

}
