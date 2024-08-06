<?php
$router = new Router();

$router->get('/api/todos', fn() => require 'controllers/getTask.php');

$router->post('/apitodos', fn() => require 'controllers/addTask.php');

$router->get('/api/delete', fn() => require 'controllers/getTask.php');

























header("Content-Type: application/json");