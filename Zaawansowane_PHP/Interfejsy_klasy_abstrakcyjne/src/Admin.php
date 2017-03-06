<?php
include_once 'User.php';

class Admin extends User {
    
    protected function checkLogin($login, $password) {
        return $this->username ==$login && $this->password==$password;
    }

    protected function setLogin($login) {
        $this->username=$login;
    }

    protected function setPassword($password) {
        if(strlen($password)>9) {
            $this->password=$password;
        } else {
            throw new Exception('za krótkie hasło');
        }
    }
}

