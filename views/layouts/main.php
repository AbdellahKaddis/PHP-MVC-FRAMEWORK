<?php use app\core\Application; ?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
      </ul>
      <?php if(Application::isGuest()) : ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      </ul>
      <?php else : ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/profile">Profile
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName() ?>
          (Logout)
        </a>
        </li>
      </ul>
      <?php endif; ?>
    </div>
</div>
</nav>
<?php if(Application::$app->session->getFlash("success")): ?>

<div class="container">
<div class="alert alert-success">
  <?php echo Application::$app->session->getFlash("success") ?>
</div>
<?php endif; ?>
{{content}}
</div>
</body>
</html>