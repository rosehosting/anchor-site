<?php

$app = new Ship\Container;

$app['LATEST_VERSION'] = '0.12.1';

$app['error'] = function() {
	return new Ship\Error;
};

$app['env'] = function() {
	return new Ship\Environment;
};

$app['events'] = function() {
	return new Ship\Events;
};

$app['config'] = function($app) {
	return new Ship\Config(__DIR__ . '/config', $app['env']->current());
};

$app['timezone'] = function($app) {
	return new DateTimeZone($app['config']->get('app.timezone', 'UTC'));
};

$app['memcached'] = function() {
	$cache = new Memcached;
	$cache->addServer('localhost', 11211);
	return $cache;
};

$app['menu'] = [
	'/docs' => 'Docs',
	'https://anchorthemes.com/' => 'Themes',
	'http://forums.anchorcms.com/' => 'Forum',
	'http://blog.anchorcms.com/' => 'Blog',
	'/download' => 'Download'
];

$app['donate'] = function($app) {
	return new Donate($app['config'], $app['log'], $app['mailer']);
};

$app['log'] = function($app) {
	$path = __DIR__ . '/storage/logs/app.log';
	$log = new Monolog\Logger('app');
	$log->pushHandler(new Monolog\Handler\RotatingFileHandler($path));

	return $log;
};

$app['mailer'] = function($app) {
	extract($app['config']->get('mail'));

	$transport = Swift_SmtpTransport::newInstance($host, $port)
		->setUsername($username)
		->setPassword($password);

	return Swift_Mailer::newInstance($transport);
};

return $app;
