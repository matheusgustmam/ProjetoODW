<?php
namespace model;
//Os namespace ajudam a organizar o codigo
//Sao semelantes aos pacotes no java

use Doctrine\ORM\Mapping as ORM;


#[ORM\MappedSuperclass] // MappedSuperclass serve para referenciar uma super
abstract class GenericModel{

    #[ORM\Id] //Indicar que esta coluna e uma chave primaria
    #[ORM\GeneratedValue] //Indicar que o campo deve ser gerado pelo banco
    #[ORM\Column(type: 'integer')] //Estabelecer o tipo da coluna
    private $id;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }


}