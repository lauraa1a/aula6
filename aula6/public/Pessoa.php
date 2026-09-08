<?php
namespace App\model;
class Pessoas { 

    private ?int $id = null;
    private string $nome;
    private ?string $telefone;
    private string $cpf;
    private ?string $endereco;
    private ?string $createdAt = null;
    private ?string $updatedAt = null;

    // ID
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    // Nome
    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    // Telefone
    public function getTelefone(): ?string {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void {
        $this->telefone = $telefone;
    }

    // CPF
    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    // Endereço
    public function getEndereco(): ?string {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): void {
        $this->endereco = $endereco;
    }

    // Created At
    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void {
        $this->createdAt = $createdAt;
    }

    // Updated At
    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): void {
        $this->updatedAt = $updatedAt;
    }
 
} 
 
?>