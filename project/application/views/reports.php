  <h1>Reports</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
    <a href="<?php echo base_url('index.php/form_report'); ?>">Add report</a>
<?php endif; ?>
    <div class="report-container">
        <?php foreach ($reports as $report): ?>
            <div class="report">
                <h3><?php echo $report->title; ?></h3>
		        <p>Author: <?php echo $report->username; ?></p>
                <p><?php echo substr($report->text, 0, 50); ?>...</p>
		        <a href="<?php echo base_url('index.php/report/' . $report->event_id); ?>">Vec</a>
            </div>
        <?php endforeach; ?>
    </div>