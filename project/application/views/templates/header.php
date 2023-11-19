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

  <nav id="nav">
    <img src='<?php echo base_url('Assets/Images/logo.jpg'); ?>' alt="Logo">
    <div>
      <a href="<?php echo base_url('index.php/'); ?>">Domov</a>
      <a href="<?php echo base_url('index.php/novice'); ?>">Novice</a>
      <a href="<?php echo base_url('index.php/onas'); ?>">O nas</a>
      <a href="<?php echo base_url('index.php/dogodki'); ?>">Dogodki</a>
      <a href="<?php echo base_url('index.php/galerija'); ?>">Galerija</a>
      <a href="<?php echo base_url('index.php/navrhu'); ?>">Na vrhu</a>

      <?php if ($this->session->userdata('loggedIn')): 
	$user_name = $this->session->userdata('user_name');
	$initial = $user_name[0];
      ?>
        <a href="#" class="prijava" style="background-color:purple; border-radius:25px;"> <strong> <?php echo $initial ?> </strong> </a>
      <?php else: ?>
        <a href="#" class="prijava">Prijava</a>
      <?php endif; ?>
    </div>
  </nav>