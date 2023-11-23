<form action="<?php echo base_url('index.php/create_alpine'); ?>" method="post" enctype="multipart/form-data">
    <label for="title">Post Title:</label>
    <input type="text" name="title" required>

    <label for="text">Post Text:</label>
    <textarea name="text" required></textarea>

    <label for="images">Post Images:</label>
    <input type="file" enctype="multipart/form-data" name="images[]" multiple accept="image/*, application/pdf">

    <button type="submit">Submit</button>
</form>