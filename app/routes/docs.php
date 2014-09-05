<?php

Route::get(array('docs', 'docs/(:any)', 'docs/(:any)/(:any)'), function() {
	$args = func_get_args();

	if( ! count($args) ) {
		$args = array('getting-started', 'requirements');
	}

	$path = APP . 'views/docs/' . implode('/', $args);

	if( count($args) === 1 ) {
		$path = default_doc($path);
	}

	if( ! is_readable($path = $path . '.md') ) {
		$output = Layout::create('error/404', array(
			'title' => 'Page not found'
		))->exec();

		return Response::create($output, 404);
	}

	$content = file_get_contents($path);

	$md = new Markdown;
	$vars['content'] = $md->transform($content);
	$vars['title'] = 'Documentation';

	return Layout::create('docs/index', $vars)->partial('sidebar', 'partials/sidebar');
});