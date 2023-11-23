<h3><?php echo $alpine[0]->title; ?></h3>
<p>Avtor: <?php echo $alpine[0]->username; ?></p>
<p><?php echo $alpine[0]->text ?></p>

<?php if ($alpine_images): ?>
<?php foreach ($alpine_images as $image): ?>
    <?php
    // Extract the binary data from the array
    $binaryData = $image['image'];

    // Convert binary data to base64
    $base64Image = base64_encode($binaryData);
    ?>
    <img class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">

<?php endforeach; ?>
<?php endif; ?>
