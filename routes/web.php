<?php
require_once 'src/Router.php';
require_once 'src/DB.php';
require_once 'src/users.php';
require_once 'src/Todo.php';



$router =new Router();

$router->get('/',function() {
    if(isset($_SESSION['user'])) {
        header("location:/register");
        exit();
    }else{
        require 'view/pages/home.php';
    }
});


$get=$router->get('/todos', fn() =>require 'view/pages/todos.php');
$todo=new Todo();




    

 
$router->post('/add-todo', fn() => require 'controllers/addTask.php');






$router->get('/delete', fn() => require 'controllers/deleteTask.php');
   




 $router->get('/toggle', fn() => require 'controllers/toggleTask.php');


//$get=$router->get('/', fn() =>  require 'view/pages/home.php');

$router->get('/register', function() {
    require 'view/pages/register.php';
});

$router->post('/register', function() {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        if ($user->register($username, $email, $password)) {
            header("Location: /"); 
        } else {
            echo "Registration failed!";
        }
    } else {
        echo "Please fill all fields!";
    }
    exit();
});


$router->get('/login', function() {
    require 'view/pages/login.php';
});

$router->post('/login', function() {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        $authenticatedUser = $user->login($username, $password);

        if ($authenticatedUser) {
        
            $_SESSION['user'] = $authenticatedUser;
            header("Location: /");
        } else {
            echo "Login failed!";
        }
    } else {
        echo "Please fill all fields!";
    }
    exit();
});

$router->get('/logout', function() {
        header("Location: /");
        exit();
});



