<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Anchor CMS &mdash; <?php echo $title; ?></title>
		<meta name="description" content="Anchor is a lightweight blogging platform with a focus on simplicity and elegance.">

		<link rel="stylesheet" href="<?php echo asset('assets/css/reset.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assets/css/grid.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assets/css/theme.css'); ?>">
		<link rel="stylesheet" href="<?php echo asset('assets/css/styles.css'); ?>">

		<link rel="shortcut icon" href="<?php echo asset('assets/img/favicon.png'); ?>">

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0">
	</head>
	<?php if(isset($homepage)): ?>
	<body class="home">
	<?php else: ?>
	<body>
	<?php endif; ?>

		<header>
			<nav class="wrap">
				<?php echo Html::link('home', 'Anchor CMS', array('class' => 'logo', 'title' => 'Go to the Anchor homepage')); ?>

				<ul class="unstyled">
				<?php foreach(array('docs', 'forum', 'download') as $link): ?>
					<?php $class = (strpos($page, $link) !== false) ? array('class' => 'active') : array(); ?>
					<?php echo Html::element('li', Html::link($link, ucwords($link)), $class); ?>
				<?php endforeach; ?>
				</ul>
			</nav>

			<hgroup class="wrap">
				<?php if(isset($homepage)): ?>
				<h1>Anchor is a super-simple,<br> lightweight blog system, <br>made to let you just write.</h1>
				<nav>
					<?php echo Html::link('download',
						'<span>Download</span><br> Latest Version ' . LATEST_VERSION, array('class' => 'btn')); ?>
					<?php echo Html::link('host',
						'<span>Hosted</span><br> Anchor in the Cloud', array('class' => 'btn second')); ?>
				</nav>
				<?php elseif(isset($title)): ?>
				<h1><?php echo $title; ?></h1>
				<?php endif; ?>
			</hgroup>

			<?php if(isset($homepage)): ?>
			<img class="screenie" alt="Screenshot of Anchor CMS" src="<?php echo asset('assets/img/screenshot.png'); ?>">
			<?php endif; ?>
		</header>