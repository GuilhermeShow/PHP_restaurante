<?php 
class ProdutoModelo {

    private ?int $id;
    private string $prato;
    private string $descricao;
    private string $categoria;
    private string $imagem;
    private float $preco;

    public function __construct(?int $id, string $prato, string $descricao, string $categoria, string $imagem, float $preco) {

        $this->id = $id;
        $this->prato = $prato;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->imagem = $imagem;
        $this->preco = $preco;

    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getPrato(): string
    {
        return $this->prato;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function getCategoria(): string
    {
        return $this->categoria;
    }
    public function getImagem(): string
    {
        return $this->imagem;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }

    public function precoFormatado() {
        return number_format($this->preco, 2);
    }


    
}