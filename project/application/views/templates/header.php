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
      <a href="<?php echo base_url('index.php/routes'); ?>">Routes</a>
      <a href="<?php echo base_url('index.php/onas'); ?>">About us</a>
      <a href="<?php echo base_url('index.php/alpine'); ?>">Alpine school</a>
      <a href="<?php echo base_url('index.php/events'); ?>">Events</a>
      <a href="<?php echo base_url('index.php/reports'); ?>">Reports</a>
      <?php if ($this->session->userdata('admin')): ?>
        <a href="<?php echo base_url('index.php/users_view'); ?>">Users</a>
      <?php endif; ?>

  
        <?php if ($this->session->userdata('loggedIn') && $this->session->userdata('has_photo')==FALSE): 
          $user_name = $this->session->userdata('user_name');
          $initial = $user_name[0];
        ?>
          <?php if ($this->session->userdata('admin')==FALSE): ?>
            <a href="#" class="prijava" style="background-color:purple; border-radius:25px;"> <strong> <?php echo $initial ?> </strong> </a>
          <?php else: ?>
            <a href="#" class="prijava" style="background-color:#b8860b; border-radius:25px;"> <strong> <?php echo $initial ?> </strong> </a>
          <?php endif; ?>
        <?php elseif ($this->session->userdata('loggedIn')==FALSE): ?>
          <a href="#" class="prijava">Prijava</a>
        <?php endif; ?>
    </div>
    <?php if ($this->session->userdata('has_photo')):?>
      <img class="prijava" src="data:image/jpeg;base64,<?php echo base64_encode($photo[0]["profile_picture"]); ?>" alt="User Profile Picture">
    <?php endif; ?>
  </nav>