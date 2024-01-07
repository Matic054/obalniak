<h1>Users:</h1>
    <div class="users-container">
        <?php foreach ($users as $user): ?>
            <div class="user">
                <h3><?php echo $user->user_name; ?></h3>
		        <p>Phone: <?php echo $user->phone_number; ?></p>
                <p>Email: <?php echo $user->email; ?></p>

                <?php if ($user->confirmed == FALSE): ?>
                    <a href="<?php  echo base_url('index.php/confirmUser/' . $user->user_id); ?>">Confirm user</a>
                    <br>
                <?php endif; ?>

		        <a href="<?php  echo base_url('index.php/delete/' . $user->user_id); ?>">Delete</a>

                <?php if ($user->admin): ?>
                    <br>
                    <p>Admin</p>
                <?php else: ?>
                    <br>
                    <a href="<?php  echo base_url('index.php/makeAdmin/' . $user->user_id); ?>">Make admin</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>