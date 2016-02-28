<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Application container
 */
$app = require __DIR__ . '/container.php';

/**
 * Setup environment
 */
$app['env']->detect(function() {
	return getenv('APP_ENV') ?: 'production';
});

if($app['env']->current() == 'local') {
	ini_set('display_errors', true);
	ini_set('error_log', '/dev/null');
	error_reporting(-1);
}

/**
 * Set timezone
 */
date_default_timezone_set($app['timezone']->getName());

/**
 * Error logging
 */
$app['error']->handler(function(Ship\Exception\HttpNotFound $e) use($app) {
	$view = new Ship\View(__DIR__ . '/views/404.php');
	return $app['response']->setStatusCode(404)->setBody($view->render())->send();
});

$app['error']->handler(function(Exception $e) use($app) {
	ob_get_level() and ob_end_clean();

	if($app['config']->get('error.report')) {
		$html = '<!DOCTYPE html>
			<html>
			<head>
				<title>Whoops</title>
				<style>
					body { font-family: sans-serif; }
					h2 { font-weight: normal; }
				</style>
			</head>
			<body>
				<h2>'.$e->getMessage().'</h2>
				<p>'.$e->getFile().':'.$e->getLine().'</p>
				<p><pre>'.$e->getTraceAsString().'</pre></p>
			</body>
			</html>';
	}
	else {
		$html = '<!DOCTYPE html>
			<html>
			<head>
				<title>Whoops</title>
				<style>
					body { font-family: sans-serif; }
					h2 { font-weight: normal; }
				</style>
			</head>
			<body>
				<h2>Looks like something went wrong!</h2>
				<p>We track these errors automatically, but if the problem
				persists feel free to contact us. In the meantime, try refreshing.</p>
			</body>
			</html>';
	}

	return $app['response']->setStatusCode(500)->setBody($html)->send();
});

$app['error']->logger($app['config']->get('error.log'));

$app['error']->register();

/**
 * Register service providers
 */
$providers = $app['config']->get('app.providers', array());

foreach($providers as $className) {
	$provider = new $className();

	if( ! $provider instanceof Ship\Contracts\ProviderInterface) {
		throw new ErrorException(sprintf('Service provider "%s" must implement Ship\Contracts\ProviderInterface', $className));
	}

	$provider->register($app);
}

/**
 * Register routes
 */
require __DIR__ . '/routes.php';

/**
 * Start session
 */
//$app['session']->start();

/**
 * Handle the request
 */
$response = $app['router']->dispatch();

/**
 * Close session
 */
//$app['session']->close();

/**
 * Create a Response if we only have a string
 */
if( ! $response instanceof Ship\Http\Response) {
	$encoding = $app['config']->get('app.encoding', 'UTF-8');
	$response = $app['response']
		->setHeader('content-type', 'text/html; charset=' . $encoding)
		->setBody($response);
}

/**
 * Finish
 */
$response->send();