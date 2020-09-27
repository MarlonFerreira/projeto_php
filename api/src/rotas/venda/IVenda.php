<?php

interface IVenda
{
    public function getId();
    public function getVendedorId();
    public function setVendedorId($vendedorId);
    public function getValor();
    public function setValor($valor);
    public function getComissao();
    public function setComissao($comissao);
}