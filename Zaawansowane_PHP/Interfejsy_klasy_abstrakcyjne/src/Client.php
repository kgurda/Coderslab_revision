<?php
include_once 'User.php';

class Client extends User {
    protected function checkLogin($login, $password) {
        return $this->username ==$login && $this->password==$password;
    }

    protected function setLogin($login) {
        $this->username=$login;
    }

    protected function setPassword($password) {
        if(strlen($password)>7) {
            $this->password=$password;
        } else {
            throw new Exception('za krótkie hasło');
        }
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
}
