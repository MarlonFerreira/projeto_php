<?php

class Vendedor implements IVendedor
{
    private $id;
    private $nome;
    private $email;
    private $comissaoTotal;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getComissaoTotal()
    {
        return $this->comissaoTotal;
    }

    public function setComissaoTotal($comissaoTotal)
    {
        $this->comissaoTotal = $comissaoTotal;
        return $this;
    }
}