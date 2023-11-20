<h3><?php echo $forum_post[0]->title; ?></h3>
<p>Avtor: <?php echo $forum_post[0]->username; ?></p>
<p><?php echo $forum_post[0]->text ?></p>

<?php if ($post_images): ?>
<?php foreach ($post_images as $image): ?>
    <?php
    // Extract the binary data from the array
    $binaryData = $image['image'];

    // Convert binary data to base64
    $base64Image = base64_encode($binaryData);
    ?>

    <img class="post-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika objave">
<?php endforeach; ?>
<?php endif; ?>

<?php foreach ($comments as $comment): ?>
    <p>By: <?php echo $comment->username; ?></p>
    <p><?php echo $comment->comment_text; ?></p>
<?php endforeach; ?>

<?php if ($this->session->userdata('loggedIn')): ?>
    <form action="<?php echo base_url('index.php/addPostComment/' . $forum_post[0]->post_id); ?>" method="post">
    <label for="text">Dodajte komentar:</label>
    <textarea name="text" required></textarea>
    <button type="submit">Potrdi</button>
</form>
<?php endif; ?>