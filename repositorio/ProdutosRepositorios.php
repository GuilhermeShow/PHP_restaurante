<?php

class ProdutosRepositorios{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    private function formarObjeto($dados)
    {
        return new ProdutoModelo(
            $dados['id'],
            $dados['prato'],
            $dados['descricao'],
            $dados['categoria'],
            $dados['imagem'],
            $dados['preco']
        );
    }

    public function listar():array
    {
        $sql = "SELECT * FROM prato";
        $resuts_pratos = $this->pdo->query($sql);
        $produtos = $resuts_pratos->fetchAll(PDO::FETCH_ASSOC);

        $dados = array_map(function ($prato) {
        return new ProdutoModelo($prato["id"], $prato["prato"], $prato["descricao"], $prato["categoria"], $prato["imagem"], $prato["preco"]);
        }, $produtos);

        return $dados;

    }

    public function opcoes(string $categoria): array
    {
        $sql1 = "SELECT * FROM prato WHERE categoria = '$categoria' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe){
            return $this->formarObjeto($cafe);
        },$produtosCafe);

        return $dadosCafe;
    }

    

    public function deletar(int $id) 
    {
        $sql = "DELETE FROM prato WHERE id = ?";
        $resultado_delete = $this->pdo->prepare($sql);
        $resultado_delete->bindValue(1, $id);
        $resultado_delete->execute();
    }

    public function salvar(ProdutoModelo $produto)
    {
        $sql = "INSERT INTO prato (prato, descricao, categoria, imagem, preco) VALUES (?,?,?,?,?)";
        $results = $this->pdo->prepare($sql);
        $results->bindValue(1, $produto->getPrato());
        $results->bindValue(2, $produto->getDescricao());
        $results->bindValue(3, $produto->getCategoria());
        $results->bindValue(4, $produto->getImagem());
        $results->bindValue(5, $produto->getPreco());
        $results->execute();
    }
    public function buscar(int $id)
    {
        $sql = "SELECT * FROM prato WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(ProdutoModelo $produto)
    {
        $sql = "UPDATE prato SET prato = ?, descricao = ?, imagem = ?, categoria = ?, preco = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->getPrato());
        $statement->bindValue(2, $produto->getDescricao());
        $statement->bindValue(3, $produto->getImagem());
        $statement->bindValue(4,$produto->getCategoria());
        $statement->bindValue(5, $produto->getPreco());
        $statement->bindValue(6, $produto->getId());
        $statement->execute();
    }
}