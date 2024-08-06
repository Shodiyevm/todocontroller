
<?php
$todo = new Todo();
 $todo->toggle((int)$_GET['todo_id']);
exit();