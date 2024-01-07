<h1>Advertisements</h1>

<div class="button-container">
  <a href="<?php echo base_url('index.php/form_ad'); ?>" class="add-event-button">Add advertisements</a>
</div>

    <div class="ad-container">
        <?php foreach ($ads as $ad): ?>
            <div class="ad">
                    <?php
                    
                    $binaryData = $ad->image;

                    $base64Image = base64_encode($binaryData);
                    ?>
                    <a href="<?php echo $ad->url; ?>" target="_blank">
                        <img class="ad-image" src="data:image/jpeg;base64,<?php echo $base64Image; ?>" alt="ad image">
                    </a>
                    <br>
                    <div class="button-container">
                        <a href="<?php echo base_url('index.php/delete_ad/'. $ad->ad_id); ?>" class="add-event-button">Delete</a>
                    </div>
                    <br>
                    <div class="button-container">
                        <a href="<?php echo base_url('index.php/set_ad/'. $ad->ad_id); ?>" class="add-event-button">Set as displayed</a>
                    </div>

                    <?php
                    if ($ad->chosen){
                        ?>
                              <br>
                    <div class="button-container">
                        <a href="<?php echo base_url('index.php/un_set_ad/'. $ad->ad_id); ?>" class="add-event-button">Un display</a>
                    </div>
                        <?php
                    }
                    ?>
            </div>
        <?php endforeach; ?>
    </div>