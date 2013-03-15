# Categories

### `categories`

Loops through every category, one, by one. Returns true when there is more categories to be listed or false when we are at the end. Should be used like this:

	<?php while(categories()): ?>
		<!-- Loop through the categories. -->
	<?php endwhile; ?>

### `category_count`


Returns the number of posts that are in the current category.

### `category_description`

Returns the current category description.

### `category_id`

Returns the current category ID.

### `category_slug`

Returns the current category url slug.

### `category_title`

Returns the current category title.

### `category_url`

Returns the full current category url.

### `total_categories`

Returns the number of categories.