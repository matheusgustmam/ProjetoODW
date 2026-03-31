<?php

namespace test\dao;

use dao\ClienteDao;
use Endereco;
use model\Cliente;
use model\Contato;
use PHPunit\Framework\TestCase;

class ClienteDaoTest extends TestCase{

    public function testSalvar()
    {
        $cliente = new Cliente();
        $cliente->setNome("herique Pivetti");
        $cliente->setData_nascimento(new DateTime("1990-01-01"));
        $cliente->setCPF("1234567890");
        $clienteInserido = CLienteDao::salvar($cliente);
        $this->assertnotNull($clienteInserido->getId());

    }

    public function testListar(){
        $cliente = Clientedao::listar();
        foreach($cliente as $cliente){
            echo $cliente->getNome()."/n";
        }
    }


    public function testInserirEnderecp(){
        $cliente = new Cliente();
        $cliente->setNome("Isabela");
        $cliente->setCpf("111.111.111-00");
        $cliente->setDataNascimento(new \DateTime("1990-01-01"));

        $endereco = new Endereco();
        $endereco->setLogradouro("Rua A");
        $endereco->setNumero("123");
        $endereco->setBairro("Bairro");
        $endereco->setCidade("Palmas");

        $cliente->setEndereco($endereco);
    }

    public function testInserirClinteContato(){
        $cliente = new Cliente();
        $cliente->setNome("Matheus gustmam");
        $cliente->setCpf("112.212.545.00");
        $cliente->setDataNascimento(new DateTime("1990-01-01"));

        $contato1 = new Contato();
        $contato1->setTelefone("(46)99999-9999");
        $contato1->setEmail("test@gmail.com");
        $contato1->setCliente($cliente);

        $contato2 = new Contato();
        $contato2->setTelefone("(46)99959-9999");
        $contato2->setEmail("gmail@gmail.com");
        $contato2->setCliente($cliente);

        $contatos[] = $contato1;
        $contatos[] = $contato2;

        $cliente->setContatos($contatos);
        $clinteInserido = ClienteDao::salvar($cliente);

        $this->assertNotnull($clinteInserido);
    }
}