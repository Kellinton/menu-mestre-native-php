<?php 


class Conexao{

    public static function LigarConexao(){
        //PDO serve para fazer conexão com o banco de dados
        $conn = new PDO('mysql:dbname=dbmenumestre;host=localhost', 'root', '');
        //$conn = new PDO('mysql:dbname=u283879542_webdequebrada;host=smpsistema.com.br', 'u283879542_webdequebrada', 'SenacAgencia01'); //banco hospedado no servidor
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    }

    

}