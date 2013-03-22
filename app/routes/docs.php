<?php

if(!function_exists('doc')) {
	function doc($slug, $name) {
		$url = str_replace('/docs/', '', filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
		
		echo '<li' . ($url == $slug ? ' class="active"' : '') . '>';
			echo Html::link('docs/' . $slug, $name);
		echo '</li>';
	}
}

Route::get(array('docs', 'docs/(:any)', 'docs/(:any)/(:any)'), function() {
	$args = func_get_args();

	if( ! count($args)) {
		$args = array('getting-started', 'requirements');
	}

	if( ! is_readable($path = APP . 'views/docs/' . implode('/', $args) . '.md')) {
		$output = Layout::create('error/404', array(
			'title' => 'Page not found'
		))->yield();

		return Response::create($output, 404);
	}

	$content = file_get_contents($path);

	$md = new Markdown;
	$vars['content'] = $md->transform($content);
	$vars['title'] = 'Documentation';

	return Layout::create('docs/index', $vars)->partial('sidebar', 'partials/sidebar');
});