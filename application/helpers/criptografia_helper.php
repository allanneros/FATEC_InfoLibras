<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Helper criptografia
//Allan Neros
//Contem funcoes relacionadas a criptografia
//Serve para gerar as chaves de acesso 

if ( !function_exists('gerarChave')) {
    function gerarChave() {
        $upper  = implode('', range('A', 'Z')); // ABCDEFGHIJKLMNOPQRSTUVWXYZ
        $lower  = implode('', range('a', 'z')); // abcdefghijklmnopqrstuvwxyzy
        $nums   = implode('', range(0, 9));     // 0123456789

        $alphaNumeric   = $upper.$lower.$nums;  // ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
        $string         = '';                   // string vazia
        $len            = 7;                    // numero de chars

        for($i = 0; $i < $len; $i++) {
            $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
        }

        return $string;                         // ex: q02TAq3        
    }
}
