<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Anchor CMS &mdash; <?php echo $title; ?></title>

        <meta name="description" content="Anchor is a lightweight blogging platform with a focus on simplicity and elegance.">

        <link rel="stylesheet" href="<?php echo asset('assets/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('assets/css/small.css'); ?>" media="(max-width: 960px)">

        <link rel="shortcut icon" href="<?php echo asset('assets/img/favicon.png'); ?>">

        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0">
    </head>
    <body class="<?php echo str_replace('/', 'home', $page); ?>">
        <header id="top">
            <nav class="wrap">
                <a href="<?php echo url('home'); ?>" title="Go to the Anchor homepage"><img src="<?php echo asset('assets/img/logo.png'); ?>" alt="Anchor CMS"></a>

                <ul>
                 <?php foreach(array('docs', 'forum', 'download') as $link): ?>
	                 <?php $class = (strpos($page, $link) !== false) ? ' class="active"' : ''; ?>
	                 <li<?php echo $class; ?>><?php echo Html::link($link, ucwords($link)); ?></li>
                 <?php endforeach; ?>
                 </ul>
            </nav>

            <h1 class="wrap">
                <?php echo isset($heading) ? $heading : $title; ?>
            </h1>

            <?php if(isset($homepage)): ?>
            	<img class="screenie" src="<?php echo asset('assets/img/screenshot.png'); ?>">
            <?php endif; ?>
		</header>