<?php
class User extends DB {
    public function register($username, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordHash);
            return $stmt->execute();
        
    
    }

    public function login($username, $password) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user && password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error logging in: " . $e->getMessage();
            return false;
        }
    }
}
