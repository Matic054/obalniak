<div class="single-event">
<h1 style="text-align:center;"><?php echo $event[0]->title; ?></h1>
<?php
    if (strlen($event[0]->user_image[0]['profile_picture']) > 10){
        $binaryData = $event[0]->user_image[0]['profile_picture'];

        $base64Image = base64_encode($binaryData);
        ?>
        <div class="button-container">
        <img style="width:5%" class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika uporabnika">
        </div>
        <div class="button-container">
        <h2 >Avtor: <?php echo $event[0]->username; ?></h2 style="text-align:center;">
        </div>
        <br>
        <?php
    } else {
        ?>
            <h2 style="text-align:center;">Avtor: <?php echo $event[0]->username; ?></h2 style="text-align:center;">
        <?php
    }
?>
<p class="text"><?php echo nl2br($event[0]->text); ?></p>

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
