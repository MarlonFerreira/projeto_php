<?php

interface IVendedor
{
    public function getId();
    public function getNome();
    public function setNome($nome);
    public function getEmail();
    public function setEmail($email);
    public function getComissaoTotal();
    public function setComissaoTotal($comissaoTotal);
}