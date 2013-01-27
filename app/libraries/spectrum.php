<?php

class Spectrum {

	public static function parse($code) {
		ini_set('highlight.string', '#728794');
		ini_set('highlight.comment', '#aaa');
		ini_set('highlight.keyword', '#7fba38');
		ini_set('highlight.bg', '#FFFFFF');
		ini_set('highlight.default', '#2f97cc');
		ini_set('highlight.html', '#728794');

		return '<pre class="source-code">' . preg_replace('/\n|\r/', '', highlight_string(trim($code), true)) . '</pre>';
		// return '<pre class="source-code">' . Html::entities(trim($code)) . '</pre>';
	}

}