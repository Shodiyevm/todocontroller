<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">Todo App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/todos">Todos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user'])) : ?>
          <li class="nav-item">
            <span class="nav-link"><?php echo $_SESSION['user']->email; ?></span>
          </li>
          <li class="nav-item">
            <a href="/logout" class="btn btn-outline-danger mx-2">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
          </li>
          <li class="nav-item">
            <a href="/register" class="btn btn-outline-success">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>
