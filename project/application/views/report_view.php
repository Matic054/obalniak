<div class="single-event">
<h3><?php echo $report[0]->title; ?></h3>
<p>Avtor: <?php echo $report[0]->username; ?></p>
<p class="text"><?php echo $report[0]->text ?></p>
<br>

<?php if ($report_images): ?>
<?php foreach ($report_images as $image): ?>
    <?php
    // Extract the binary data from the array
    $binaryData = $image['image'];

    // Convert binary data to base64
    $base64Image = base64_encode($binaryData);
    ?>
    <img class="report-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">

<?php endforeach; ?>
<?php endif; ?>

<h4>Komentarji:</h4>
<?php foreach ($comments as $comment): ?>
    <p>By: <?php echo $comment->username; ?></p>
    <p><?php echo $comment->comment_text; ?></p>
<?php endforeach; ?>

<?php if ($this->session->userdata('loggedIn')): ?>
    <form action="<?php echo base_url('index.php/addReportComment/' . $report[0]->event_id); ?>" method="post">
    <label for="text">Dodajte komentar:</label>
    <textarea name="text" required></textarea>
    <button type="submit">Potrdi</button>
</form>
<?php endif; ?>
</div>