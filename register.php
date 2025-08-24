<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName   = htmlspecialchars($_POST["firstName"]);
    $middleName  = htmlspecialchars($_POST["middleName"]);
    $lastName    = htmlspecialchars($_POST["lastName"]);
    $suffix      = htmlspecialchars($_POST["suffix"]);
    $email       = htmlspecialchars($_POST["regEmail"]);
    $password    = $_POST["regPassword"];
    $confirmPass = $_POST["regConfirm"];
    $terms       = isset($_POST["terms"]);

    $errors = [];

    // Basic validation
    if (empty($firstName)) $errors[] = "First name is required.";
    if (empty($lastName))  $errors[] = "Last name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
    if ($password !== $confirmPass) $errors[] = "Passwords do not match.";
    if (!$terms) $errors[] = "You must agree to the terms.";

    if (empty($errors)) {
        // Here’s where you'd save to database later
        $success = "✅ Registration successful for $firstName $lastName!";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register • MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/register.css" rel="stylesheet">
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
        <li class="nav-item"><a class="nav-link active" href="register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

  <main class="container my-5 register-main slide-up">
      <h1 class="h3 mb-4 fw-bold">Create an account</h1>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
          <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
              <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif; ?>

      <form class="row g-3 needs-validation" method="POST" novalidate>
        <div class="col-md-4">
          <label for="firstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" required>
          <div class="invalid-feedback">First name is required.</div>
        </div>

        <div class="col-md-4">
          <label for="middleName" class="form-label">Middle name</label>
          <input type="text" class="form-control" id="middleName" name="middleName">
        </div>

        <div class="col-md-4">
          <label for="lastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" required>
          <div class="invalid-feedback">Last name is required.</div>
        </div>

        <div class="col-md-3">
          <label for="suffix" class="form-label">Suffix</label>
          <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Jr., Sr., III">
        </div>

        <div class="col-12">
          <label for="regEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="you@example.com" required>
          <div class="invalid-feedback">A valid email is required.</div>
        </div>

        <div class="col-md-6">
          <label for="regPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="regPassword" name="regPassword" required minlength="6">
          <div class="invalid-feedback">Min 6 characters.</div>
        </div>

        <div class="col-md-6"></div>

        <div class="col-md-12">
          <label for="regConfirm" class="form-label">Confirm password</label>
          <input type="password" class="form-control" id="regConfirm" name="regConfirm" required minlength="6">
          <div class="invalid-feedback">Please confirm your password.</div>
        </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">I agree to the terms</label>
            <div class="invalid-feedback">You must agree before submitting.</div>
          </div>
        </div>

        <div class="col-12 d-flex gap-2">
          <button class="btn btn-success" type="submit">Create account</button>
          <a href="login.php" class="btn btn-link">Already have an account?</a>
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
    (()=>{ 'use strict';
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
