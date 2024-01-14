<h1>Routes</h1>

<?php if ($this->session->userdata('admin')): ?>
    <div class="button-container">
        <a href="<?php echo base_url('index.php/export_routes'); ?>" class="add-event-button">Download routes CSV</a>
    </div>
    <br>
<?php endif; ?>


<?php if ($this->session->userdata('loggedIn')): ?>
    <div class="button-container">
        <a href="<?php echo base_url('index.php/form_route'); ?>" class="add-event-button">Add route</a>
    </div>
<?php endif; ?>

    <div class="route-container">
        <?php foreach ($routes as $route): ?>
            <div class="route">
                <h3 style="border-bottom: 3px solid #001f3f;"><?php echo $route->mountain; ?></h3>
                <p >Date: <?php echo $route->date; ?></p>
		        <p >Climbers: <?php echo $route->climbers; ?></p>
                <p >Route: <?php echo nl2br($route->route); ?></p>
                <p >Length(m): <?php echo $route->length; ?></p>
                <p >Difficulty: <?php echo $route->difficulty; ?></p>
                <p >Notes: <?php echo nl2br($route->notes); ?></p>
                <?php if ($this->session->userdata('admin') | $this->session->userdata('user_name') == $route->username): ?>
                <br>
                <div class="button-container">
                    <a class="form-button" href="<?php echo base_url('index.php/delete_route/'. $route->user_id . '/' . $route->date); ?>">Delete</a>
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>