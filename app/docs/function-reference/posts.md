# Posts

### `has_pagination`

Returns true if there is more posts than the per page limit set in your config and false otherwise.

### `has_posts`

Checks if there are any published posts. Returns true if there are, false if not. Should be used in conjunction with posts() like this:

	<?php if(has_posts()): ?>
		<!-- We have posts, it's safe to loop. -->
		<?php while(posts()): ?>
			 <?php echo article_title(); ?>
		<?php endwhile; ?>
	<?php endif; ?>

### `posts`

Counts through every visible post, one, by one. Returns true when there is more posts to be listed or false when we are at the end. Should be used like this:

	<?php while(posts()): ?>
		<!-- Loop through the posts. -->
	<?php endwhile; ?>

### `posts_next`

Returns the link for the next page of posts.

### `posts_per_page`

Returns the number of posts per page as set in the config.

### `posts_prev`

Returns the link for the previous page of posts.

### `total_posts`

Returns the number of published posts.