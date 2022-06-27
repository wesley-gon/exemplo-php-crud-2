<?php
namespace CrudPoo;
use PDO;

final class Fabricante {
    private int $id;
    private string $nome;

    /* Esta prorpiedade receberá os recursos PDO através da classe Banco (dependência do projeto) */
    private PDO $conexao; 

    public function __construct()
    {
        /* no momeno em ue for criado um objeto a partir d classe Fabricante, automaticamente será feita a conexão com o banco. */ 
        $this->conexao = Banco::conecta();
    }
  
































      public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }
}