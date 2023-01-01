<?php

class HistoricoCompra{

    private int $idHistoricoCompra;
    private int $idCliente;
    private string $dataCompra;
    private int $idProduto;
    private string $nomeProduto;
    private string $tipoProduto;
    private float $valor;
    
    public function __construct(
        int $idHistoricoCompra,
        int $idCliente,
        string $dataCompra,
        int $idProduto,
        string $nomeProduto,
        string $tipoProduto,
        float $valor
        )
        {
        $this->idHistoricoCompra = $idHistoricoCompra;
        $this->idCliente = $idCliente;
        $this->dataCompra = $dataCompra;
        $this->idProduto = $idProduto;
        $this->nomeProduto = $nomeProduto;
        $this->tipoProduto = $tipoProduto;
        $this->valor = $valor;
    }
    
    //Metodos acessores Getters e Setters 
    public function getIdHistoricoCompra(): int{
        return $this->idHistoricoCompra;
    }

    public function setIdHistoricoCompra(int $idHc): void{
        $this->idHistoricoCompra = $idHc;
    }

    public function getIdCliente(): int
    {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    public function getDataCompra(): string{
        return $this->dataCompra;
    }

    public function setDataCompra(string $dataC): void{
        $this->dataCompra = $dataC;
    }

    public function getIdProduto(): int
    {
        return $this->idProduto;
    }

    public function setIdProduto(int $idProduto): void
    {
        $this->idProduto = $idProduto;
    }

    public function getNomeProduto(): string{
        return $this->nomeProduto;
    }

    public function setNomeProduto(string $nome): void{
        $this->nomeProduto = $nome;
    }

    public function getTipoProduto(): string{
        return $this->tipoProduto;
    }

    public function setTipoProduto(string $tipo): void{
        $this->tipoProduto = $tipo;
    }

    public function getValor(): float{
        return $this->valor;
    }

    public function setValor(float $valor):void{
        $this->valor = $valor;
    }

}