<?php

 $todo = new Todo();
 $todo->toggle((int)$_GET['todo_id']);
header("location:/todos");
exit();