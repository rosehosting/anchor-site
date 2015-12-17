<?php

error_reporting(-1);
ini_set('display_errors', true);

require __DIR__ . '/../vendor/autoload.php';

function dd() {
	if( ! headers_sent()) {
		header('content-type: text/plain');
	}
	call_user_func_array('var_dump', func_get_args());
	exit(1);
}

function e($str) {
	return htmlspecialchars($str, ENT_COMPAT, 'UTF-8', false);
}

function asset($url) {
	return '/' . trim($url, '/');
}

function latest_version() {
	$response = gethub('anchorcms/anchor-cms/releases');
	$release = current($response);

	return $release->tag_name;
}

function quote() {
	$quotes = array(
		array(
			'text' => 'You can’t control the wind, but you can adjust your sails.',
			'author' => 'Yiddish proverb'
		),

		array(
			'text' => 'Note to self: don’t forget to buy some more Oreos.',
			'author' => '<a href="//twitter.com/idiot">@idiot</a>'
		),

		array(
			'text' => 'Do what you want, ‘cause a pirate is free. You are a pirate.',
			'author' => 'lol limewire'
		)
	);

	return (object) $quotes[array_rand($quotes)];
}

function gethub($resource) {
	$endpoint = 'https://api.github.com/repos/' . $resource;
	$file = hash('crc32', $endpoint) . '.cache';
	$path = __DIR__ . '/storage/' . $file;

	if(is_file($path)) {
		$json = file_get_contents($path);

		return json_decode($json);
	}

	$curl = curl_init($endpoint);
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$json =	curl_exec($curl);
			curl_close($curl);

	file_put_contents($path, $json);

	return json_decode($json);
}

function star_count() {
	$response = gethub('anchorcms/anchor-cms');

	return number_format($response->stargazers_count);
}

function log_download() {
	$sql = 'INSERT INTO "downloads" ("date", "ip", "ua") VALUES(?, ?, ?)';
	$values = [
		value($_SERVER, 'REQUEST_TIME', gmdate('U')),
		value($_SERVER, 'REMOTE_ADDR', '0.0.0.0'),
		value($_SERVER, 'HTTP_USER_AGENT', ''),
	];

	$pdo = new PDO('sqlite:' . __DIR__ . '/storage/stats.sqlite');
	$stm = $pdo->prepare($sql);
	$stm->execute($values);
}

option('view_dir', __DIR__ . '/views');

option('menu', [
	'/features' => 'Features',
	'/docs' => 'Documentation',
	'/blog' => 'News &amp; Updates',
	'/forum' => 'Community',
]);

route('/', function() {
    echo render('home.php', [
        'header' => render('partials/header.php', [
			'title' => 'Make blogging beautiful',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => true,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => true,
    ]);
});

route('/features', function() {
    echo render('features.php', [
        'header' => render('partials/header.php', [
			'title' => 'Dozens of reasons to use Anchor',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);
});

route('/resources', function() {
	echo render('resources.php', [
        'header' => render('partials/header.php', [
			'title' => 'Resources',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);
});

route('/stats', function() {
	echo render('stats.php', [
        'header' => render('partials/header.php', [
			'title' => 'Stats',
			'page' => '',
			'menu' => option('menu'),
			'homepage' => false,
		]),
		'footer' => render('partials/footer.php'),
		'homepage' => false,
    ]);
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
    header('Location: http://forums.anchorcms.com');
});

route('/blog', function() {
    header('Location: http://blog.anchorcms.com');
});

route('/docs', function() {
    header('Location: http://docs.anchorcms.com');
});

run();
