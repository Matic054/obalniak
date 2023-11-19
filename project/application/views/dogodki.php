  <h1>Events</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
    <a href="<?php echo base_url('index.php/form_event'); ?>">Dodaj dogodek</a>
<?php endif; ?>
    <div class="event-container">
        <?php foreach ($events as $event): ?>
            <div class="event">
                <h3><?php echo $event->title; ?></h3>
		<p>Author: <?php echo $event->username; ?></p>
                <p><?php echo substr($event->text, 0, 50); ?>...</p>
		<a href="<?php echo base_url('index.php/event/' . $event->event_id); ?>">Vec</a>
            </div>
        <?php endforeach; ?>
    </div>