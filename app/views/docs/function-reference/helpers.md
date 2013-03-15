# Helpers

### `base_url`

Returns the relative path to the current Anchor install. If the install is at http://my.site.org/anchor/, it will return /anchor/.

### `bind($page, $function)`

Bind a function to a page slug ($page). The $page parameter can either be a slug on its own ("about"), or a slug suffixed with an 'area name' ("about.area"); that is, if there are multiple bind/recieve calls, this will avoid duplicate function calls. Used in conjunction with recieve() like such:

	<?php bind('about', function() {
	    return 'This function only gets run on the about page!'
	}); ?>

### `body_class`

Returns a string to be used as a CSS class.

### `current_url`

Returns the current page URL. Similar to `$_SERVER['REQUEST_URI']`.

### `full_url`

Returns the full URL.

### `is_homepage`

Returns true if the current page is the default homepage page and false if not.

### `is_postspage`

Returns true if the current page is the posts listings page and false if not.

### `recieve($name = '')`

When used in page.php, recieves any bind calls. The one parameter is $name, which is the same as $page. Used as such (see the previous example for the bind() version):

	<?php recieve('about'); ?>

### `rss_url()`

Returns the full relative path to the rss feed.

### `theme_include`

Includes a file relative to the theme path.

### `theme_url($append = '')`

Returns the full relative path to the theme, plus any extra paths appended with $append.