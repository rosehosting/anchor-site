# Articles

### `article_author`

Returns the name of the post author as a string.

### `article_author_bio`

Returns the biography of the current post author.

### `article_author_id`

Returns the database ID of the current post author.

### `article_css`

If custom CSS was added, returns the custom CSS. Should be used like this:

	<?php if(article_css()): ?>
	    <style><?php echo article_css(); ?></style>
	<?php endif; ?>

### `article_custom_field($key, $fallback = '')`

Retrieves a custom field with the key $key, with an optional fallback parameter ($fallback). Used like so:

	<small class="attribution">
	    Thanks to <?php echo article_custom_field('attribution', 'Mike'); ?>
	</small>

### `article_date`

Returns a date-formatted version of `article_time()`. Default format is jS M, Y (24th January, 2012).

### `article_description`

Returns a short description, as set in the "description" field of the admin area.

### `article_html`

Returns the content of the blog post, as a HTML string.

### `article_id`

Returns the database-assigned ID of the current article, as a number. Used for uniquely identifying a post.

### `article_js`

Similar to article_css(), but with Javascript. Should be used like this:

	<?php if(article_js()): ?>
	    <script><?php echo article_js(); ?></script>
	<?php endif; ?>

### `article_slug`

Returns the slug of the current article. Should not be used in posts.php (you should use `article_url()` instead, which will correctly calculate the URL).

### `article_status`

Returns a string which contains the current status of the article. Can be either draft, archived, published.

### `article_time`

Returns a UNIX timestamp from when the post was added, which can be used to add custom timestamps. If you want to use the default timestamp, use `article_date()` instead.

### `article_title`

Returns the title of the current article as a string, as set in the admin area.

### `article_total_comments`

Returns the total number of published comments for the current article.

### `article_url`

Returns a fully-built URL string, which serves as a permalink. Should be used like so:

	<a href="<?php echo article_url(); ?>">
	    <?php echo article_title(); ?>
	</a>

### `customised`

Returns true if an article has custom CSS or Javascript attached to it, false if not.