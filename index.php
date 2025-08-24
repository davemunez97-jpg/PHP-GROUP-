<?php
// index.php - Homepage
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home • MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/index.css" rel="stylesheet">
  </head>
  <body>

    <header class="hero-section d-flex align-items-stretch">
      <!-- image slide show -->

      <div class="hero-content d-flex flex-column justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-dark px-0 pt-3 pb-2">
          <div class="container-fluid">
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
        <div class="hero-text">
          <h1 class="hero-title">We provide creative<br>solutions to turn your<br>ideas into digital reality.</h1>
          <div class="hero-btns mt-4">
            <a class="btn btn-hero" href="#about">More About Us <span class="play-icon">&#9654;</span></a>
          </div>
        </div>
      </div>
      <div class="hero-image">
        <div class="hero-bg-slideshow"> <!-- Slideshow images -->
          <img src="assets/img/guy.jpg" alt="Background 1" class="active" />
          <img src="assets/img/guy 2.jpg" alt="Background 2" />
          <img src="assets/img/guy 3.jpg" alt="Background 3" />
        </div>
      </div>
    </header>

    <!-- Main content can go here if needed -->

    <footer class="border-top py-4 mt-5">
      <div class="container small text-muted d-flex flex-wrap justify-content-between">
        <span>© 2025 MyApp</span>
        <span>Built with Bootstrap 5</span>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Simple slideshow for hero background
      const slides = document.querySelectorAll('.hero-bg-slideshow img');
      let current = 0;
      setInterval(() => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
      }, 3500);
    </script>
  </body>
</html>
