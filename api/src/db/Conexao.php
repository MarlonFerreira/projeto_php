<?php

require __DIR__ . '/IConexao.php';
require __DIR__ . '/ConfigBanco.php';

class Conexao implements IConexao
{
    private $DB_SERVER;
    private $DB_USER;
    private $DB_PASSWORD;
    private $DB_BASE_DADOS;

    public function __construct()
    {
        $this->DB_SERVER = DB_SERVER_CONF;
        $this->DB_BASE_DADOS = DB_BASE_DADOS_CONF;
        $this->DB_USER = DB_USER_CONF;
        $this->DB_PASSWORD = DB_PASSWORD_CONF;
    }

    public function connect()
    {
        try{
            return new PDO(
                "mysql:host={$this->DB_SERVER};dbname={$this->DB_BASE_DADOS}", 
                $this->DB_USER, 
                $this->DB_PASSWORD
            ); 
        }
        catch(mysqli_sql_exception $e) {
            echo "Erro" . $e->getMessage();
            exit;
        } 
    }    
}