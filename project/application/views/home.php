<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alpinist Club</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('Assets/css/main.css'); ?>">
  <script src="<?php echo base_url('Assets/js/modal.js'); ?>"></script>

</head>
<body>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span id="exit" class="close">&times;</span>
        <!-- Your login form content -->
        <h2>Login</h2>
        <form action="/your-login-endpoint" method="post">
            <!-- Your login form fields -->
        </form>
    </div>
</div>

  <nav>
    <img src='<?php echo base_url('Assets/Images/logo.jpg'); ?>' alt="Logo">
    <div>
      <a href="<?php echo base_url('index.php/'); ?>">Domov</a>
      <a href="<?php echo base_url('index.php/novice'); ?>">Novice</a>
      <a href="<?php echo base_url('index.php/onas'); ?>">O nas</a>
      <a href="<?php echo base_url('index.php/dogodki'); ?>">Dogodki</a>
      <a href="<?php echo base_url('index.php/galerija'); ?>">Galerija</a>
      <a href="<?php echo base_url('index.php/navrhu'); ?>">Na vrhu</a>
      <a href="#" class="prijava">Prijava</a>
    </div>
  </nav>

  <section class="hero">
    <div class="container">
      <h1>Welcome to the Alpinist Club</h1>
      <p>Explore the heights, conquer the peaks, and join us on thrilling adventures.</p>
    </div>
  </section>

  <section class="features">
    <div class="container">
      <div class="feature">
        <img src="mountain-icon.png" alt="Mountain Icon">
        <h2>Challenging Peaks</h2>
        <p>Conquer some of the most challenging peaks in the world with our experienced guides.</p>
      </div>
      <div class="feature">
        <img src="climbing-gear-icon.png" alt="Climbing Gear Icon">
        <h2>Top-notch Equipment</h2>
        <p>We provide top-quality climbing gear to ensure your safety and success on every expedition.</p>
      </div>
      <div class="feature">
        <img src="team-icon.png" alt="Team Icon">
        <h2>Expert Guides</h2>
        <p>Our team of expert guides has years of experience and will lead you on unforgettable journeys.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Alpinist Club. All rights reserved.</p>
  </footer>

</body>
</html>