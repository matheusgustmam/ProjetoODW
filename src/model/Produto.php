<?php

namespace model;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "to_produto")]
class Produto extends GenericModel {
   #[ORM\Colunm(type: 'string')]
    private $nome;

   #[ORM\Column(type: 'decimal', precision: 2)]
    private $preco;

   #[ORM\Column(type: 'string')]
    private $descricao;

   #[ORM\ManyToMany(targetEntity: Pedido::class, mappedBy: "produtos")]
   private $pedidos;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getPedidos()
    {
        return $this->pedidos;
    }

    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;
        return $this;
    }



}