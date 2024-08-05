<?php
$todo= new Todo();
$todos=$todo->getTodos();



?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Update</th>
      <th scope="col">Delate</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if($todos){
        foreach($todos as $todo){
       
       echo  "<tr>
       <th scope='row'>$todo->id</th>
        <td>$todo->title</td>
        <td>$todo->status</td>
          <td> <a class='btn btn-primary' href='/toggle?todo_id=$todo->id'>Update</a> </td>
        <td> <a class='btn btn-danger' href='/delete?todo_id=$todo->id'>Delete</a> </td>
      </tr>";
        }
    }
?>
  </tbody>
</table>