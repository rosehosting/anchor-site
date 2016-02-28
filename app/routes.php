<?php

use Ship\Routing\Route;

function asset($file) {
	return url($file) . '?' . time();
}

function url($url) {
	return '/' . ltrim($url, '/');
}

function link_to($url, $title) {
	printf('<a href="%s">%s</a>', url($url), $title);
}

$app['router']->add(new Route('/', array(
	'controller' => function() use($app) {
		$view = new Ship\View(__DIR__ . '/views/layout-home.php');
		$view->assign('menu', $app['menu']);
		$view->assign('publicKey', $app['config']->get('stripe.public'));

		$body = new Ship\View(__DIR__ . '/views/home.php');
		$view->assign('version', $app['LATEST_VERSION']);
		$view->nest('body', $body);

		$head = new Ship\View(__DIR__ . '/views/partials/head.php');
		$head->assign('title', 'Make blogging beautiful');
		$view->nest('head', $head);

		$foot = new Ship\View(__DIR__ . '/views/partials/foot.php');
		$view->nest('foot', $foot);

		return $view->render();
	}
)));

$app['router']->add(new Route('/docs', array(
	'controller' => function() use($app) {
		$view = new Ship\View(__DIR__ . '/views/layout.php');
		$view->assign('title', 'Docs');
		$view->assign('menu', $app['menu']);

		$body = new Ship\View(__DIR__ . '/views/docs.php');
		$body->assign('content', 'Docs');

		$doc = __DIR__ . '/docs/getting-started/requirements.md';
		$content = file_get_contents($doc);
		$md = new dflydev\markdown\MarkdownParser;
		$body->assign('content', $md->transform($content));

		$view->nest('body', $body);

		$head = new Ship\View(__DIR__ . '/views/partials/head.php');
		$head->assign('title', 'Docs');
		$view->nest('head', $head);

		$foot = new Ship\View(__DIR__ . '/views/partials/foot.php');
		$view->nest('foot', $foot);

		return $view->render();
	}
)));

$app['router']->add(new Route('/docs/.*?', array(
	'controller' => function($request, $route) use($app) {
		$args = array_diff(explode('/', $request->getUri()), array(''));

		$doc = __DIR__ . '/' . implode('/', $args) . '.md';

		if( ! is_readable($doc)) {
			throw new Ship\Exception\HttpNotFound('Docs not found');
		}

		$view = new Ship\View(__DIR__ . '/views/layout.php');
		$view->assign('title', 'Docs');
		$view->assign('menu', $app['menu']);

		$body = new Ship\View(__DIR__ . '/views/docs.php');

		$content = file_get_contents($doc);
		$md = new dflydev\markdown\MarkdownParser;
		$body->assign('content', $md->transform($content));

		$view->nest('body', $body);

		$head = new Ship\View(__DIR__ . '/views/partials/head.php');
		$head->assign('title', 'Docs');
		$view->nest('head', $head);

		$foot = new Ship\View(__DIR__ . '/views/partials/foot.php');
		$view->nest('foot', $foot);

		return $view->render();
	}
)));

$app['router']->add(new Route('/resources', array(
	'controller' => function() use($app) {
		$view = new Ship\View(__DIR__ . '/views/layout.php');
		$view->assign('title', 'Resources');
		$view->assign('menu', $app['menu']);

		$body = new Ship\View(__DIR__ . '/views/resources.php');
		$view->nest('body', $body);

		$head = new Ship\View(__DIR__ . '/views/partials/head.php');
		$head->assign('title', 'Resources');
		$view->nest('head', $head);

		$foot = new Ship\View(__DIR__ . '/views/partials/foot.php');
		$view->nest('foot', $foot);

		return $view->render();
	}
)));

$app['router']->add(new Route('/download', array(
	'controller' => function() use($app) {
		$stats = array(
			'date' => $app['server']->get('REQUEST_TIME', gmdate('U')),
			'ip' => $app['server']->get('REMOTE_ADDR', '0.0.0.0'),
			'ua' => $app['server']->get('HTTP_USER_AGENT', '')
		);

		$app['query']->table('downloads')->insert($stats);

		$url = 'https://github.com/anchorcms/anchor-cms/releases';

		return $app['response']->redirect($url);
	}
)));

$app['router']->add(new Route('/version', array(
	'controller' => function() use($app) {
		$stats = array(
			'date' => $app['server']->get('REQUEST_TIME', gmdate('U')),
			'ip' => $app['server']->get('REMOTE_ADDR', '0.0.0.0'),
			'ua' => $app['server']->get('HTTP_USER_AGENT', '')
		);

		$app['query']->table('active')->insert($stats);

		return $app['response']->setHeader('content-type', 'text/plain')->setBody($app['LATEST_VERSION']);
	}
)));

$app['router']->add(new Route('/donate', array(
	'requirements' => array('method' => 'POST'),
	'controller' => function() use($app) {

		$input = filter_var_array($app['input']->getArrayCopy(), array(
			'token' => FILTER_SANITIZE_STRING,
			'amount' => FILTER_SANITIZE_NUMBER_INT,
			'email' => FILTER_SANITIZE_STRING,
		));

		$message = $app['donate']->validate($input);

		if('' !== $message) {
			$user = array(
				'ip' => $app['server']->get('REMOTE_ADDR'),
				'ua' => $app['server']->get('HTTP_USER_AGENT'),
			);
			$app['log']->addError($message, $user);
			$result = false;
		}
		else {
			$result = $app['donate']->charge($input['token'],
				$input['amount'], $input['email']);
		}

		$body = json_encode(array(
			'result' => $result,
		));

		return $app['response']
			->setHeader('content-type', 'application/json')
			->setBody($body);
	}
)));
