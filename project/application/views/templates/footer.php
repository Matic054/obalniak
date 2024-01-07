<script>
        function submitForm(event) {
            if (event.keyCode === 13) {
                document.getElementById('myForm').submit();
            }
        }
    </script>
<?php if (false == $this->session->userdata('loggedIn')): ?>
<div class="login-container">
<span class="close">&times;</span>
    <h2>Log in</h2>
    <form id="myForm" class="login-form" action="<?php echo base_url('index.php/formcontroller/validateLoginData'); ?>" method="post">
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Confirm</button>
  <br>
	<a href="<?php echo base_url('index.php/signin'); ?>">Dont have an account?</a>
    </form>
</div>
<?php else: 
$user_name = $this->session->userdata('user_name');
?>
<div class="login-container">
<span class="close">&times;</span>
    <h2> <?php echo $user_name ?> </h2>
    <form class="login-form" action="<?php echo base_url('index.php/formcontroller/logOut'); ?>" method="post">
        <button type="submit">Log out</button>
    </form>
</div>

<?php endif; ?>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sl_SI/sdk.js#xfbml=1&version=v18.0" nonce="Yf4ozaGV"></script>

  <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100086123649589" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
    <blockquote cite="https://www.facebook.com/profile.php?id=100086123649589" class="fb-xfbml-parse-ignore">
      <a href="https://www.facebook.com/profile.php?id=100086123649589">Obalni alpinisticni klub</a>
    </blockquote>
  </div>

  <?php
  if (isset($ad)){
    if (count($ad) > 0){
      $binaryData = $ad[0]->image;
      $base64Image = base64_encode($binaryData);
      ?>
      <div style="float:right;">
        <a href="<?php echo $ad[0]->url; ?>" target="_blank">
          <img class="ad-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="ad image">
        </a>
      </div>
        <?php
    }
  }
  ?>

 <footer>
    <p>&copy; <?php echo date('Y'); ?> Obalni alpinistični klub. All rights reserved.</p>
  </footer>
  <?php
  
  if (isset($wrong_info)){
    ?>
    <script>
      alert("Wrong information!");
    </script>
    <?php
  }

?>
</body>
</html>