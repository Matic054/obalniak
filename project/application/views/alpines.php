<h1>Alpine School</h1>
<?php if ($this->session->userdata('admin')): ?>
    <a href="<?php echo base_url('index.php/form_alpine'); ?>">Add alpine school </a>
    <div class="event-container">
        <?php foreach ($alpines as $alpine): ?>
            <div class="event">
                <h2><?php echo $alpine->title; ?></h2>
		        <p>Author: <?php echo $alpine->username; ?></p>
                <p><?php echo substr($alpine->text, 0, 50); ?>...</p>
		        <a href="<?php echo base_url('index.php/alpine/' . $alpine->alpine_id); ?>">Vec</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>




            <h3><?php echo $chosen->title; ?></h3>
            <p><?php echo $chosen->text ?></p>

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
<?php endif; ?>
