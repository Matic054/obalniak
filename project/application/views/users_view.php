<h1>Users:</h1>
    <div class="users-container">
        <?php foreach ($users as $user): ?>
            <div class="user">
                <h3><?php echo $user->user_name; ?></h3>
		        <p>Phone: <?php echo $user->phone_number; ?></p>
                <p>Email: <?php echo $user->email; ?></p>
		        <a href="<?php  echo base_url('index.php/delete/' . $user->user_id); ?>">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>