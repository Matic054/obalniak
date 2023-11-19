<h3><?php echo $event[0]->title; ?></h3>
<p>Avtor: <?php echo $event[0]->username; ?></p>
<p><?php echo $event[0]->text ?></p>

<?php if ($event_images): ?>
<?php foreach ($event_images as $image): ?>
    <?php
    // Extract the binary data from the array
    $binaryData = $image['image'];

    // Convert binary data to base64
    $base64Image = base64_encode($binaryData);
    ?>

    <img class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">
<?php endforeach; ?>
<?php endif; ?>

<?php foreach ($comments as $comment): ?>
    <p>By: <?php echo $comment->username; ?></p>
    <p><?php echo $comment->comment_text; ?></p>
<?php endforeach; ?>