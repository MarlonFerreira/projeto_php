<?php

class ServiceVenda
{
    private $db;
    private $venda;

    public function __construct(IConexao $db, IVenda $venda)
    {
        $this->db = $db->connect();
        $this->venda = $venda;
    }

    public function lista($id_vendedor)
    {
        $query = "select tab_vendas.pedido_id, tab_vendedores.vendedor_nome, tab_vendedores.vendedor_email,
                    tab_vendas.valor_comissao, tab_vendas.valor_venda, tab_vendas.data_venda
                    from `tab_vendas` INNER JOIN `tab_vendedores` ON tab_vendas.vendedor_id = tab_vendedores.vendedor_id
                    WHERE tab_vendas.vendedor_id=:vendedor_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":vendedor_id", $id_vendedor);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listaUltimoPedido($id_venda)
    {
        $query = "select tab_vendas.pedido_id, tab_vendedores.vendedor_nome, tab_vendedores.vendedor_email,
                    tab_vendas.valor_comissao, tab_vendas.valor_venda, tab_vendas.data_venda
                    from `tab_vendas` INNER JOIN `tab_vendedores` ON tab_vendas.vendedor_id = tab_vendedores.vendedor_id
                    WHERE tab_vendas.pedido_id=:id_venda";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_venda", $id_venda);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function cadastro()
    {
        try {
            $this->db->beginTransaction();

            $query = "select `vendedor_comissao_total` from `tab_vendedores` WHERE vendedor_id=:vendedor_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":vendedor_id", $this->venda->getVendedorId());
            $stmt->execute();
            $comissao_total = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            $query = "update `tab_vendedores` set `vendedor_comissao_total`=:valor_comissao WHERE `vendedor_id`=:vendedor_id";
            $stmt = $this->db->prepare($query);
            $comissao_venda = $this->venda->getComissao();
            $nova_comissao_total = $comissao_total['vendedor_comissao_total'] + $comissao_venda;
            $stmt->bindValue(":vendedor_id", $this->venda->getVendedorId());
            $stmt->bindValue(":valor_comissao", $nova_comissao_total);
            $stmt->execute();

            $query = "insert into `tab_vendas` (`vendedor_id`, `valor_venda`, `valor_comissao`, `data_venda`) VALUES (:vendedor_id, :venda_valor, :venda_comissao, :data_venda)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":vendedor_id", $this->venda->getVendedorId());
            $stmt->bindValue(":venda_valor", $this->venda->getValor());
            $stmt->bindValue(":venda_comissao", $this->venda->getComissao());
            $stmt->bindValue(":data_venda", date("d/m/Y"));
            $stmt->execute();

            $id_venda = $this->db->lastInsertId();
            $this->db->commit();
            return $id_venda;
        } catch (Exception $e) {
            $this->db->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }
}
