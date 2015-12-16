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

function default_doc($dir) {
	if( is_readable($dir . '/introduction.md') ) {
		return $dir .= '/introduction';
	}
	
	foreach( new DirectoryIterator($dir) as $file) {
	    if($file->isFile()) {
	        return $dir .= '/' . substr($file, 0, -3);
	    }        
	}
}

function doc($slug, $name, $classes = array()) {
	$url = str_replace('/docs', '', filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL));
	$url = ltrim($url, '/');

	if(!$url) {
		$url = 'getting-started/requirements';
	}

	if(strpos($url, '/') === false) {
		$default = default_doc(APP . 'views/docs/' . $url);
		$default = basename(dirname($default)) . '/' . basename($default);

		if($default == $slug) {
			$classes = array_merge(array('active'), $classes);
		}
	}

	if($url == $slug) {
		$classes = array_merge(array('active'), $classes);
	}

	$html = count($classes) ? ' class="' . implode(' ', $classes) . '"' : '';

	echo '<li' . $html . '>';
		echo Html::link('docs/' . $slug, $name);
	echo '</li>';
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

function gethub($url, $token = 'd7e04abb4f641b69b5c945654a6a69d041aadc8d') {
	$endpoint = 'https://api.github.com/repos/anchorcms/anchor-cms' . $url;
	$curl = curl_init($endpoint);
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$json =	curl_exec($curl);
			curl_close($curl);
		
	return json_decode($json);
}

function star_count() {
	return number_format(gethub('')->stargazers_count);
}

function latest_version() {
	if(defined(LATEST_VERSION)) {
		return LATEST_VERSION;
	}
	
	$json = gethub('/releases');
	$version = '1.0';
	
	if(!empty($json[0])) {
		$version = $json[0]->tag_name;
	}
	
	if(!defined('LATEST_VERSION')) {
		define('LATEST_VERSION', $version);
	}
	
	return $version;
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