<h1>Alpine School</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
    <a href="<?php echo base_url('index.php/form_alpine'); ?>">Add event</a>
<?php endif; ?>
    <div class="event-container">
        <?php foreach ($alpines as $alpine): ?>
            <div class="event">
                <h3><?php echo $alpine->title; ?></h3>
		        <p>Author: <?php echo $alpine->username; ?></p>
                <p><?php echo substr($alpine->text, 0, 50); ?>...</p>
		        <a href="<?php echo base_url('index.php/alpine/' . $alpine->alpine_id); ?>">Vec</a>
            </div>
        <?php endforeach; ?>
    </div>
