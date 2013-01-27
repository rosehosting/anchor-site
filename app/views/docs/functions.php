<?php echo $header; ?>

<hgroup role="banner">
	<h1>Documentation</h1>
</hgroup>

<section id="content">
	<?php echo $sidebar; ?>

	<div class="primary">

		<h2>Theme functions</h2>

		<p>At its core, Anchor is HTML and CSS, with sprinkles of all-important PHP, to dynamically
		retrieve and serve all the data. Don&rsquo;t worry, though, it&rsquo;s pretty painless.
		Here is a comprehensive list of all the functions available to you and your Anchor theme.</p>

		<p><small class="note"><b>Note:</b> these functions may not work as expected in Anchor 0.6
		and lower, and may cause errors.</small></p>

		<dl>
		<?php foreach(Docs::list_all() as $doc): extract($doc); ?>
			<dt>
				<a name="<?php echo $function; ?>"></a>
				<code>
					<?php echo $function; ?><?php if($params): ?>(<?php echo $params; ?>)<?php endif; ?>
				</code>
			</dt>
			<dd><?php echo $text; ?></dd>
			<?php if($sample): ?>
			<dd><?php echo $spectrum->parse($sample); ?></dd>
			<?php endif; ?>
		<?php endforeach; ?>
		</dl>
	</div>
</section>

<?php echo $footer; ?>