<?php

namespace Album\Model;

class Album{

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $situacao;

    public function exchangeArray(array $data){ //recebe um array dados
        $this->id = !empty($data['id']) ? $data['id'] : null; // Se data[id] nao for fazio,se sim data[id], se nao data[id] : null
        $this->nome = !empty($data['nome']) ? $data['nome'] : null;        
        $this->sobrenome = !empty($data['sobrenome']) ? $data['sobrenome'] : null;                
        $this->email = !empty($data['email']) ? $data['email'] : null;         
        $this->situacao = !empty($data['situacao']) ? $data['situacao'] : null;           
    }
    //Gatters e Setters 
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome){
        return $this->sobrenome = $sobrenome;
    }    

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email = $email;
    }  

    public function getSituacao(){
        return $this->situacao;
    }

    public function setSituacao($situacao){
        return $this->situacao = $situacao;
    }


}
//private $id;
// private $nome;
// private $sobrenome;
// private $email;
// private $situacao;