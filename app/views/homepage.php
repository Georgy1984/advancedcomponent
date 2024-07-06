<?php $this->layout('layout', ['title' => 'User Profile']) ?>


<h1>User Profile</h1>

<!--<p>Hello, --><?php //=  $this->e($name); ?><!--</p>-->

<?php if (!empty($postsInView)): ?>
    <?php foreach($postsInView as $post): ?>
        <?php echo $post['title']; ?> <br>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts found.</p>
<?php endif; ?>


