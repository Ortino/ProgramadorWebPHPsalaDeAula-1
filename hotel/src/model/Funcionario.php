<?php

class Funcionario
{
    //O que eu tenho
    private int $idFuncionario;
    private string $nome;
    private string $dataNascimento;
    private string $cpf;
    private string $estadoCivil;
    private string $tipo;
    private string $celular;
    private string $email;
    private string $senha;
    private bool $ativo;

    public function __construct(
        int $idFuncionario,
        string $nome,
        string $dataNascimento,
        string $cpf,
        string $estadoCivil,
        string $tipo,
        string $celular,
        string $email,
        string $senha,
        bool $ativo
    ) {
        $this->idFuncionario = $idFuncionario;
        $this->validaNome($nome);
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->estadoCivil = $estadoCivil;
        $this->tipo = $tipo;
        $this->celular = $celular;
        $this->email = $email;
        $this->senha = $senha;
        $this->ativo = $ativo;
    }

    //Oque eu faço: Métodos 
    private function validaNome(string $nome)
    {
        if (strlen($nome) < 5) {
            echo "Nome precisa ter pelo menos 5 caracters.";
            // exit();
        } else {
            $this->nome = $nome;
        }
    }

    private function verificaCliente(): bool
    {
        // $this->idFuncionario = $idFuncionario;
        if (
            !isset($this->nome) || !isset($this->dataNascimento) || !isset($this->orgao) ||
            !isset($this->cpf) || !isset($this->estadoCivil) || !isset($this->tipo) ||
            !isset($this->celular) || !isset($this->email) || !isset($this->senha) ||
            !isset($this->ativo)
        ) {
            return false;
        }
        return true;
    }


    //Metodos acessores Getters e Setters 
    public function getIdFuncionario(): int
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario(int $idFuncionario): void
    {
        $this->idFuncionario = $idFuncionario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->validaNome($nome);
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {

        $this->cpf = $cpf;
    }

    public function getEstadoCivil(): string
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(string $estadoCivil): void
    {
        $this->estadoCivil = $estadoCivil;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): void
    {
        $this->celular = $celular;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getAtivo(): string
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }
}
