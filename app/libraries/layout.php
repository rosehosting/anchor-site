<?php

class Layout {

	public function make($template, $vars = array()) {
		$vars = array_merge(array(
			'title' => 'Make blogging beautiful',
			'page' => Uri::current()
		), $vars);

		return View::make($template, $vars)
			->nest('header', 'partials/header', $vars)
			->nest('footer', 'partials/footer', $vars);
	}

}