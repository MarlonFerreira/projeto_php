<?php

class ServiceEmail
{
    private $db;

    public function __construct(IConexao $db)
    {
        $this->db = $db->connect();
    }

    public function lista($data_venda)
    {

        $query = "select tab_vendas.vendedor_id, sum(tab_vendas.valor_venda) as total_vendas, 
                    sum(tab_vendas.valor_comissao) as total_comissao,
                    tab_vendedores.vendedor_email
                    from tab_vendas INNER JOIN tab_vendedores ON tab_vendas.vendedor_id = tab_vendedores.vendedor_id
                    WHERE tab_vendas.data_venda=:data_venda GROUP BY tab_vendas.vendedor_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":data_venda", $data_venda);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}