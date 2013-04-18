<?php

/*
	Home page
*/
Route::get(array('/', 'home'), function() {
	return Layout::create('home', array('homepage' => true));
});

/*
	Forum
*/
Route::get('forum', function() {
	$base = 'http://forums.anchorcms.com/';
	return Response::create('', 301, array('Location' => $base));
});


/*
	Download
*/
Route::get('download', function() {
	return Response::redirect('https://github.com/anchorcms/anchor-cms/archive/' . LATEST_VERSION . '.zip');
});

/*
	Resources
*/
Route::get('resources', function() {
	$vars['title'] = 'Resources';
	return Layout::create('resources', $vars);
});

/*
	Latest Version
*/
Route::get('version', function() {
	return Response::create(LATEST_VERSION, 200, array('content-type' => 'text/plain'));
});

/*
	Github push/pull
*/
Route::any('deploy', function() {
	$msg = date('Y-m-d H:i:s') . ' --> Received post from ' . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
	file_put_contents(APP . 'storage/logs/access.log', $msg, FILE_APPEND);

	exec('git pull ' . PATH, $output);

	foreach($output as $line) {
		$msg = date('Y-m-d H:i:s') . ' --> ' . $line . PHP_EOL;
		file_put_contents(APP . 'storage/logs/term.log', $msg, FILE_APPEND);
	}

	return Response::json('{result: true}');
});

/*
	404 error
*/
Route::not_found(function() {
	$output = Layout::create('error/404', array(
		'title' => 'Page not found'
	))->yield();

	return Response::create($output, 404);
});