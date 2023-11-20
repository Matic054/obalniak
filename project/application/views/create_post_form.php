<form action="<?php echo base_url('index.php/create_post'); ?>" method="post" enctype="multipart/form-data">
    <label for="title">Naslov objave:</label>
    <input type="text" name="title" required>

    <label for="text">Besedilo:</label>
    <textarea name="text" required></textarea>

    <label for="images">Slike:</label>
    <input type="file" enctype="multipart/form-data" name="images[]" multiple accept="image/*">

    <button type="submit">Naredi objavo</button>
</form>