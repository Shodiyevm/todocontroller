<?php

class Todo extends DB {

    public function saveTodo( $title){

        $stmt = $this->pdo->prepare("INSERT INTO tasks (title) VALUES(:title)");
        $stmt->bindParam(':title', $title);
        $stmt->execute();
    }
    public function getTodo(int $todo_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $todo_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
 public function getTodos(){
 return $this->pdo->query("SELECT * FROM tasks")->fetchAll(PDO:: FETCH_OBJ);
 }

 public function delete(int $todo_id) {
    $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $todo_id, PDO::PARAM_INT);
    return $stmt->execute();
}

public function toggle(int $todo_id) {
    $stmt = $this->pdo->prepare("SELECT status FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $todo_id, PDO::PARAM_INT);
    $stmt->execute();
    $todo = $stmt->fetch(PDO::FETCH_OBJ);

    if ($todo) {
        $new_status = $todo->status == 0 ? 1 : 0;

        $stmt = $this->pdo->prepare("UPDATE tasks SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $new_status, PDO::PARAM_INT);
        $stmt->bindParam(':id', $todo_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    } else {
        return false;
    }
}

}
