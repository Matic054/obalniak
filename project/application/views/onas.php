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
      <h1>O nas</h1>
      <p>Smo alpinisti ...</p>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Alpinist Club. All rights reserved.</p>
  </footer>

</body>
</html>
