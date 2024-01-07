<div class="single-event">
<h1 style="text-align:center;"><?php echo $event[0]->title; ?></h1>
<h3 style="text-align:center;">Avtor: <?php echo $event[0]->username; ?></h3 style="text-align:center;">
<p class="text"><?php echo $event[0]->text ?></p>

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
</div>
