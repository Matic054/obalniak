<form action="<?php echo base_url('index.php/create_event'); ?>" method="post" enctype="multipart/form-data">
    <label for="title">Event Title:</label>
    <input type="text" name="title" required>

    <label for="text">Event Text:</label>
    <textarea name="text" required></textarea>

    <label for="images">Event Images:</label>
    <input type="file" enctype="multipart/form-data" name="images[]" multiple accept="image/*, application/pdf">

    <button type="submit">Submit</button>
</form>