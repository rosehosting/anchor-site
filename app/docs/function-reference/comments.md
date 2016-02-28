# Comments

### `comments`

A loop, similar to posts(), which returns true if there are any subsequent comments, false if not. Should be used as such:

	<?php if(comments_open() and has_comments()): ?>
		<?php while(comments()): ?>
			<!-- We've got comments, let's go. -->
		<?php endwhile; ?>
	<?php endif; ?>

### `comments_open`

Checks if comments are allowed. Returns true if there are, false if not.

### `comments_text`

Returns the text body of the comment as a string.

### `comment_date`

Returns a date-formatted version of comment_time(). Default format is jS M, Y (24th January, 2012).

### `comment_form_button($text = 'Post Comment', $extra = '')`

Returns the HTML source of the submit button on the comment form, with two optional parameters of $text, which fills the button with custom text $extra, which adds extra attributes. Used in the same manner as `comment_form_input_name()`

### `comment_form_input_email($extra = '')`

Returns the HTML source of the email textarea, plus an optional parameter of $extra, which adds extra attributes. Used in the same manner as `comment_form_input_name()`

### `comment_form_input_name($extra = '')`

Returns the HTML source of the name input, plus an optional parameter of $extra, which adds extra attributes. Used like so:

	<?php echo comment_form_input_name('placeholder="Your Name"'); ?>

### `comment_form_notifications`

Returns messages (if any) based on the input of a comment form. It is highly recommended you use this function within your comment form. Used like so:

	<!-- Got error messages? If so, echo. -->
	<?php echo comment_form_notifications(); ?>

### `comment_id`

Returns the ID of the current comment as an integer.

### `comment_name`

Returns the name of the commenter as a string.

### `comment_time`

Returns a UNIX timestamp from when the post was added, which can be used to add custom timestamps. If you want to use the default timestamp, use comment_date() instead.

### `has_comments`

Checks if there are comments attached to the post. Returns true if there are, false if not.

### `total_comments`

Returns an integer depicting the number of published comments.