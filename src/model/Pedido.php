<?php

namespace model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'tb_pedido')]
class Pedido extends GenericModel{

    #[ORM\Column(type: 'datetime',name: 'data_pedido')]
    private $dataPedido;

    #[ORM\JoinColumn(name: 'cliente_id')]
    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    private $cliente;

    #[ORM\ManyToMany(targetEntity: Produto::class)]
    #[ORM\joinTable(name: 'tb_produto_pedido')]
    #[ORM\joinColumn(name: 'pedido_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'produto_id', referencedColumnName: 'id')]
    private $produtos;

    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;
        return $this;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;
        return $this;
    }


}