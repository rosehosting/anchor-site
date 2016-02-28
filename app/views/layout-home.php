<!doctype html>
<html lang="en">
	<?php echo $head; ?>
	<body class="home">

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
				<div class="col6">
					<h1>Anchor is a super-simple,<br> lightweight blog system, <br>made to let you just write.</h1>
					<p>
						<a class="btn" href="<?php echo url('download'); ?>">
							Download <?php echo $version; ?>
						</a>
						<a class="btn" href="#donate">Donate</a>
						<span class="donation">$<input name="amount" type="text" value="5"></span>
					</p>
					<small class="small quiet">Enjoy using Anchor? send us a donation to keep us going, your donations help us pay for hosting costs and caffeine!</small>
				</div>
			</div>

			<img class="screenie" alt="Screenshot of Anchor CMS" src="<?php echo asset('assets/img/screenshot.png'); ?>">
		</header>

		<?php echo $body; ?>

		<?php echo $foot; ?>

		<script src="https://checkout.stripe.com/checkout.js"></script>
		<script src="<?php echo asset('assets/js/donate.js'); ?>"></script>
		<script>
			(function() {
				new Donate('<?php echo $publicKey; ?>', document.querySelector('a[href$=donate]'), document.querySelector('input[name=amount]'));
			})();
		</script>
	</body>
</html>
