<?php if ($this->session->userdata('admin')): ?>
    <h1>Alpine school</h1>
    <br>
    <div class="button-container">
        <a href="<?php echo base_url('index.php/form_alpine'); ?>" class="add-event-button">Add alpine school </a>
    </div>
    <div class="event-container">
        <?php foreach ($alpines as $alpine): ?>
            <div class="event">
                <h2><?php echo $alpine->title; ?></h2>
		        <p>Author: <?php echo $alpine->username; ?></p>
                <p><?php echo nl2br(substr($alpine->text, 0, 50)); ?>...</p>
		        <a href="<?php echo base_url('index.php/alpine/' . $alpine->alpine_id); ?>">Vec</a>
                <br>
                <div class="button-container">
                    <a href="<?php echo base_url('index.php/delete_alpine/'. $alpine->alpine_id); ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>



    <div class="single-event">
            <h1 style="text-align:center;"><?php echo $chosen->title; ?></h1>
            <p class="text"><?php echo nl2br($chosen->text ); ?></p>
            <br>

            <?php if ($chosen->images): ?>
            <?php foreach ($chosen->images as $image): ?>
                <?php
                function startsWith($haystack, $needle) {
                    return (strncmp($haystack, $needle, strlen($needle)) === 0);
                }
                $binaryData = $image['image'];

                $base64Image = base64_encode($binaryData);
                if (startsWith($binaryData, "%PDF-")) {
                    ?>
                    <div class="button-container">
                    <embed src="data:application/pdf;base64,<?php echo $base64Image; ?>" type="application/pdf" width="800" height="600" />
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="button-container">
                    <img class="event-image" style="width: 40%;" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="slika dogodka">
                    </div>
                    <?php
                }
                ?>
            <?php endforeach; ?>
            <br>
            <br>
            <?php endif; ?>
    </div>
<?php endif; ?>
