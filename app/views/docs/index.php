<?php echo $header; ?>

	<section class="wrap">
		<section class="content main">
			<?php echo $content; ?>
		</section>
		
		<?php echo $sidebar; ?>
	</section>

	<script src="<?php echo asset('assets/js/rainbow-custom.min.js'); ?>"></script>
	<script>
		(function() {
			var elements = document.querySelectorAll('pre code');

			for(var i = 0; i < elements.length; i++) {
				if(!elements[i].getAttribute('data-language')) {
					elements[i].setAttribute('data-language', 'php');
				}
			};

			Rainbow.color();
		}());
	</script>

<?php echo $footer; ?>