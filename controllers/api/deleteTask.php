<?php

$todo= new Todo();
$todo->delete((int)$_GET['todo_id']);
 
 exit();