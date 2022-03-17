<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper e-Mail
//Allan Neros
//Contem funcoes relacionadas a envio de e-mail
//Usa a propria biblioteca do CodeIgniter

if ( !function_exists('sendMail')) {
    function sendMail($mailRecipients,$mailSubject,$mailBody) {

        $CI =& get_instance();

        $mailConfig = array(
            'charset'   =>  'utf-8',
            'mailtype'  =>  'html',
            'CRLF'      =>  '\r\n',
            'newline'   =>  '\r\n'
        );
        $CI->load->library('email',$mailConfig);

        $CI->email->from(LABS_MAIL_SENDER, APP_NAME);
        $CI->email->reply_to(LABS_MAIL_REPLY_TO);

        $mailBody = _renderTemplate($mailSubject,$mailBody);
        $CI->email->subject($mailSubject);     
        $CI->email->message($mailBody);

        if (!is_array($mailRecipients)) {
            $CI->email->to($mailRecipients);
        } else {
	        foreach ($mailRecipients as $recipient) {
	    	    $CI->email->to($recipient);     
	        }
        }

        //Se enviou, retorna texto de sucesso, caso contrário retorna o erro
        if ($CI->email->send()) {
            return 'e-Mail enviado com sucesso';
        } else {
            return $CI->email->print_debugger();
        }

    }   
}

if ( !function_exists('_renderTemplate')) {
    function _renderTemplate($mailTitle, $mailBody) {
        //Pego o template padrão na pasta Mail
        $templateBody   = file_get_contents(__DIR__ . '/mail_template.html');
        $tidy           = tidy_parse_string($templateBody);
        $templateBody   = $tidy->Body()->value;

        //converter os caracteres especiais
        $templateBody   = mb_convert_encoding($templateBody,'UTF-8');

        //substitui titulo e corpo
        $templateBody = str_replace("{{mailTitle}}",$mailTitle,$templateBody);
        $templateBody = str_replace("{{mailBody}}",$mailBody,$templateBody);

        return $templateBody;
    }
}


if ( !function_exists('enviar_email_registro')) {
    function enviar_email_registro($email,$nome,$chave) {
        //Envia e-mail com link para ativação do cadastro de novo usuário
        if ($email == NULL || $nome == NULL || $chave == NULL) {
            return FALSE;
        } else {
            //Prepara o e-mail para envio do link
            $link = '<a href="' . base_url() . index_page() . '/acesso/registrar/' . $chave .  '">Link de ativa&ccedil;&atilde;o</a>';
            
            $mensagem = 'Ol&aacute;, '. $nome . ',<br>';
            $mensagem .= 'Agradecemos seu cadastro em nosso portal.' . '<br>';
            $mensagem .= 'Para ativar seu registro, clique no link abaixo:' . '<br>';
            $mensagem .= $link . '<br>';
            $mensagem .= 'Se o link n&atilde;o funcionar, acesse a página de registro e cole esta chave: ' . $chave;

            enviar_email($email,'Curso em Libras - Ativa&ccedil;&atilde;o de novo cadastro',$mensagem);
        }
    }
}
