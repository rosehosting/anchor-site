# Pages

### `page_active`

Checks if the current page is active. Returns true if there are, false if not.

### `page_content`

Returns the content of the current page, as a HTML string.

### `page_id`

Returns the current page's ID.

### `page_name`

Returns the current page\'s name. Should not be used to display; instead, use page_title().

### `page_slug`

Returns the slug of the current page.

### `page_status`

Returns a string which contains the status of the current page. Can be either draft, archived, published.

### `page_title($fallback = '')`

Returns the current page title, with a fallback ($fallback), in the event of a missing page error.

### `page_url`

Returns the current page\'s relative URL.