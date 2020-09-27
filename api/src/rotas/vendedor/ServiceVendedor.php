<?php

class ServiceVendedor
{
    private $db;
    private $vendedor;

    public function __construct(IConexao $db, IVendedor $vendedor)
    {
        $this->db = $db->connect();
        $this->vendedor = $vendedor;
    }

    public function lista()
    {
        $query = "select * from `tab_vendedores`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function cadastro()
    {
        $query = "insert into `tab_vendedores` (`vendedor_nome`, `vendedor_email`) VALUES (:vendedor_nome, :vendedor_email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":vendedor_nome",$this->vendedor->getNome());
        $stmt->bindValue(":vendedor_email",$this->vendedor->getEmail());
        $stmt->execute();
        
        $vendedor_id = $this->db->lastInsertId();

        $query = "select `vendedor_id`, `vendedor_nome`, `vendedor_email` from `tab_vendedores` where vendedor_id=:vendedor_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":vendedor_id", $vendedor_id);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}