<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper e-Mail
//Allan Neros
//Contem funcoes relacionadas a envio de e-mail
//Usa a propria biblioteca do CodeIgniter

if ( !function_exists('enviar_email')) {
    function enviar_email($destinatarios,$assunto,$corpo) {
        $CI =& get_instance();
        $CI->load->library('email');

        $CI->email->from("contato@infolibras.com.br", 'Curso em Libras');
        $CI->email->reply_to("allan@neros.com.br");

        $CI->email->subject($assunto);     
        $CI->email->message($corpo);

        if (!is_array($destinatarios)) {
            $CI->email->to($destinatarios);
        } else {
	        foreach ($destinatarios as $destinatario) {
	    	    $CI->email->to($destinatario);     
	        }
        }

        //Se enviou, retorna texto de sucesso, caso contrário retorna o erro
        if ($CI->email->send()) {
            return 'e-Mail enviado com sucesso';
        } else {
            return $CI->email->print_debugger();
        }

        //$CI->email->to("email_destinatario@dominio.com"); 
        //$CI->email->subject("Assunto do e-mail");
        //$CI->email->cc('email_copia@dominio.com');
        //$CI->email->bcc('email_copia_oculta@dominio.com');
        //$CI->email->message("Aqui vai a mensagem ao seu destinatário");
        //$CI->email->send();
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
