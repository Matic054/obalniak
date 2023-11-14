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
      <h1>Dogodki</h1>
      <p> ... </p>
    </div>
  </section>

<div class="login-container">
<span class="close">&times;</span>
    <h2>Login</h2>
    <form class="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

  <footer>
    <p>&copy; 2023 Alpinist Club. All rights reserved.</p>
  </footer>

</body>
</html>