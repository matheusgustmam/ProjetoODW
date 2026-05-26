<?php

namespace model;

use Doctrine\ORM\Mapping as ORM;
use Endereco;

#[ORM\Entity] //Entity funciona pra gente refenrciar uma tabela. O Doctrine vai
#[ORM\Table(name: 'tb_cliente')] //Table funciona pra gente mudar o nome
class Cliente extends GenericModel{

    #[ORM\Column(type: 'string', nullable: false)] //Column funciona pra gente definir as
    private $nome;

    #[ORM\Column(type: 'string')]
    private $cpf;

    #[ORM\Column(type: 'date')] // o date só guarda a data. Se quer
    private $data_nascimento;

    #[ORM\OneToOne(targetEntity: Endereco::class,cascade:['all'], orphanRemoval:true, fetch: 'EAGER')]
    #[orm\JoinColumn(name: 'endereco_id')]
    private $endereco;

    #[ORM\OneToMany(mappedBy: "cliente",
        targetEntity:Contato::class, fetch: 'LAZY', orphanRemoval: true, cascade: ['all'],)]
    private $contatos;

    #[ORM\Column(type: 'string', nullable: true)]
    private $urlFotoPerfil;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setDataNascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
    }

    public function getDataNascimento(){
        return $this->data_nascimento;
    }

    public function setEndereco(Endereco $endereco){
        $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }

}
