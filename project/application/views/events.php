<h1>Events</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
<div class="button-container">
  <a href="<?php echo base_url('index.php/form_event'); ?>" class="add-event-button">Add event</a>
</div>

<?php endif; ?>
    <div class="event-container">
        <?php foreach ($events as $event): ?>
            <div class="event">
                <h2 style="border-bottom: 3px solid #001f3f;"><?php echo $event->title; ?></h2>
		        <p class="ev_author">Author: <?php echo $event->username; ?></p>
                <p><?php echo nl2br(substr($event->text, 0, 50)); ?>...</p>
		        <a href="<?php echo base_url('index.php/event/' . $event->event_id); ?>">More</a>
                <?php if ($this->session->userdata('admin') | $this->session->userdata('user_name') == $event->username): ?>
                    <br>
                    <div class="button-container">
                        <a href="<?php echo base_url('index.php/delete_event/'. $event->event_id); ?>">Delete</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
