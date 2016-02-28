<!doctype html>
<html lang="en">
	<?php echo $head; ?>
	<body class="docs">
		<header id="top">
			<nav class="wrap">
				<a href="/" title="Go to the Anchor homepage">
					<img src="<?php echo asset('assets/img/logo.png'); ?>" alt="Anchor CMS">
				</a>

				<ul>
					<?php foreach($menu as $url => $label): ?>
						<li class="<?php echo strtolower($label); ?>"><a href="<?php echo $url; ?>"><?php echo $label; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="wrap">
				<h1><?php echo $title; ?></h1>
			</div>
		</header>

		<?php echo $body; ?>

		<?php echo $foot; ?>
	</body>
</html>
