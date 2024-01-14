<div class="single-event">
<h1 style="text-align:center;"><?php echo $report[0]->title; ?></h1>
<?php
    if (strlen($report[0]->user_image[0]['profile_picture']) > 10){
        $binaryData = $report[0]->user_image[0]['profile_picture'];

        $base64Image = base64_encode($binaryData);
        ?>
        <div class="button-container">
        <img style="width:5%" class="event-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika uporabnika">
        </div>
        <div class="button-container">
        <h2 >Avtor: <?php echo $report[0]->username; ?></h2 style="text-align:center;">
        </div>
        <br>
        <?php
    } else {
        ?>
            <h2 style="text-align:center;">Avtor: <?php echo $report[0]->username; ?></h2 style="text-align:center;">
        <?php
    }
?>
<p class="text"><?php echo nl2br($report[0]->text); ?></p>
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

<div style="background-color:white; color:black; width:20%; margin-left: 40%; border-radius:15px">
<h2 style="text-align:center;">Comments:</h2>
<?php foreach ($comments as $comment): ?>
    <hr>
    <h4 class="text"><?php echo $comment->username; ?></h4>
    <p class="text"><?php echo $comment->comment_text; ?></p>
    <br>
<?php endforeach; ?>
</div>

<?php if ($this->session->userdata('loggedIn')): ?>
    <form class="comment-details-form" action="<?php echo base_url('index.php/addReportComment/' . $report[0]->event_id); ?>" method="post">
    <label class="form-label" for="text">Add comment:</label>
    <textarea class="form-input" name="text" required></textarea>
    <button class="submit-button" type="submit">Add</button>
</form>
<?php endif; ?>
</div>