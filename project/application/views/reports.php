  <h1>Reports</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
  <div class="button-container">
    <a href="<?php echo base_url('index.php/form_report'); ?>" class="add-event-button">Add Report</a>
  </div>
<?php endif; ?>
    <div class="report-container">
        <?php foreach ($reports as $report): ?>
            <div class="report">
                <h2 style="border-bottom: 3px solid #001f3f; padding-bottom:3px"><?php echo $report->title; ?></h2>
		        <p>Author: <?php echo $report->username; ?></p>
                <p><?php echo nl2br(substr($report->text, 0, 50)); ?>...</p>
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