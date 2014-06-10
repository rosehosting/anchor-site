<?php

/*
 * Set your applications current timezone
 */
date_default_timezone_set(Config::app('timezone', 'UTC'));

/*
 * Define the application error reporting level based on your environment
 * using the ENV constant.
 *
 * You can set the APP_ENV var in your htaccess or webserver to switch
 * between environments or change the code below to detect a url or
 * anthing thing you want ...
 */
switch(constant('ENV')) {
	default:
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}

/*
 * Set autoload directories to include your app models and libraries
 */
Autoloader::directory(array(
	APP . 'models',
	APP . 'libraries'
));

/**
 * Set the latest version number
 */
define('LATEST_VERSION', '1.0');

function doc($slug, $name, $classes = array()) {
	$url = str_replace('/docs/', '', filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));

	if($url == $slug) {
		$classes = array_merge(array('active'), $classes);
	}

	$html = count($classes) ? ' class="' . implode(' ', $classes) . '"' : '';

	echo '<li' . $html . '>';
		echo Html::link('docs/' . $slug, $name);
	echo '</li>';
}

function get_insert_stats() {
	return array(
		'date' => Arr::get($_SERVER, 'REQUEST_TIME', gmdate('U')),
		'ip' => Arr::get($_SERVER, 'REMOTE_ADDR', '0.0.0.0'),
		'ua' => Arr::get($_SERVER, 'HTTP_USER_AGENT', '')
	);
}

/**
 * Import defined routes
 */
require APP . 'routes' . EXT;
require APP . 'routes/docs' . EXT;