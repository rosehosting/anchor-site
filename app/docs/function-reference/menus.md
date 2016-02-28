# Menus

### `has_menu_items`

Checks if there are any menu items (suprisingly). Returns true if there are, false if not.

### `menu_active`

Checks if the menu item is active. Returns true if there are, false if not.

### `menu_active`

Checks if the menu item is active. Returns true if there are, false if not.

### `menu_id`

Returns the current menu item\'s ID

### `menu_items`

Counts through every visible menu item, one, by one. Returns true when there is more posts to be listed or false when we are at the end. Should be used like this:

	<?php while(menu_items()): ?>
		<!-- Loop through the menu items. -->
	<?php endwhile; ?>

### `menu_name`

Returns the current menu item\'s name. This should be used instead of menu_title() to display.

### `menu_title`

Returns the current menu item\'s title. This should be used instead of menu_title() as a title="" attribute.

### `menu_url`

Returns the current menu item\'s URL