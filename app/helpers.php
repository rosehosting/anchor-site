<?php

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

	$pdo = new PDO('sqlite:' . __DIR__ . '/storage/db.sqlite');
	$stm = $pdo->prepare($sql);
	$stm->execute($values);
}

function download_count() {
	$path = __DIR__ . '/storage/downloads.cache';

	if(is_file($path)) {
		$num = file_get_contents($path);

		return number_format($num);
	}

	$sql = 'SELECT COUNT(*) FROM "downloads"';
	$pdo = new PDO('sqlite:' . __DIR__ . '/storage/db.sqlite');
	$stm = $pdo->prepare($sql);
	$stm->execute();

	$num = $stm->fetchColumn();

	file_put_contents($path, $num);

	return number_format($num);
}
