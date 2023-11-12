<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alpinist Club</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #0f0f0f;
      color: #ffffff;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #000000;
      padding: 15px 20px; /* Set padding to match the buttons */
    }

    nav img {
      max-height: 40px;
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      padding: 15px 20px;
      margin: 0 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover,
    nav a.selected,
    nav a.prijava:hover,
    nav a.prijava.selected {
      background-color: #ffffff;
      color: #000000;
    }

    /* Style for the "Prijava" button */
    nav a.prijava {
      background-color: #001f3f; /* Dark blue background color */
      color: #ffffff; /* White text color */
    }

    section {
      padding: 20px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .hero {
      text-align: center;
      position: relative;
      padding: 200px 0; /* Double the height by increasing the padding */
      background-color: #1f1f1f;
      background-image: url('background.jpg'); /* Set the background image */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: #ffffff;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(50, 50, 50, 0.7); /* Semi-transparent grey overlay */
      z-index: 1;
    }

    .hero h1,
    .hero p {
      position: relative;
      z-index: 2;
    }

    .hero h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.2em;
      color: #aaaaaa;
    }

    .features {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .feature {
      flex: 1;
      margin: 20px;
      text-align: center;
    }

    .feature img {
      max-width: 100%;
      height: auto;
    }

    footer {
      text-align: center;
      padding: 20px 0;
      background-color: #000000;
      color: #ffffff;
    }
  </style>
</head>
<body>

  <nav>
    <img src="logo.jpg" alt="Logo">
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