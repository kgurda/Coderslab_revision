<?php

abstract class User {
    protected $username;
    protected $password;
    private $count;


    public function __construct($username, $password) {
        $this->setLogin($username);
        $this->setPassword($password);
        $this->count=0;
    }
    
    abstract protected function checkLogin($login, $password);
    
    abstract protected function setLogin($login);
    
    abstract protected function setPassword($password);
    
    final public function login($username, $password) {
        $result = $this->checkLogin($username, $password);
        if($this->count<3 && $result) {
            $this->count = 0;
            
            return true;
        } else {
            $this->count++;
            
            return false;
        }
    }
    
    public function isBlocked() {
        return $this->count>=3;
    }
}