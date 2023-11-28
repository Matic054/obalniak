<h2>Prijavite se</h2>
    <form action="<?php echo base_url('index.php/validateSingnin'); ?>" method="post" enctype="multipart/form-data">
        <label for="username">User name:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="image">Profile image:</label>
        <input type="file" enctype="multipart/form-data" id="image" name="image" accept="image/*">

        <button type="submit">Confirm</button>
    </form>
