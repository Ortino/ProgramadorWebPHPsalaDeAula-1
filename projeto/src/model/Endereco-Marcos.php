<?php
class Endereco{

    private int $idEnderco;
    private int $idCliente;
    private string $tipo;
    private string $logradouro;
    private string $numero;
    private string $complemento;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $cep;
    
    public function __construct(
        int $idEnderco,
        int $idCliente,
        string $tipo,
        string $logradouro,
        string $numero,
        string $complemento,
        string $bairro,
        string $cidade,
        string $estado,
        string $cep
        )
        {
        $this->idEnderco = $idEnderco;
        $this->idCliente = $idCliente;
        $this->tipo = $tipo;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        }

    //Metodos acessores Getters e Setters 
    public function getIdEndereco(): int{
        return $this->idEnderco;
    }

    public function setIdEndereco(int $idEnderco): void{
        $this->idEndereco = $idEnderco;
    }


    public function setIdContato(int $idContato): void
    {
        $this->idContato = $idContato;
    }

    public function getIdCliente(): int
    {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getLogradouro(): string{
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): void{
        $this->logradouro = $logradouro;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function setNumero(string $numero): void{
        $this->numero = $numero;
    }

    public function getComplemento(): string{
        return $this->complemento;
    }

    public function setComplemento(string $complemento): void{
        $this->complemento = $complemento;
    }

    public function getBairro(): string{
        return $this->bairro;
    }

    public function setBairro(string $bairro): void{
        $this->bairro = $bairro;
    }

    public function getCidade(): string{
        return $this->cidade;
    }

    public function setCidade(string $cidade): void{
        $this->cidade = $cidade;
    }

    public function getEstedo(): string{
        return $this->estado;
    }

    public function setEstado(string $estado): void{
        $this->estado = $estado;
    }

    public function getCep(): string{
        return $this->cep;
    }

    public function setCep(string $cep): void{
        $this->cep = $cep;
    }
}