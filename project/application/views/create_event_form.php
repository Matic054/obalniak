<form class="event-details-form" action="<?php echo base_url('index.php/create_event'); ?>" method="post" enctype="multipart/form-data">
  <label for="event-name" class="form-label">Event Name:</label>
  <input type="text" id="event-name" name="eventName" required class="form-input">

  <label for="event-description" class="form-label">Event Description:</label>
  <textarea id="event-description" name="eventDescription" required class="form-input"></textarea>

  <label for="event-image" class="form-label">Event Image:</label>
  <div class="file-input-container">
    <div class="file-input-wrapper">
      <input type="file" id="event-image" name="eventImage" accept="image/*" class="file-input">
    </div>
    <span class="upload-icon">📷</span>
  </div>

  <button type="submit" class="submit-button">Submit Event</button>
</form>