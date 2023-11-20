<h1>Forum</h1>
<?php if ($this->session->userdata('loggedIn')): ?>
    <a href="<?php echo base_url('index.php/form_post'); ?>">Dodaj obavo</a>
<?php endif; ?>
<div class="forum-container">
    <?php foreach ($posts as $post): ?>
        <div class="forum-post">
            <h3><?php echo $post->title; ?></h3>
            <p><?php echo $post->created_at; ?></p>
		        <p>Avtor: <?php echo $post->username; ?></p>
            <p><?php echo substr($post->text, 0, 50); ?>...</p>
		        <a href="<?php echo base_url('index.php/forum_post/' . $post->post_id); ?>">Vec</a>
        </div>
    <?php endforeach; ?>
</div>
