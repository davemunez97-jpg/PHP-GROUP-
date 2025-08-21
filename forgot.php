<?php
// forgot.php
session_start();

// For demonstration, we’ll just check if email is posted
// Later we can connect this to MySQL and send actual reset emails
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='alert alert-danger'>Invalid email address.</div>";
    } else {
        // TODO: Replace with actual DB lookup + reset link email
        $message = "<div class='alert alert-success'>If an account with <strong>$email</strong> exists, a reset link has been sent.</div>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password • MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/forgot.css" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample" aria-controls="navbarsExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container forgot-main">
  <h1 class="forgot-title">Forgot password</h1>
  <p class="form-text small mb-4">Enter your email and we’ll send you a reset link.</p>

  <!-- Show success/error message -->
  <?php if (!empty($message)) echo $message; ?>

  <form class="needs-validation" method="POST" novalidate>
    <div class="mb-3">
      <label for="forgotEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="forgotEmail" name="email" placeholder="you@example.com" required>
      <div class="invalid-feedback">Please enter a valid email.</div>
    </div>
    <button class="btn btn-primary" type="submit">Send reset link</button>
    <a href="login.php" class="btn btn-link">Back to login</a>
  </form>
</main>

<footer class="border-top py-4 mt-5">
  <div class="container small text-muted d-flex flex-wrap justify-content-between">
    <span>© 2025 MyApp</span>
    <span>Built with Bootstrap 5</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Bootstrap client-side validation (vanilla)
(()=>{
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form=>{
    form.addEventListener('submit', e=>{
      if(!form.checkValidity()){
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
</body>
</html>
