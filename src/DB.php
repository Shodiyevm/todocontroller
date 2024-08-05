<?php

class DB {

    protected $pdo; 
 
     public function __construct(){
         $this->pdo = new PDO('mysql:host=localhost;dbname=todoapp', 'root', '2224');
     }

     public function execute($sql, $params = []) {
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute($params);
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
}

 