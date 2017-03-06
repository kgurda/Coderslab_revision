<?php
include_once __DIR__ . '/./Client.php';
class UserSet implements Iterator {
    private $list;
    private $key;
    
    public function __construct ()
    {
        $this->list =[];
        $this->key = 0;
    }
    
    public function add(Client $client) {
         $this->list[] = $client; 
    }
    
    public function current() {
        return $this->list[$this->key];
    }

    public function key() {
        return $this->key;
    }

    public function next() {
        $this->key++;
    }

    public function rewind() {
         $this->key = 0;
    }

    public function valid(): bool {
        return isset($this->list[$this->key]);
    }
}