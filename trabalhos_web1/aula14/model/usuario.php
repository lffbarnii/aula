<?php

namespace aula14\model;

class Usuario{
    private $userName;
    private $userLogin;
    private $userPass;

    public function getUserName(){
        return $this->userName;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function getUserLogin(){
        return $this->userLogin;
    }

    public function setUserLogin($userLogin){
        $this->userLogin = $userLogin;
    }

    public function getUserPass(){
        return $this->userPass;
    }

    public function setUserPass($userPass){
        $this->userPass = $userPass;
    }
}