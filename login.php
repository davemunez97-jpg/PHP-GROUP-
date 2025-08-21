<?php
// login.php

session_start();

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST['loginEmail'] ?? "");
    $password = $_POST['loginPassword'] ?? "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email required.";
    }
    if ($password === "") {
        $errors[] = "Password is required.";
    }

    // Demo login (replace with DB check later)
    if (empty($errors)) {
        if ($email === "test@example.com" && $password === "123456") {
            $_SESSION['user'] = $email;
            header("Location: dashboard.php"); 
            exit;
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login • MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/login.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-5 login-main slide-up">
  <h1 class="h3 mb-4 fw-bold">Login to your account</h1>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach ($errors as $err): ?>
          <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <form class="row g-3 needs-validation" method="post" novalidate>
    <div class="col-12">
      <label for="loginEmail" class="form-label">Email</label>
      <input type="email" class="form-control" name="loginEmail" id="loginEmail" value="<?= htmlspecialchars($_POST['loginEmail'] ?? "") ?>" required>
      <div class="invalid-feedback">A valid email is required.</div>
    </div>

    <div class="col-12">
      <label for="loginPassword" class="form-label">Password</label>
      <input type="password" class="form-control" name="loginPassword" id="loginPassword" required>
      <div class="invalid-feedback">Password is required.</div>
    </div>

    <div class="col-12 d-flex gap-2">
      <button class="btn btn-success" type="submit">Login</button>
      <a href="register.php" class="btn btn-link">Don’t have an account?</a>
    </div>
  </form>
</main>

<footer class="border-top py-4 mt-5">
  <div class="container small text-muted d-flex flex-wrap justify-content-between">
    <span>© 2025 MyApp</span>
    <span>Built with Bootstrap 5</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<button id="scrollTopBtn" title="Go to top" aria-label="Scroll to top">&#8679;</button>
<script>
  // Bootstrap client-side validation
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();

  // Scroll to top button
  const scrollBtn = document.getElementById('scrollTopBtn');
  window.onscroll = function() {
    if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
      scrollBtn.style.display = 'block';
    } else {
      scrollBtn.style.display = 'none';
    }
  };
  scrollBtn.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
</script>
</body>
</html>
