<h2>Prijavite se</h2>
    <form action="<?php echo base_url('index.php/validateSingnin'); ?>" method="post">
        <label for="username">Uporabnisko ime:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Geslo:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Potrdi</button>
    </form>
