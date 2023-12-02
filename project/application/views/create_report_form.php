<form action="<?php echo base_url('index.php/create_report'); ?>" method="post" enctype="multipart/form-data" class="beautiful-form">
    <label for="title" class="form-label">Report Title:</label>
    <input type="text" name="title" required class="form-input">

    <label for="text" class="form-label">Report Text:</label>
    <textarea name="text" required class="form-input"></textarea>

    <label for="images" class="form-label">Report Images:</label>
    <input type="file" enctype="multipart/form-data" name="images[]" multiple accept="image/*, application/pdf" class="form-input">

    <button type="submit" class="form-button">Submit</button>
</form>
