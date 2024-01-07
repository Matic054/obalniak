<h2 style="text-align:center">Create advertisement</h2>
    <form action="<?php echo base_url('index.php/create_ad'); ?>" method="post" enctype="multipart/form-data" class="beautiful-form">

    <label for="adurl" class="form-label">Url:</label>
    <input class="form-input" type="text" name="url" id="url" required>

    <br>

    <label for="images" class="form-label">Advertisement image:</label>
    <input type="file" enctype="multipart/form-data" name="image" accept="image/*" class="form-input">

    <button type="submit" class="form-button">Confirm</button>
    </form>