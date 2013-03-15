# Search

### `has_search_results`

Checks if there are any search results. Returns true if there are, false if not.

### `search_results`

Counts through every search result, one, by one. Returns true when there is more posts to be listed or false when we are at the end. Should be used like this:

	<?php while(search_results()): ?>
		<!-- Loop through the search results. -->
	<?php endwhile; ?>

### `search_term`

Returns a safely-encoded version of the user's current search term.

### `search_url`

Returns the full relative path to the search area.

### `total_search_results`

Returns an integer depicting the number of search results.