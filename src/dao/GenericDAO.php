<?php

namespace dao;

use Exception;
use model\GenericModel;
use utils\Conexao;

class GenericDAO
{
    //Armazenamos a Classe do model que sera implementada
    //Ele é protegido pra permitir acesso das outra classes
    protected static $modelClass;

    //metodo de salvar
    //ele é estatico para não prescisar de inciaçao
    public static function salvar(GenericModel $model){
        try{
            $entityManager = Conexao::getEntityManager();
            $entityManager->beginTransaction(); // sinaliza ao doctrime que uma transacao
            $entityManager->persist($model); // sinaliza que deseja salvar algo ao banco
            $entityManager->flush(); //Gerar SQL correpondente
            $entityManager->commit(); //Torna pemante a persistencia
            return $model; //retorna o model com o ID ja preenchido . o Doctrime
        } catch (Exception $ex){
            $entityManager->rollback();
            throw new Exception("Erro ao salvar o registro. ".$ex->getMessage());

        }
    }

    public static function listar(){
        try{
            $entityManager = Conexao::getEntityManager();
            $repository = $entityManager->getRepository(static::$modelClass); //obtem o repositorio para classe especificada
            return $repository->findAll(); //Executa um 'SELECT * FROM ...
        }catch (Exception $ex){
            throw new Exception("Erro ao listar  . ".$ex->getMessage());
        }
    }

    public static function deletar(GenericModel $model){
        try{
            $entityManager = Conexao::getEntityManager();
            $entityManager->beginTransaction();
            $entityManager->remove($model);
            $entityManager->flush();
            $entityManager->commit();
        }catch (Exception $ex){
            $entityManager->rollback();
            throw new Exception("Erro ao deletar. ".$ex->getMessage());
        }
    }

    public static function buscarId(GenericModel $model){
        try {
            $entityManager = Conexao::getEntityManager();
            $repository = $entityManager->getRepository(static::$modelClass);
            return $repository->find($model->getId());

        }catch (Exception $ex){
            throw new Exception("Erro ao buscar pelo ID. ".$ex->getMessage());
        }
    }

}
