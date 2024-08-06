<?php
 $todo = new Todo();
 $todo->saveTodo($_POST['todo']);
 header("location:/todos");
 exit();