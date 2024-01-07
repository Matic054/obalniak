<h2 style="text-align:center">Create route</h2>
    <form action="<?php echo base_url('index.php/createRoute'); ?>" method="post" enctype="multipart/form-data" class="beautiful-form">
    <label class="form-label" for="selectedUsers">Climbers:</label>
    <br>
    <label class="form-label">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</label>
    <br>
    <select class="form-input" enctype="multipart/form-data" name="selectedUsers[]" id="selectedUsers" multiple required>
        <?php
            foreach ($users as $user) {
                echo "<option value='{$user->user_id}'>{$user->user_name}</option>";
            }
        ?>
    </select>

    <br>

    <label for="date" class="form-label">Date:</label>
    <input class="form-input" type="date" name="date" id="date" required>

    <br>

    <label for="mountainName" class="form-label">Mountain Name:</label>
    <input class="form-input" type="text" name="mountainName" id="mountainName" required>

    <br>

    <label for="routeDescription" class="form-label">Route Description:</label>
    <textarea class="form-input" name="routeDescription" id="routeDescription" rows="4" required></textarea>

    <br>

    <label for="length" class="form-label">Length (meters):</label>
    <input class="form-input" type="number" name="length" id="length" required>

    <br>

    <label for="difficulty" class="form-label">Difficulty (numeric 1-10):</label>
    <input class="form-input" type="number" name="difficulty" id="difficulty" min="1" max="10" required>

    <br>

    <label for="notes" class="form-label">Notes:</label>
    <textarea name="notes" id="notes" rows="4" class="form-input"></textarea>

    <br>

    <button type="submit" class="form-button">Confirm</button>
    </form>
