  <h1>Reports</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
    <div class="button-container">
  <a href="<?php echo base_url('index.php/form_report'); ?>" class="add-event-button">Add Report</a>
</div>
<?php endif; ?>
    <div class="report-container">
        <?php foreach ($reports as $report): ?>
            <div class="report">
                <h3><?php echo $report->title; ?></h3>
		        <p>Author: <?php echo $report->username; ?></p>
                <p><?php echo substr($report->text, 0, 50); ?>...</p>
		        <a href="<?php echo base_url('index.php/report/' . $report->event_id); ?>">Vec</a>
            <?php if ($this->session->userdata('admin') | $this->session->userdata('user_name') == $report->username): ?>
              <br>
              <div class="button-container">
                <a href="<?php echo base_url('index.php/delete_report/'. $report->event_id); ?>">Delete</a>
              </div>
            <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>