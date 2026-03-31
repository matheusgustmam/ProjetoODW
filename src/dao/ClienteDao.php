<?php

namespace dao;

use Doctrine\ORM\EntityManager;
use model\Cliente;
use model\Contato;

//Ele ja herda todos os medotos do GenericDAO
class ClienteDao extends GenericDao{

    protected static $modelClass = Cliente::class;

    public static function buscarNome($nome)
    {
        try {
            $em = Conexao::getEntityManager();
            $repository = $em->getRepository(Cliente::class);
            // Usando a chamada "mágica" o doctrine reconhece o "nome" como um atributo de "Cliente" e compreender que desejamos buscar pelo atributo "nome"
            // Existem diferentes combinações e padrões que podem ser usadas nestas chamadas mágicas.
            return $repository->findByNome($nome);
        } catch (Exception $ex) {
            throw new Exception("Falha ao buscar cliente pelo nome. " . $ex->getMessage());
        }
    }



}