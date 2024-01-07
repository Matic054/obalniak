<form action="<?php echo base_url('index.php/create_alpine'); ?>" method="post" enctype="multipart/form-data" class="beautiful-form">
    <label class="form-label" for="title">Post Title:</label>
    <input class="form-input" type="text" name="title" required>

    <label class="form-label" for="text">Post Text:</label>
    <textarea class="form-input" name="text" required></textarea>

    <label class="form-label" for="images">Post Images:</label>
    <input class="form-input" type="file" enctype="multipart/form-data" name="images[]" multiple accept="image/*, application/pdf">

    <button class="form-button" type="submit">Submit</button>
</form>