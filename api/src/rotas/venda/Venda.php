<?php

class Venda implements IVenda
{
    private $id;
    private $vendedorId;
    private $valor;
    private $comissao;

    public function getId()
    {
        return $this->id;
    }

    public function getVendedorId()
    {
        return $this->vendedorId;
    }

    public function setVendedorId($vendedorId)
    {
        $this->vendedorId = $vendedorId;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    public function getComissao()
    {
        return $this->comissao;
    }

    public function setComissao($comissao)
    {
        $this->comissao = $comissao;
        return $this;
    }

}