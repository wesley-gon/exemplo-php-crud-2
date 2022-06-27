<?php
namespace CrudPoo;
use PDO, Exception;

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
  

    public function lerFabricantes():array {
        $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return $resultado; 
    }

// Inserir um fabricante
function inserirFabricante():void {
    /* :qualquer_coisa -> isso é um named parameter */
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    try {
        $consulta = $this->conexao->prepare($sql);

        /* bindParam('nome do parametro', $variavel_com_valor, constante de verificação) */
        $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
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
        $this->nome = filter_var($nome, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $this;
    }
}