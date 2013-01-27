<!doctype html>
<html lang="en-gb">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Anchor CMS &middot; <?php echo $title; ?></title>
		<meta name="description" content="Anchor is a lightweight content management system built for art-directed content, written in PHP5.">
		<meta name="author" content="@idiot">

		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- http://t.co/dKP3o1e -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0">

		<!-- For all browsers -->
		<link rel="stylesheet" href="<?php echo asset('assets/css/main.css'); ?>">

		<!-- For those dang small screens -->
		<link rel="stylesheet" media="only screen and (max-width: 601px)" href="<?php echo asset('assets/css/resolutions/600.css'); ?>">
		<link rel="stylesheet" media="only screen and (max-width: 501px)" href="<?php echo asset('assets/css/resolutions/500.css'); ?>">

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo asset('favicon.ico'); ?>">
	</head>
	<body>
		<nav id="top" role="navigation">
			<a id="logo" href="<?php echo url('home'); ?>" title="Anchor CMS logo: click to go to the homepage">
				<img src="<?php echo asset('assets/img/logo.png'); ?>" alt="Anchor CMS logo">
			</a>

			<ul>
				<?php foreach(array('features', 'docs', 'forum', 'download') as $link): ?>
				<?php $class = (strpos($page, $link) !== false) ? ' class="active"' : ''; ?>
				<li<?php echo $class; ?>><?php echo Html::link($link, ucwords($link)); ?></li>
				<?php endforeach; ?>
			</ul>
		</nav>

