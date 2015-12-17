<?php

error_reporting(-1);
ini_set('display_errors', true);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/helpers.php';

option('view_dir', __DIR__ . '/views');

option('menu', [
	'/features' => 'Features',
	'/docs' => 'Documentation',
	'/blog' => 'News &amp; Updates',
	'/forum' => 'Community',
]);

route('/', function() {
    $output = render('home.php', [
        'header' => render('partials/header.php', [
			'title' => 'Make blogging beautiful',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => true,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => true,
    ]);

	header(sprintf('ETag: %s', hash('md5', $output)));
	echo $output;
});

route('/features', function() {
    $output = render('features.php', [
        'header' => render('partials/header.php', [
			'title' => 'Dozens of reasons to use Anchor',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);

	header(sprintf('ETag: %s', hash('md5', $output)));
	echo $output;
});

route('/resources', function() {
	$output = render('resources.php', [
        'header' => render('partials/header.php', [
			'title' => 'Resources',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);

	header(sprintf('ETag: %s', hash('md5', $output)));
	echo $output;
});

route('/stats', function() {
	$output = render('stats.php', [
        'header' => render('partials/header.php', [
			'title' => 'Stats',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);

	header(sprintf('ETag: %s', hash('md5', $output)));
	echo $output;
});

option('error_404', function() {
    echo render('error/404.php', [
        'header' => render('partials/header.php', [
			'title' => 'Not Found',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);
});

route('/download', function() {
	log_download();

	$url = sprintf('https://github.com/anchorcms/anchor-cms/archive/%s.zip', latest_version());

    header(sprintf('Location: %s', $url));
});

route('/version', function() {
    header('content-type: text/plain');
	echo latest_version();
});

route('/forum', function() {
    header('Location: http://forums.anchorcms.com', true, 302);
});

route('/blog', function() {
    header('Location: http://blog.anchorcms.com', true, 302);
});

route('/docs', function() {
    header('Location: http://docs.anchorcms.com', true, 302);
});

route('/demo', function() {
    header('Location: http://demo.anchorcms.com', true, 302);
});

run();
