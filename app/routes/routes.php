<?php



/*
	Home page
*/
Route::get(array('/', 'home'), function() {
	return Layout::make('home', array(
		'homepage' => true,
		'heading' => 'Anchor is a super-simple,<br>lightweight blog system, made<br>to let you just write.
		
		<a href="/download" class="btn"><i>Download</i> Anchor 0.8</a>'
	));
});

/*
	Documentation
*/
Route::get(array('docs', 'docs/getting-started'), function() {
	return Layout::make('docs/index')->nest('sidebar', 'partials/sidebar');
});

Route::get('docs/getting-started/requirements', function() {
	return Layout::make('docs/requirements')->nest('sidebar', 'partials/sidebar');
});

Route::get('docs/getting-started/installing', function() {
	return Layout::make('docs/installing')->nest('sidebar', 'partials/sidebar');
});

Route::get('docs/managing-content', function() {
	return Layout::make('docs/managing-content')->nest('sidebar', 'partials/sidebar');
});


Route::get('docs/theming', function() {
	return Layout::make('docs/theming')->nest('sidebar', 'partials/sidebar');
});

Route::get('docs/theming-functions', function() {
	$query = Query::table('docs')
		->order_by('function');

	$vars['docs'] = $query->get();

	return Layout::make('docs/theming-functions', $vars)->nest('sidebar', 'partials/sidebar');
});

Route::get('docs/theming-functions/(:any)', function($file) {
	$query = Query::table('docs')
		->where('file', '=', $file)
		->order_by('function');

	$vars['docs'] = $query->get();

	return Layout::make('docs/theming-functions', $vars)->nest('sidebar', 'partials/sidebar');
});

/*
	Forum
*/
Route::get('forum', function() {
	return Layout::make('forum');
});


/*
	Download
*/
Route::get('download', function() {
	return Response::redirect('https://github.com/anchorcms/anchor-cms/archive/master.zip');
});

/*
	Resources
*/
Route::get('resources', function() {
	return Layout::make('resources');
});

/*
	Latest Version
*/
Route::get('version', function() {
	return '0.8';
});

/*
	404 catch all
*/
Route::any('*', function() {
	Response::error(404);
	return Layout::make('error/404', array(
		'title' => 'Page not found'
	));
});