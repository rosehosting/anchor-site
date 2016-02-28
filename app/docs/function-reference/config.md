# Config

### `set_theme_options`

Stores a theme variable to be used with theme_option.

	<?php set_theme_options(array(
	    'use_header' => true,
	    'header_src' => '/images/header.jpg'
	)); ?>

### `theme_option`

Returns stored theme option.

	<?php theme_option('use_header'); // returns "true" ?>