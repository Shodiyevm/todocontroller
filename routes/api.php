<?php
$router = new Router();

$router->get('/api', function() {
   $todo= new Todo();   
   echo json_encode($todo->getTodos(),   JSON_PRETTY_PRINT);
   header('Content-Type: application/json');
    
});