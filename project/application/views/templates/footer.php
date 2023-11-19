<?php if (false == $this->session->userdata('loggedIn')): ?>
<div class="login-container">
<span class="close">&times;</span>
    <h2>Prijavite se</h2>
    <form class="login-form" action="<?php echo base_url('index.php/formcontroller/validateLoginData'); ?>" method="post">
        <label for="username">Uporabnisko ime:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Geslo:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Potrdi</button>
	<a href="<?php echo base_url('index.php/signin'); ?>">Nimate racuna?</a>
    </form>
</div>
<?php else: 
$user_name = $this->session->userdata('user_name');
?>
<div class="login-container">
<span class="close">&times;</span>
    <h2> <?php echo $user_name ?> </h2>
    <form class="login-form" action="<?php echo base_url('index.php/formcontroller/logOut'); ?>" method="post">
        <button type="submit">Odjava</button>
    </form>
</div>

<?php endif; ?>


 <footer>
    <p>&copy; 2023 Alpinist Club. All rights reserved.</p>
  </footer>

</body>
</html>