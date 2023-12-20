<h3><?php echo $alpine[0]->title; ?></h3>
<a href="<?php echo base_url('index.php/alpine_chose/' . $alpine[0]->alpine_id); ?>">Chose as displayed</a>
<p>Avtor: <?php echo $alpine[0]->username; ?></p>
<p><?php echo $alpine[0]->text ?></p>

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
        <embed src="data:application/pdf;base64,<?php echo $base64Image; ?>" type="application/pdf" width="800" height="600" />
        <?php
    } else {
        ?>
        <img class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">
        <?php
    }
    ?>

<?php endforeach; ?>
<?php endif; ?>
