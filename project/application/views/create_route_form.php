<h2>Create route</h2>
    <form action="<?php echo base_url('index.php/createRoute'); ?>" method="post" enctype="multipart/form-data">
    <label for="selectedUsers">Climbers:</label>
    <br>
    <label>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</label>
    <br>
    <select enctype="multipart/form-data" name="selectedUsers[]" id="selectedUsers" multiple required>
        <?php
            foreach ($users as $user) {
                echo "<option value='{$user->user_id}'>{$user->user_name}</option>";
            }
        ?>
    </select>

    <br>

    <label for="date">Date:</label>
    <input type="date" name="date" id="date" required>

    <br>

    <label for="mountainName">Mountain Name:</label>
    <input type="text" name="mountainName" id="mountainName" required>

    <br>

    <label for="routeDescription">Route Description:</label>
    <textarea name="routeDescription" id="routeDescription" rows="4" required></textarea>

    <br>

    <label for="length">Length (numeric):</label>
    <input type="number" name="length" id="length" required>

    <br>

    <label for="difficulty">Difficulty (numeric 1-10):</label>
    <input type="number" name="difficulty" id="difficulty" min="1" max="10" required>

    <br>

    <label for="notes">Notes:</label>
    <textarea name="notes" id="notes" rows="4"></textarea>

    <br>

    <button type="submit">Confirm</button>
    </form>
