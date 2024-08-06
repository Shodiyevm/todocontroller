<?php

class DB {

    protected $pdo; 
 
     public function __construct(){
        var_dump($_ENV);
        $dsn = $_ENV['DB_CONNECTION'] . ":host=" . $_ENV['DB_HOST'] . ";dbname={$_ENV['DB_DATABASE']}";
        //echo $dsn;
        $this->pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
     }

     public function execute($sql, $params = []) {
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute($params);
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }
}





