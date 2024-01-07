<h1 style="text-align:center;">Sign up</h1>
    <form class="signup-form" action="<?php echo base_url('index.php/validateSingnin'); ?>" method="post" enctype="multipart/form-data">
        <label class="signin-label" for="username">User name:</label>
        <br>
        <input class="form-input" type="text" id="username" name="username" required>
        <br>
        <label class="signin-label" for="email">Email:</label>
        <br>
        <input class="form-input" type="text" id="email" name="email" required>
        <br>
        <label class="signin-label" for="phone">Phone Number:</label>
        <br>
        <input class="form-input" type="text" id="phone" name="phone" required>
        <br>
        <label class="signin-label" for="password">Password:</label>
        <br>
        <input class="form-input" type="password" id="password" name="password" required>
        <br>
        <label class="signin-label" for="image">Profile image:</label>
        <br>
        <input class="form-input" type="file" enctype="multipart/form-data" id="image" name="image" accept="image/*">
        <br>
        <button class="signin-submit" type="submit">Confirm</button>
    </form>
