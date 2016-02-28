# The plugin.php file

Anchor’s plugin system works slightly differently to many other content
management systems, in the fact that it’s all handled by a class — this
way, everything is object-oriented and more maintainable.

Your plugin will extend Anchor's built-in `Plugin` class. There are 3 main
functions which Anchor will call in your plugin to get infomration about
how you want to extend functionality.

* `register_routes`
* `register_protected_routes`
* `register_filters`

## Routes

This function should return an `array` of uri's along with
their [callbacks](http://php.net/manual/en/language.types.callable.php).

	/**
	 * Register routes with the router
	 * Must return an array of path => callback
	 */
	public function register_routes() {
		return array(
			'GET' => array(
				'author/(:any)' => array($this, 'author')
			)
		);
	}

## Protected Routes

Almost the exact same as `register_routes` except a valid user session must be
present before the callback is ran.

	/**
	 * Register routes with the router
	 * Must return an array of path => callback
	 */
	public function register_protected_routes() {
		return array(
			'GET' => array(
				'admin/author/(:any)' => array($this, 'author')
			)
		);
	}

## Filters

This function must also return a `array` of callbacks but this time the keys are
the object -> properties you would like to modify or read.

	/**
	 * Registers content filters to apply changes to when called
	 *
	 * array('object' => array('property' => callback))
	 */
	public function register_filters() {
		return array(
			'post' => array(
				'title' => function($string) {
					return $string . ' - woooooo';
				}
			)
		);
	}