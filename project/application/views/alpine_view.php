<div class="single-event">
<h1 style="text-align:center;"><?php echo $alpine[0]->title; ?></h1>
<div class="button-container">
<a href="<?php echo base_url('index.php/alpine_chose/' . $alpine[0]->alpine_id); ?>" class="add-event-button">Chose as displayed</a>
</div>
<h3 style="text-align:center;">Avtor: <?php echo $alpine[0]->username; ?></h3>
<p class="text"><?php echo $alpine[0]->text ?></p>

<?php if ($alpine_images): ?>
<?php foreach ($alpine_images as $image): ?>
    <?php
    function startsWith($haystack, $needle) {
        return (strncmp($haystack, $needle, strlen($needle)) === 0);
    }
    $binaryData = $image['image'];

    $base64Image = base64_encode($binaryData);
    if (startsWith($binaryData, "%PDF-")) {
        ?>
        <br>
        <div class="button-container">
        <embed src="data:application/pdf;base64,<?php echo $base64Image; ?>" type="application/pdf" width="800" height="600" />
        </div>
        <?php
    } else {
        ?>
        <br>
        <div class="button-container">
        <img class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">
        </div>
        <?php
    }
    ?>

<?php endforeach; ?>
<?php endif; ?>
<br>
<br>
</div>
